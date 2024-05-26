<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EducationController extends Controller
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
        $educations = Education::latest()->paginate(5);
    
        //render view with posts
        return view('education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $rules = [
        'school' => 'required|string',
        'locationSchool' => 'nullable|string',
        'startMonthSchool' => 'required|string|not_in:Pilih Bulan',
        'startYearSchool' => 'required|string|not_in:Pilih Tahun',
        'endMonthSchool' => 'nullable|string',
        'endYearSchool' => 'nullable|string',
        'isActiveEducation' => 'nullable',
        'lastEdu' => 'required|string',
        'major' => 'nullable|string',
        'ipk' => 'nullable|string|regex:/^\d+(\.\d{1,2})?$/',
        'activity' => 'nullable|string',
        'linkSertif' => 'nullable|url'
    ];

    if (!$request->has('isActiveEducation')) {
        $rules['endMonthSchool'] = 'required|string|not_in:Pilih Bulan';
        $rules['endYearSchool'] = 'required|string|not_in:Pilih Tahun';
    }

    $message = [
        'school.required' => 'Nama Sekolah tidak boleh kosong!',
        'school.school' => 'Nama Sekolah tidak valid!',
        'locationSchool.locationSchool' => 'Lokasi Sekolah tidak valid!',
        'startMonthSchool.required' => 'Bulan Mulai tidak boleh kosong!',
        'startMonthSchool.startMonthSchool' => 'Bulan Mulai tidak valid!',
        'startYearSchool.required' => 'Tahun Mulai tidak boleh kosong!',
        'startYearSchool.startYearSchool' => 'Tahun Mulai tidak valid!',
        'endMonthSchool.required' => 'Bulan Selesai tidak boleh kosong!',
        'endMonthSchool.endMonthSchool' => 'Bulan Selesai tidak valid!',
        'endYearSchool.required' => 'Tahun Selesai tidak boleh kosong!',
        'endYearSchool.endYearSchool' => 'Tahun Selesai tidak valid!',
        'startMonthSchool.not_in' => 'Bulan Mulai harus dipilih!',
        'startYearSchool.not_in' => 'Tahun Mulai harus dipilih!',
        'endMonthSchool.not_in' => 'Bulan Selesai harus dipilih!',
        'endYearSchool.not_in' => 'Tahun Selesai harus dipilih!',
        'lastEdu.required' => 'Pendidikan Terakhir tidak boleh kosong!',
        'lastEdu.lastEdu' => 'Pendidikan Terakhir tidak valid!',
        'major.major' => 'Jurusan tidak valid!',
        'ipk.ipk' => 'IPK tidak valid!',
        'ipk.regex' => 'IPK tidak valid!',
        'activity.activity' => 'Aktivitas tidak valid!',
        'linkSertif.linkSertif' => 'Link Sertifikat tidak valid!',
        'linkSertif.url' => 'Link Sertifikat tidak valid!'
    ];

    $request->validate($rules,$message);

    $isActiveEducation = $request->isActiveEducation ? 'saat ini' : null;
    $endMonthSchool = $request->isActiveEducation ? null : $request->endMonthSchool;
    $endYearSchool = $request->isActiveEducation ? null : $request->endYearSchool;

    Education::create([
        'user_id' => auth()->id(),
        'school' => $request->school,
        'locationSchool' => $request->locationSchool,
        'startMonthSchool' => $request->startMonthSchool,
        'startYearSchool' => $request->startYearSchool,
        'endMonthSchool' => $endMonthSchool,
        'endYearSchool' => $endYearSchool,
        'isActiveEducation' => $isActiveEducation,
        'lastEdu' => $request->lastEdu,
        'major' => $request->major,
        'ipk' => $request->ipk,
        'activity' => $request->activity,
        'linkSertif' => $request->linkSertif
    ]);

    return redirect()->route('education.index')
        ->with('success','Data Pengalaman berhasil di buat');
}

    
    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education):View
    {
        if (auth()->id() !== $education->user_id) {
            return redirect()->route('education.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit pendidikan ini.');
        }
    
        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education): RedirectResponse
    {
        if (auth()->id() !== $education->user_id) {
            return redirect()->route('education.index')
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui pendidikan ini.');
        }
    
        $rules = [
            'school' => 'required|string',
            'locationSchool' => 'nullable|string',
            'startMonthSchool' => 'required|string|not_in:Pilih Bulan',
            'startYearSchool' => 'required|string|not_in:Pilih Tahun',
            'lastEdu' => 'required|string',
            'major' => 'nullable|string',
            'ipk' => 'nullable|string|regex:/^\d+(\.\d{1,2})?$/',
            'activity' => 'nullable|string',
            'linkSertif' => 'nullable|url',
            'isActiveEducation' => 'nullable'
        ];
    
        if (!$request->has('isActiveEducation')) {
            $rules['endMonthSchool'] = 'required|string|not_in:Pilih Bulan';
            $rules['endYearSchool'] = 'required|string|not_in:Pilih Tahun';
        }
    
        $message = [
            'school.required' => 'Nama Sekolah tidak boleh kosong!',
            'school.school' => 'Nama Sekolah tidak valid!',
            'locationSchool.locationSchool' => 'Lokasi Sekolah tidak valid!',
            'startMonthSchool.required' => 'Bulan Mulai tidak boleh kosong!',
            'startMonthSchool.startMonthSchool' => 'Bulan Mulai tidak valid!',
            'startYearSchool.required' => 'Tahun Mulai tidak boleh kosong!',
            'startYearSchool.startYearSchool' => 'Tahun Mulai tidak valid!',
            'endMonthSchool.required' => 'Bulan Selesai tidak boleh kosong!',
            'endMonthSchool.endMonthSchool' => 'Bulan Selesai tidak valid!',
            'endYearSchool.required' => 'Tahun Selesai tidak boleh kosong!',
            'endYearSchool.endYearSchool' => 'Tahun Selesai tidak valid!',
            'startMonthSchool.not_in' => 'Bulan Mulai harus dipilih!',
            'startYearSchool.not_in' => 'Tahun Mulai harus dipilih!',
            'endMonthSchool.not_in' => 'Bulan Selesai harus dipilih!',
            'endYearSchool.not_in' => 'Tahun Selesai harus dipilih!',
            'lastEdu.required' => 'Pendidikan Terakhir tidak boleh kosong!',
            'lastEdu.lastEdu' => 'Pendidikan Terakhir tidak valid!',
            'major.major' => 'Jurusan tidak valid!',
            'ipk.ipk' => 'IPK tidak valid!',
            'ipk.regex' => 'IPK tidak valid!',
            'activity.activity' => 'Aktivitas tidak valid!',
            'linkSertif.linkSertif' => 'Link Sertifikat tidak valid!',
            'linkSertif.url' => 'Link Sertifikat tidak valid!'
        ];
    
        $validate = $request->validate($rules,$message);
    
        $isActiveEducation = $request->isActiveEducation ? 'saat ini' : null;
        $endMonthSchool = $request->isActiveEducation ? null : $request->endMonthSchool;
        $endYearSchool = $request->isActiveEducation ? null : $request->endYearSchool;
    
        $education->update([
            'user_id' => auth()->id(),
            'school' => $request->school,
            'locationSchool' => $request->locationSchool,
            'startMonthSchool' => $request->startMonthSchool,
            'startYearSchool' => $request->startYearSchool,
            'lastEdu' => $request->lastEdu,
            'major' => $request->major,
            'ipk' => $request->ipk,
            'activity' => $request->activity,
            'linkSertif' => $request->linkSertif,
            'endMonthSchool' => $endMonthSchool,
            'endYearSchool' => $endYearSchool,
            'isActiveEducation' => $isActiveEducation
        ]);
    
        return redirect()->route('education.index')
            ->with('success', 'Data Pendidikan berhasil di perbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education): RedirectResponse
    {
        $education->delete();
         
        return redirect()->route('education.index')
                        ->with('success','Data Pengalaman berhasil di hapus');
    }
}
