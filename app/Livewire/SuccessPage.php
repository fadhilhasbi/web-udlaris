<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class SuccessPage extends Component
{
    public $order;

    public function mount($order_id)
    {
        $this->order = Order::with('address')->findOrFail($order_id);
    }

    public function render()
    {
        return view('livewire.success-page', [
            'order' => $this->order,
        ]);
    }
}
