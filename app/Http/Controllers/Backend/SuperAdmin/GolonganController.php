<?php

namespace App\Http\Controllers\Backend\SuperAdmin;

use DataTables;
use App\Models\Golongan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Golongan::latest()->get();

            return datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('school_name'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                return Str::contains($row['group_name'], $request->get('group_name')) ? true : false;
                            });
                        }

                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['group_name']), Str::lower($request->get('search')))){
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
                          <a class="dropdown-item" href='.route("golongans.edit", $row->id).'><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('golongans.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                        $btn = $dropBtn;
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('backend.superadmin.golongan.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.superadmin.golongan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'group_name'     => 'required',
            'desc'     => 'required'
        ]);

        $golongans = Golongan::create([
            'id'    => Str::uuid(),
            'group_name'     => $request->group_name,
            'min_age'     => $request->min_age,
            'max_age'     => $request->max_age,
            'desc'     => $request->desc
        ]);

        if($golongans){
            //redirect dengan pesan sukses
            return redirect()->route('golongans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('golongans.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $golongans = Golongan::find($id);
        return view('backend.superadmin.golongan.edit', compact('golongans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $golongans = Golongan::findorfail($id);

        $golongans->update([
            'group_name'     => $request->group_name,
            'min_age'     => $request->min_age,
            'max_age'     => $request->max_age,
            'desc'     => $request->desc
        ]);

        if($golongans){
            //redirect dengan pesan sukses
            return redirect()->route('golongans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('golongans.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $golongans = Golongan::findorfail($id);
        $golongans->delete();
        
        if($golongans){
            //redirect dengan pesan sukses
            return redirect()->route('golongans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('golongans.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
