<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function category($category){
        try {

            // dd($category);
            return view('user.component.shop', compact('category'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function subCategory($category, $subcategory){
        try {
            // dd($subcategory);
            return view('user.component.subcategory', compact('category', 'subcategory'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function listSubCategory($category, $subcategory, $listsubcategory){
        try {
            return view('user.component.listsubcategory', compact('category', 'subcategory', 'listsubcategory'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
