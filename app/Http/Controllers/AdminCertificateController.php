<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Certificate;

class AdminCertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }   
    
    public function index()
    {
        $certificates = Certificate::all(); 
        return view('admin.certificate',[   'certificates' => $certificates]);
    }

    public function destroy(Certificate $certificate): RedirectResponse
    {
      
        $certificate->delete();
         
        return redirect()->route('admin.certificate')
                        ->with('success','Data Sertifikat berhasil di hapus');
    }
}
