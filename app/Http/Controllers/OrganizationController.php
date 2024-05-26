<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $organizations = Organization::latest()->paginate(5);
    
        //render view with posts
        return view('organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'organization' => 'required|string',
            'positionOrganization' => 'required|string',
            'locationOrganization' => 'required|string',
            'descOrganization' => 'nullable|string',
            'startMonthOrganization' => 'required|string|not_in:Pilih Bulan',
            'startYearOrganization' => 'required|string|not_in:Pilih Tahun',
            'isActiveOrganization' => 'nullable'
        ];
    
        if (!$request->has('isActiveOrganization')) {
            $rules['endMonthOrganization'] = 'required|string|not_in:Pilih Bulan';
            $rules['endYearOrganization'] = 'required|string|not_in:Pilih Tahun';
        }
    
        $messages = [
            'organization.required' => 'Organisasi/Nama Acara tidak boleh kosong!',
            'organization.organization' => 'Organisasi/Nama Acara tidak valid!',
            'positionOrganization.required' => 'Posisi tidak boleh kosong!',
            'positionOrganization.positionOrganization' => 'Posisi tidak valid!',
            'locationOrganization.locationOrganization' => 'Lokasi Organisasi tidak valid!',
            'startMonthOrganization.required' => 'Bulan Mulai tidak boleh kosong!',
            'startMonthOrganization.startMonthOrganization' => 'Bulan Mulai tidak valid!',
            'startYearOrganization.required' => 'Tahun Mulai tidak boleh kosong!',
            'startYearOrganization.startYearOrganization' => 'Tahun Mulai tidak valid!',
            'endMonthOrganization.required' => 'Bulan Selesai tidak boleh kosong!',
            'endMonthOrganization.endMonthOrganization' => 'Bulan Selesai tidak valid!',
            'endYearOrganization.required' => 'Tahun Selesai tidak boleh kosong!',
            'endYearOrganization.endYearOrganization' => 'Tahun Selesai tidak valid!',
            'startMonthOrganization.not_in' => 'Bulan Mulai harus dipilih!',
            'startYearOrganization.not_in' => 'Tahun Mulai harus dipilih!',
            'endMonthOrganization.not_in' => 'Bulan Selesai harus dipilih!',
            'endYearOrganization.not_in' => 'Tahun Selesai harus dipilih!',
            'descOrganization.descOrganization' => 'Deskripsi tidak valid!'
        ];
    
        $validate = $request->validate($rules,$messages);
    
        $isActiveOrganization = $request->isActiveOrganization ? 'saat ini' : null;
        $endMonthOrganization = $request->isActiveOrganization ? null : $request->endMonthOrganization;
        $endYearOrganization = $request->isActiveOrganization ? null : $request->endYearOrganization;
    
        Organization::create([
            'user_id' => auth()->id(),
            'organization' => $request->organization,
            'positionOrganization' => $request->positionOrganization,
            'locationOrganization' => $request->locationOrganization,
            'descOrganization' => $request->descOrganization,
            'startMonthOrganization' => $request->startMonthOrganization,
            'startYearOrganization' => $request->startYearOrganization,
            'endMonthOrganization' => $endMonthOrganization,
            'endYearOrganization' => $endYearOrganization,
            'isActiveOrganization' => $isActiveOrganization
        ]);
    
        return redirect()->route('organization.index')
            ->with('success','Data Organisasi berhasil di buat');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization):view
    {
        if (auth()->id() !== $organization->user_id) {
            return redirect()->route('organization.index')
                ->with('error', 'Anda tidak memiliki izin untuk mengedit organisasi ini.');
        }
    
        return view('organization.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization): RedirectResponse
    {
        if (auth()->id() !== $organization->user_id) {
            return redirect()->route('organization.index')
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui organisasi ini.');
        }
    
        $rules = [
            'organization' => 'required|string',
            'positionOrganization' => 'required|string',
            'locationOrganization' => 'required|string',
            'descOrganization' => 'nullable|string',
            'startMonthOrganization' => 'required|string|not_in:Pilih Bulan',
            'startYearOrganization' => 'required|string|not_in:Pilih Tahun',
            'isActiveOrganization' => 'nullable'
        ];
    
        if (!$request->has('isActiveOrganization')) {
            $rules['endMonthOrganization'] = 'required|string|not_in:Pilih Bulan';
            $rules['endYearOrganization'] = 'required|string|not_in:Pilih Tahun';
        }
    
        $messages = [
            'organization.required' => 'Organisasi/Nama Acara tidak boleh kosong!',
            'organization.organization' => 'Organisasi/Nama Acara tidak valid!',
            'positionOrganization.required' => 'Posisi tidak boleh kosong!',
            'positionOrganization.positionOrganization' => 'Posisi tidak valid!',
            'locationOrganization.locationOrganization' => 'Lokasi Organisasi tidak valid!',
            'startMonthOrganization.required' => 'Bulan Mulai tidak boleh kosong!',
            'startMonthOrganization.startMonthOrganization' => 'Bulan Mulai tidak valid!',
            'startYearOrganization.required' => 'Tahun Mulai tidak boleh kosong!',
            'startYearOrganization.startYearOrganization' => 'Tahun Mulai tidak valid!',
            'endMonthOrganization.required' => 'Bulan Selesai tidak boleh kosong!',
            'endMonthOrganization.endMonthOrganization' => 'Bulan Selesai tidak valid!',
            'endYearOrganization.required' => 'Tahun Selesai tidak boleh kosong!',
            'endYearOrganization.endYearOrganization' => 'Tahun Selesai tidak valid!',
            'startMonthOrganization.not_in' => 'Bulan Mulai harus dipilih!',
            'startYearOrganization.not_in' => 'Tahun Mulai harus dipilih!',
            'endMonthOrganization.not_in' => 'Bulan Selesai harus dipilih!',
            'endYearOrganization.not_in' => 'Tahun Selesai harus dipilih!',
            'descOrganization.descOrganization' => 'Deskripsi tidak valid!'
        ];
    
        $validate = $request->validate($rules,$messages);
    
        $isActiveOrganization = $request->isActiveOrganization ? 'saat ini' : null;
        $endMonthOrganization = $request->isActiveOrganization ? null : $request->endMonthOrganization;
        $endYearOrganization = $request->isActiveOrganization ? null : $request->endYearOrganization;
    
        $organization->update([
            'user_id' => auth()->id(),
            'organization' => $request->organization,
            'positionOrganization' => $request->positionOrganization,
            'locationOrganization' => $request->locationOrganization,
            'descOrganization' => $request->descOrganization,
            'startMonthOrganization' => $request->startMonthOrganization,
            'startYearOrganization' => $request->startYearOrganization,
            'endMonthOrganization' => $endMonthOrganization,
            'endYearOrganization' => $endYearOrganization,
            'isActiveOrganization' => $isActiveOrganization
        ]);
    
        return redirect()->route('organization.index')
            ->with('success', 'Data Organisasi berhasil di perbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
         
        return redirect()->route('organization.index')
                        ->with('success','Data Organisasi berhasil di hapus');
    }
}
