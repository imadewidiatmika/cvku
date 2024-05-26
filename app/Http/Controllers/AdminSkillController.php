<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;

class AdminSkillController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $skills = Skill::all(); 
        return view('admin.skill',['skills' => $skills]);
    }

    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();
         
        return redirect()->route('admin.skill')
                        ->with('success','Data Kemampuan berhasil di hapus');
    }
}
