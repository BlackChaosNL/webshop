<?php
/**
 * Created by PhpStorm.
 * User: jjvij
 * Date: 31-3-2016
 * Time: 01:29
 */

namespace app\Http\Controllers;

use App;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public $cart = [];

    public function getCart(){
        $cart = $this->getSavedCart();
        return view('pages.cart', ['cart' => $cart]);
    }

    public function addToCart($productId = null){
        $cart = $this->getSavedCart();
        $product = App\Product::where('id', $productId)->first();
        if($product != null && $product->piece > 0){
            if(count($cart) > 0){
                $exists = 0;
                for($i = 0; $i < count($cart); $i++){
                    if($cart[$i][0] == $productId){
                        $cart[$i][1] = $cart[$i][1]+1;
                        $exists = 1;
                    }
                }
                if($exists == 0){
                    $cart[] = [$productId, 1];
                }
            }else{
                $cart[] = [$productId, 1];
            }
            $this->cart = $cart;
            $this->saveCart($this->cart);
            $product->piece--;
            $product->save();
        }else{
            \Session::flash('product', 'The following product is not available anymore.');
        }
        return back();
    }

    public function removeFromCart($productId = null){
        $cart = $this->getSavedCart();
        if(count($cart) > 0){
            for($i = 0; $i < count($cart); $i++){
                if($cart[$i][0] == $productId){
                    $product = App\Product::where('id', $productId)->first();
                    $product->piece++;
                    $product->save();
                    if($cart[$i][1] > 1){
                        $cart[$i][1] = $cart[$i][1]-1;
                    }else{
                        unset($cart[$i]);
                    }
                    \Session::flash('product', 'Product has been removed.');
                }
            }
        }
        $this->cart = $cart;
        $this->saveCart($this->cart);
        return back();
    }

    public function clearCart(){
        $cart = $this->getSavedCart();
        $cart = [];
        $this->saveCart($cart);
        return back();
    }

    public function checkOutCart(){
        $cart = $this->getSavedCart();
        $last = App\Order::all()->last();
        $order = new App\Order;
        $order->order_id = ($last != null) ? $last->order_id+1 : 1;
        $order->customer_id = \Auth::id();
        $order->paid = 1;
        $order->save();
        for($i = 0; $i < count($cart); $i++){
            $orderItem = new App\OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cart[$i][0];
            $orderItem->pieces = $cart[$i][1];
            $orderItem->amount = App\Product::where('id', $cart[$i][0])->first()->price * $cart[$i][1]; 
            $orderItem->save();
        }
        $this->clearCart();
        \Session::flash('product', 'Your order has been successfully placed');
        return back();
    }

    public function getSavedCart(){
        $cart = Session::get('cart');
        return $cart;
    }

    public function saveCart($cart){
        Session::put('cart', array_values($cart));
    }
}