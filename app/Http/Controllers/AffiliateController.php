<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function indexAffiliateAdmin()
    {
        $partners = Partner::paginate(5);

        return view('admin.affiliate.index', compact('partners'));
    }

    public function detailAffiliateAdmin($id)
    {
        // $partners = Partner::findorFail($id);
        $partners = Partner::with(['fileCompany', 'fileBpom'])->find($id);

        return view('admin.affiliate.detail', compact('partners'));
    }
}
