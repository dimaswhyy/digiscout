<?php

namespace App\Http\Controllers\Backend\PengujiGudep;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\PemberitahuanGudep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = PemberitahuanGudep::where('pemberitahuan_gudeps.gudep_id', Auth::user()->gudep_id)
                ->latest()
                ->get();

            return datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('title'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['title'], $request->get('title')) ? true : false;
                        });
                    }

                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['title']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['date']), Str::lower($request->get('search')))) {
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
                          <a class="dropdown-item" href=' . route("pemberitahuans.edit", $row->id) . '><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('pemberitahuans.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                    $btn = $dropBtn;
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pengujigudep.pemberitahuan.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pengujigudep.pemberitahuan.add'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'gudep_id'     => 'required',
            'penguji_gudep_id'     => 'required',
            'title'     => 'required',
            'desc'     => 'required',
            'date'     => 'required',
            'time'     => 'required',
        ]);

        $pemberitahuans = PemberitahuanGudep::create([
            'id'    => Str::uuid(),
            'gudep_id'     => $request->gudep_id,
            'penguji_gudep_id'     => $request->penguji_gudep_id,
            'title'     => $request->title,
            'desc'     => $request->desc,
            'date'     => $request->date,
            'time'     => $request->time
        ]);

        if ($pemberitahuans) {
            //redirect dengan pesan sukses
            return redirect()->route('pemberitahuans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pemberitahuans.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $pemberitahuans = PemberitahuanGudep::find($id);
        return view('backend.pengujigudep.pemberitahuan.edit', compact('pemberitahuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pemberitahuans = PemberitahuanGudep::findorfail($id);

        $this->validate($request, [
            'gudep_id'     => 'required',
            'penguji_gudep_id'     => 'required',
            'title'     => 'required',
            'desc'     => 'required',
            'date'     => 'required',
            'time'     => 'required'
        ]);

        $pemberitahuans->update([
            'gudep_id'     => $request->gudep_id,
            'penguji_gudep_id'     => $request->penguji_gudep_id,
            'title'     => $request->title,
            'desc'     => $request->desc,
            'date'     => $request->date,
            'time'     => $request->time
        ]);

        if($pemberitahuans){
            //redirect dengan pesan sukses
            return redirect()->route('pemberitahuans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pemberitahuans.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pemberitahuans = PemberitahuanGudep::findorfail($id);
        $pemberitahuans->delete();
        
        if($pemberitahuans){
            //redirect dengan pesan sukses
            return redirect()->route('pemberitahuans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pemberitahuans.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
