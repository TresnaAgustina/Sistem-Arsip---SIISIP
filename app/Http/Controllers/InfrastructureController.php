<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    // function index
    public function index(){
        $infra = Infrastructure::get();

        return view('layouts.infrastructures.infra_data', compact('infra'));
    }

    // function view add
    public function add(){
        return view('layouts.infrastures.infra_add');
    }

    // function view edit
    public function edit(Int $id){
        $find = Infrastructure::where('id', $id)->get();

        if($find->isEmpty()){
            return back()->withError('error', 'Data Tidak Ditemukan, Coba Lagi!');
        }

        return view('layouts.infrastructures.infra_edit');
    }

    // ===== Logic ===== //

    // function add data
    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required|string',
            'tahun_pengadaan' => 'required|date',
            'lokasi' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'detail' => 'required|string',
            'catatan' => 'required|text'
        ]);

        if($request->isEmpty()){
            return back()->with('error', 'Silahkan Masukan Data Dengan Lengkap');
        }else if($validate){
            return;
        }
    }
}
