<?php

namespace App\Livewire;

use App\Models\OrderProduct;
use Livewire\Component;

class DeleteCartProduct extends Component
{
    public $orderproduct_id;
    
    public function deletecartproduct()
    {
        $orderproduct_id = $this->orderproduct_id;
        OrderProduct::find($orderproduct_id)->delete();
    }

    public function render()
    {
        return view('livewire.delete-cart-product');
    }
}
