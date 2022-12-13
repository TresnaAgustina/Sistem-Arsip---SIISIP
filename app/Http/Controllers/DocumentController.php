<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    // Function View All Data
    public function index(){
        // get data from database
        $documents = DB::table('documents')
        ->orderBy('tanggal', 'desc')
        ->paginate(5);
        return view('layouts.doc_archive.doc_data', compact('documents'));
    }


    // function View Add Document
    public function add(){
        return view('layouts.doc_archive.doc_add');
    }

    // function store data document
    public function store(Request $request){

        // Validation
        $validate = $request->validate([
          'no_surat' => 'required|string',
          'tanggal' => 'required|date',
          'kategori' => 'required|string',
          'judul' => 'required|string',
          'link_file' => 'required|string',
          'uraian' => 'nullable|string',
        ]); 

        // check if validation is valid?
        if(!$validate){
            return back()->with('add-error', 'Data Is Invalid or Empty, Please Try Again!!');
        }
        // store data
        $store = Document::create($validate);

        // validation if storing data successfully
        if(!$store){
            return back()->with('error', 'Failed To Input Data, Please Try Again!!');
        }
        return redirect('/document_data');
    }


    // function view edit page
    public function edit(Int $id){
        $documents = Document::where('id', $id)->get();

        return view('layouts.doc_archive.doc_edit', compact('documents'));
    }

    // function update data
    public function update(Request $request, Int $id){
         // Validation
         $request->validate([
            'no_surat' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'judul' => 'required|string',
            'link_file' => 'required|string',
            'uraian' => 'required|string',
          ]); 

          $update = Document::where('id', $id)->update([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'link_file' => $request->link_file,
            'uraian' => $request->uraian,
          ]);

        //   validation if update was successfully
        if($update){
            return redirect('/document_data');
        }else{
            return back()->with('error', 'Update Data Failed, Please Try Again!!');
        }
    }

    // function for delete data
    // ===== Delete Data ===== //
    public function destroy(Int $id){

        $delete = Document::where('id', $id)->delete();

        if($delete){
            return redirect('/document_data');
        }else{
            return back()->with('error', 'Failed to delete post');
        }
    }
}