<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Session;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(order $order)
    {
        $orders = Order::all()->where('id', Session::get('name'));
//        $orders_amount = DB::table('order_product')->find(Session::get('name'))->count('amount');
        $order = $order->customer();

        return view('winkelmandje', [
            'orders' => $orders,
            'order' => $order,
//            'orders_amount' => $orders_amount,
        ]);
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


            $customer->orders()->find($customer->id);
            

            $order->products()->attach($product->id, [
                'amount' => $amount,
                'price' => $price
            ]);
        }
        return view('products.index',
            [
                'products' => $products
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
    public function destroy(Order $order)
    {
        //
    }
}
