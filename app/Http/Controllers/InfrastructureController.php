<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Infrastructure;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InfrastructureController extends Controller
{
    // ===== function index =====
    public function index(){
        // get data from database
        $infra = Infrastructure::orderBy('id', 'desc')->get();
        // return view with data
        return view('layouts.infrastructures.infra_data', compact('infra'));
    }


    // ===== function view add =====
    public function add(){
        // return view for add data 
        return view('layouts.infrastructures.infra_add');
    }


    // ===== function detail data =====
    public function detail(Int $id){
        // getting data from databae
        $find = Infrastructure::where('id', $id)->get();
        // return view detai with data
        return view('layouts.infrastructures.infra_detail', compact('find'));
    }


    // ===== function view edit =====
    public function edit(Int $id){
        // getting data from database
         $find = Infrastructure::where('id', $id)->get();
        // return view edit with data
        return view('layouts.infrastructures.infra_edit', compact('find'));
    }


    // ===== ===== System Logic ===== ===== //


    // ===== function add data =====
    public function store(Request $request){
        // get all data from request
        $data = $request->all();

        // rules for data validation
        $rules =[
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'tahun_pengadaan' => 'required|string',
            'lokasi' => 'required|string',
            'penyedia' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'detail' => 'nullable|max: 2048',
            'catatan' => 'nullable|string'
        ];

        // validate data using validator class
        $validator = Validator::make($data, $rules);

        // check if validator is success?
        if ($validator->fails()) {
            // if unsuccess, displaying error message
            session()->flash('error', 'Data gagal disimpan, coba lagi!');
            // Redirect with error message
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            //if success
            // check does the request have data with file type?
            if($request->hasFile('detail')){
                // store file to public storage in 'files' folder 
                $data['detail'] = $request->file('detail')->store('files');
            }else{
                // else do nothing..
                $path = '';
            }
            // Store data to database
            Infrastructure::create($data);
            // displaying success message
            session()->flash('success', 'Data berhasil disimpan!');
            // Redirect to infrastructure data page
            return redirect('/infrastructure');
        }
    }


    // ===== function for Update Data =====
    public function update(Request $request, Int $id){
        // validation data
        $validation = $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'tahun_pengadaan' => 'required|string',
            'lokasi' => 'required|string',
            'penyedia' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'detail' => 'nullable|max: 2048',
            'catatan' => 'nullable|string'
        ]);

        if(!$validation){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        // check, does the request have data with file type?
        if($request->file('detail')){
            // check, does the request have an oldFile data?
            if ($request->oldFile) {
                // delete old file from storage
                Storage::delete($request->oldFile);
              }
            //   store new file to public storage
              $validation['detail'] = $request->file('detail')->store('files');
        }
        
        // update data
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


    // ===== function for Delete Data =====
    public function destroy( Int $id){
        $getDt = Infrastructure::findorfail($id); 

        $file = public_path('storage/'.$getDt->detail);
        // check, does the infrastructure have data with file type?
        if (file_exists($file)){
            // delete file
            @unlink($file);
        }
        // delete data infra
        $delete = $getDt->delete();

        // delete success?
        if($delete){
            // display an succes message
            session()->flash('success', 'Data berhasil Dihapus!');
            // redirect to infra data page
            return redirect('/infrastructure');
        }else{
            // if unsuccess, display an error meesage
            return back()->with('error', 'Failed to delete post');
        }
    }
}


