<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BsiController extends Controller
{
    // Function View Data Bali Smart Islands
    public function index(){
        // get data from database
        $bsi = DB::table('bsis')->orderBy('id', 'ASC')->get();
        // returning view
        return view('layouts.data_bsi.bsi_data', compact('bsi'));
    }

    // function view insert data bsi
    public function add(){
        return view('layouts.data_bsi.bsi_add');
    }
}
