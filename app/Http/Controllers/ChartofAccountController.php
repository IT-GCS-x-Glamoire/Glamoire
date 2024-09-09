<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ChartofAccountController extends Controller
{
    public function indexChartofAccount() {
        return view('accounting.coa.index');
    }

    public function createChartofAccount() {
        return view('accounting.coa.create');
    }
    
    public function storeChartofAccount() {
        
    }

    public function deleteChartofAccount() {

    }


    public function editChartofAccount() {
        return view('accounting.coa.edit');
    }
    
    public function updateChartofAccount() {

    }


    public function indexCategoryChartofAccount() {
        return view('accounting.coa.category.index');
    }
}
