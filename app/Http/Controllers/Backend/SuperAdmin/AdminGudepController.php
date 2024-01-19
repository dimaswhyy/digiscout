<?php

namespace App\Http\Controllers\Backend\SuperAdmin;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\AccountAdminGudep;
use App\Models\Gudep;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminGudepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = AccountAdminGudep::latest()->get();

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
                                if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))){
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
                          <a class="dropdown-item" href='.route("admin-gudeps.edit", $row->id).'><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                          <form action="' . route('admin-gudeps.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-light" onclick="return confirm(\'Beneran nih mau di hapus ?\')"><i class="bx bx-trash me-1"></i> Hapus</button></form>
                        </div>
                        </div>';
                        $btn = $dropBtn;
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.superadmin.admin_gudep.list');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $getGudep = Gudep::orderBy('school_name', 'asc')->get();
        return view('backend.superadmin.admin_gudep.add', compact('getGudep'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'id_gudep'     => 'required',
            'photo_profile'     => 'required',
            'photo_full'     => 'required',
            'nta'   => 'required',
            'name'     => 'required',
            'gender'     => 'required',
            'phone_number'     => 'required | numeric',
            'email'     => 'required',
            'password'     => 'required',
            'role_id'     => 'required'

        ]);

        if($request->file("photo_profile") == ""){
            $admingudeps = AccountAdminGudep::create([
                'id'    => Str::uuid(),
                'id_gudep'     => $request->id_gudep,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'phone_number'     => $request->phone_number,
                'email'     => $request->email,
                'password'     => Hash::make($request->password),
                'role_id'     => $request->role_id
            ]);
        }else{
            $photoProfile = $request->file('photo_profile');
            $photoProfile->storeAs('public/photo_profile', $photoProfile->hashName());
            $photoFull = $request->file('photo_full');
            $photoFull->storeAs('public/photo_full', $photoFull->hashName());

            $admingudeps = AccountAdminGudep::create([
                'id'    => Str::uuid(),
                'id_gudep'     => $request->id_gudep,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'phone_number'     => $request->phone_number,
                'email'     => $request->email,
                'password'     => Hash::make($request->password),
                'role_id'     => $request->role_id,
                'photo_profile'     => $photoProfile->hashName(),
                'photo_full'     => $photoFull->hashName(),
            ]);
        }

        if($admingudeps){
            //redirect dengan pesan sukses
            return redirect()->route('admin-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin-gudeps.add')->with(['error' => 'Data Gagal Disimpan!']);
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
        $admingudeps = AccountAdminGudep::find($id);
        $getGudep = Gudep::orderBy('school_name', 'asc')->get();

        return view('backend.superadmin.admin_gudep.edit', compact('admingudeps', 'getGudep'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $admingudeps = AccountAdminGudep::findOrFail($id);

        if($request->file("photo_profile") == ""){

            $admingudeps->update([
                'id_gudep'     => $request->id_gudep,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'phone_number'     => $request->phone_number,
                'email'     => $request->email,
                'password'     => Hash::make($request->password),
                'role_id'     => $request->role_id
            ]);
        }else{
            Storage::disk('local')->delete('public/photo_profile/'.$admingudeps->photo_profile);
            Storage::disk('local')->delete('public/photo_full/'.$admingudeps->photo_full);

            $photoProfile = $request->file('photo_profile');
            $photoProfile->storeAs('public/photo_profile', $photoProfile->hashName());
            $photoFull = $request->file('photo_full');
            $photoFull->storeAs('public/photo_full', $photoFull->hashName());

            $admingudeps->update([
                'id_gudep'     => $request->id_gudep,
                'name'     => $request->name,
                'nta'     => $request->nta,
                'gender'     => $request->gender,
                'phone_number'     => $request->phone_number,
                'email'     => $request->email,
                'password'     => Hash::make($request->password),
                'role_id'     => $request->role_id,
                'photo_profile'     => $photoProfile->hashName(),
                'photo_full'     => $photoFull->hashName(),
            ]);
        }

        if($admingudeps){
            //redirect dengan pesan sukses
            return redirect()->route('admin-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $admingudeps = AccountAdminGudep::findorfail($id);
        $admingudeps->delete();
        
        if($admingudeps){
            //redirect dengan pesan sukses
            return redirect()->route('admin-gudeps.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin-gudeps.edit')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
