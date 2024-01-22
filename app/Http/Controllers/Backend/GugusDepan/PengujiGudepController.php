<?php

namespace App\Http\Controllers\Backend\GugusDepan;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\AccountPengujiGudep;
use App\Models\PengurusGudep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PengujiGudepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = AccountPengujiGudep::where('account_penguji_gudeps.gudep_id', Auth::user()->id_gudep)
                ->leftJoin('pengurus_gudeps', 'account_penguji_gudeps.pengurus_id', '=', 'pengurus_gudeps.id')
                ->select('account_penguji_gudeps.id', 'pengurus_gudeps.name', 'account_penguji_gudeps.email', 'account_penguji_gudeps.role_id', 'account_penguji_gudeps.created_at')
                ->latest()
                ->get();

            // dd($data);

            // Belum Selesai untuk pemanggilan Join Data

            return datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('email'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['email'], $request->get('email')) ? true : false;
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
                          <a class="dropdown-item" href=' . route("penguji-gudeps.edit", $row->id) . '><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('penguji-gudeps.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                    $btn = $dropBtn;
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.gugusdepan.penguji_gudep.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $getPenguji = PengurusGudep::all();
        return view('backend.gugusdepan.penguji_gudep.add', compact('getPenguji'));
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
            'pengurus_id'     => 'required',
            'email'     => 'required',
            'password'     => 'required',
        ]);

        $pengujigudeps = AccountPengujiGudep::create([
            'id'    => Str::uuid(),
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id,
            'pengurus_id'     => $request->pengurus_id,
            'email'     => $request->email,
            'password'     => $request->password,
            'role_id'     => $request->role_id
        ]);

        if ($pengujigudeps) {
            //redirect dengan pesan sukses
            return redirect()->route('penguji-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('penguji-gudeps.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $pengujigudeps = AccountPengujiGudep::find($id);
        $getPengurus = PengurusGudep::all();
        return view('backend.gugusdepan.penguji_gudep.edit', compact('getPengurus','pengujigudeps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pengujigudeps = AccountPengujiGudep::findorfail($id);

        $this->validate($request, [
            'gudep_id'     => 'required',
            'admin_gudep_id'     => 'required',
            'role_id'     => 'required',
            'pengurus_id'   => 'required',
            'email'     => 'required',
            'password'     => 'required'
        ]);

        $pengujigudeps->update([
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id,
            'role_id'     => $request->role_id,
            'pengurus_id'     => $request->pengurus_id,
            'email'     => $request->email,
            'password'     => $request->password
        ]);

        if($pengujigudeps){
            //redirect dengan pesan sukses
            return redirect()->route('penguji-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('penguji-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pengujigudeps = AccountPengujiGudep::findorfail($id);
        $pengujigudeps->delete();
        
        if($pengujigudeps){
            //redirect dengan pesan sukses
            return redirect()->route('penguji-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('penguji-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
