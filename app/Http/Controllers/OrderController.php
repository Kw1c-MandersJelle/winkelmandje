<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Session;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()?->id;
        $order = Order::where('customer_id', $user_id)->where('status', OrderStatus::CART)->first();


        $price_total = DB::table('order_product')
            ->where('order_id', '=', $order?->id)
            ->pluck('price_total')
            ->sum();

        return view('winkelmandje', [
            'order' => $order,
            'price_total' => $price_total,
        ] ?? 'there are no products in your shopping cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(product $product, order $order, Request $request, customer $customer)
    {
        if ($request->isMethod('post')) {
            $amount = $request->input('amount');

            $price = $product->price;
            $products = Product::all();

            $order->id = Session::get('name');


            if ($order->products->pluck('id')->contains($product->id)) {
//                dd('dit product bestaat al');
            } else {
                $order->products()->attach($product->id, [
                    'amount' => $amount,
                    'price' => $price
                ]);
            }
        }
        return view('products.index',
            [
                'amount' => $amount,
                'products' => $products,
            ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
//
    }
}
