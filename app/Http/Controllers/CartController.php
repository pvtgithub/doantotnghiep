<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\PagesController;
use session;
use Auth;

class CartController extends Controller
{

    public function getAddcart($id,$quantity){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity']+$quantity;
        }else{
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "promotion_price" => $product->promotion_price,
                "unit_price" => $product->unit_price,
                "image" => $product->images->first()->image,
            ];
        }
        session()->put('cart',$cart);
        return view('pages.cart');
    }

    public function Update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return view('pages.cart');
    }

    
    public function Remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }

        return view('pages.cart');
    }

    public function getCheckout(){
        
        return view('pages.form-checkout');
    }
}
