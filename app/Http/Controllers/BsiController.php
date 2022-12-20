<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Bsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BsiController extends Controller
{
    // Function View Data Bali Smart Islands
    public function index(){
        // get data from database
        $bsi = DB::table('bsis')->orderBy('id', 'desc')->paginate(15);
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

            $valid = $request->validate([
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

            if($valid){
                $store = Bsi::create($valid);
                if($store){
                    return redirect('/bsi_data');
                }else{
                    return back()->with('error', 'Gagal Menyimpan Data, Silahkan Coba Lagi!');
                }
            }else{
                return back()->with('error', "Terjadi Kesalahan Saat Mencoba Menyimpan Dta, Silahkan Coba Lagi!");
            }
        }
        
    // function for Update Data
    public function update(Request $request, Int $id){
        $validation = $request->validate([
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


        if(!$validation){
            ddd();
        }

        Bsi::where('id', $id)->update();
    }
    // function for Delete Data
    public function destroy(Int $id){
        
    }
}
