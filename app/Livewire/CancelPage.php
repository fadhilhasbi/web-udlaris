<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class CancelPage extends Component
{
    public $order;

    public function mount($order_id)
    {
        $this->order = Order::findOrFail($order_id);
    }

    public function render()
    {
        return view('livewire.cancel-page', [
            'paymentStatus' => $this->order->payment_status,
        ]);
    }
}
