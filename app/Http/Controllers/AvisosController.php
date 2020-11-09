<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Aviso;
use Response;
use Illuminate\Support\Facades\Storage;

class AvisosController extends Controller
{
    public function index()
    {
        $avisos = DB::table('avisos')->get();

        return view('avisos', [ 'avisos' => $avisos ]);
    }

    public function download(Aviso $aviso)
    {
        $url = storage_path('app/' . $aviso->file);

        return response()->download($url);;
    }
}
