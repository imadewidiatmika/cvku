<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Organization;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Browsershot\Browsershot;


class Cv1Controller extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }       

    public function index()
    {
        $user = Information::where('user_id', auth()->id())->latest()->first();
        $experiences = Experience::where('user_id', auth()->id())->latest()->get();
        $educations = Education::where('user_id', auth()->id())->latest()->get();
        $organizations = Organization::where('user_id', auth()->id())->latest()->get();
        $skills = Skill::where('user_id', auth()->id())->latest()->get();
        $languages = Language::where('user_id', auth()->id())->latest()->get();
        $certificates = Certificate::where('user_id', auth()->id())->latest()->get();
    
        return view('cvlayout.cv1', compact('user', 'experiences', 'educations', 'organizations', 'skills', 'languages', 'certificates'));
    }
    

    public function download(){
        $user = Information::where('user_id', auth()->id())->latest()->first();
        $experiences = Experience::where('user_id', auth()->id())->latest()->get();
        $educations = Education::where('user_id', auth()->id())->latest()->get();
        $organizations = Organization::where('user_id', auth()->id())->latest()->get();
        $skills = Skill::where('user_id', auth()->id())->latest()->get();
        $languages = Language::where('user_id', auth()->id())->latest()->get();
        $certificates = Certificate::where('user_id', auth()->id())->latest()->get();
        $data = compact('user', 'experiences', 'educations', 'organizations', 'skills', 'languages', 'certificates');
    
        $pdf = Browsershot::html(view('cvlayout.cv1', $data)->render())
            ->format('A4')
            ->showBackground()
            ->margins(10, 0, 0, 10)
            ->pdf();
    
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf;
        }, 'cv1.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
    
}
