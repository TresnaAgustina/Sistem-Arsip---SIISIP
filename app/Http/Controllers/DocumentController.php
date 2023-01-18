<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    // ===== Function View All Data =====
    public function index(){
        // get data from database
        $documents = Document::orderBy('tanggal', 'desc')->get();
        // return view with data
        return view('layouts.doc_archive.doc_data', compact('documents'));
    }


    // ===== function View Add Document =====
    public function add(){
        return view('layouts.doc_archive.doc_add');
    }

    
    // function view edit page
    public function edit(Int $id){
        $documents = Document::where('id', $id)->get();
        return view('layouts.doc_archive.doc_edit', compact('documents'));
    }


    // ========== Logic ========== //


    // ===== function store data document =====
    public function store(Request $request){
        // get all data from request
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
            // displaying error message
            session()->flash('error', 'Data gagal disimpan, coba lagi!');
            // Redirect with error message
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Store data to database
            Document::create($data);
            // displaying success message
            session()->flash('success', 'Data berhasil disimpan!');
            // Redirect to doc data page
            return redirect('/document');
        }
    }


    // function update data
    public function update(Request $request, Int $id){
         // Validation
         $validation = Validator::make($request->all(),[
            'no_surat' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'judul' => 'required|string',
            'link_file' => 'required|string',
            'uraian' => 'nullable|string',
        ]); 

        // if valiadation is fails
        if ($validation->fails()) {
            // return with error message
            return redirect()->back()->withErrors($validation)->withInput();
        }

        //   update data
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
            // displaying success message
            session()->flash('success', 'Data berhasil di update!');
            return redirect('/document');
        }else{
            // displaying error message
            session()->flash('error', 'Data gagal di update, coba lagi!');
            // Redirect with error message
            return redirect()->back()->withErrors($validation)->withInput();
        }
    }


    // ===== Delete Data ===== //
    public function destroy(Int $id){

        // getting data from database
        $getDt = Document::where('id', $id)->delete();

        // check, does getGt is success?
        if($getDt){
            // displaying successs meesage
            session()->flash('success', 'Data berhasil Dihapus!');
            // return to document data page
            return redirect('/document');
        }else{
            // if failed. return with error message
            return back()->with('error', 'Gagal ');
        }
    }
}