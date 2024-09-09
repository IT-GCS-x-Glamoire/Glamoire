<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function indexlogin() {
        return view('admin.login.index');
    }
}
