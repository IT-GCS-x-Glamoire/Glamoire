<?php

namespace App\Http\Controllers;

use App\Models\Shipping_address;
use App\Models\User;
use App\Models\Role;
use App\Models\Subscribe;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Wishlist;
use App\Models\Buynow;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Mengambil data User
    public function account($user){
        try {
            $id      = session('id_user');
            $profile = User::with([
                'shippingAddress' => function($query) {
                    $query->orderBy('is_main', 'DESC'); // Mengurutkan shippingAddress berdasarkan is_main
                },
                'wishlist', 
                'cart.cartItems'
            ])->where('id', $id)->first();

            // $shippingAddress = Shipping_address::where('user_id', $id)
            // $whistlist       = Whistlist::where('user_id', $id);
            // $cart            = Cart::where('user_id', $id)
            // ->with('cartItems');
            // get();

            // dd($shippingAddress);
            
            // dd($profile);
            return view('user.component.account')->with('profile', $profile);
        } catch (Exception $err) {
            dd($err);
        }
    }

    // Action Tambah Shipping Address
    public function actionAddShippingAddress(Request $request){
        try {
            
            $id = User::where('id', session('id_user'))->value('id');
            $checkMainAddress = Shipping_address::where('user_id', $id)->where('is_main', true)->first();
            $checkUseAddress = Shipping_address::where('user_id', $id)->where('is_use', true)->first();

            Shipping_address::create([
                'label'          => $request->label,
                'recipient_name' => $request->recipient_name,
                'handphone'      => $request->handphone,
                'province'       => $request->province_name,
                'regency'        => $request->regency_name,
                'district'       => $request->district_name,
                'address'        => $request->address,
                'benchmark'      => $request->benchmark,
                'user_id'        => $id,
                'id_province'    => $request->province,
                'id_regency'     => $request->regency,
                'id_district'    => $request->district,
                'is_main'        => $checkMainAddress ? false : true,
                'is_use'         => $checkUseAddress ? false : true,
            ]);

            session()->flash('after_add_address');
            return redirect()->back();

        } catch (Exception $err) {
            dd($err);
        }
    }

    public function addToChart(Request $request){
        try {
            $userId = session('id_user');
            
            if (session('id_user')) {
                $checkCartUser = Cart::where('user_id', session('id_user'))->exists();
                $cartId = Cart::where('user_id', session('id_user'))->value('id');

                // JIKA CART SUDAH ADA MAKA TIDAK PERLU CREATE CART
                if($checkCartUser){
                    $checkCartItem = Cart_item::where('cart_id', $cartId)
                    ->where('product_id', $request->product_id)->exists();
                    // JIKA PRODUK SUDAH ADA DI CART USER
                    if ($checkCartItem) {
                        $cartItem  = Cart_item::where('cart_id', $cartId)
                        ->where('product_id', $request->product_id)->first();
                        $itemPrice = $cartItem->price; 
                        $itemQuantity = $cartItem->quantity;
    
                        // Tingkatkan kuantitas item dengan 1
                        $newQuantity = $itemQuantity + 1;
    
                        // Hitung total harga baru berdasarkan harga satuan dan kuantitas baru
                        $newPrice = $itemPrice * $newQuantity;
    
                        // Update kuantitas dan harga di database
                        $cartItem->update([
                            'quantity' => $newQuantity,
                            'total'    => $newPrice, 
                        ]);
                    }
                    // JIKA PRODUK BELUM ADA DI CART USER
                    else{
                        $cartId = Cart::where('user_id', session('id_user'))->value('id');
                        Cart_item::create([
                            'cart_id'    => $cartId,
                            'product_id' => $request->product_id,
                            'quantity'   =>  1,
                            'is_choose'  => TRUE,
                            'price'      => 10000,
                            'total'      => 10000,
                        ]);
                    }

                // JIKA BARU PERTAMA KALI MENAMBAHKAN CART ITEM
                }else{
                    $cart = Cart::create([
                        'user_id' => $userId,
                    ]);
                    
                    $cartId = Cart::where('user_id', session('id_user'))->value('id');

                    Cart_item::create([
                        'cart_id'    => $cart->id,
                        'product_id' => $request->product_id,
                        'quantity'   =>  1,
                        'is_choose'  => TRUE,
                        'price'      => 10000,
                        'total'      => 10000,
                    ]);
                    
                }
                
                return response()->json(['success' => true, 'message' => 'Berhasil Menambahkan Produk ke Keranjang']);
            }
            return response()->json(['success' => false, 'message' => 'Masuk/Daftar Terlebih Dahulu Yaa']);

        } catch (Exception $err) {
            return response()->json(['success' => false, 'message' => $err]);
        }
    }

    public function addToChartWithQuantity(Request $request){
        try {
            $userId = session('id_user');
            
            if (session('id_user')) {
                $checkCartUser = Cart::where('user_id', session('id_user'))->exists();
                $cartId = Cart::where('user_id', session('id_user'))->value('id');

                // JIKA CART SUDAH ADA MAKA TIDAK PERLU CREATE CART
                if($checkCartUser){
                    $checkCartItem = Cart_item::where('cart_id', $cartId)
                    ->where('product_id', $request->product_id)->exists();

                    // JIKA PRODUK SUDAH ADA DI CART USER
                    if ($checkCartItem) {
                        $cartItem  = Cart_item::where('cart_id', $cartId)
                        ->where('product_id', $request->product_id)->first();

                        $itemPrice = $cartItem->price; 
                        $itemQuantity = $cartItem->quantity;
    
                        // Tingkatkan kuantitas item dengan 1
                        $newQuantity = $itemQuantity + $request->quantity;
    
                        // Hitung total harga baru berdasarkan harga satuan dan kuantitas baru
                        $newPrice = $itemPrice * $newQuantity;
    
                        // Update kuantitas dan harga di database
                        $cartItem->update([
                            'quantity' => $newQuantity,
                            'total'    => $newPrice, 
                        ]);
                    }
                    // JIKA PRODUK BELUM ADA DI CART USER
                    else{
                        $cartId = Cart::where('user_id', session('id_user'))->value('id');
                        Cart_item::create([
                            'cart_id'    => $cartId,
                            'product_id' => $request->product_id,
                            'quantity'   => $request->quantity ? $request->quantity : 1,
                            'is_choose'  => TRUE,
                            'price'      => 10000,
                            'total'      => 10000,
                        ]);
                    }

                // JIKA BARU PERTAMA KALI MENAMBAHKAN CART ITEM
                }else{
                    $cart = Cart::create([
                        'user_id' => $userId,
                    ]);
                    
                    $cartId = Cart::where('user_id', session('id_user'))->value('id');

                    Cart_item::create([
                        'cart_id'    => $cart->id,
                        'product_id' => $request->product_id,
                        'quantity'   => $request->quantity ? $request->quantity : 1,
                        'is_choose'  => TRUE,
                        'price'      => 10000,
                        'total'      => 10000,
                    ]);
                    
                }
                
                return response()->json(['success' => true, 'message' => 'Berhasil Menambahkan Produk ke Keranjang']);
            }
            return response()->json(['success' => false, 'message' => 'Masuk/Daftar Terlebih Dahulu Yaa']);

        } catch (Exception $err) {
            return response()->json(['success' => false, 'message' => $err]);
        }
    }

    public function addToWishlist(Request $request){
        try {

            if (session('id_user')) {
                $userId = session('id_user');
    
                Wishlist::create([
                    'user_id'    => $userId,
                    'product_id' => $request->product_id,
                ]);
    
                return response()->json(['success' => true, 'message' => 'Berhasil Menambahkan Produk ke Favoritmu']);
            }
            return response()->json(['success' => false, 'message' => 'Masuk/Daftar Terlebih Dahulu Yaa']);


        } catch (Exception $err) {
            dd($err);
        }
    }

    public function removeFromWishlist(Request $request){
        try {
            if (session('id_user')) {
                $userId = session('id_user');
    
                Wishlist::where('product_id', $request->product_id)
                ->where('user_id', $userId)
                ->delete();
    
                return response()->json(['success' => true, 'message' => 'Berhasil Menghapus Barang Dari Wishlist']);
            }
            return response()->json(['success' => false, 'message' => 'Masuk/Daftar Terlebih Dahulu Yaa']);
        
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateProfile(Request $request){
        try {
            $user = User::find(session('id_user'));
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User Tidak Ditemukan']);
            }
            else {
                $user->update($request->all());
                session()->put([
                    'username' => $request->fullname,
                ]);
            }

            session()->flash('after_update_profile');
            return redirect()->back();

        } catch (Exception $err) {
            dd($err);
        }
    }

    public function updateShippingAddress(Request $request)
    {
        $address = Shipping_address::find($request->input('address-id'));
        
        if (!$address) {
            return response()->json(['success' => false, 'message' => 'Address not found.']);
        }
        else {
            $address->update($request->all());
        }

        session()->flash('after_update_address');

        return redirect()->back();
    }

    public function deleteShippingAddress(Request $request){
        try {
            $address = Shipping_address::where('id', $request->input('address_id'))->delete();
            // session()->flash('after_delete_address');
            return response()->json(['success' => true, 'message' => 'Berhasil Menghapus Alamat Pengiriman']);

        } catch (Exception $err) {
            dd($err);
        }
    }

    public function setMainAddress(Request $request){
        try {
            DB::beginTransaction();

            // Ambil alamat utama saat ini (jika ada)
            $currentMainAddress = Shipping_address::where('user_id', session('id_user'))
                ->where('is_main', true)
                ->first();

            // Jika ada alamat utama saat ini, set is_main menjadi FALSE
            if ($currentMainAddress) {
                $currentMainAddress->update([
                    'is_main'    => false,
                    'updated_at' => now(),
                ]);
            }

            // Set alamat baru sebagai alamat utama
            $newMainAddress = Shipping_address::where('id', $request->address_id)
                ->where('user_id', session('id_user'))  // Pastikan alamat ini milik user yang sedang login
                ->firstOrFail();

            $newMainAddress->update([
                'is_main'    => true,
                'updated_at' => now(),
            ]);

            $checkIsUser = Shipping_address::where('user_id', session('id_user'))
            ->get();

            // Ambil semua alamat pengguna berdasarkan user_id dari session
            $checkIsUser = Shipping_address::where('user_id', session('id_user'))->get();

            // Cek apakah ada alamat dengan is_use == TRUE
            $hasIsUseTrue = $checkIsUser->contains('is_use', true);

            if (!$hasIsUseTrue) {
                // Jika tidak ada alamat dengan is_use == TRUE, cari yang is_main == TRUE
                $mainAddress = Shipping_address::where('user_id', session('id_user'))
                    ->where('is_main', true)
                    ->first();

                if ($mainAddress) {
                    // Set alamat utama sebagai alamat yang digunakan (is_use == TRUE)
                    $mainAddress->update(['is_use' => true]);
                }
            }



            // Commit transaction jika semua update berhasil
            DB::commit();

        return response()->json(['success' => true, 'message' => 'Berhasil Mengubah Alamat Pengiriman']);
        } catch (Exception $err) {
            dd($err);
        }
    }

    public function useAddress(Request $request){
        try {
            // Ambil alamat utama saat ini (jika ada)
            $currentUseAddress = Shipping_address::where('user_id', session('id_user'))
                ->where('is_use', true)
                ->first();

            // Jika ada alamat utama saat ini, set is_main menjadi FALSE
            if ($currentUseAddress) {
                $currentUseAddress->update([
                    'is_use'    => false,
                    'updated_at' => now(),
                ]);
            }

            // Set alamat baru sebagai alamat utama
            $newUseAddress = Shipping_address::where('id', $request->address_id)
                ->where('user_id', session('id_user'))  // Pastikan alamat ini milik user yang sedang login
                ->firstOrFail();

            $newUseAddress->update([
                'is_use'    => true,
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil Mengubah Alamat Pengiriman']);
        } catch (Exception $err) {
            dd($err);
        }
    }

    public function addProductBuyNow(Request $request)
    {
        try {
            $userId = session('id_user');
            
            if ($userId) {
                $checkBuyNow = Buynow::where('user_id', $userId)->exists();

                // Periksa apakah user sudah memiliki data di tabel Buynow
                if ($checkBuyNow) {
                    $buynow = Buynow::where('user_id', $userId)->first();
                    $buynow->update([
                        'user_id'    => $userId,
                        'product_id' => $request->product_id,
                        'quantity'   => $request->quantity,
                        'price'      => 23000, // Kamu bisa mengganti harga ini secara dinamis
                        'total'      => $request->quantity * 23000,
                        'is_buy'     => 0,    
                    ]);
                } else {
                    Buynow::create([
                        'user_id'    => $userId,
                        'product_id' => $request->product_id,
                        'quantity'   => $request->quantity,
                        'price'      => 10000, // Harga default, bisa diganti dinamis
                        'total'      => $request->quantity * 10000,
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
                ->get();

                $address = Shipping_address::where('user_id', session('id_user'))
                ->orderBy('is_main', 'DESC')
                ->get();

                $totalProduct = $product->sum('quantity');
                // Hitung total harga
                $totalPrice = $product->sum('total');


                $data = [
                    'product'       => $product,
                    'address'       => $address,
                    'totalProduct'  => $totalProduct,
                    'totalPrice'    => $totalPrice,
                ];
                
                // dd($data);
                // dd($cartItem);

                // dd($address);
                return view('user.component.buynow')->with('data', $data);
            }
            else {
                return redirect()->back();
            }

        } catch (Exception $err) {
            error(404);
        }
    }

    // SUBSCRIBE
    public function subscribe(Request $request){
        try {
            Subscribe::create([
                'email'      => $request->email,
                'created_at' => now(),
            ]);

            return response()->json(['success' => true, 'message' => 'Selamat Anda Berhasil Berlangganan']);
        } catch (Exception $err) {
            dd($err);
        }
    }
    
    // TAB MY PROFILE
    public function getActiveTab()
    {
        // Ambil tab aktif dari sesi
        $activeTab = session('activeTab');
        return response()->json(['activeTab' => $activeTab]);
    }

    public function setActiveTab(Request $request)
    {
        // Simpan tab aktif ke sesi
        $request->validate([
            'tab_id' => 'required|string',
        ]);

        session(['activeTab' => $request->input('tab_id')]);
        return response()->json(['success' => true]);
    }

}
