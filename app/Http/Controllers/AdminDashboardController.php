<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Information;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Organization;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Certificate;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $users = User::all(); 
        $informations = Information::all(); 
        $experiences = Experience::all(); 
        $educations = Education::all(); 
        $organizations = Organization::all(); 
        $skills = Skill::all(); 
        $languages = Language::all(); 
        $certificates = Certificate::all(); 


        return view('admin.dashboard', [
            'users' => $users,
            'informations' => $informations,
            'experiences' => $experiences,
            'educations' => $educations,
            'organizations' => $organizations,
            'skills' => $skills,
            'languages' => $languages,
            'certificates' => $certificates
        ]);
    }

}
