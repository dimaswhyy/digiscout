<?php

namespace App\Http\Controllers\Auth;

use App\Models\Gudep;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.school_register');;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'school_name'     => 'required',
            'level'     => 'required',
            'gudep_registration_pa'     => 'required',
            'gudep_registration_pi'     => 'required',
            'address'     => 'required',
            'phone_number'     => 'required'
        ]);


        $gudeps = Gudep::create([
            'id'    => Str::uuid(),
            'school_logo'     => "null",
            'gudep_logo'     => "null",
            'school_name'     => $request->school_name,
            'level'     => $request->level,
            'gudep_registration_pa'     => $request->gudep_registration_pa,
            'gudep_registration_pi'     => $request->gudep_registration_pi,
            'address'     => $request->address,
            'district'     => "Masukkan Kecamatan",
            'city'     => "Masukkan Kota/Kab",
            'province'     => "Masukkan Provinsi",
            'phone_number'     => $request->phone_number,
            'information'     => "Aktif"
        ]);

        if ($gudeps) {
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('daftar-sekolah.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
