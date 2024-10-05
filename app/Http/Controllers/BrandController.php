<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    // BRAND
    public function indexBrand(Request $request)
    {
        // Mengambil brand beserta jumlah produk yang terkait
        $brands = Brand::withCount('products')
            ->orderBy('created_at', 'desc')
            ->paginate(100);

        return view('admin.brand.index', [
            'brands' => $brands,
        ]);
    }


    public function searchBrands(Request $request)
    {
        $query = $request->get('search');
        $brands = Brand::where('name', 'like', "%{$query}%")->paginate(10);

        return response()->json([
            'brands' => $brands->items(), // Hanya ambil item dari paginasi
            'pagination' => (string) $brands->links()->render()
        ]);
    }

    public function createBrand()
    {
        return view('admin.brand.create');
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate unique brand code based on the brand name
        $brandCode = $this->generateBrandCode($request->name);

        // if ($request->hasFile('brand_logo')) {
        //     $image = $request->file('brand_logo');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads/brand_logos'), $imageName);
        //     $imagePath = 'uploads/brand_logos/' . $imageName;
        // }

        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Simpan file ke storage/app/public/brand_logos
            $imagePath = $image->storeAs('brand_logos', $imageName, 'public');

            // Simpan informasi file di database (opsional)
            // Brand::create([...]);
        }


        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'brand_logo' => $imagePath,
            'brand_code' => $brandCode, // Menyimpan kode merek

        ]);

        // return redirect()->route('index-brand-admin')->with('success', 'Brand created successfully.');
        return redirect()->route('index-brand-admin')->with('success', 'Brand created successfully!');
    }


    private function generateBrandCode($brandName)
    {
        // Ambil tiga huruf pertama dari nama merek dan ubah menjadi huruf kapital
        $prefix = strtoupper(substr($brandName, 0, 3));

        // Jika nama brand kurang dari 3 karakter, tambahkan huruf 'X' sebagai pengisi
        $prefix = str_pad($prefix, 3, 'X');

        // Generate tiga digit angka acak
        $randomNumbers = rand(100, 999);

        // Gabungkan tiga huruf dari nama brand dan tiga digit angka acak
        $brandCode = $prefix . $randomNumbers;

        // Pastikan kode tersebut unik dalam database
        while (Brand::where('brand_code', $brandCode)->exists()) {
            $randomNumbers = rand(100, 999);  // Generate ulang angka acak jika kode tidak unik
            $brandCode = $prefix . $randomNumbers;
        }

        return $brandCode;
    }


    public function detailBrand($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->route('index-brand-admin')->with('error', 'Brand not found');
        }

        return view('admin.brand.detail', compact('brand'));
    }


    public function updateBrandAdmin(Request $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('error', 'Brand not found');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $brand->name = $validatedData['name'];
        $brand->description = $validatedData['description'];

        if ($request->hasFile('brand_logo')) {
            // Remove old image if exists
            if ($brand->brand_logo && file_exists(public_path($brand->brand_logo))) {
                unlink(public_path($brand->brand_logo));
            }

            $image = $request->file('brand_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand_logos'), $imageName);
            $brand->brand_logo = 'uploads/brand_logos/' . $imageName;
        }

        $brand->save();

        return redirect()->route('index-brand-admin')->with('success', 'Brand updated successfully');
    }


    public function deleteBrand($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json([
                'success' => false,
                'message' => 'Brand not found.'
            ]);
        }

        // Hapus gambar utama dari folder
        if (!empty($brand->brand_logo) && file_exists(public_path($brand->brand_logo))) {
            unlink(public_path($brand->brand_logo));
        }

        // Hapus produk dari database
        $brand->delete();

        return response()->json([
            'success' => true,
            'message' => 'Brand deleted successfully.'
        ]);
    }
}
