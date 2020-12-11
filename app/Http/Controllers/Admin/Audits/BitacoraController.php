<?php

namespace App\Http\Controllers\Admin\Audits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use OwenIt\Auditing\Models\Audit;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacora::getAll();
        $model = $bitacoras->first()->formatModelAudit();

        return view('admin.audits.bitacoras.index', ['bitacoras' => $bitacoras]);
    }
}
