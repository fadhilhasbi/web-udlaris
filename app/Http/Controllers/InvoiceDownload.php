<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\Address;

class Invoicedownload extends Controller
{
    public function download($order_id)
{
    // Retrieve the order data
    $order = Order::with(['items.product', 'orderCustomItem'])->where('id', $order_id)->first();
    $address = Address::where('order_id', $order_id)->first();

    // Check if the order exists
    if (!$order) {
        abort(404, 'Order not found');
    }

    // Gabungkan data order untuk tanda tangan digital
    $dataString = "{$order->id}|{$order->working_time}|{$order->total}";
    $signature = $this->generateSignature($dataString);

    // Prepare data for the PDF
    $data = [
        'order_items' => $order->items, // Produk reguler
        'custom_items' => $order->orderCustomItem, // Produk kustom
        'address' => $address,
        'order' => $order,
        'order_id' => $order_id,
        'signature' => $signature, // Kirim tanda tangan digital ke Blade
    ];

    // Load the PDF view
    $pdf = Pdf::loadView('livewire.invoice-controller', $data);

    // Set the filename
    $filename = 'INVOICE-' . $order_id . '.pdf';

    // Return the PDF for download
    return $pdf->download($filename);
}

// Fungsi untuk menghasilkan tanda tangan digital
private function generateSignature($data)
{
    $key = env('INVOICE_SECRET_KEY');
    // Memotong hasil hash menjadi 32 karakter pertama
    return substr(hash_hmac('sha256', $data, $key), 0, 32);
}
}
