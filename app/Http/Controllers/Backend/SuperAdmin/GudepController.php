<?php

namespace App\Http\Controllers\Backend\SuperAdmin;

use DataTables;
use App\Models\Gudep;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GudepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Gudep::latest()->get();

            return datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('school_name'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                return Str::contains($row['school_name'], $request->get('school_name')) ? true : false;
                            });
                        }

                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['school_name']), Str::lower($request->get('search')))){
                                    return true;
                                }else if (Str::contains(Str::lower($row['gudep_registration_pa']), Str::lower($request->get('search')))) {
                                    return true;
                                }else if (Str::contains(Str::lower($row['gudep_registration_pi']), Str::lower($request->get('search')))) {
                                    return true;
                                }
                                return false;
                            });
                        }


                    })
                    ->addColumn('action', function($row){
                        $dropBtn ='<div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href='.route("gudeps.edit", $row->id).'><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('gudeps.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                        $btn = $dropBtn;
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.superadmin.gudep.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.superadmin.gudep.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'school_name'     => 'required',
            'level'     => 'required',
            'gudep_registration_pa'     => 'required',
            'gudep_registration_pi'     => 'required',
            'address'     => 'required',
            'district'     => 'required',
            'city'     => 'required',
            'province'     => 'required',
            'phone_number'     => 'required',
            'information'     => 'required'

        ]);

        if($request->file("school_logo") == ""){
            $gudeps = Gudep::create([
                'id'    => Str::uuid(),
                'school_name'     => $request->school_name,
                'level'     => $request->level,
                'gudep_registration_pa'     => $request->gudep_registration_pa,
                'gudep_registration_pi'     => $request->gudep_registration_pi,
                'address'     => $request->address,
                'district'     => $request->district,
                'city'     => $request->city,
                'province'     => $request->province,
                'phone_number'     => $request->phone_number,
                'information'     => $request->information
            ]);
        }else{
            $schoolLogo = $request->file('school_logo');
            $schoolLogo->storeAs('public/school_logo', $schoolLogo->hashName());

            $gudeps = Gudep::create([
                'id'    => Str::uuid(),
                'school_logo'     => $schoolLogo->hashName(),
                'school_name'     => $request->school_name,
                'level'     => $request->level,
                'gudep_registration_pa'     => $request->gudep_registration_pa,
                'gudep_registration_pi'     => $request->gudep_registration_pi,
                'address'     => $request->address,
                'district'     => $request->district,
                'city'     => $request->city,
                'province'     => $request->province,
                'phone_number'     => $request->phone_number,
                'information'     => $request->information
            ]);
        }

        if($gudeps){
            //redirect dengan pesan sukses
            return redirect()->route('gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('gudeps.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $gudeps = Gudep::find($id);

        return view('backend.superadmin.gudep.edit', compact('gudeps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $gudeps = Gudep::findOrFail($id);

        if($request->file("school_logo") == ""){

            $gudeps->update([
                'school_name'     => $request->school_name,
                'level'     => $request->level,
                'gudep_registration_pa'     => $request->gudep_registration_pa,
                'gudep_registration_pi'     => $request->gudep_registration_pi,
                'address'     => $request->address,
                'district'     => $request->district,
                'city'     => $request->city,
                'province'     => $request->province,
                'phone_number'     => $request->phone_number,
                'information'     => $request->information
            ]);
        }else{
            Storage::disk('local')->delete('public/logo_sekolah/'.$gudeps->logo_sekolah);

            $schoolLogo = $request->file('school_logo');
            $schoolLogo->storeAs('public/school_logo', $schoolLogo->hashName());

            $gudeps->update([
                'school_logo'     => $schoolLogo->hashName(),
                'school_name'     => $request->school_name,
                'level'     => $request->level,
                'gudep_registration_pa'     => $request->gudep_registration_pa,
                'gudep_registration_pi'     => $request->gudep_registration_pi,
                'address'     => $request->address,
                'district'     => $request->district,
                'city'     => $request->city,
                'province'     => $request->province,
                'phone_number'     => $request->phone_number,
                'information'     => $request->information
            ]);
        }

        if($gudeps){
            //redirect dengan pesan sukses
            return redirect()->route('gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $gudeps = Gudep::findOrFail($id);
        if($gudeps->logo_sekolah!="null"){
            Storage::disk('local')->delete('public/school_logo'.$gudeps->school_logo);
            Storage::disk('local')->delete('public/gudep_logo'.$gudeps->gudep_logo);
        }
        $gudeps->delete();

        if($gudeps){
            //redirect dengan pesan sukses
        return redirect()->route('gudeps.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
        return redirect()->route('gudeps.edit')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
