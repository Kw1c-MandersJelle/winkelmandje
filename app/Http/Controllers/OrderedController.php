<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id ?? null;
        $customer = Customer::find($user_id);
        $ordered = Order::find($customer->orders ?? null);

        return view('ordered', [
            'ordered' => $ordered,
        ] ?? 'u have no ordered orders');
    }

    public function completeorder(Request $request, Order $order)
    {
//        dd($order);
        $order->update(['status' => OrderStatus::ORDERED]);
        return redirect('ordered');
    }

    public function edit()
    {
        $user_id = Auth::user()->id;
        $customer = Customer::find($user_id);
        $order = Order::where('customer_id', $user_id)->where('status', OrderStatus::CART)->first();

        $ordered = Order::find($customer->orders);

        return view('ordered', [
            'ordered' => $ordered,
        ]);
    }
}
