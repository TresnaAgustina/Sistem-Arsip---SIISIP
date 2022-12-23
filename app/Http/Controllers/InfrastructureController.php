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

    // function view edit
    public function edit(Int $id){
        $find = Infrastructure::where('id', $id)->get();

        if($find->isEmpty()){
            return back()->withError('error', 'Data Tidak Ditemukan, Coba Lagi!');
        }

        return view('layouts.infrastructures.infra_edit', compact('find'));
    }

    // ===== Logic ===== //

    // function add data
    public function store(Request $request){

        $validate = $request->validate([
            'nama' => 'required|string',
            'tahun_pengadaan' => 'required|date',
            'lokasi' => 'required|string',
            'penyedia' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'detail' => 'nullable|mimes: pdf,png,jpg,jpeg|max: 2048',
            'catatan' => 'nullable|string'
        ]);

        ddd();

        if($request->hasFile('detail')){
            $validate['detail'] = $request->file('detail')->store('file');
        }else{
            $path = '';
        }

        if($request->isEmpty()){
            return back()->with('error', 'Silahkan Masukan Data Dengan Lengkap');
        }

        // ddd();

        Infrastructure::create($validate);
    }
}
