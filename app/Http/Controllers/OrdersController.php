<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;

class OrdersController extends Controller
{
  public function add($productId)
  {
    $product = Produk::find($productId);

    if (!$product) {
      abort(404);
    }

    if (!auth()->check()) {
      return redirect()->back()->with('error', 'You must be logged in to add a product to your order!');
    }

    $order = new Order;
    $order->user_id = auth()->id();
    $order->produk_id = $product->id;
    $order->save();

    return redirect()->back()->with('success', 'Product added to order successfully!');
  }

  public function index()
  {
    // dd(Order::with(['user'])->where('user_id', auth()->id())->get()->toArray());
    $orders = Order::with(['user', 'product'])->where('user_id', auth()->id())->get();
    // dd($orders->toArray());

    return view('orders', [
      'orders' => $orders,
    ]);
  }

  public function destroy(Order $order)
  {
    $order->delete();

    return redirect('/orders')->with('success', 'Product has been deleted!');
  }
}
