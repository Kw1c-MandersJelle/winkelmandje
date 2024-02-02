<?php

use App\Enums\OrderStatus;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderedController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Livewire\DeleteCartProduct;
use App\Livewire\ProductAmount;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');

});
Route::get('tinker', function (Request $request) {

//    $order = Order::first();
//    dd($order->products->first()->pivot);


//    $user_id = Auth::user()->id;
//
//    dump(
//        Customer::find($user_id)->orders,
//    );
//    Order::firstWhere('customer_id', $user_id)->products->each(function ($product) {
//        dump(
//            $product->name,
//            $product->pivot
//        );
//    });


//    $count = Auth::user();
//    dd($count);


//    $customer_id = 1;
//    $product = Product::find(5);
//    $order = Order::firstOrCreate([
//        'customer_id' => $customer_id,
//        'status' => OrderStatus::CART
//    ]);
//
//    \App\Models\OrderProduct::updateOrCreate([
//        'order_id' => $order->id,
//        'product_id' => $product->id
//    ], [
//        'amount' => '10',
//        'price' => '100'
//    ]);
//
//    dd(
//        $order->toArray(),
//        $order->products->toArray(),
//    );


//    $count = $order->products()->find($product->id)->pivot->amount;

//    dd(
//        Order::find(1)->products()->find(1)->pivot->amount,
//        Order::find(2)->products()->find(1)->toArray(),
//
//    );

//    $session = Session::get('name');
//    $product1 = $product->find(1);
//    $pivotdata = $product1->pivot;
//    dd($pivotdata->amount);

//    $price = $product->price;
//    $products = Product::all();
//
//    $order->id = Session::get('name');
//
//
//    $customer->orders()->find($customer->id);
//
//    dd($customer->orders()->product);
//
//    if ($customer->orders()->product == $products) {
//        dd('yes');
//    }


//    DB::table('order_product')->where('id', '=', 2)->increment(
//        'amount', 100);

});


//    $orders = Order::all();
//
//    foreach ($orders as $order) {
//        foreach ($order->products as $product) {
////            dd($order);
//            $pivotData = $product->pivot;
//
////            $amount = $pivotData->amount;
//            echo $pivotData->amount . '<br>';
//
//        }
//    }

Route::get('login/{id}', function ($id) {
    Auth::loginUsingId($id);
    return redirect('/products');
});
Route::get('logout', function () {
    Auth::logout();
});


Route::get('orders/{product}', [ProductAmount::class, 'increment'])->name('order.increment');
Route::get('orders', [DeleteCartProduct::class, 'deletecartproduct'])->name('deletecartproduct');
Route::resource('products', ProductController::class);


Route::resource('orders', OrderController::class);
Route::post('orders/{pivotdata}', [OrderController::class, 'destroy'])->name('order.destroy');
Route::resource('ordered', OrderedController::class);
Route::get('ordered', [OrderedController::class, 'index'])->name('ordered.index');
Route::post('complete/{order}', [OrderedController::class, 'completeorder'])->name('completeorder');
//Route::post('orders/{product}', [OrderController::class, 'create'])->name('order.create');

//Route::resource('customers', CustomerController::class);
//Route::post('customers', [CustomerController::class, 'index'])->name('customers.index');


//Route::get('orders/{product}', [OrderController::class, 'create'])->name('create_order');
//dd($product->name);

//Route::get('projects', [ProductController::class, 'index'])->name('products.index');
//Route::post('products', [ProductController::class, 'index'])->name('products.index');
