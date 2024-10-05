<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexDashboard()
    {
        $brands = Brand::all();
        $products = Product::all();
        return view('admin.dashboard.index', compact('brands', 'products'));
    }

    // public function getSalesData(Request $request)
    // {
    //     // Ambil brand yang dipilih berdasarkan ID
    //     $brandId = $request->input('brand_id');

    //     // Contoh data untuk simulasi, ini bisa diganti dengan query sebenarnya
    //     $categories = ['January', 'February', 'March', 'April', 'May', 'June'];
    //     $salesData = [150, 200, 100, 300, 400, 250];

    //     // Filter data berdasarkan brand (implementasi tergantung kebutuhan)
    //     if ($brandId) {
    //         $brand = \App\Models\Brand::find($brandId);
    //         // Misalnya, kamu bisa query data sales yang sesuai dengan brand ini
    //         // $salesData = $brand->sales()->pluck('amount'); // Ini hanya contoh
    //     }

    //     return response()->json([
    //         'categories' => $categories,
    //         'data' => $salesData
    //     ]);
    // }

    public function getSalesData(Request $request)
    {
        // Ambil input dari request atau set default
        $startDate = $request->input('start_date', now()->subDays(6)->format('Y-m-d')); // Default 7 hari terakhir
        $endDate = $request->input('end_date', now()->format('Y-m-d')); // Default hari ini
        $brandId = $request->input('brand_id'); // Brand yang dipilih, default semua brand

        // Data dummy untuk 7 hari terakhir
        $categories = [];
        $salesData = [];

        // Menggunakan CarbonPeriod untuk menghasilkan rentang tanggal
        $period = \Carbon\CarbonPeriod::create($startDate, $endDate);

        foreach ($period as $date) {
            $categories[] = $date->format('Y-m-d');
            $salesData[] = rand(50, 200); // Data acak penjualan antara 50 sampai 200
        }

        // Simulasi brand filtering, jika brand dipilih
        if ($brandId) {
            // Jika ada filter brand, ubah sedikit data dummy (misal untuk brand tertentu)
            $salesData = array_map(function ($value) {
                return $value * rand(1, 2); // Kalikan dengan nilai acak untuk variasi data
            }, $salesData);
        }

        return response()->json([
            'categories' => $categories, // Kategori berupa tanggal
            'data' => $salesData         // Data penjualan untuk setiap tanggal
        ]);
    }
}
