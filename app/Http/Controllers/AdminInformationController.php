<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Http\RedirectResponse;

class AdminInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $informations = Information::all();
        return view('admin.information',['informations' => $informations]);
    }

    public function destroy(Information $information): RedirectResponse
    {
        $information->delete();
         
        return redirect()->route('admin.information')
                        ->with('success','Data Informasi berhasil di hapus');
    }
}
