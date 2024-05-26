<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }   
    
    public function index()
    {
        $certificates = Certificate::latest()->paginate(5);

        return view('certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules =[
            'certificate' => 'required|string',
        ];

        $messages = [
            'certificate.required' => 'Sertifikat tidak boleh kosong!.',
            'certificate.certificate' => 'Sertifikat tidak valid!.',
            ];

            $validate = $request->validate($rules, $messages);

            Certificate::create([
                'user_id' => auth()->id(),
                'certificate' => $request->certificate,
            ]);

        return redirect()->route('certificate.index')
        ->with('success','Data Sertifikat berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate):View
    {
        if (auth()->id() !== $certificate->user_id) {
            return redirect()->route('certificate.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit sertifikat ini.');
        }
    
        return view('certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate): RedirectResponse
    {
        if (auth()->id() !== $certificate->user_id) {
            return redirect()->route('certificate.index')
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui sertifikat ini.');
        }
    
        $rules =[
            'certificate' => 'required|string',
        ];

        $messages = [
            'certificate.required' => 'Sertifikat tidak boleh kosong!.',
            'certificate.certificate' => 'Sertifikat tidak valid!.',
            ];

            $validate = $request->validate($rules, $messages);

        $certificate->update($request->all());
    
        return redirect()->route('certificate.index')
            ->with('success', 'Data Sertifikat berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate): RedirectResponse
    {
      
        $certificate->delete();
         
        return redirect()->route('certificate.index')
                        ->with('success','Data Kemampuan berhasil di hapus');
    }
}
