<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductVariations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    // START PRODUCT
    public function indexProductAdmin()
    {
        // Mengurutkan produk berdasarkan tanggal pembuatan terbaru (descending)
        $products = Product::with(['categoryProduct', 'brand'])
            ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan kolom 'created_at'
            ->paginate(100); // Eager load kategori dan brand
        return view('admin.product.index', [
            'products' => $products,
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

    // default code
    // public function storeProductAdmin(Request $request)
    // {
    //     try {

    //         $request->validate([
    //             'product_name' => 'required',
    //             'stock_quantity' => 'required',
    //             'regular_price' => 'required',
    //             'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'images' => 'nullable|array|max:6',
    //             'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'video' => 'nullable|mimes:mp4,avi,mov|max:5048',
    //         ]);

    //         // Hapus format rupiah dari regular_price
    //         $regularPrice = str_replace(['Rp. ', '.'], '', $request->regular_price);

    //         // Simpan single image
    //         $mainImagePath = null;
    //         if ($request->hasFile('main_image')) {
    //             $mainImage = $request->file('main_image');
    //             $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
    //             $mainImage->move(public_path('uploads/product_images'), $mainImageName);
    //             $mainImagePath = 'uploads/product_images/' . $mainImageName;
    //         }

    //         // Multiple Image
    //         $imagePaths = [];
    //         if ($request->hasFile('images')) {
    //             foreach ($request->file('images') as $image) {
    //                 $imageName = time() . '_' . $image->getClientOriginalName();
    //                 $image->move(public_path('uploads/product_images'), $imageName);
    //                 $imagePaths[] = 'uploads/product_images/' . $imageName;
    //             }
    //         }

    //         // Simpan video
    //         $videoPath = null;
    //         if ($request->hasFile('video')) {
    //             $video = $request->file('video');
    //             $videoName = time() . '_' . $video->getClientOriginalName();
    //             $video->move(public_path('uploads/product_videos'), $videoName);
    //             $videoPath = 'uploads/product_videos/' . $videoName;
    //         }

    //         // Ambil brand dari database berdasarkan brand_id
    //         $brand = Brand::find($request->brand_id);

    //         // Pastikan brand ditemukan
    //         if (!$brand) {
    //             return redirect()->back()->with('error', 'Brand not found.');
    //         }

    //         // Ambil brand_code dari brand yang dipilih
    //         $brandCode = strtoupper($brand->brand_code);

    //         // Generate 4 digit angka acak
    //         $randomDigits = mt_rand(1000, 9999); // Akan menghasilkan angka antara 1000 dan 9999

    //         // Gabungkan brandCode dengan randomDigits untuk product_code
    //         $productCode = $brandCode . $randomDigits;

    //         // Pastikan product_code unik
    //         while (Product::where('product_code', $productCode)->exists()) {
    //             $randomDigits = mt_rand(1000, 9999);
    //             $productCode = $brandCode . $randomDigits;
    //         }

    //         // Simpan produk ke database
    //         Product::create([
    //             'product_name' => $request->product_name,
    //             'product_code' => $productCode, // Simpan product_code yang di-generate
    //             'category_product_id' => $request->category_product_id,
    //             'brand_id' => $request->brand_id,
    //             'description' => $request->description,
    //             'stock_quantity' => $request->stock_quantity,
    //             'regular_price' => $regularPrice,
    //             'weight_product' => $request->weight_product,
    //             'main_image' => $mainImagePath,
    //             'images' => json_encode($imagePaths),
    //             'video' => $videoPath,
    //             'unit' => $request->unit, // Simpan satuan
    //             'color' => $request->color, // Simpan warna
    //             'color_text' => $request->color_text, // Simpan warna
    //         ]);

    //         return redirect()->route('index-product-admin')->with('success', 'Product created successfully!');
    //     } catch (\Exception $e) {
    //         Log::error('Error creating product', ['exception' => $e->getMessage()]);
    //         return redirect()->route('index-product-admin')->with('error', 'An error occurred while creating the product: ' . $e->getMessage());
    //     }
    // }

    // bisa generate code otoamtis urut
    // public function storeProductAdmin(Request $request)
    // {
    //     try {

    //         $request->validate([
    //             'product_name' => 'required',
    //             'stock_quantity' => 'required',
    //             'regular_price' => 'required',
    //             'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'images' => 'nullable|array|max:6',
    //             'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'video' => 'nullable|mimes:mp4,avi,mov|max:5048',
    //         ]);

    //         // Hapus format rupiah dari regular_price
    //         $regularPrice = str_replace(['Rp. ', '.'], '', $request->regular_price);

    //         // Simpan single image
    //         $mainImagePath = null;
    //         if ($request->hasFile('main_image')) {
    //             $mainImage = $request->file('main_image');
    //             $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
    //             $mainImage->move(public_path('uploads/product_images'), $mainImageName);
    //             $mainImagePath = 'uploads/product_images/' . $mainImageName;
    //         }

    //         // Multiple Image
    //         $imagePaths = [];
    //         if ($request->hasFile('images')) {
    //             foreach ($request->file('images') as $image) {
    //                 $imageName = time() . '_' . $image->getClientOriginalName();
    //                 $image->move(public_path('uploads/product_images'), $imageName);
    //                 $imagePaths[] = 'uploads/product_images/' . $imageName;
    //             }
    //         }

    //         // Simpan video
    //         $videoPath = null;
    //         if ($request->hasFile('video')) {
    //             $video = $request->file('video');
    //             $videoName = time() . '_' . $video->getClientOriginalName();
    //             $video->move(public_path('uploads/product_videos'), $videoName);
    //             $videoPath = 'uploads/product_videos/' . $videoName;
    //         }

    //         // Ambil brand dari database berdasarkan brand_id
    //         $brand = Brand::find($request->brand_id);

    //         // Pastikan brand ditemukan
    //         if (!$brand) {
    //             return redirect()->back()->with('error', 'Brand not found.');
    //         }

    //         // Ambil brand_code dari brand yang dipilih
    //         $brandCode = strtoupper($brand->brand_code);

    //         // Cari produk terakhir berdasarkan brand yang dipilih
    //         $lastProduct = Product::where('brand_id', $request->brand_id)
    //             ->orderBy('product_code', 'desc')
    //             ->first();

    //         // Tentukan urutan produk berdasarkan produk terakhir
    //         $nextNumber = 1; // Jika tidak ada produk sebelumnya
    //         if ($lastProduct) {
    //             // Ambil angka terakhir dari product_code
    //             $lastCodeNumber = (int) substr($lastProduct->product_code, strlen($brandCode));
    //             $nextNumber = $lastCodeNumber + 1;
    //         }

    //         // Format kode produk dengan 4 digit angka
    //         $productCode = $brandCode . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    //         // Simpan produk ke database
    //         Product::create([
    //             'product_name' => $request->product_name,
    //             'product_code' => $productCode, // Simpan product_code yang di-generate
    //             'category_product_id' => $request->category_product_id,
    //             'brand_id' => $request->brand_id,
    //             'description' => $request->description,
    //             'stock_quantity' => $request->stock_quantity,
    //             'regular_price' => $regularPrice,
    //             'weight_product' => $request->weight_product,
    //             'main_image' => $mainImagePath,
    //             'images' => json_encode($imagePaths),
    //             'video' => $videoPath,
    //             'unit' => $request->unit, // Simpan satuan
    //             'color' => $request->color, // Simpan warna
    //             'color_text' => $request->color_text, // Simpan warna teks
    //         ]);

    //         return redirect()->route('index-product-admin')->with('success', 'Product created successfully!');
    //     } catch (\Exception $e) {
    //         Log::error('Error creating product', ['exception' => $e->getMessage()]);
    //         return redirect()->route('index-product-admin')->with('error', 'An error occurred while creating the product: ' . $e->getMessage());
    //     }
    // }

    // test
    public function storeProductAdmin(Request $request)
    {
        try {
            $request->validate([
                'product_name' => 'required',
                'stock_quantity' => 'required',
                'regular_price' => 'required',
                'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'images' => 'nullable|array|max:6',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'video' => 'nullable|mimes:mp4,avi,mov|max:5048',
            ]);

            // Hapus format rupiah dari regular_price
            $regularPrice = str_replace(['Rp. ', '.'], '', $request->regular_price);

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

            // Simpan video
            $videoPath = null;
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $videoName = time() . '_' . $video->getClientOriginalName();
                $video->move(public_path('uploads/product_videos'), $videoName);
                $videoPath = 'uploads/product_videos/' . $videoName;
            }

            // Ambil brand dari database berdasarkan brand_id
            $brand = Brand::find($request->brand_id);

            // Pastikan brand ditemukan
            if (!$brand) {
                return redirect()->back()->with('error', 'Brand not found.');
            }

            // Ambil brand_code dari brand yang dipilih
            $brandCode = strtoupper($brand->brand_code);

            // Cari produk terakhir dengan brand yang sama
            $lastProduct = Product::where('brand_id', $request->brand_id)
                ->orderBy('id', 'desc')
                ->first();

            // Jika ada produk terakhir, ambil nomor urut dari product_code-nya
            if ($lastProduct) {
                $lastCodeNumber = (int)substr($lastProduct->product_code, strlen($brandCode));
                $newCodeNumber = $lastCodeNumber + 1;
            } else {
                // Jika belum ada produk dengan brand tersebut, mulai dari 1
                $newCodeNumber = 1;
            }

            // Buat product_code dengan format urut
            $productCode = $brandCode . str_pad($newCodeNumber, 4, '0', STR_PAD_LEFT);

            // Simpan produk ke database
            Product::create([
                'product_name' => $request->product_name,
                'product_code' => $productCode, // Simpan product_code yang di-generate
                'category_product_id' => $request->category_product_id,
                'brand_id' => $request->brand_id,
                'description' => $request->description,
                'stock_quantity' => $request->stock_quantity,
                'regular_price' => $regularPrice,
                'weight_product' => $request->weight_product,
                'main_image' => $mainImagePath,
                'images' => json_encode($imagePaths),
                'video' => $videoPath,
                'unit' => $request->unit, // Simpan satuan
                'color' => $request->color, // Simpan warna
                'color_text' => $request->color_text, // Simpan warna
            ]);

            return redirect()->route('index-product-admin')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating product', ['exception' => $e->getMessage()]);
            return redirect()->route('index-product-admin')->with('error', 'An error occurred while creating the product: ' . $e->getMessage());
        }
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


    public function editProductAdmin($id)
    {
        $categories = CategoryProduct::all();
        $brands = Brand::all();
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('index-product-admin')->with('error', 'Product not found');
        }

        // Decode JSON images to array
        $product->images = json_decode($product->images, true);

        return view('admin.product.edit', [
            'categories' => $categories,
            'brands' => $brands,
            'product' => $product
        ]);
    }


    public function updateProductAdmin(Request $request, $id)
    {
        try {
            // Temukan produk berdasarkan ID
            $product = Product::find($id);

            if (!$product) {
                return redirect()->route('admin.product.index')->with('error', 'Product not found');
            }

            // Validasi data yang dikirim
            $validatedData = $request->validate([
                'product_name' => 'required|string|max:255',
                'category_product_id' => 'required',
                'brand_id' => 'required',
                'stock_quantity' => 'required',
                'regular_price' => 'required',
                'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'video' => 'nullable|mimes:mp4,avi,mov|max:5048',

            ]);

            // Hapus format rupiah dari regular_price
            $regularPrice = str_replace(['Rp. ', '.'], '', $validatedData['regular_price']);

            // Update data produk
            $product->product_name = $validatedData['product_name'];
            // $product->product_code = $validatedData['product_code'];
            $product->category_product_id = $validatedData['category_product_id'];
            $product->brand_id = $validatedData['brand_id'];
            $product->stock_quantity = $validatedData['stock_quantity'];
            $product->regular_price = $regularPrice; // Simpan harga dalam format angka

            // Handle Main Image Upload (Single Image)
            if ($request->hasFile('main_image')) {
                // Hapus gambar lama jika ada
                if (!empty($product->main_image) && file_exists(public_path($product->main_image))) {
                    unlink(public_path($product->main_image));
                }

                // Simpan gambar baru
                $mainImage = $request->file('main_image');
                $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
                $mainImage->move(public_path('uploads/product_images'), $mainImageName);
                $product->main_image = 'uploads/product_images/' . $mainImageName;
            }

            // Handle Product Gallery Upload (Multiple Images)
            if ($request->hasFile('images')) {
                // Hapus gambar lama jika ada
                if (!empty($product->images)) {
                    $existingImages = json_decode($product->images, true);

                    // Hapus gambar lama
                    foreach ($existingImages as $existingImage) {
                        if (file_exists(public_path($existingImage))) {
                            unlink(public_path($existingImage));
                        }
                    }
                }

                // Simpan gambar baru
                $newImages = [];
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('uploads/product_images'), $imageName);
                    $newImages[] = 'uploads/product_images/' . $imageName;
                }

                $product->images = json_encode($newImages);
            }

            // Handle Video Upload
            if ($request->hasFile('video')) {
                // Hapus video lama jika ada
                if (!empty($product->video) && file_exists(public_path($product->video))) {
                    unlink(public_path($product->video));
                }

                // Simpan video baru
                $video = $request->file('video');
                $videoName = time() . '_' . $video->getClientOriginalName();
                $video->move(public_path('uploads/product_videos'), $videoName);
                $product->video = 'uploads/product_videos/' . $videoName;
            }

            $product->save();

            return redirect()->route('index-product-admin')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating product', ['exception' => $e->getMessage()]);
            return redirect()->route('index-product-admin')->with('error', 'An error occurred while updating the product: ' . $e->getMessage());
        }
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

        // Hapus video dari folder (jika ada)
        if (!empty($product->video) && file_exists(public_path($product->video))) {
            unlink(public_path($product->video));
        }

        // Hapus produk dari database
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ]);
    }
    // END PRODUCT


    // START PRODUCT VARIANT
    public function indexProductVariantAdmin()
    {
        // Mengurutkan produk berdasarkan tanggal pembuatan terbaru (descending)
        $variations = ProductVariations::with('product') // Eager load produk terkait
            ->orderBy('created_at', 'desc')
            ->paginate(100);

        return view('admin.product.variant.index', [
            'variations' => $variations,
        ]);
    }

    public function createProductVariantAdmin()
    {
        $products = Product::all();
        $categories = CategoryProduct::all(); // Mengambil semua data kategori produk
        $brands = Brand::all(); // Mengambil semua data brand

        return view('admin.product.variant.create', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
        ]);
    }


    public function storeProductVariantAdmin(Request $request)
    {
        try {
            // Validasi input varian produk
            $request->validate([
                'product_id' => 'required|exists:products,id', // Pastikan product_id ada di tabel products
                'color' => 'required|string',
                'size' => 'nullable|string',
                'stock_quantity' => 'required|integer',
                'price' => 'required|integer',
                'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'images' => 'nullable|array|max:6',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'video' => 'nullable|mimes:mp4,avi,mov|max:20480',
            ]);

            // Temukan produk utama berdasarkan ID
            $productId = $request->input('product_id');
            $product = Product::findOrFail($productId);

            // Generate kode varian produk dengan dua digit angka di belakang
            $variantCode = $product->product_code . '-' . str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);

            // Simpan single image
            $mainImagePath = null;
            if ($request->hasFile('main_image')) {
                $mainImage = $request->file('main_image');
                $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
                $mainImage->move(public_path('uploads/product_variant_images'), $mainImageName);
                $mainImagePath = 'uploads/product_variant_images/' . $mainImageName;
            }

            // Multiple Image
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('uploads/product_variant_images'), $imageName);
                    $imagePaths[] = 'uploads/product_variant_images/' . $imageName;
                }
            }

            // Simpan video
            $videoPath = null;
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $videoName = time() . '_' . $video->getClientOriginalName();
                $video->move(public_path('uploads/product_variant_videos'), $videoName);
                $videoPath = 'uploads/product_variant_videos/' . $videoName;
            }

            // Simpan varian produk ke database
            ProductVariations::create([
                'product_id' => $product->id,
                'product_code' => $variantCode, // Kode varian produk
                'color' => $request->color,
                'size' => $request->size,
                'stock_quantity' => $request->stock_quantity,
                'price' => str_replace(['Rp. ', '.'], '', $request->price), // Hapus format rupiah dari harga
                'main_image' => $mainImagePath,
                'images' => json_encode($imagePaths),
                'video' => $videoPath,
            ]);

            return redirect()->route('index-product-variant-admin', ['productId' => $productId])->with('success', 'Product variant created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating product variant', ['exception' => $e->getMessage()]);
            return redirect()->route('index-product-variant-admin', ['productId' => $productId])->with('error', 'An error occurred while creating the product variant: ' . $e->getMessage());
        }
    }
}
