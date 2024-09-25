<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function indexInvoice() {
        return view('accounting.invoice.index');
    }

    public function createInvoice() {
        return view('accounting.invoice.create');
    }

    public function storeInvoice() {

    }

    public function editInvoice() {

    }

    public function updateInvoice() {

    }

    public function deleteInvoice() {

    }
}
