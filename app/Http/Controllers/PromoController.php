<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function indexPromo()
    {
        return view('admin.promo.index');
    }
    
    public function createPromo()
    {
        return view('admin.promo.create');
    }
    
    public function storePromo()
    {
        return view('admin.promo.index');
    }

    // PROMO VOUCHER
    public function createPromoVoucher()
    {
        return view('admin.promo.voucher.create');
    }
    
    public function storePromoVoucher()
    {
        return view('admin.promo.voucher.create');
    }

    // PROMO ONGKIR
    public function createPromoOngkir()
    {
        return view('admin.promo.ongkir.create');
    }
    
    public function storePromoOngkir()
    {
        return view('admin.promo.ongkir.create');
    }
}
