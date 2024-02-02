<?php

namespace App\Livewire;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductAmount extends Component
{
    public $count;
    public $price;
    public $order;
    public $product;


    public function mount($product)
    {
        $order = $this->order;

        $product = $this->product;

//        $this->increment($count);
    }

    public function increment($count)
    {
//        $order = $this->getOrder();
        $this->count = $count;
        $this->count++;
    }

    public function updateCart()
    {
        $count = $this->count;
        $product = $this->product;
        $customer_id = Session::get('customer')->id;
//        dd($customer_id, $product, $count);

        $order = $this->getOrder();

        OrderProduct::updateOrCreate([
            'order_id' => $order->id,
            'product_id' => $product->id
        ], [
            'amount' => $count,
            'price' => $product->price
        ]);
    }

    protected function getOrder()
    {
        $customer_id = Session::get('customer')->id;

        return Order::firstOrCreate([
            'customer_id' => $customer_id,
            'status' => OrderStatus::CART
        ]);
    }
//        $orderid = Session::get('name');
//        $order = $order->find($orderid);
//        if ($order->products->pluck('id')->contains($product->id)) {
//            $count = $order->products()->find($product->id)->pivot->amount;
//            $this->count = $count;
//            $order->products()->where('product_id', '=', $product->id)
//                ->update([
//                    'amount' => ++$count
//                ]);
//        } else {
//            $order->products()->attach($product->id, [
//                'amount' => $this->count,
//                'price' => $price
//            ]);
//
//        }

    public function render(order $order)
    {

        $product = $this->product;
        $price = $this->product->price;
        $this->price = $price;
//        dd($product->id);
        $orderid = Session::get('customer');
        $order = $order->find($orderid);

//        dd($order->products()->toArray());
//        $count = $order->products()->find($product->id)->pivot->amount;
//        $count =
//        $this->count = $count;

        return view('livewire.product-amount', [
//            'count' => $count
        ]);
    }
}





//    $order->products->find($product->id)->pivot->amount ?? 0;


//
//if ($order->products->pluck('id')->contains($product->id)) {
//    $count = $order->products()->find($product->id)->pivot->amount;
//    $this->count = $count;
//
//        ->update([
//            'amount' => ++$count
//        ]);
//} else {
//    $order->products()->attach($product->id, [
//        'amount' => $this->count,
//        'price' => $price
//    ]);
//
//}
//}
