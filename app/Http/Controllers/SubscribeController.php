<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function indexSubscribeAdmin()
    {
        $subscribe = Subscribe::paginate(8);

        return view('admin.subscribe.index', compact('subscribe'));
    }
}
