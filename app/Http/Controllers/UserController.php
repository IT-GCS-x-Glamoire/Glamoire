<?php

namespace App\Http\Controllers;

use App\Models\Shipping_address;
use App\Models\User;
use App\Models\Subscribe;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Whislist;

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
                'whislist', 
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

                // JIKA CART SUDAH ADA MAKA TIDAK PERLU CREATE CART
                if($checkCartUser){
                    $checkCartItem = Cart_item::where('product_id', $request->product_id)->exists();
    
                    if ($checkCartItem) {
                        
                        $cartItem  = Cart_item::where('product_id', $request->product_id)->first();
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
                    else{
                        $cartId = Cart::where('user_id', session('id_user'))->value('id');
                        Cart_item::create([
                            'cart_id'    => $cartId,
                            'product_id' => $request->product_id,
                            'quantity'   => 1,
                            'price'      => 10000,
                            'total'      => 10000,
                        ]);
                    }

                // JIKA BARU PERTAMA KALI MENAMBAHKAN CART ITEM
                }else{
                    $cart = Cart::create([
                        'user_id' => $userId,
                    ]);
                    
                    $checkCartItem = Cart_item::where('product_id', $request->product_id)->exists();
    
                    if ($checkCartItem) {
                        
                        $cartItem  = Cart_item::where('product_id', $request->product_id)->first();
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
                    else {
                        Cart_item::create([
                            'cart_id'    => $cart->id,
                            'product_id' => $request->product_id,
                            'quantity'   => 1,
                            'price'      => 10000,
                            'total'      => 10000,
                        ]);
                    }
                }
                
                return response()->json(['success' => true, 'message' => 'Berhasil Menambahkan Produk ke Keranjang']);
            }
            return response()->json(['success' => false, 'message' => 'Masuk/Daftar Terlebih Dahulu Yaa']);


        } catch (Exception $err) {
            dd($err);
        }
    }

    public function addToWhislist(Request $request){
        try {

            if (session('id_user')) {
                $userId = session('id_user');
    
                Whislist::create([
                    'user_id'    => $userId,
                    'product_id' => $request->product_id,
                ]);
    
                return response()->json(['success' => true, 'message' => 'Berhasil Menambahkan Produk ke Whislistmu']);
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
    
                Whislist::where('product_id', $request->product_id)->delete();
    
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

            // Commit transaction jika semua update berhasil
            DB::commit();

        return response()->json(['success' => true, 'message' => 'Berhasil Mengubah Alamat Pengiriman']);
        } catch (Exception $err) {
            dd($err);
        }
    }

    public function useAddress(Request $request){
        try {
            DB::beginTransaction();

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

            // Commit transaction jika semua update berhasil
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Berhasil Mengubah Alamat Pengiriman']);
        } catch (Exception $err) {
            dd($err);
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

    // GET TOTAL CHART
    public function getTotalCart(){
        try {
            if (session('id_user')) {
                $userId = session('id_user');
    
                // Ambil cart berdasarkan user_id dan hitung item yang terkait
                $cart = Cart::where('user_id', $userId)
                    ->withCount('cartItems')
                    ->first();
                
                // Jika cart ditemukan, return jumlah item
                return response()->json($cart ? $cart->cart_items_count : 0);
            }
            return response()->json("-");
        } catch (\Throwable $th) {
            // Log error jika diperlukan
            return response()->json(0);
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
