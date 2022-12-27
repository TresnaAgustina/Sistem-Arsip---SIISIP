<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfrastructureController extends Controller
{
    // function index
    public function index(){
        $infra = Infrastructure::get();

        return view('layouts.infrastructures.infra_data', compact('infra'));
    }

    // function view add
    public function add(){
        return view('layouts.infrastructures.infra_add');
    }

    // ===== Logic ===== //

    // function add data
    public function store(Request $request){

        $validate = $request->validate([
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

        if($request->hasFile('detail')){
            // $request->file('detail')->store('files');  
            $validate['detail'] = $request->file('detail')->store('files');
        }else{
            $path = '';
        }

        $store = Infrastructure::create($validate);

        if(!$store){
            return back()->with('error', 'Gagal menambahkan data!');
        }
        
        return redirect('/infrastructure');
    }


    // function view edit
    public function edit(Int $id){
        $find = Infrastructure::where('id', $id)->get();

        if($find->isEmpty()){
            return back()->withError('error', 'Data Tidak Ditemukan, Coba Lagi!');
        }

        return view('layouts.infrastructures.infra_edit', compact('find'));
    }
}
