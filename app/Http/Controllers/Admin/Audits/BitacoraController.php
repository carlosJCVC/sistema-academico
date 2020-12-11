<?php

namespace App\Http\Controllers\Admin\Audits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\UserSessionHistory;
use OwenIt\Auditing\Models\Audit;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacora::getAll();

        return view('admin.audits.bitacoras.index', ['bitacoras' => $bitacoras]);
    }

    public function usersHistorylist()
    {
        $sessions = UserSessionHistory::getAll();
        return view('admin.audits.sessions.index', ['sessions' => $sessions]);
    }
}
