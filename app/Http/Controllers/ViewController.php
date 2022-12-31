<?php

namespace App\Http\Controllers;

use App\Models\Bsi;
use App\Models\Document;
use App\Models\Infrastructure;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    // root page
    public function index(){
        // count document, Bsi, Cctv, Videotron, intranet, and server datas
        $doc_count = Document::count();
        $bsi_count = Bsi::count();
        $cctv_count = Infrastructure::where('kategori','=', 'cctv')->count();
        $vidtron_count = Infrastructure::where('kategori','=', 'videotron')->count();
        $intranet_count = Infrastructure::where('kategori','=', 'intranet')->count();
        $server_count = Infrastructure::where('kategori','=', 'server')->count();

        // get upload time from each table
        $doc = Document::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                    ->groupBy('date')
                    ->get();
        $bsi = Bsi::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                    ->groupBy('date')
                    ->get();
        $infra = Infrastructure::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                    ->groupBy('date')
                    ->get();
        // set labels and vlaue for pie chart
        $data = [
            'labels' => [
                'Dokomen',
                'Bsi',
                'Cctv',
                'Videotron',
                'Intranet',
                'Server',
            ],
            'values' => [
                $doc_count,
                $bsi_count,
                $cctv_count,
                $vidtron_count,
                $intranet_count,
                $server_count
            ],
        ];

        // Check, is the user authenticated?
        if(Auth::check()){
            // if true, redirect to dashboard and pass data to view
            return view('layouts.Index', compact('doc_count', 'bsi_count', 'cctv_count', 'vidtron_count', 
                        'intranet_count', 'server_count', 'data', 'doc', 'bsi', 'infra'));
        }else{
            // if false, return to login page
            return view('auth.Login');
        }
    }

    // login page
    public function login(){
        return view('auth.Login');
    }
}
