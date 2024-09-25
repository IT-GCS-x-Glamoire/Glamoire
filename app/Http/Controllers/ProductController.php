<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexProductAdmin()
    {
        $products = Product::with(['categoryProduct', 'brand'])->paginate(9); // Eager load kategori dan brand
        return view('admin.product.index', [
            'products' => $products,
        ]);
    }

    public function searchProducts(Request $request)
    {
        $query = $request->get('search');
        $products = Product::where('product_name', 'like', "%{$query}%")
            ->with(['categoryProduct', 'brand'])
            ->paginate(10); // Anda bisa menyesuaikan jumlah halaman jika perlu

        return response()->json([
            'products' => $products->items(),
            'pagination' => (string) $products->links()->render()
        ]);
    }


    public function createProductAdmin()
    {
        $categories = CategoryProduct::all(); // Mengambil semua data kategori produk
        $brands = Brand::all(); // Mengambil semua data brand

        return view('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function storeProductAdmin(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'stock_quantity' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk single image
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan single image
        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('uploads/product_images'), $mainImageName);
            $mainImagePath = 'uploads/product_images/' . $mainImageName;
        }

        // Multiple Image
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/product_images'), $imageName);
                $imagePaths[] = 'uploads/product_images/' . $imageName;
            }
        }

        Product::create([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'category_product_id' => $request->category_product_id,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
            'stock_quantity' => $request->stock_quantity,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'main_image' => $mainImagePath, // Simpan path dari single image
            'images' => json_encode($imagePaths), // Store paths as JSON
        ]);

        return redirect()->route('index-product-admin')->with('success', 'Product created successfully!');
    }


    public function detailProductAdmin($id)
    {
        $categories = CategoryProduct::all();
        $brands = Brand::all();
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('index-product-admin')->with('error', 'Product not found');
        }

        // Decode JSON images to array
        $product->images = json_decode($product->images, true);

        return view('admin.product.detail', [
            'categories' => $categories,
            'brands' => $brands,
            'product' => $product
        ]);
    }

    public function deleteProductAdmin($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ]);
        }

        // Hapus gambar utama dari folder
        if (!empty($product->main_image) && file_exists(public_path($product->main_image))) {
            unlink(public_path($product->main_image));
        }

        // Hapus multiple images (jika ada)
        if (!empty($product->images)) {
            $images = json_decode($product->images, true);
            foreach ($images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        // Hapus produk dari database
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ]);
    }
}
