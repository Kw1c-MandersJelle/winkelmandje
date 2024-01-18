<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Route::get('tinker', function () {
    $orders = Order::all();

    foreach ($orders as $order) {
        foreach ($order->products as $product) {
//            dd($order);
            $pivotData = $product->pivot;

//            $amount = $pivotData->amount;
            echo $pivotData->amount . '<br>';

        }
    }
});
Route::resource('products', ProductController::class);
//Route::post('products', [ProductController::class, 'index'])->name('products.index');

Route::resource('orders', OrderController::class);
Route::post('orders/{product}', [OrderController::class, 'create'])->name('order.create');
//Route::get('orders/{product}', [OrderController::class, 'create'])->name('create_order');
//dd($product->name);

//Route::get('projects', [ProductController::class, 'index'])->name('products.index');
