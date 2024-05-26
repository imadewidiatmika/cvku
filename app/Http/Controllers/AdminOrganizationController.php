<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Http\RedirectResponse;

class AdminOrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $organizations = Organization::all(); 
        return view('admin.organization',['organizations' => $organizations]);
    }


    public function destroy(Organization $organization): RedirectResponse
    {
        $organization->delete();
         
        return redirect()->route('admin.organization')
                        ->with('success','Data Organisasi berhasil di hapus');
    }
}
