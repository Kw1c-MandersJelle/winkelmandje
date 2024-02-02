<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UpdateCart extends Component
{
    public $count;
    public $price;
    public $order;
    public $product;

    public function mount()
    {
//
    }

    public function increment()
    {
        $this->getOrder();
        $this->count++;
    }

    protected function getOrder()
    {
        if (auth()->user() == null) {
            return redirect('/');
        } else {
            $customer_id = auth()->user()->id;

            return Order::firstOrCreate([
                'customer_id' => $customer_id,
                'status' => OrderStatus::CART
            ]);
        }
    }

    public function deleteproductfromcart()
    {

    }

    public function decrement()
    {
        $this->count--;
//        $this->updateCart();
    }

    public function updateCart()
    {
        $this->count = max('0', $this->count--);
        $count = $this->count;
        $product = $this->product;

        $order = $this->getOrder();

        OrderProduct::updateOrCreate([
            'order_id' => $order->id,
            'product_id' => $product->id
        ], [
            'amount' => $count,
            'price' => $product->price
        ]);
    }

    public function render()
    {
        $price = $this->product->price;
        $this->price = $price;
        return view('livewire.update-cart', [
            //
        ]);
    }
}
