<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    // Function View All Data
    public function index(){
        return view('layouts.doc_archive.doc_data');
    }


    // function View Add Document
    public function add(){
        return view('layouts.doc_archive.doc_add');
    }

    // function store data document
    public function store(Request $request){
        $valid = $request->validate([
            'no_surat' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'link_file' => 'required|string',
            'uraian' => 'required|string'
        ]);

        if(!$valid){
            return back()->with('validation_error', 'Data invaid, please try again!!');
        }

        ddd();

        DB::table('documents')->insert($valid);
        return redirect('/document_data');
    }
}
