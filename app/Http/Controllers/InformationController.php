<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }   
    
    public function index():View
    {
        $informations = Information::latest()->paginate(5);
    
        //render view with posts
        return view('information.index', compact('informations'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
            $rules = [
                'name' => 'required|string',
                'phoneNum' => 'required|string',
                'email' => 'required|email',
                'profesion' => 'nullable|string',
                'linked' => 'nullable|url',
                'portfolio' => 'nullable|url',
                'address' => 'nullable|string',
                'desc' => 'required|string'
            ];

            $messages = [
            'name.required' => 'Nama tidak boleh kosong!.',
            'phoneNum.required' => 'Nomor Handphone tidak boleh kosong!.',
            'phoneNum.phoneNum' => 'Nomor Handphone tidak valid!.',
            'phoneNum.digits_between' => 'Nomor Handphone tidak valid!.',
            'email.required' => 'Email tidak boleh kosong!.',
            'email.email' => 'Email tidak valid!.',
            'profesion.profesion' => 'Profesi tidak valid!.',
            'linked.linked' => 'LinkedIn tidak valid!.',
            'linked.url' => 'LinkedIn tidak valid!.',
            'portfolio.portfolio' => 'Portofolio tidak valid!.',
            'portfolio.url' => 'Portofolio tidak valid!.',
            'address.address' => 'Alamat tidak valid!.',
            'desc.required' => 'Deskripsi tidak boleh kosong!.',
            'desc.desc' => 'Deskripsi tidak valid!.',
            ];

            $validate = $request->validate($rules, $messages);

            Information::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'phoneNum' => $request->phoneNum,
                'email' => $request->email,
                'profesion' =>$request->profesion,
                'linked' => $request->linked,
                'portfolio' => $request->portfolio,
                'address' => $request->address,
                'desc' => $request->desc
            ]);
        

            return redirect()->route('information.index')
            ->with('success','Data Informasi Pribadi berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information): View
    {
        // Cek apakah pengguna yang mencoba mengedit informasi adalah pemilik informasi tersebut
        if (auth()->id() !== $information->user_id) {
            return redirect()->route('information.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit informasi ini.');
        }
    
        return view('information.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information): RedirectResponse
    {
        // Cek apakah pengguna yang mencoba mengupdate informasi adalah pemilik informasi tersebut
        if (auth()->id() !== $information->user_id) {
            return redirect()->route('information.index')
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui informasi ini.');
        }
        $rules = [
            'name' => 'required|string',
            'phoneNum' => 'required|string',
            'email' => 'required|email',
            'profesion' => 'nullable|string',
            'linked' => 'nullable|url',
            'portfolio' => 'nullable|url',
            'address' => 'nullable|string',
            'desc' => 'required|string'
        ];

        $messages = [
        'name.required' => 'Nama tidak boleh kosong!.',
        'phoneNum.required' => 'Nomor Handphone tidak boleh kosong!.',
        'phoneNum.phoneNum' => 'Nomor Handphone tidak valid!.',
        'phoneNum.digits_between' => 'Nomor Handphone tidak valid!.',
        'email.required' => 'Email tidak boleh kosong!.',
        'email.email' => 'Email tidak valid!.',
        'profesion.profesion' => 'Profesi tidak valid!.',
        'linked.linked' => 'LinkedIn tidak valid!.',
        'linked.url' => 'LinkedIn tidak valid!.',
        'portfolio.portfolio' => 'Portofolio tidak valid!.',
        'portfolio.url' => 'Portofolio tidak valid!.',
        'address.address' => 'Alamat tidak valid!.',
        'desc.required' => 'Deskripsi tidak boleh kosong!.',
        'desc.desc' => 'Deskripsi tidak valid!.',
        ];

        $validate = $request->validate($rules, $messages);
        
        $information->update($request->all());
    
        return redirect()->route('information.index')
            ->with('success', 'Data Informasi Pribadi berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information): RedirectResponse
    {
        $information->delete();
         
        return redirect()->route('information.index')
                        ->with('success','Data Informasi berhasil di hapus');
    }
}
