<?php

namespace App\Livewire;


use App\Models\Order;
use App\Models\Address;
use Livewire\Component;
use App\Models\OrderItem;

class InvoiceController extends Component
{
    public $order_id;
    public $signature;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
{
    $data = $this->getOrderData();

    // Gabungkan data order untuk tanda tangan
    $dataString = "{$data['order']->id}|{$data['order']->working_time}|{$data['order']->total}";
    $signature = $this->generateSignature($dataString);

    // Kirim ke view
    return view('livewire.invoice-controller', array_merge($data, [
        'signature' => $signature,
    ]));
}

    private function getOrderData()
    {
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        $address = Address::where('order_id', $this->order_id)->first();
        $order = Order::where('id', $this->order_id)->first();

        return [
            'order_items' => $order_items,
            'address' => $address,
            'order' => $order,
            'working_time' => $order->working_time,
        ];
    }

    private function generateSignature($data)
    {
        $key = env('INVOICE_SECRET_KEY');
    // Memotong hasil hash menjadi 32 karakter pertama
    return substr(hash_hmac('sha256', $data, $key), 0, 32);
    }
}
