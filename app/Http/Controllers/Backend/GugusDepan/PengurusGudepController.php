<?php

namespace App\Http\Controllers\Backend\GugusDepan;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\PengurusGudep;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PengurusGudepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = PengurusGudep::where('gudep_id', '=', Auth::user()->id_gudep)->leftjoin('jabatans', 'pengurus_gudeps.position_id', '=', 'jabatans.id')->select('pengurus_gudeps.id', 'jabatans.position_name', 'pengurus_gudeps.*', 'pengurus_gudeps.created_at')->latest()->get();

            return datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('name'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['name'], $request->get('name')) ? true : false;
                        });
                    }

                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['information']), Str::lower($request->get('search')))) {
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
                          <a class="dropdown-item" href=' . route("pengurus-gudeps.edit", $row->id) . '><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('pengurus-gudeps.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form> 
                        </div>
                        </div>';
                    $btn = $dropBtn;
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.gugusdepan.pengurus_gudep.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $getPosition = Jabatan::all();
        return view('backend.gugusdepan.pengurus_gudep.add', compact('getPosition'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'gudep_id'     => 'required',
            'admin_gudep_id'     => 'required',
            'nta'   => 'required',
            'name'     => 'required',
            'gender'     => 'required',
            'address'     => 'required',
            'phone_number'     => 'required | numeric',
            'position_id'     => 'required',
            'information'     => 'required'
        ]);

        if (empty($request->file("photo_profile")) && empty($request->file("photo_full"))) {
            // Jika kedua file tidak diisi, atau salah satunya tidak diisi, simpan data
            $pengurusgudeps = PengurusGudep::create([
                'id'    => Str::uuid(),
                'gudep_id'     => $request->gudep_id,
                'admin_gudep_id'     => $request->admin_gudep_id,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'address'     => $request->address,
                'phone_number'     => $request->phone_number,
                'position_id'     => $request->position_id,
                'information'     => $request->information
            ]);
        } else {
            $photoProfile = $request->file('photo_profile');
            $photoFull = $request->file('photo_full');

            // Simpan file jika diunggah
            if (!empty($photoProfile)) {
                $photoProfile->storeAs('public/photo_profile', $photoProfile->hashName());
            }
            if (!empty($photoFull)) {
                $photoFull->storeAs('public/photo_full', $photoFull->hashName());
            }

            $pengurusgudeps = PengurusGudep::create([
                'id'    => Str::uuid(),
                'gudep_id'     => $request->gudep_id,
                'admin_gudep_id'     => $request->admin_gudep_id,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'address'     => $request->address,
                'phone_number'     => $request->phone_number,
                'position_id'     => $request->position_id,
                'information'     => $request->information,
                'photo_profile'     => !empty($photoProfile) ? $photoProfile->hashName() : null,
                'photo_full'     => !empty($photoFull) ? $photoFull->hashName() : null
            ]);
        }

        if ($pengurusgudeps) {
            //redirect dengan pesan sukses
            return redirect()->route('pengurus-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pengurus-gudeps.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $pengurusgudeps = PengurusGudep::find($id);
        $getPosition = Jabatan::all();
        return view('backend.gugusdepan.pengurus_gudep.edit', compact('pengurusgudeps', 'getPosition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pengurusgudeps = PengurusGudep::findOrFail($id);

        $currentPhotoProfile = $pengurusgudeps->photo_profile;
        $currentPhotoFull = $pengurusgudeps->photo_full;

        if (empty($request->file("photo_profile")) && empty($request->file("photo_full"))) {
            // Jika kedua file tidak diisi, atau salah satunya tidak diisi, lakukan pembaruan data
            $pengurusgudeps->update([
                'gudep_id'     => $request->gudep_id,
                'admin_gudep_id'     => $request->admin_gudep_id,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'address'     => $request->address,
                'phone_number'     => $request->phone_number,
                'position_id'     => $request->position_id,
                'information'     => $request->information,
                // Tidak menyentuh kolom file pada pembaruan ini karena file tidak diubah
                // Menggunakan nama file yang saat ini digunakan
                'photo_profile'     => $currentPhotoProfile,
                'photo_full'     => $currentPhotoFull
            ]);
        } else {
            // Hapus file-file lama sebelum menyimpan file-file yang baru
            if (!empty($currentPhotoProfile)) {
                Storage::disk('local')->delete('public/photo_profile/' . $currentPhotoProfile);
            }
            if (!empty($currentPhotoFull)) {
                Storage::disk('local')->delete('public/photo_full/' . $currentPhotoFull);
            }

            // Simpan file-file baru jika ada
            if ($photoProfile = $request->file('photo_profile')) {
                $photoProfile->storeAs('public/photo_profile', $photoProfile->hashName());
            }
            if ($photoFull = $request->file('photo_full')) {
                $photoFull->storeAs('public/photo_full', $photoFull->hashName());
            }

            // Lakukan pembaruan data
            $pengurusgudeps->update([
                'gudep_id'     => $request->gudep_id,
                'admin_gudep_id'     => $request->admin_gudep_id,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'address'     => $request->address,
                'phone_number'     => $request->phone_number,
                'position_id'     => $request->position_id,
                'information'     => $request->information,
                'photo_profile'     => $photoProfile ? $photoProfile->hashName() : $currentPhotoProfile,
                'photo_full'     => $photoFull ? $photoFull->hashName() : $currentPhotoFull,
            ]);
        }

        if ($pengurusgudeps) {
            //redirect dengan pesan sukses
            return redirect()->route('pengurus-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pengurus-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pengurusgudeps = PengurusGudep::findorfail($id);
        $pengurusgudeps->delete();
        
        if($pengurusgudeps){
            //redirect dengan pesan sukses
            return redirect()->route('pengurus-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pengurus-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
