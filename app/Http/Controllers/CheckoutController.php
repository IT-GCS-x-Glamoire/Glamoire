<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buynow;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Shipping_address;
use App\Models\User;
use App\Models\VoucherNewUser;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index(){
        try {
            $userId = session('id_user');
    
            if ($userId) {
                $data = Cart::where('user_id', $userId)
                    ->with('cartItems')
                    ->get();

                $address = Shipping_address::where('user_id', session('id_user'))
                    ->orderBy('is_main', 'DESC')
                    ->get();

                $cartId = Cart::where('user_id', session('id_user'))->value('id');

                $cartItems = Cart_item::where('cart_id', $cartId)
                    ->where('is_choose', TRUE)
                    ->with(['product.brand'])
                    ->get();

                $totalProduct = $cartItems->sum('quantity');
                // Hitung total harga
                $totalPrice = $cartItems->sum('total');


                $data = [
                    'address'       => $address,
                    'cartItems'     => $cartItems,
                    'totalProduct'  => $totalProduct,
                    'totalPrice'    => $totalPrice,
                    'totalShopping' => $totalPrice  
                ];
                
                return view('user.component.checkout')->with('data', $data);
            }
            else {
                session()->flash('register_or_login_first');
                return redirect()->back();
            }
        } catch (Exception $err) {
            dd($err);
        }
    }

    public function checkCodeVoucher(Request $request){
        $voucherExists = VoucherNewUser::where('code', $request->code)->exists();

        return response()->json(['exists' => $voucherExists]);
    }

    public function applyVoucher(Request $request)
    {
        try {
            $userId = session('id_user');
            $voucherCode = $request->code_voucher;

            if ($userId && $voucherCode) {
                // Validasi kode promo
                $voucher = VoucherNewUser::where('code', $voucherCode)
                    ->first();

                if ($voucher) {
                    $cartId = Cart::where('user_id', $userId)->value('id');
                    $cartItems = Cart_item::where('cart_id', $cartId)
                        ->where('is_choose', true)
                        ->with(['product.brand'])
                        ->get();

                    $totalProduct = $cartItems->sum('quantity');
                    $totalPrice = $cartItems->sum('total');

                    // Hitung diskon dari voucher
                    $discount = $totalPrice * 10 / 100;

                    // Hitung total belanja setelah diskon
                    $totalShopping = $totalPrice - $discount;

                    $data = [
                        'address'       => Shipping_address::where('user_id', $userId)->orderBy('is_main', 'DESC')->get(),
                        'cartItems'     => $cartItems,
                        'totalProduct'  => $totalProduct,
                        'totalPrice'    => $totalPrice,
                        'discount'      => $discount,
                        'totalShopping' => $totalShopping,
                    ];

                    return response()->json([
                        'success' => true, 
                        'totalPriceFormatted' => $totalPrice,
                        'discountFormatted' => $discount,
                        'totalShoppingFormatted' => $totalShopping,
                    ]);
                } else {
                    // Kode voucher tidak valid
                    return redirect()->back()->withErrors(['code_voucher' => 'Kode promo tidak valid atau sudah tidak aktif.']);
                }
            }
        } catch (Exception $err) {
            dd($err);
        }
    }

    // BUYNOW
    public function addProductBuyNow(Request $request)
    {
        try {
            $userId = session('id_user');
            
            if ($userId) {
                $checkBuyNow = Buynow::where('user_id', $userId)->exists();
                $price = Product::where('id', $request->product_id)->value('regular_price');

                // Periksa apakah user sudah memiliki data di tabel Buynow
                if ($checkBuyNow) {
                    $buynow = Buynow::where('user_id', $userId)->first();
                    $buynow->update([
                        'user_id'    => $userId,
                        'product_id' => $request->product_id,
                        'quantity'   => $request->quantity,
                        'price'      => $price, // Kamu bisa mengganti harga ini secara dinamis
                        'total'      => $request->quantity * $price,
                        'is_buy'     => 0,    
                    ]);
                } else {
                    Buynow::create([
                        'user_id'    => $userId,
                        'product_id' => $request->product_id,
                        'quantity'   => $request->quantity,
                        'price'      => $price, // Harga default, bisa diganti dinamis
                        'total'      => $request->quantity * $price,
                        'is_buy'     => 0,
                    ]);
                }

                // Return response success jika proses berhasil
                return response()->json(['success' => true, 'message' => 'Produk berhasil ditambahkan ke Buy Now']);
            } else {
                return response()->json(['success' => false, 'message' => 'Masuk/Daftar Terlebih Dahulu']);
            }
        } catch (Exception $err) {
            // Return error dengan pesan yang lebih spesifik
            return response()->json(['success' => false, 'message' => $err->getMessage()]);
        }
    }

    public function updateCartQuantityBuyNow(Request $request)
    {
        // Find the product in the cart or wherever the quantity is stored
        $productBuyNow = Buynow::where('user_id', session('id_user'))->first();

        if ($productBuyNow) {
            $productBuyNow->update([
                'quantity' => $request->quantity,
                'total'    => ($request->quantity)*($productBuyNow->price),
            ]);

            return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Terjadi Masalah Dengan Sistem']);
    }

    public function buyNow(){
        try {
            $userId = session('id_user');
    
            if ($userId) {
                $product = Buynow::where('user_id', $userId)
                    ->with(['product.brand'])
                    ->get();

                $address = Shipping_address::where('user_id', session('id_user'))
                ->orderBy('is_main', 'DESC')
                ->get();
                

                foreach ($product as $key => $prod) {
                    $totalProduct = $prod->quantity;
                    $totalPrice = $prod->total;
                }

                $data = [
                    'product'       => $product,
                    'address'       => $address,
                    'totalProduct'  => $totalProduct,
                    'totalPrice'    => $totalPrice,
                ];
                return view('user.component.buynow')->with('data', $data);
            }
            else {
                return redirect()->back();
            }

        } catch (Exception $err) {
            error(404);
        }
    }

    public function applyVoucherBuyNow(Request $request)
    {
        try {
            $userId = session('id_user');
            $voucherCode = $request->code_voucher;

            if ($userId && $voucherCode) {
                // Validasi kode promo
                $voucher = VoucherNewUser::where('code', $voucherCode)
                    ->first();

                if ($voucher) {
                    $product = Buynow::where('user_id', $userId)
                        ->with(['product.brand'])
                        ->get();

                    foreach ($product as $key => $prod) {
                        $totalProduct = $prod->quantity;
                        $totalPrice = $prod->total;
                    }

                    // Hitung diskon dari voucher
                    $discount = $totalPrice * 10 / 100;

                    // Hitung total belanja setelah diskon
                    $totalShopping = $totalPrice - $discount;

                    return response()->json([
                        'success' => true, 
                        'totalPriceFormatted' => $totalPrice,
                        'discountFormatted' => $discount,
                        'totalShoppingFormatted' => $totalShopping,
                    ]);
                } else {
                    // Kode voucher tidak valid
                    return redirect()->back()->withErrors(['code_voucher' => 'Kode promo tidak valid atau sudah tidak aktif.']);
                }
            }
        } catch (Exception $err) {
            dd($err);
        }
    }
}
