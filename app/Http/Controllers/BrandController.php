<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // BRAND
    public function indexBrand(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page', 1);

        $brands = Brand::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })->paginate(9, ['*'], 'page', $page);

        return view('admin.brand.index', compact('brands', 'search'));
    }




    // public function searchBrands(Request $request)
    // {
    //     $search = $request->input('search');
    //     $page = $request->input('page', 1);

    //     $brands = Brand::when($search, function ($query, $search) {
    //         return $query->where('name', 'like', "%{$search}%")
    //             ->orWhere('description', 'like', "%{$search}%");
    //     })->paginate(9, ['*'], 'page', $page);

    //     return response()->json([
    //         'brands' => $brands->items(),
    //         'pagination' => $brands->appends(['search' => $search])->links('pagination::bootstrap-4')->render()
    //     ]);
    // }


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

        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand_logos'), $imageName);
            $imagePath = 'uploads/brand_logos/' . $imageName;
        }

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'brand_logo' => $imagePath,
        ]);

        // return redirect()->route('index-brand-admin')->with('success', 'Brand created successfully.');
        return redirect()->route('index-brand-admin')->with('success', 'Brand created successfully!');
    }

    public function detailBrand($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->route('index-brand-admin')->with('error', 'Brand not found');
        }

        return view('admin.brand.detail', compact('brand'));
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);

        if ($brand) {
            $brand->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Brand not found']);
    }
}
