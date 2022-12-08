<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Function View All Data
    public function index(){
        return view('layouts.doc_archive.doc_data');
    }
}
