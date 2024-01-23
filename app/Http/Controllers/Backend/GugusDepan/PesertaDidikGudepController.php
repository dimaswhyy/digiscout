<?php

namespace App\Http\Controllers\Backend\GugusDepan;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\PesertaDidikGudep;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PesertaDidikGudepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = PesertaDidikGudep::where('peserta_didik_gudeps.gudep_id', Auth::user()->id_gudep)
                ->latest()
                ->get();

            // dd($data);

            // Belum Selesai untuk pemanggilan Join Data

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
                            if (Str::contains(Str::lower($row['email']), Str::lower($request->get('search')))) {
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
                          <a class="dropdown-item" href=' . route("peserta-didik-gudeps.edit", $row->id) . '><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('peserta-didik-gudeps.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                    $btn = $dropBtn;
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.gugusdepan.peserta_didik_gudep.list'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.gugusdepan.peserta_didik_gudep.add');
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
            'name'     => 'required',
            'gender'     => 'required',
            'email'     => 'required',
            'information'     => 'required',
            'password'     => 'required',
            'role_id'     => 'required'
        ]);

        $pesertadidikgudeps = PesertaDidikGudep::create([
            'id'    => Str::uuid(),
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id,
            'name'     => $request->name,
            'gender'     => $request->gender,
            'information'     => $request->information,
            'email'     => $request->email,
            'password'     => Hash::make($request->password),
            'role_id'     => $request->role_id
        ]);

        if ($pesertadidikgudeps) {
            //redirect dengan pesan sukses
            return redirect()->route('peserta-didik-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('peserta-didik-gudeps.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $pesertadidikgudeps = PesertaDidikGudep::find($id);
        return view('backend.gugusdepan.peserta_didik_gudep.edit', compact('pesertadidikgudeps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pesertadidikgudeps = PesertaDidikGudep::findorfail($id);

        $this->validate($request, [
            'gudep_id'     => 'required',
            'admin_gudep_id'     => 'required',
            'name'     => 'required',
            'gender'     => 'required',
            'email'     => 'required',
            'information'     => 'required',
            'password'     => 'required',
            'role_id'     => 'required'
        ]);

        $pesertadidikgudeps->update([
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id,
            'name'     => $request->name,
            'gender'     => $request->gender,
            'information'     => $request->information,
            'email'     => $request->email,
            'password'     => Hash::make($request->password),
            'role_id'     => $request->role_id
        ]);

        if($pesertadidikgudeps){
            //redirect dengan pesan sukses
            return redirect()->route('peserta-didik-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('peserta-didik-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pesertadidikgudeps = PesertaDidikGudep::findorfail($id);
        $pesertadidikgudeps->delete();
        
        if($pesertadidikgudeps){
            //redirect dengan pesan sukses
            return redirect()->route('peserta-didik-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('peserta-didik-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
