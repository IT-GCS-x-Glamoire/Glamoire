<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping_address;
use App\Models\User;
use App\Models\Cart;


class CartController extends Controller
{
    public function index(){
        $userId = session('id_user');

        if ($userId) {
            $data = Cart::where('user_id', $userId)
                ->with('cartItems')
                ->get();
            
            $total = $data->sum(function($cart) {
                return $cart->cartItems->sum('total'); // Menjumlahkan total setiap cartItems dalam setiap cart
            });
        }
        else {
            session()->flash('register_or_login_first');
            return redirect()->back();
        }

        return view('user.component.cart')->with('data', $data)->with('total', $total);
    }

    public function checkout(){
        try {
            $userId = session('id_user');
    
            if ($userId) {
                $data = Cart::where('user_id', $userId)
                ->with('cartItems')
                ->get();
                $address = Shipping_address::where('user_id', session('id_user'))
                ->orderBy('is_main', 'DESC')
                ->get();
                
                return view('user.component.checkout')->with('address', $address);
            }
            else {
                session()->flash('register_or_login_first');
                return redirect()->back();
            }
        } catch (Exception $err) {
            dd($err);
        }
    }
}
