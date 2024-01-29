<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gudep;
use App\Models\PesertaDidikGudep;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return PesertaDidikGudep::create([ 
        //     'id' => Str::uuid(),
        //     'profil_user' => "dummy test",
        //     'nta' => "dummy test",
        //     'gender' => "dummy test",
        //     'school_name' => $data['school_name'],
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'role_id' => $data['role_id']
        // ]);
        // dd();

        $registerPesertaDidik = PesertaDidikGudep::create([
            'id'    => Str::uuid(),
            'gudep_id'     => $data['gudep_id'],
            'admin_gudep_id'     => "null",
            'name'     => $data['name'],
            'gender'     => "null",
            'information'     => "Aktif",
            'email'     => $data['email'],
            'password'     => Hash::make($data['password']),
            'role_id'     => "4"
        ]);
        dd($registerPesertaDidik);
        // dd($registerPesertaDidik->getErrors());

        if ($registerPesertaDidik) {
            //redirect dengan pesan sukses
            return redirect()->route('register')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            // dd($registerPesertaDidik->getErrors());
            return redirect()->route('login')->with(['error' => 'Data Gagal Disimpan!']);
            // dd($registerPesertaDidik->getErrors());
        }
    }

    // public function index()
    // {
    //     $getGudep = Gudep::all();
    //     return view('auth.register', compact('getGudep'));
    // }
}
