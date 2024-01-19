<?php

namespace App\Http\Controllers\Backend\GugusDepan;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\GolonganGudep;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GolonganGudepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = GolonganGudep::where('gudep_id', '=', Auth::user()->id_gudep)->leftjoin('golongans', 'golongan_gudeps.golongan_id', '=', 'golongans.id')->select('golongan_gudeps.id', 'golongans.group_name', 'golongan_gudeps.information', 'golongan_gudeps.created_at')->latest()->get();

            return datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('gudep_id'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['gudep_id'], $request->get('gudep_id')) ? true : false;
                        });
                    }

                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['gudep_id']), Str::lower($request->get('search')))) {
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
                          <a class="dropdown-item" href=' . route("golongan-gudeps.edit", $row->id) . '><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                        </div>
                        </div>';
                    $btn = $dropBtn;
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.gugusdepan.golongan_gudep.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $getGolongan = Golongan::all();
        return view('backend.gugusdepan.golongan_gudep.add', compact('getGolongan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'golongan_id'   =>  'required',
            'information'   =>  'required',
            'gudep_id'   =>  'required',
            'admin_gudep_id'   =>  'required'
        ]);

        $golongangudeps = GolonganGudep::create([
            'id'    => Str::uuid(),
            'golongan_id'     => $request->golongan_id,
            'information'     => $request->information,
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id
        ]);

        if($golongangudeps){
            //redirect dengan pesan sukses
            return redirect()->route('golongan-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('golongan-gudeps.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $golongangudeps = GolonganGudep::find($id);
        $getGolongan = Golongan::all();
        return view('backend.gugusdepan.golongan_gudep.edit', compact('golongangudeps', 'getGolongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $golongangudeps = GolonganGudep::findorfail($id);

        $golongangudeps->update([
            'golongan_id'     => $request->golongan_id,
            'information'     => $request->information,
            'gudep_id'     => $request->gudep_id,
            'admin_gudep_id'     => $request->admin_gudep_id
        ]);

        if($golongangudeps){
            //redirect dengan pesan sukses
            return redirect()->route('golongan-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('golongan-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
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
