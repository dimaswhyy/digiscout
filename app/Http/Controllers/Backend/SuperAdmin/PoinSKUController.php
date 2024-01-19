<?php

namespace App\Http\Controllers\Backend\Superadmin;

use DataTables;
use App\Models\PoinSku;
use App\Models\Golongan;
use App\Models\Tingkatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PoinSKUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = PoinSku::leftjoin('golongans', 'poin_skus.group_id', '=', 'golongans.id')->leftjoin('tingkatans', 'poin_skus.level_group_id', '=', 'tingkatans.id')->select('poin_skus.id', 'golongans.group_name', 'tingkatans.level_group_name', 'poin_skus.sku_number', 'poin_skus.sku_theme', 'poin_skus.sku_desc', 'poin_skus.skor', 'poin_skus.created_at')->latest()->get();
            
            return datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('sku_number'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                return Str::contains($row['sku_theme'], $request->get('sku_theme')) ? true : false;
                            });
                        }

                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['sku_number']), Str::lower($request->get('search')))){
                                    return true;
                                }else if (Str::contains(Str::lower($row['sku_theme']), Str::lower($request->get('search')))) {
                                    return true;
                                }else if (Str::contains(Str::lower($row['sku_desc']), Str::lower($request->get('search')))) {
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
                          <a class="dropdown-item" href='.route("poinskus.edit", $row->id).'><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('poinskus.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                        $btn = $dropBtn;
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
        
        return view('backend.superadmin.poin_sku.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $getGolongan = Golongan::orderBy('group_name', 'asc')->get();
        $getTingkatan = Tingkatan::orderBy('level_group_name', 'asc')->get();
        return view('backend.superadmin.poin_sku.add', compact('getGolongan', 'getTingkatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'group_id'     => 'required',
            'level_group_id'     => 'required',
            'sku_number'     => 'required',
            'sku_theme'     => 'required',
            'sku_desc'     => 'required',
            'skor'     => 'required'
        ]);

        $poinskus = PoinSku::create([
            'id'    => Str::uuid(),
            'group_id'     => $request->group_id,
            'level_group_id'     => $request->level_group_id,
            'sku_number'     => $request->sku_number,
            'sku_theme'     => $request->sku_theme,
            'sku_desc'     => $request->sku_desc,
            'skor'     => $request->skor
        ]);

        if($poinskus){
            //redirect dengan pesan sukses
            return redirect()->route('poinskus.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('poinskus.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $getGolongan = Golongan::orderBy('group_name', 'asc')->get();
        $getTingkatan = Tingkatan::orderBy('level_group_name', 'asc')->get();
        $poinskus = PoinSku::find($id);
        return view('backend.superadmin.poin_sku.edit', compact('poinskus', 'getGolongan', 'getTingkatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $poinskus = PoinSku::findorfail($id);

        $poinskus->update([
            'group_id'     => $request->group_id,
            'level_group_id'     => $request->level_group_id,
            'sku_number'     => $request->sku_number,
            'sku_theme'     => $request->sku_theme,
            'sku_desc'     => $request->sku_desc,
            'skor'     => $request->skor
        ]);

        if($poinskus){
            //redirect dengan pesan sukses
            return redirect()->route('poinskus.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('poinskus.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $poinskus = PoinSku::findorfail($id);
        $poinskus->delete();
        
        if($poinskus){
            //redirect dengan pesan sukses
            return redirect()->route('poinskus.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('poinskus.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
