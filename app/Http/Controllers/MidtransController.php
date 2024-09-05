<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Midtrans\Notification;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    // Change 1
    protected $notification;
    protected $order;
    protected $serverKey;

    public function __construct()
    {
        parent::__construct();

        $this->serverKey = config('services.midtrans.serverKey');
        $this->_handleNotification();
    }

    public function handleNotification(Request $request)
    {
        if ($this->isSignatureKeyVerified()) {
            if ($this->isSuccess()) {
                $this->order->payment_status = 'success';
            } elseif ($this->isExpire()) {
                $this->order->payment_status = 'expired';
            } elseif ($this->isCancelled()) {
                $this->order->payment_status = 'failed';
            } else {
                $this->order->payment_status = 'failed';
            }

            $this->order->save();
            return response('OK', 200);
        } else {
            return response('Signature key mismatch', 403);
        }
    }

    public function isSignatureKeyVerified()
    {
        return ($this->_createLocalSignatureKey() == $this->notification->signature_key);
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

    public function getNotification()
    {
        return $this->notification;
    }

    public function getOrder()
    {
        return $this->order;
    }

    protected function _createLocalSignatureKey()
    {
        return hash(
            'sha512',
            $this->notification->order_id . $this->notification->status_code .
            $this->notification->gross_amount . $this->serverKey
        );
    }

    protected function _handleNotification()
    {
        $notification = new Notification();

        $orderNumber = $notification->order_id;
        $order = Order::where('id', str_replace('MID', '', $orderNumber))->first(); // Ensure order lookup matches the format

        $this->notification = $notification;
        $this->order = $order;
    }
}
