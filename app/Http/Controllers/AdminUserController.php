<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin:1']);
    }       

    public function index()
    {
        $users = User::all(); 
        return view('admin.user',['users' => $users]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
         
        return redirect()->route('admin.user')
                        ->with('success','Data Pengguna berhasil di hapus');
    }
}
