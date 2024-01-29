<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gudep;
use Illuminate\Http\Request;

class APIGetGudepController extends Controller
{
    //
    public function getGudepOptions(Request $request)
    {
        $term = $request->input('term'); // Get the term parameter from the request

        $query = Gudep::query();

        // If a search term is provided, filter the results
        if ($term) {
            $query->where('school_name', 'like', '%' . $term . '%');
        }

        $gudepOptions = $query->get(['id', 'school_name']);
        
        return response()->json($gudepOptions);
    }
}
