<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\File;
use App\Requirement;
use App\User;
use App\Postulant;
use App\Models\Calification;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Auth;

class PostulantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Announcement $announcement)
    {
        $postulants = $announcement->postulants;
        
        if ($request->ajax()) {
            $postulants = $announcement->postulants;

            if ($request->filter != -1) {
                $postulants = $postulants->filter(function ($value, $key) use ($request) {
                    return $value->status == $request->filter;
                });
            }

            return Datatables::of($postulants)
            ->addColumn('actions', function($postulant) use ($announcement) {
                $buttons = '';
                if (Auth::user()->hasRole(['Admin', 'Comisión méritos'])) {
                    $buttons .= '<a class="btn btn-success btn-sm mr-2" href="'.route('admin.postulants.edit', [ 'announcement' => $announcement->id, 'postulant' => $postulant->id]).'"><i class="icon-eye"></i></a>';
                }

                $buttons .= '<a class="btn btn-primary btn-sm" href="'.route('admin.postulants.calificate', [ 'announcement' => $announcement->id, 'postulant' => $postulant->id]).'"><i class="icon-check"></i></a>';

                return $buttons;
            })
            ->editColumn('status', function($postulant){
                $html = '';

                if ($postulant->status == 'HABILITADO') {
                    $html .= '<span class="badge badge-success">HABILITADO</span>';
                } else {
                    $html .= '<span class="badge badge-danger">INHABILIDATDO</span>';
                }

                return $html;
            })
            ->editColumn('meritos', function($postulant) use ($announcement) {
                $html = '';
                
                if ($postulant->status == 'HABILITADO') {
                    $html .= $postulant->scoreCalifications($announcement);
                } else {
                    $html .= '<span class="badge badge-danger">SIN NOTA</span>';
                }

                return $html;
            })
            ->editColumn('conocimientos', function($postulant) use ($announcement) {
                $html = '';
                
                if ($postulant->status == 'HABILITADO') {
                    $html .= $postulant->scoreRatings($announcement);
                } else {
                    $html .= '<span class="badge badge-danger">SIN NOTA</span>';
                }

                return $html;
            })
            ->editColumn('total', function($postulant) use ($announcement) {
                $html = '';
                
                if ($postulant->status == 'HABILITADO') {
                    $x = $postulant->scoreCalifications($announcement)*0.20;
                    $y = $postulant->scoreRatings($announcement)*0.80;

                    $html .= $x+$y;
                } else {
                    $html .= '<span class="badge badge-danger">SIN NOTA</span>';
                }

                return $html;
            })
            ->rawColumns(['status', 'meritos', 'conocimientos', 'total',  'actions'])
            ->make(true);
        }

        return View('admin.postulants.index', [ 'announcement' => $announcement, 'postulants' => $postulants ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement, User $postulant)
    {
        return View('admin.postulants.show', [ 'announcement' => $announcement, 'postulant' => $postulant ]);
    }

    /**
     * Checked file requirement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checked(Announcement $announcement, User $postulant, Requirement $requirement)
    {
        $file = File::where('user_id', $postulant->id)
            ->where('requirement_id', $requirement->id)->first();

        if (!isset($file))
            return response()->json(['code' => 404, 'message' => 'no existe el registro']);

        if ($file->checked)
            $file->checked = 0;
        else
            $file->checked = 1;

        $file->save();

        return response()->json(['code' => 200, 'message' => 'Archivo Validado', 'data' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Postulant $postulant)
    {
        return view('admin.postulants.edit', [ 'announcement' => $announcement, 'postulant' => $postulant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement, Postulant $postulant)
    {
        $postulant->observations = $request->observations;

        if ($postulant->status == 'HABILITADO') {
            $postulant->status = 'INHABILITADO';
        } else {
            $postulant->status = 'HABILITADO';
        }

        $postulant->save();

        return redirect(route('admin.postulants.index', ['announcement' => $announcement->id, 'postulant' => $postulant->id]))->with([ 'message' => 'Usuario Inhabilitado exitosamente!', 'alert-type' => 'error' ]);
    }

    public function calificate(Announcement $announcement, Postulant $postulant)
    {
        $califications = Calification::with('subcalifications')
            ->where('announcement_id', $announcement->id)
            ->get();

        $ratings = Rating::with('subratings')
            ->where('announcement_id', $announcement->id)
            ->get();

        $scoresCalifications = $postulant->scoreCalifications($announcement);

        $scoresRatings = $postulant->scoreRatings($announcement);

        $data = [
            'announcement' => $announcement,
            'postulant' => $postulant,
            'califications' => $califications,
            'ratings' => $ratings,
            'scoresCalifications' => $scoresCalifications,
            'scoresRatings' => $scoresRatings
        ];

        return view('admin.postulants.calificate', $data);
    }
}
