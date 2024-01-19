<?php

namespace App\Http\Controllers\Backend\GugusDepan;

use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Gudep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfileGudepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Gudep::where('id', '=', Auth::user()->id_gudep)->latest()->get();

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
                            if (Str::contains(Str::lower($row['school_name']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['address']), Str::lower($request->get('search')))) {
                                return true;
                            }

                            return false;
                        });
                    }
                })
                ->addColumn('action', function ($row) {
                    $dropBtn = '<div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href=' . route("profil-gudeps.edit", $row->id) . '><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                        </div>
                        </div>';
                    $btn = $dropBtn;
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.gugusdepan.profil.list');
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
        $Gudeps = Gudep::find($id);
        return view('backend.gugusdepan.profil.edit', compact('Gudeps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Gudeps = Gudep::findOrFail($id);

        if($request->file("school_logo") == ""){

            $Gudeps->update([
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
        }else if($request->file("gudep_logo") == ""){

            $Gudeps->update([
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
            Storage::disk('local')->delete('public/school_logo/'.$Gudeps->logo_sekolah);
            Storage::disk('local')->delete('public/gudep_logo/'.$Gudeps->logo_sekolah);

            $schoolLogo = $request->file('school_logo');
            $schoolLogo->storeAs('public/school_logo', $schoolLogo->hashName());
            $gudepLogo = $request->file('gudep_logo');
            $gudepLogo->storeAs('public/gudep_logo', $gudepLogo->hashName());

            $Gudeps->update([
                'school_logo'     => $schoolLogo->hashName(),
                'gudep_logo'     => $gudepLogo->hashName(),
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

        if($Gudeps){
            //redirect dengan pesan sukses
            return redirect()->route('profil-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('profil-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
