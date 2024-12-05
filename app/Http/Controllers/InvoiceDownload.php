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

        // Prepare data for the PDF
        $data = [
            'order_items' => $order->items, // Produk reguler
            'custom_items' => $order->orderCustomItem, // Produk kustom
            'address' => $address,
            'order' => $order,
            'order_id' => $order_id,
        ];

        // Load the PDF view
        $pdf = Pdf::loadView('livewire.invoice-controller', $data);

        // Set the filename
        $filename = 'INVOICE-' . $order_id . '.pdf';

        // Return the PDF for download
        return $pdf->download($filename);
    }
}
