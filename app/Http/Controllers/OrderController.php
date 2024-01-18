<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
//        $amount = DB::table('order_product')->get()->pluck('amount')->toArray();


        return view('winkelmandje', [
            'orders' => $orders,
//            'amount' => $amount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(product $product, order $order, Request $request)
    {
        if ($request->isMethod('post')) {
            $amount = $request->input('amount');

            $products = Product::all();

            $order->id = 1;
            $order->products()->attach($product->id, ['amount' => $amount]);
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
