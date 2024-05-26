<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SkillController extends Controller
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
        $skills = Skill::latest()->paginate(5);

        return view('skill.index', compact('skills'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'skill' => 'required|string',
        ];

        $messages = [
            'skill.required' => 'Kemampuan tidak boleh kosong!.',
            'skill.skill' => 'Kemampuan tidak boleh valid!.',
            ];

            $validate = $request->validate($rules, $messages);

        Skill::create([
            'user_id' => auth()->id(),
            'skill' => $request->skill
        ]);
    
        return redirect()->route('skill.index')
        ->with('success','Data Kemampuan berhasil di buat');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill):View
    {
        if (auth()->id() !== $skill->user_id) {
            return redirect()->route('skill.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit kemampuan ini.');
        }
    
        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill): RedirectResponse
    {
        if (auth()->id() !== $skill->user_id) {
            return redirect()->route('skill.index')
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui kemampuan ini.');
        }
    
        $rules = [
            'skill' => 'required|string',
        ];

        $messages = [
            'skill.required' => 'Kemampuan tidak boleh kosong!.',
            'skill.skill' => 'Kemampuantidak boleh valid!.',
            ];

            $validate = $request->validate($rules, $messages);

        $skill->update($request->all());
    
        return redirect()->route('skill.index')
            ->with('success', 'Data Kemampuan berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();
         
        return redirect()->route('skill.index')
                        ->with('success','Data Kemampuan berhasil di hapus');
    }
    
}
