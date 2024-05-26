<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Http\RedirectResponse;


class AdminEducationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $educations = Education::all(); 
        return view('admin.education',['educations' => $educations]);
    }


    public function destroy(Education $education): RedirectResponse
    {
        $education->delete();
         
        return redirect()->route('admin.education')
                        ->with('success','Data Pendidikan berhasil di hapus');
    }
}
