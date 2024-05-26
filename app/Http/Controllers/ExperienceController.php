<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ExperienceController extends Controller
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
        $experiences = Experience::latest()->paginate(5);
    
        //render view with posts
        return view('experience.index', compact('experiences'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'company' => 'required|string',
            'position' => 'required|string',
            'locationCompany' => 'required|string',
            'descCompany' => 'nullable|string',
            'startMonthCompany' => 'required|string|not_in:Pilih Bulan',
            'startYearCompany' => 'required|string|not_in:Pilih Tahun',
            'portfolioWork' => 'required|string',
            'isActiveCompany' => 'nullable'
        ];
    
        if (!$request->has('isActiveCompany')) {
            $rules['endMonthCompany'] = 'required|string|not_in:Pilih Bulan';
            $rules['endYearCompany'] = 'required|string|not_in:Pilih Tahun';
        }
    
        $message = [
            'company.required' => 'Nama Perusahaan tidak boleh kosong!',
            'company.company' => 'Nama Perusahaan tidak valid',
            'position.required' => 'Jabatan tidak boleh kosong!',
            'startMonthCompany.not_in' => 'Bulan Mulai harus dipilih!',
            'startYearCompany.not_in' => 'Tahun Mulai harus dipilih!',
            'endMonthCompany.not_in' => 'Bulan Selesai harus dipilih!',
            'endYearCompany.not_in' => 'Tahun Selesai harus dipilih!',
            'position.position' => 'Jabatan tidak valid!!',
            'locationCompany.required' => 'Lokasi Perusahaan tidak boleh kosong!',
            'locationCompany.locationCompany' => 'Lokasi Perusahaan tidak valid!',
            'descCompany.descCompany' => 'Deskripsi Perusahaan tidak valid!',
            'startMonthCompany.required' => 'Bulan Mulai tidak boleh kosong!',
            'startMonthCompany.startMonthCompany' => 'Bulan Mulai tidak valid!',
            'startYearCompany.required' => 'Tahun Mulai tidak boleh kosong!',
            'startYearCompany.startYearCompany' => 'Tahun Mulai tidak valid!',
            'endMonthCompany.required' => 'Bulan selesai tidak boleh kosong!',
            'endMonthCompany.endMonthCompany' => 'Bulan selesai tidak valid!',
            'endYearCompany.required' => 'Tahun selesai tidak boleh kosong!',
            'endYearCompany.endYearCompany' => 'Tahun selesai tidak valid!',
            'portfolioWork.required' => 'Portofolio tidak boleh kosong!',
            'portfolioWork.string' => 'Portofolio tidak valid!',
            'portfolioWork.portfolioWork' => 'Portofolio tidak valid!',
        ];
    
        $validate = $request->validate($rules, $message);
    
        $isActiveCompany = $request->isActiveCompany ? 'saat ini' : null;
        $endMonthCompany = $request->isActiveCompany ? null : $request->endMonthCompany;
        $endYearCompany = $request->isActiveCompany ? null : $request->endYearCompany;
    
        Experience::create([
            'user_id' => auth()->id(),
            'company' => $request->company,
            'position' => $request->position,
            'locationCompany' => $request->locationCompany,
            'descCompany' => $request->descCompany,
            'startMonthCompany' => $request->startMonthCompany,
            'startYearCompany' => $request->startYearCompany,
            'portfolioWork' => $request->portfolioWork,
            'endMonthCompany' => $endMonthCompany,
            'endYearCompany' => $endYearCompany,
            'isActiveCompany' => $isActiveCompany
        ]);
    
        return redirect()->route('experience.index')
            ->with('success','Data Pengalaman berhasil di buat');
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience): View
    {
        if (auth()->id() !== $experience->user_id) {
            return redirect()->route('experience.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit pengalaman ini.');
        }
    
        return view('experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience): RedirectResponse
    {
        if (auth()->id() !== $experience->user_id) {
            return redirect()->route('experience.index')
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui pengalaman ini.');
        }
    
        $rules = [
            'company' => 'required|string',
            'position' => 'required|string',
            'locationCompany' => 'required|string',
            'descCompany' => 'nullable|string',
            'startMonthCompany' => 'required|string|not_in:Pilih Bulan',
            'startYearCompany' => 'required|string|not_in:Pilih Tahun',
            'portfolioWork' => 'required|string',
            'isActiveCompany' => 'nullable'
        ];
    
        if (!$request->has('isActiveCompany')) {
            $rules['endMonthCompany'] = 'required|string|not_in:Pilih Bulan';
            $rules['endYearCompany'] = 'required|string|not_in:Pilih Tahun';
        }
    
        $message = [
            'company.required' => 'Nama Perusahaan tidak boleh kosong!',
            'company.company' => 'Nama Perusahaan tidak valid',
            'position.required' => 'Jabatan tidak boleh kosong!',
            'position.position' => 'Jabatan tidak valid!!',
            'locationCompany.required' => 'Lokasi Perusahaan tidak boleh kosong!',
            'locationCompany.locationCompany' => 'Lokasi Perusahaan tidak valid!',
            'descCompany.descCompany' => 'Deskripsi Perusahaan tidak valid!',
            'startMonthCompany.required' => 'Bulan Mulai tidak boleh kosong!',
            'startMonthCompany.startMonthCompany' => 'Bulan Mulai tidak valid!',
            'startMonthCompany.not_in' => 'Bulan Mulai harus dipilih!',
            'startYearCompany.not_in' => 'Tahun Mulai harus dipilih!',
            'endMonthCompany.not_in' => 'Bulan Selesai harus dipilih!',
            'endYearCompany.not_in' => 'Tahun Selesai harus dipilih!',
            'startYearCompany.required' => 'Tahun Mulai tidak boleh kosong!',
            'startYearCompany.startYearCompany' => 'Tahun Mulai tidak valid!',
            'endMonthCompany.required' => 'Bulan selesai tidak boleh kosong!',
            'endMonthCompany.endMonthCompany' => 'Bulan selesai tidak valid!',
            'endYearCompany.required' => 'Tahun selesai tidak boleh kosong!',
            'endYearCompany.endYearCompany' => 'Tahun selesai tidak valid!',
            'portfolioWork.required' => 'Portofolio tidak boleh kosong!',
            'portfolioWork.string' => 'Portofolio tidak valid!',
            'portfolioWork.portfolioWork' => 'Portofolio tidak valid!',
        ];
    
        $validate = $request->validate($rules, $message);
    
        $isActiveCompany = $request->isActiveCompany ? 'saat ini' : null;
        $endMonthCompany = $request->isActiveCompany ? null : $request->endMonthCompany;
        $endYearCompany = $request->isActiveCompany ? null : $request->endYearCompany;
    
        $experience->update([
            'user_id' => auth()->id(),
            'company' => $request->company,
            'position' => $request->position,
            'locationCompany' => $request->locationCompany,
            'descCompany' => $request->descCompany,
            'startMonthCompany' => $request->startMonthCompany,
            'startYearCompany' => $request->startYearCompany,
            'portfolioWork' => $request->portfolioWork,
            'endMonthCompany' => $endMonthCompany,
            'endYearCompany' => $endYearCompany,
            'isActiveCompany' => $isActiveCompany
        ]);
    
        return redirect()->route('experience.index')
            ->with('success', 'Data Pengalaman berhasil di perbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();
         
        return redirect()->route('experience.index')
                        ->with('success','Data Pengalaman berhasil di hapus');
    }
}
