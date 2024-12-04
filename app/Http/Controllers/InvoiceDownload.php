<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderItem;

class InvoiceDownload extends Controller
{
    public function download($order_id)
{
    // Retrieve the order data
    $order = Order::with(['orderItems.product'])->where('id', $order_id)->first();
    $address = Address::where('order_id', $order_id)->first();

    // Check if the order exists
    if (!$order) {
        abort(404, 'Order not found');
    }

    // Prepare data for the PDF
    $data = [
        'order_items' => $order->orderItems, // This now correctly retrieves all the order items related to the order
        'address' => $address, // Address associated with the order
        'order' => $order, // The order itself
        'order_id' => $order_id, // Order ID
    ];

    // Load the PDF view
    $pdf = Pdf::loadView('livewire.invoice-controller', $data);

    // Set the filename
    $filename = 'INVOICE-' . $order_id . '.pdf';

    // Return the PDF for download
    return $pdf->download($filename);
}

}
