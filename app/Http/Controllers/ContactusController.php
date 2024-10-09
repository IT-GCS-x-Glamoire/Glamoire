<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use App\Models\Question;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function indexContactusAdmin()
    {

        $contacts = Question::paginate(8);

        return view('admin.contactus.index', compact('contacts'));
    }

    public function showContactusAdmin($id)
    {
        $contact = Question::findOrFail($id); // Mengambil data kontak berdasarkan ID
        return view('admin.contactus.detail', compact('contact')); // Menampilkan view detail
    }
}
