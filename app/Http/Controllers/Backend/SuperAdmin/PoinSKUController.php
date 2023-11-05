<?php

namespace App\Http\Controllers\Backend\Superadmin;

use DataTables;
use App\Models\PoinSKU;
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

            $data = PoinSKU::latest()->get();

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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
