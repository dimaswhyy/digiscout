<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PemberitahuanGudep;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        
        // Mengambil 3 data terbaru dari database, diurutkan berdasarkan tanggal (asumsi ada kolom 'created_at')
        $timelineData = PemberitahuanGudep::orderBy('created_at', 'desc')->take(3)->get();

        return view('backend.dashboard.index', compact('timelineData'));
    }
}
