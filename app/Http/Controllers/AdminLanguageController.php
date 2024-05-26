<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;

class AdminLanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $languages = Language::all(); 
        return view('admin.language',['languages' => $languages]);
    }

    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();
         
        return redirect()->route('admin.language')
                        ->with('success','Data Bahasa berhasil di hapus');
    }
}
