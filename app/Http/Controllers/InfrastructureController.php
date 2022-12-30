<?php

namespace App\Http\Controllers;

use App\Exports\InfraExport;
use Validator;
use Illuminate\Http\Request;
use App\Models\Infrastructure;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InfrastructureController extends Controller
{
    // ===== function index =====
    public function index(){
        $infra = Infrastructure::orderBy('id', 'desc')->get();

        return view('layouts.infrastructures.infra_data', compact('infra'));
    }

    // ===== function view add =====
    public function add(){
        return view('layouts.infrastructures.infra_add');
    }

    // ===== function detail data =====
    public function detail(Int $id){
        $find = Infrastructure::where('id', $id)->get();

        return view('layouts.infrastructures.infra_detail', compact('find'));
    }

    // ===== ===== Logic ===== ===== //

    // ===== function add data =====
    public function store(Request $request){

        // get all data from request
        $data = $request->all();

        $rules =[
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'tahun_pengadaan' => 'required|string',
            'lokasi' => 'required|string',
            'penyedia' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'detail' => 'file|max: 2048',
            'catatan' => 'nullable|string'
        ];

        // ddd($request);

        // validate data using validator class
        $validator = Validator::make($data, $rules);

        // ddd($request);

        if($request->hasFile('detail')){
            // $request->file('detail')->store('files');  
            $data['detail'] = $request->file('detail')->store('files');
        }else{
            $path = '';
        }

        // check if validator is success?
        if ($validator->fails()) {
            // displaying error message
            session()->flash('error', 'Data gagal disimpan, coba lagi!');
            // Redirect with error message
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Store data to database
            Infrastructure::create($data);
            // displaying success message
            session()->flash('success', 'Data berhasil disimpan!');
            // Redirect to doc data page
            return redirect('/infrastructure');
        }
    }


    // ===== function view edit =====
    public function edit(Int $id){
        $find = Infrastructure::where('id', $id)->get();

        return view('layouts.infrastructures.infra_edit', compact('find'));
    }

    // ===== function for Update Data =====
    public function update(Request $request, Int $id){

        $validation = $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'tahun_pengadaan' => 'required|string',
            'lokasi' => 'required|string',
            'penyedia' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'detail' => 'nullable|file|max: 2048',
            'catatan' => 'nullable|string'
        ]);


        // ddd($request);  

        // $file = Infrastructure::select('detail')->where('id', $id)->first();
        if($request->file('detail')){
            if ($request->oldFile) {
                // hapus file lama
                Storage::delete($request->oldFile);
              }
              $validation['detail'] = $request->file('detail')->store('files');
        }
        
        $update = Infrastructure::where('id', $id)->update($validation);


       //   validation if update was successfully
       if($update){
        // displaying success message
        session()->flash('success', 'Data berhasil disimpan!');
        return redirect('/infrastructure');
        }else{
            // displaying error message
            session()->flash('error', 'Data gagal disimpan, coba lagi!');
            // Redirect with error message
            return redirect()->back()->withErrors($validation)->withInput();
        }
    }


    // function for Delete Data
    public function destroy(Infrastructure $infra, Int $id){

        if($infra->detail) {
            // delete file from storage
            Storage::delete($infra->detail);
          }
        $delete = Infrastructure::where('id', $id)->delete();

        if($delete){
            session()->flash('success', 'Data berhasil Dihapus!');
            return redirect('/infrastructure');
        }else{
            return back()->with('error', 'Failed to delete post');
        }
    }
    
}


