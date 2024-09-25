<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProductController extends Controller
{
    public function index(){
        try {
            $userId = session('id_user');

            if ($userId) {
                $data = User::with(['whislist'])
                    ->where('id', $userId)
                    ->first();

                    // dd(count($data->whislist));
                return view('user.component.home')->with('data', $data);
            }
            else {
                return view('user.component.home');
            }

            // dd($data->whislist);
            // dd(count($data->whislist));


        } catch (Exception $err) {
            dd($err);
        }
    }
    public function detail($id){
        try {

            $data = $id;

            return view('user.component.detail')->with('data', $data);

        } catch (Exception $err) {
            dd($err);
        }
    }
}
