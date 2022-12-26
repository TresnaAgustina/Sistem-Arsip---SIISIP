<?php

namespace App\Http\Controllers;

use Validator;
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

        $data = $request->all();

        // Validation
        $rules = [
          'no_surat' => 'required|string',
          'tanggal' => 'required|date',
          'kategori' => 'required|string',
          'judul' => 'required|string',
          'link_file' => 'required|string',
          'uraian' => 'nullable|string',
        ]; 

        // Create custom error meesage
        $messages = [
            'no_surat.required' => 'Harap Masukan Nomor Surat',
            'tanggal.required' => 'Harap Masukan Tanggal',
            'kategori.required' => 'Harap Masukan Kategori',
            'judul.required' => 'Harap Masukan Judul',
            'link_file.required' => 'Harap Masukan Link File',
        ];

        // validate data using validator class
        $validator = Validator::make($data, $rules, $messages);

        // check if validator is success?
        if ($validator->fails()) {
            // Redirect with error message
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Store data to database
            $store = Document::create($data);
            // Redirect to doc data page
            return redirect('/document_data');
        }

        // check if validation is valid?
        // if(!$validate){
        //     return back()->withError();
        // }
        // store data
        // $store = Document::create($validate);

        // validation if storing data successfully
    //     if(!$store){
    //         return back()->with('error', 'Failed To Input Data, Please Try Again!!');
    //     }
    //     return redirect('/document_data');
    }


    // function view edit page
    public function edit(Int $id){
        $documents = Document::where('id', $id)->get();

        return view('layouts.doc_archive.doc_edit', compact('documents'));
    }

    // function update data
    public function update(Request $request, Int $id){
         // Validation
         $validation = $request->validate([
            'no_surat' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'judul' => 'required|string',
            'link_file' => 'required|string',
            'uraian' => 'required|string',
          ]); 

          if(!$validation){
            return back()->with('error', 'Update Data Failed, Please Try Again!!');
          }

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