<?php

namespace App\Http\Controllers;

use App\Models\Bsi;
use App\Models\Document;
use App\Http\Controllers\Controller;
use App\Models\Infrastructure;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    // root page
    public function index(){
        // count document
        $doc_count = Document::count();
        // count bsi
        $bsi_count = Bsi::count();
        // count cctv
        $cctv_count = Infrastructure::where('kategori','=', 'cctv')->count();
        $vidtron_count = Infrastructure::where('kategori','=', 'videotron')->count();
        $intranet_count = Infrastructure::where('kategori','=', 'intranet')->count();
        $server_count = Infrastructure::where('kategori','=', 'server')->count();

        if(Auth::check()){
            // $getBsi = Bsi::get();
            // $countBsi = count($getBsi);
            return view('layouts.Index', compact('doc_count', 'bsi_count', 'cctv_count', 'vidtron_count', 'intranet_count', 'server_count'));
        }else{
            return view('auth.Login');
        }
    }

    // login page
    public function login(){
        return view('auth.Login');
    }

    // view register
    public function register(){
        return view('auth.Register');
    }
}
