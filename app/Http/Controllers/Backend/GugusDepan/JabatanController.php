<?php

namespace App\Http\Controllers\Backend\GugusDepan;

use DataTables;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Jabatan::latest()->get();

            return datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('position_name'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                return Str::contains($row['position_name'], $request->get('position_name')) ? true : false;
                            });
                        }

                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['position_name']), Str::lower($request->get('search')))){
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
                          <a class="dropdown-item" href='.route("jabatans.edit", $row->id).'><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('jabatans.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                        $btn = $dropBtn;
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.gugusdepan.jabatan.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.gugusdepan.jabatan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'position_name'     => 'required',
            'task_desc'     => 'required',
            'gudep_id'     => 'required',
            'admin_gudep_id'     => 'required'
        ]);

        $jabatans = Jabatan::create([
            'id'    => Str::uuid(),
            'position_name'     => $request->position_name,
            'task_desc'     => $request->task_desc,
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id
        ]);

        if($jabatans){
            //redirect dengan pesan sukses
            return redirect()->route('jabatans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('jabatans.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $jabatans = Jabatan::find($id);
        return view('backend.gugusdepan.jabatan.edit', compact('jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $jabatans = Jabatan::findorfail($id);

        $jabatans->update([
            'position_name'     => $request->position_name,
            'task_desc'     => $request->task_desc,
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id
        ]);

        if($jabatans){
            //redirect dengan pesan sukses
            return redirect()->route('jabatans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('jabatans.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $jabatans = Jabatan::findorfail($id);
        $jabatans->delete();
        
        if($jabatans){
            //redirect dengan pesan sukses
            return redirect()->route('jabatans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('jabatans.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
