<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;

class AdminExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $experiences = Experience::all(); 
        return view('admin.experience',['experiences' => $experiences]);
    }

    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();
         
        return redirect()->route('admin.experience')
                        ->with('success','Data Pengalaman berhasil di hapus');
    }
}
