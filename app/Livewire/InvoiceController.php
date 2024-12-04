<?php

namespace App\Livewire;


use App\Models\Order;
use App\Models\Address;
use Livewire\Component;
use App\Models\OrderItem;

class InvoiceController extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function render()
    {
        return view('livewire.invoice-controller', $this->getOrderData());
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
            'order_id' => $this->order_id
        ];
    }
}
