<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use App\Models\Order;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    protected $notification;
    protected $order;
    protected $serverKey;

    public function __construct()
    {
        // Configure Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isSanitized = true;
        Config::$is3ds = true;
        Config::$isProduction = false;
        $this->serverKey = config('services.midtrans.serverKey');
    }

    public function handleNotification(Request $request)
    {
        Log::info('Received Midtrans notification. Content-Type: ' . $request->header('Content-Type'));
        Log::info('Raw request content: ' . $request->getContent());
        Log::info('Request method: ' . $request->method());
        Log::info('Request headers: ' . json_encode($request->headers->all()));
        Log::info('Request query parameters: ' . json_encode($request->query()));
        Log::info('Request input: ' . json_encode($request->input()));

        try {
            $this->_handleNotification($request);

            if (!$this->notification) {
                Log::error('Midtrans notification is null');
                return response()->json(['error' => 'Invalid notification data'], 400);
            }

            if ($this->isSignatureKeyVerified()) {
                $this->updateOrderStatus();
                return response()->json(['message' => 'Notification processed successfully'], 200);
            } else {
                Log::warning('Signature key mismatch in Midtrans notification');
                return response()->json(['error' => 'Signature key mismatch'], 403);
            }
        } catch (\Exception $e) {
            Log::error('Error in handleNotification: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error', 'message' => $e->getMessage()], 500);
        }
    }

    protected function updateOrderStatus()
    {
        if (!$this->order) {
            Log::error('Order not found for ID: ' . $this->notification->order_id);
            return;
        }

        if ($this->isSuccess()) {
            $this->order->payment_status = 'paid';
        } elseif ($this->isExpire()) {
            $this->order->payment_status = 'failed';
        } elseif ($this->isCancelled()) {
            $this->order->payment_status = 'failed';
        } else {
            $this->order->payment_status = 'pending';
        }

        $this->order->save();
        Log::info('Order status updated: ' . $this->order->id . ' - ' . $this->order->payment_status);
    }

    public function isSignatureKeyVerified()
    {
        $generatedSignatureKey = $this->_createLocalSignatureKey();
        $receivedSignatureKey = $this->notification->signature_key;

        Log::info('Generated Signature Key: ' . $generatedSignatureKey);
        Log::info('Received Signature Key: ' . $receivedSignatureKey);

        return ($generatedSignatureKey == $receivedSignatureKey);
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }

    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }

    protected function _createLocalSignatureKey()
    {
        return hash(
            'sha512',
            $this->notification->order_id . $this->notification->status_code .
            $this->notification->gross_amount . $this->serverKey
        );
    }

    protected function _handleNotification(Request $request)
    {
        try {
            $content = $request->getContent();
            Log::info('Notification content: ' . $content);

            if (empty($content)) {
                // If content is empty, try to get data from input
                $notificationBody = $request->input();
                Log::info('Attempting to get data from request input: ' . json_encode($notificationBody));
            } else {
                // Try to decode as JSON first
                $notificationBody = json_decode($content, true);

                // If JSON decoding fails, try to parse as query string
                if (json_last_error() !== JSON_ERROR_NONE) {
                    Log::info('JSON decoding failed, attempting to parse as query string');
                    parse_str($content, $notificationBody);
                }
            }

            if (empty($notificationBody)) {
                Log::error('Failed to parse notification body');
                return;
            }

            Log::info('Parsed notification body: ' . json_encode($notificationBody));

            $this->notification = new Notification();

            foreach ($notificationBody as $key => $value) {
                $this->notification->$key = $value;
            }

            $orderNumber = $this->notification->order_id ?? null;
            if ($orderNumber) {
                $this->order = Order::where('id', $orderNumber)->first();
                if (!$this->order) {
                    Log::error('Order not found for ID: ' . $orderNumber);
                }
            } else {
                Log::error('Order ID not found in notification');
            }
        } catch (\Exception $e) {
            Log::error('Error processing Midtrans notification: ' . $e->getMessage());
        }
    }
}
