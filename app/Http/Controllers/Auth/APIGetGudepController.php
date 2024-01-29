<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gudep;
use Illuminate\Http\Request;

class APIGetGudepController extends Controller
{
    //
    public function getGudepOptions()
    {
        $gudepOptions = Gudep::pluck('school_name', 'id')->toArray();
        dd($gudepOptions);
        return response()->json($gudepOptions);
    }
}
