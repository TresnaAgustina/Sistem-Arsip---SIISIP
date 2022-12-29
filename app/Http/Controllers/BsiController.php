<?php

namespace App\Http\Controllers;

use App\Models\Bsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BsiController extends Controller
{
    // Function View Data Bali Smart Islands
    public function index(){
        // get data from database
        $bsi = DB::table('bsis')
            ->orderBy('id', 'desc')
            ->get();
        // returning view
        return view('layouts.data_bsi.bsi_data', compact('bsi'));
    }

    // function view insert data bsi
    public function add(){
        return view('layouts.data_bsi.bsi_add');
    }

    // function view edit page
    public function edit(Int $id){
        $find = Bsi::where('id', $id)->get();
        return view('layouts.data_bsi.bsi_edit', compact('find'));
    }

    // function for Insert Data
    public function store(Request $request){

        $data = $request->all();

        // validation
        $rules = [
                'kategori' => 'required|string',
                'kabupaten' => 'required|string',
                'kecamatan' => 'required|string',
                'desa' => 'required|string',
                'desa_pekraman' => 'nullable|string',
                'data_lokasi' => 'required|string',
                'media' => 'required|string',
                'layanan' => 'required|string',
                'lokasi'=> 'nullable|string',
                'latitude' => 'nullable|string',
                'longitude' => 'nullable|string',
                'nama_pic' => 'nullable|string',
                'nomor_tlp' => 'nullable|string',
            ];

        // validate data using validator class
        $validator = Validator::make($data, $rules);

        // check if validator is success?
        if ($validator->fails()) {
            // displaying error message
            session()->flash('error', 'Data gagal disimpan, coba lagi!');
            // Redirect with error message
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Store data to database
            Bsi::create($data);
            // displaying success message
            session()->flash('success', 'Data berhasil disimpan!');
            // Redirect to doc data page
            return redirect('/bsi');
        }
    }
        
    // function for Update Data
    public function update(Request $request, Int $id){
        $validation = Validator::make($request->all(), [
            'kategori' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'desa_pekraman' => 'nullable|string',
            'data_lokasi' => 'required|string',
            'media' => 'required|string',
            'layanan' => 'required|string',
            'lokasi'=> 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'nama_pic' => 'nullable|string',
            'nomor_tlp' => 'nullable|string',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
            }

        $update = Bsi::where('id', $id)->update([
            'kategori' => $request-> kategori,
            'kabupaten' => $request-> kabupaten,
            'kecamatan' => $request-> kecamatan,
            'desa' => $request-> desa,
            'desa_pekraman' => $request-> desa_pekraman,
            'data_lokasi' => $request-> data_lokasi,
            'media' => $request-> media,
            'layanan' => $request-> layanan,
            'lokasi'=> $request-> lokasi,
            'latitude' => $request-> latitude,
            'longitude' => $request-> longitude,
            'nama_pic' => $request-> nama_pic,
            'nomor_tlp' => $request-> nomor_tlp,
        ]);

        if(!$update){
            return back()->with('error', 'Gagal untuk melakukan update data, silahkan coba lagi!');
        }

        return redirect('/bsi');
    }

    
    // function for Delete Data
    public function destroy(Int $id){
        $delete = Bsi::where('id', $id)->delete();

        if($delete){
            return redirect('/bsi');
        }else{
            return back()->with('error', 'Failed to delete post');
        }
    }
}
