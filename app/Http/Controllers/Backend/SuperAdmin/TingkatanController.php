<?php

namespace App\Http\Controllers\Backend\Superadmin;

use DataTables;
use App\Models\Golongan;
use App\Models\Tingkatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TingkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Tingkatan::join('golongans', 'tingkatans.group_id', '=', 'golongans.id')->select('tingkatans.id','tingkatans.group_id','tingkatans.level_group_name', 'tingkatans.level_badge', 'golongans.group_name', 'tingkatans.*', 'tingkatans.created_at')->latest()->get();

            return datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('level_group_name'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                return Str::contains($row['level_group_name'], $request->get('level_group_name')) ? true : false;
                            });
                        }

                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['level_group_name']), Str::lower($request->get('search')))){
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
                          <a class="dropdown-item" href='.route("tingkatans.edit", $row->id).'><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('tingkatans.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                        $btn = $dropBtn;
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('backend.superadmin.tingkatan.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $getGroup = Golongan::all();
        return view('backend.superadmin.tingkatan.add', compact('getGroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'level_group_name'     => 'required',
            'group_id'     => 'required'

        ]);

        if($request->file("level_badge") == ""){
            $tingkatans = Tingkatan::create([
                'id'    => Str::uuid(),
                'group_id'     => $request->group_id,
                'level_group_name'     => $request->level_group_name
            ]);
        }else{
            $levelBadge = $request->file('level_badge');
            $levelBadge->storeAs('public/level_badge', $levelBadge->hashName());

            $tingkatans = Tingkatan::create([
                'id'    => Str::uuid(),
                'group_id'     => $request->group_id,
                'level_group_name'     => $request->level_group_name,
                'level_badge'     => $levelBadge->hashName()
            ]);
        }

        if($tingkatans){
            //redirect dengan pesan sukses
            return redirect()->route('tingkatans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tingkatans.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $tingkatans = Tingkatan::find($id);
        $getGolongan = Golongan::all();
        // dd($tingkatans);
        return view('backend.superadmin.tingkatan.edit', compact('tingkatans', 'getGolongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tingkatans = Tingkatan::findOrFail($id);

        if($request->file("level_badge") == ""){

            $tingkatans->update([
                'group_id'     => $request->group_id,
                'level_group_name'     => $request->level_group_name
            ]);
        }else{
            Storage::disk('local')->delete('public/level_badge/'.$tingkatans->level_badge);

            $levelBadge = $request->file('level_badge');
            $levelBadge->storeAs('public/level_badge', $levelBadge->hashName());

            $tingkatans->update([
                'school_logo'     => $levelBadge->hashName(),
                'group_id'     => $request->group_id,
                'level_group_name'     => $request->level_group_name
            ]);
        }

        if($tingkatans){
            //redirect dengan pesan sukses
            return redirect()->route('tingkatans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tingkatans.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tingkatans = Tingkatan::findOrFail($id);
        if($tingkatans->level_badge!="null"){
            Storage::disk('local')->delete('public/level_badge'.$tingkatans->level_badge);
        }
        $tingkatans->delete();

        if($tingkatans){
            //redirect dengan pesan sukses
        return redirect()->route('tingkatans.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
        return redirect()->route('tingkatans.edit')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
