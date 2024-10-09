<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PromoController extends Controller
{
    public function indexPromo()
    {
        $promo = Promo::all();
        $products = Product::all();
        $brands = Brand::all();
        return view('admin.promo.index', [
            'promo' => $promo,
            'products' => $products,
            'brands' => $brands,

        ]);
    }

    public function createPromo()
    {
        // Ambil data produk dari database
        $products = Product::all(); // Pastikan kamu menggunakan model Product
        return view('admin.promo.create', compact('products'));
    }

    public function storePromo(Request $request)
    {
        try {

            $request->validate([
                'promo_name' => 'required|string|max:255',
                'start_date' => 'required',
                'end_date' => 'required',
                'diskon' => 'required|numeric|min:0|max:100',
                'product_ids' => 'required|array',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Simpan single image
            $image = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/promo'), $imageName);
                $imagePath = 'uploads/promo/' . $imageName;
            }

            // Simpan data promo
            $promo = Promo::create([
                'promo_name' => $request->promo_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'diskon' => $request->diskon,
                'image' => $imagePath ?? null,
                'type' => $request->type, // Isi field 'type' dari input tersembunyi
            ]);

            // Simpan produk yang dipilih ke pivot table
            $promo->products()->attach($request->product_ids);

            // Redirect dengan pesan sukses
            return redirect()->route('index-promo')->with('success', 'Promo created successfully!');
        } catch (\Exception $e) {
            // Tangani error
            Log::error($e->getMessage()); // Tulis log
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    // PROMO VOUCHER
    public function indexPromoVoucher()
    {
        $promo = Promo::all();
        $products = Product::all();
        $brands = Brand::all();
        return view('admin.promo.voucher.index', [
            'promo' => $promo,
            'products' => $products,
            'brands' => $brands,

        ]);
    }

    public function createPromoVoucher()
    {
        return view('admin.promo.voucher.create');
    }

    public function storePromoVoucher(Request $request)
    {
        try {

            $request->validate([
                'promo_name' => 'required|string|max:255',
                'start_date' => 'required',
                'end_date' => 'required',
                'min_transaction' => 'required',
                'max_transaction' => 'required',
                'promo_code' => 'required',
                'description' => 'required',
                'terms_conditions' => 'required',
                'diskon' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                // 'product_ids' => 'required|array',
            ]);

            // Simpan single image
            $image = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/promo'), $imageName);
                $imagePath = 'uploads/promo/' . $imageName;
            }

            // Simpan data promo
            Promo::create([
                'promo_name' => $request->promo_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'min_transaction' => $request->min_transaction,
                'max_transaction' => $request->max_transaction,
                'promo_code' => $request->promo_code,
                'description' => $request->description,
                'terms_conditions' => $request->terms_conditions,
                'diskon' => $request->diskon,
                'image' => $imagePath ?? null,
                'type' => $request->type, // Isi field 'type' dari input tersembunyi
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('index-promo')->with('success', 'Promo Voucher created successfully!');
        } catch (\Exception $e) {
            // Tangani error
            Log::error($e->getMessage()); // Tulis log
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    // PROMO ONGKIR
    public function indexPromoOngkir()
    {
        $promo = Promo::all();
        $products = Product::all();
        $brands = Brand::all();
        return view('admin.promo.ongkir.index', [
            'promo' => $promo,
            'products' => $products,
            'brands' => $brands,

        ]);
    }

    public function createPromoOngkir()
    {
        return view('admin.promo.ongkir.create');
    }

    public function storePromoOngkir(Request $request)
    {
        try {

            $request->validate([
                'promo_name' => 'required|string|max:255',
                'start_date' => 'required',
                'end_date' => 'required',
                'min_transaction' => 'required',
                'promo_code' => 'required',
                'description' => 'required',
                'terms_conditions' => 'required',
                'diskon' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Simpan single image
            $image = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/promo'), $imageName);
                $imagePath = 'uploads/promo/' . $imageName;
            }

            // Simpan data promo
            Promo::create([
                'promo_name' => $request->promo_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'min_transaction' => $request->min_transaction,
                'promo_code' => $request->promo_code,
                'description' => $request->description,
                'terms_conditions' => $request->terms_conditions,
                'diskon' => $request->diskon,
                'image' => $imagePath ?? null,
                'type' => $request->type, // Isi field 'type' dari input tersembunyi
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('index-promo')->with('success', 'Promo Voucher created successfully!');
        } catch (\Exception $e) {
            // Tangani error
            Log::error($e->getMessage()); // Tulis log
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    public function detailPromo($id)
    {
        $promo = promo::find($id);

        if (!$promo) {
            return redirect()->route('index-promo')->with('error', 'Promo not found');
        }

        return view('admin.promo.review', [
            'promo' => $promo,
        ]);
    }


    public function deletePromo($id)
    {
        $promo = Promo::find($id);

        if (!$promo) {
            return response()->json([
                'success' => false,
                'message' => 'Promo not found.'
            ]);
        }

        // Hapus gambar utama dari folder
        if (!empty($promo->image) && file_exists(public_path($promo->image))) {
            unlink(public_path($promo->image));
        }

        // Hapus produk dari database
        $promo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Promo deleted successfully.'
        ]);
    }

    // PROMO DISKON
    public function indexPromoDiskon()
    {
        $promo = Promo::all();
        $products = Product::all();
        $brands = Brand::all();
        return view('admin.promo.diskon.index', [
            'promo' => $promo,
            'products' => $products,
            'brands' => $brands,

        ]);
    }

    public function createPromoDiskon()
    {
        $products = Product::all(); // Pastikan kamu menggunakan model Product
        return view('admin.promo.diskon.create', compact('products'));
    }


    public function storePromoDiskon(Request $request)
    {
        try {

            $request->validate([
                'promo_name' => 'required|string|max:255',
                'start_date' => 'required',
                'end_date' => 'required',
                'diskon' => 'required|numeric|min:0|max:100',
                'product_ids' => 'required|array',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Simpan single image
            $image = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/promo'), $imageName);
                $imagePath = 'uploads/promo/' . $imageName;
            }

            // Simpan data promo
            $promo = Promo::create([
                'promo_name' => $request->promo_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'diskon' => $request->diskon,
                'image' => $imagePath ?? null,
                'type' => $request->type, // Isi field 'type' dari input tersembunyi
            ]);

            // Simpan produk yang dipilih ke pivot table
            $promo->products()->attach($request->product_ids);

            // Redirect dengan pesan sukses
            return redirect()->route('index-promo-diskon')->with('success', 'Promo Diskon created successfully!');
        } catch (\Exception $e) {
            // Tangani error
            Log::error($e->getMessage()); // Tulis log
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

}
