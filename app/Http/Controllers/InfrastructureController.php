<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfrastructureController extends Controller
{
    // function index
    public function index(){
        $infra = Infrastructure::orderBy('id', 'desc')->get();

        return view('layouts.infrastructures.infra_data', compact('infra'));
    }

    // function view add
    public function add(){
        return view('layouts.infrastructures.infra_add');
    }

    // ===== Logic ===== //

    // function add data
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

        // validate data using validator class
        $validator = Validator::make($data, $rules);

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


    // function view edit
    public function edit(Int $id){
        $find = Infrastructure::where('id', $id)->get();

        if($find->isEmpty()){
            return back()->withError('error', 'Data Tidak Ditemukan, Coba Lagi!');
        }

        return view('layouts.infrastructures.infra_edit', compact('find'));
    }

    // function for Update Data
    public function update(Request $request, Int $id){
        $validation = Validator::make($request->all(), [
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'tahun_pengadaan' => 'required|string',
            'lokasi' => 'required|string',
            'penyedia' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'detail' => 'file|max: 2048',
            'catatan' => 'nullable|string'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        if($request->file('detail')){
            if($request->oldProfile){
                Storage::delete($request->oldProfile);
            }
            $validate['detail'] = $request->file('detail')->store('files');
       }

        $update = Infrastructure::where('id', $id)->update([
            'nama' => $request-> nama,
            'kategori' => $request-> kategori,
            'tahun_pengadaan' => $request-> tahun_pengadaan,
            'lokasi' => $request-> lokasi,
            'penyedia' => $request-> penyedia,
            'latitude' => $request-> latitude,
            'longitude' => $request-> longitude,
            'detail' => $request-> detail,
            'catatan' => $request-> catatan,
        ]);

        if(!$update){
            return back()->with('error', 'Gagal untuk melakukan update data, silahkan coba lagi!');
        }

        return redirect('/infrastructure');
    }
}


