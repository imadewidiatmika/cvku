<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LanguageController extends Controller
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
        $languages = Language::latest()->paginate(5);

        return view('language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'language' => 'required|string',
        ];

        $messages = [
            'language.required' => 'Bahasa tidak boleh kosong!.',
            'language.language' => 'Bahasa tidak boleh valid!.',
            ];

            $validate = $request->validate($rules, $messages);

        Language::create([
            'user_id' => auth()->id(),
            'language' => $request->language
        ]);

        return redirect()->route('language.index')
        ->with('success','Data Bahasa berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        if (auth()->id() !== $language->user_id) {
            return redirect()->route('language.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit bahasa ini.');
        }
    
        return view('language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language): RedirectResponse
    {
        if (auth()->id() !== $language->user_id) {
            return redirect()->route('language.index')
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui bahasa ini.');
        }
    
        $rules = [
            'language' => 'required|string',
        ];

        $messages = [
            'language.required' => 'Bahasa tidak boleh kosong!.',
            'language.language' => 'Bahasa tidak boleh valid!.',
            ];

            $validate = $request->validate($rules, $messages);
    
        $language->update($request->all());
    
        return redirect()->route('language.index')
            ->with('success', 'Data Bahasa berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();
         
        return redirect()->route('language.index')
                        ->with('success','Data Bahasa berhasil di hapus');
    }
}
