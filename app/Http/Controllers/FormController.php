<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscribe;
use App\Models\Question;
use App\Models\Partner;
use App\Models\File;
use Exception;

class FormController extends Controller
{
    public function checkEmailSubscribe(Request $request)
    {
        $emailExists = Subscribe::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }

    public function checkEmailVoucher(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }

    public function sendQuestion(Request $request)
    {
        try {
            Question::create([
                'fullname'   => $request->fullname,
                'email'      => $request->email,
                'question'   => $request->question,
                'created_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pertanyaan Anda Sudah Kami Terima. 
                Tunggu Balasan Email Dari Kami Yaa'
            ]);
        } catch (Exception $err) {
            dd($err);
        }
    }

    // public function files(Request $request)
    // {
    //     try {
    //         if ($request->hasFile('file_company')) {
    //             // Simpan file ke direktori penyimpanan
    //             $fileCompany = $request->file('file_company');
    //             $fileCompanyName = time() . '_' . $fileCompany->getClientOriginalName();
    //             $fileCompanyPath = $fileCompany->storeAs('uploads', $fileCompanyName, 'public'); // Menyimpan di storage/app/public/uploads

    //             // Simpan informasi file di database
    //             $companyFile = File::create([
    //                 'file_name' => $fileCompanyName,
    //                 'file_path' => $fileCompanyPath,
    //                 'type' => 'company', // Pastikan type diisi
    //             ]);
    //         }

    //         if ($request->hasFile('file_bpom')) {
    //             // Simpan file ke direktori penyimpanan
    //             $fileBpom = $request->file('file_bpom');
    //             $fileBpomName = time() . '_' . $fileBpom->getClientOriginalName();
    //             $fileBpomPath = $fileBpom->storeAs('uploads', $fileBpomName, 'public'); // Menyimpan di storage/app/public/uploads

    //             // Simpan informasi file di database
    //             $bpomFile = File::create([
    //                 'file_name' => $fileBpomName,
    //                 'file_path' => $fileBpomPath,
    //                 'type' => 'bpom', // Pastikan type diisi
    //             ]);
    //         }

    //         Partner::create([
    //             'fullname'          => $request->partner_fullname,
    //             'handphone'         => $request->partner_handphone,
    //             'email'             => $request->partner_email,
    //             'company_name'      => $request->company,
    //             'description'       => $request->description,
    //             'bpom'              => $request->bpom == "yes" ? TRUE : FALSE,
    //             'distributor'       => $request->distributor == "yes" ? TRUE : FALSE,
    //             'reached_email'     => $request->receive_email == "yes" ? TRUE : FALSE,
    //             'category_product'  => $request->category_product,
    //             'file_company'      => $companyFile->id,
    //             'file_bpom'         => $bpomFile->id,
    //         ]);

    //         session()->flash('send_success');
    //         return redirect()->back()->with('success', 'File berhasil diupload');
    //     } catch (Exception $err) {
    //         dd($err);
    //     }
    // }

    public function files(Request $request)
    {
        // Validasi request
        $request->validate([
            'file_company' => 'nullable|mimes:pdf,doc,docx|max:5120', // max:5120 untuk 5MB
            'file_bpom' => 'nullable|mimes:pdf,doc,docx|max:5120', // max:5120 untuk 5MB
            'partner_fullname' => 'required|string',
            'partner_handphone' => 'required|string',
            'partner_email' => 'required|email',
            'company' => 'required|string',
            'description' => 'nullable|string',
            'bpom' => 'required',
            'distributor' => 'required',
            'receive_email' => 'required',
            'category_product' => 'required|string',
        ]);

        try {
            if ($request->hasFile('file_company')) {
                // Simpan file ke direktori penyimpanan
                $fileCompany = $request->file('file_company');
                $fileCompanyName = time() . '_' . $fileCompany->getClientOriginalName();
                $fileCompanyPath = $fileCompany->storeAs('uploads', $fileCompanyName, 'public'); // Menyimpan di storage/app/public/uploads

                // Simpan informasi file di database
                $companyFile = File::create([
                    'file_name' => $fileCompanyName,
                    'file_path' => $fileCompanyPath,
                    'type' => 'company', // Pastikan type diisi
                ]);
            }

            if ($request->hasFile('file_bpom')) {
                // Simpan file ke direktori penyimpanan
                $fileBpom = $request->file('file_bpom');
                $fileBpomName = time() . '_' . $fileBpom->getClientOriginalName();
                $fileBpomPath = $fileBpom->storeAs('uploads', $fileBpomName, 'public'); // Menyimpan di storage/app/public/uploads

                // Simpan informasi file di database
                $bpomFile = File::create([
                    'file_name' => $fileBpomName,
                    'file_path' => $fileBpomPath,
                    'type' => 'bpom', // Pastikan type diisi
                ]);
            }

            Partner::create([
                'fullname'          => $request->partner_fullname,
                'handphone'         => $request->partner_handphone,
                'email'             => $request->partner_email,
                'company_name'      => $request->company,
                'description'       => $request->description,
                'bpom'              => $request->bpom == "yes" ? TRUE : FALSE,
                'distributor'       => $request->distributor == "yes" ? TRUE : FALSE,
                'reached_email'     => $request->receive_email == "yes" ? TRUE : FALSE,
                'category_product'  => $request->category_product,
                'file_company'      => isset($companyFile) ? $companyFile->id : null,
                'file_bpom'         => isset($bpomFile) ? $bpomFile->id : null,
            ]);

            session()->flash('send_success');
            return redirect()->back()->with('success', 'File berhasil diupload');
        } catch (Exception $err) {
            dd($err);
        }
    }
}
