<?php

namespace App\Http\Controllers\Admin\Audits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\UserSessionHistory;
use OwenIt\Auditing\Models\Audit;

class BitacoraController extends Controller
{
    public const DELETE_ACTION = 'deleted';
    public const UPDATE_ACTION = 'updated';

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

    public function restore(Request $request, $id)
    {
        $audit = Bitacora::findOrFail($id);

        // https://stackoverflow.com/questions/34409665/call-laravel-model-by-string
        $model = app($audit->auditable_type);
        $id = $audit->auditable_id;
        $action = $request->action;

        if ($action === self::DELETE_ACTION) {
            $model::withTrashed()->findOrFail($id)->restore();
        } elseif ($action === self::UPDATE_ACTION) {
            return redirect()->route('admin.bitacoras.show.model', $audit->id);
        }
        return redirect()->route('admin.bitacoras.index');
    }

    public function showResourceUpdated($id)
    {
        $audit = Bitacora::findOrFail($id);
        $audit->load('user');

        $model = app($audit->auditable_type);
        $id = $audit->auditable_id;
        $current_model = $model::findOrFail($id);

        return view('admin.audits.bitacoras.transition', compact('audit', 'current_model'));
    }

    public function transitionToCurrentModel(Request $request, $id)
    {
        // este metodo realiza la restauracion con los datos new_values del modelo Audit
        // exactamente linea 66 metodo transitionTo
        $audit = Bitacora::findOrFail($id);
        $model = app($audit->auditable_type);
        $id = $audit->auditable_id;
        $current_model = $model::findOrFail($id);
        $model_changed_with_new_values_from_audit = $current_model->transitionTo($audit);
        $model_changed_with_new_values_from_audit->save();
        return redirect()->route('admin.bitacoras.index');
    }
}
