<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Cart;

use Illuminate\Http\Request;
//use Session;

class CartController extends Controller
{
    //
    public function addCartItem($id){
        $quantityAdd = 1;
    	$oldCart = session()->has('cart') ? session('cart') : null ;
    	$cart = new Cart($oldCart);
    	$product = Product::find($id);
    	$priceSell = ($product->promotion_price != 0)? $product->promotion_price : $product->price;
    	/*cart item*/
    	$cartItem = new CartItem($product,$priceSell,$quantityAdd,0);
    	$listCartItem = $cart->getListCartItem();
    	if($listCartItem!=null && array_key_exists($id, $listCartItem)) $cartItem = $listCartItem[$id];

    	$quantity = $cartItem->getQuantity();
    	$subTotal = $priceSell * $quantity;
    	$cartItem->setQuantity($quantity);
    	$cartItem->setSubTotal($subTotal);
    	/*cart các phần*/
    	$listCartItem[$id] = $cartItem;
    	$totalQuantity = $cart->getTotalQuantity();
    	$totalQuantity+=$quantity;
    	$grandTotal = $cart->getGrandTotal();
    	$grandTotal += $subTotal;
    	$cart->setListCartItem($listCartItem);
    	$cart->setTotalQuantity($totalQuantity);
    	$cart->setGrandTotal($grandTotal);

    	session()->put('cart',$cart);
    	return back();
    }

    public function deleteCartItem($id){
        $cart = session('cart');
        $listCartItem = $cart->getListCartItem();
        $cart->setTotalQuantity($cart->getTotalQuantity()-$listCartItem[$id]->getQuantity());
        $cart->setGrandTotal($cart->getGrandTotal()-$listCartItem[$id]->getSubTotal());
        unset($listCartItem[$id]);
        $cart->setListCartItem($listCartItem);
        if ($cart->getTotalQuantity()!=0) {
            session()->put('cart',$cart);
        } else {
            session()->forget('cart');
        }
        return view('frontend.cart.minicart');
    }

    public function updateCartItem($id,$quantity){
        $cart = session('cart');
        $listCartItem = $cart->getListCartItem();
        //trừ cũ đi
        $cart->setTotalQuantity($cart->getTotalQuantity()-$listCartItem[$id]->getQuantity());
        $cart->setGrandTotal($cart->getGrandTotal()-$listCartItem[$id]->getSubTotal());
        if($quantity>0){
            $listCartItem[$id]->setQuantity($quantity);
            $priceSell = $listCartItem[$id]->getPriceSell();
            $listCartItem[$id]->setSubTotal($priceSell*$quantity);
            //cộng mới
            $cart->setTotalQuantity($cart->getTotalQuantity()+$quantity);
            $cart->setGrandTotal($cart->getGrandTotal()+$priceSell*$quantity);
        }
        else unset($listCartItem[$id]);
        $cart->setListCartItem($listCartItem);
        if ($cart->getTotalQuantity()!=0) {
            session()->put('cart',$cart);
        } else {
            session()->forget('cart');
        }
        return view('frontend.cart.minicart');
    }
    public function getCartList(){
        return view('frontend.cart.cart');
    }
    public function destroyCartList(){
        session()->forget('cart');
        return view('frontend.cart.cart');
    }
    public function updateCartList($id,$quantity){
        $cart = session('cart');
        $listCartItem = $cart->getListCartItem();
        //trừ cũ đi
        $cart->setTotalQuantity($cart->getTotalQuantity()-$listCartItem[$id]->getQuantity());
        $cart->setGrandTotal($cart->getGrandTotal()-$listCartItem[$id]->getSubTotal());
        if($quantity>0){
            $listCartItem[$id]->setQuantity($quantity);
            $priceSell = $listCartItem[$id]->getPriceSell();
            $listCartItem[$id]->setSubTotal($priceSell*$quantity);
            //cộng mới
            $cart->setTotalQuantity($cart->getTotalQuantity()+$quantity);
            $cart->setGrandTotal($cart->getGrandTotal()+$priceSell*$quantity);
        }
        else unset($listCartItem[$id]);
        $cart->setListCartItem($listCartItem);
        if ($cart->getTotalQuantity()!=0) {
            session()->put('cart',$cart);
        } else {
            session()->forget('cart');
        }
        return view('frontend.cart.cartlist');
    }
    public function deleteCartList($id){
        $cart = session('cart');
        $listCartItem = $cart->getListCartItem();
        $cart->setTotalQuantity($cart->getTotalQuantity()-$listCartItem[$id]->getQuantity());
        $cart->setGrandTotal($cart->getGrandTotal()-$listCartItem[$id]->getSubTotal());
        unset($listCartItem[$id]);
        $cart->setListCartItem($listCartItem);
        if ($cart->getTotalQuantity()!=0) {
            session()->put('cart',$cart);
        } else {
            session()->forget('cart');
        }
        return view('frontend.cart.cartlist');
    }

}
?>
