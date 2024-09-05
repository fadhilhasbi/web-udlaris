<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class MyOrderPage extends Component
{ use WithPagination;
    #[Title('My Orders')]
    public function render()
    { $my_order = Order::where('user_id', auth()->id())->latest()->paginate(5);
        return view('livewire.my-order-page',['orders' => $my_order]);
    }
}
