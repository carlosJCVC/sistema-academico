<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\Area;
use App\Http\Requests\AnnouncementRequest;
use Carbon\Carbon;
use Cassandra\Date;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Http\Requests\AvisoRequest;
use App\Models\Publish;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        //$announcements = $user->announcements;

        //if ($user->hasRole(['Admin', 'Calificador']))
        $announcements = Announcement::all();

        return view('admin.announcements.index', [ 'announcements' => $announcements ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academics = DB::table('academics')->get();
        $items = DB::table('items')->get();

        if ($academics->isEmpty())
            return redirect(route('admin.academics.index'))->with([ 'message' => 'Para crear convocatoria debe tener areas disponibles!', 'alert-type' => 'info' ]);

        return view('admin.announcements.create', [ 'academics' => $academics, 'items' => $items ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $announcements = DB::table('areas')->get();
        if ($announcements->isEmpty())
            return redirect(route('admin.areas.index'))->with([ 'message' => 'Para crear convocatoria debe tener areas disponibles!', 'alert-type' => 'info' ]);

        $announcement = new Announcement($request->all());
        $announcement->gestion = $request->gestion;
        $announcement->academic_id = $request->academic;
        $announcement->item_id = $request->item_id;
        $announcement->start_date_announcement = new Carbon($request->start_date_announcement);
        $announcement->end_date_announcement = new Carbon($request->end_date_announcement);
        $announcement->start_date_calification = new Carbon($request->start_date_calification);
        $announcement->end_date_calification = new Carbon($request->end_date_calification);
        $announcement->code = Str::random(6);

        $announcement->save();

        // $areas = Area::find($request->areas);

        // $announcement->areas()->attach($areas);

        return redirect(route('admin.announcements.index'))->with([ 'message' => 'Convocatoria creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Display the specified code.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Announcement $announcement)
    {
        if ($request->ajax()) {
            return response()->json($announcement);
        }

        return view('admin.announcements.show', [ 'announcement' => $announcement ]);
    }

    /**
     * Compare the specified code.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function compare(Request $request, Announcement $announcement)
    {
        if (!$request->code || !$announcement->exists()){
            return response()->json([ 'message' => 'Error de datos enviados' ]);
            //return redirect(route('home.announcements'))->with([ 'message' => 'Error!', 'alert-type' => 'info' ]);
        }

        if ($request->code != $announcement->code) {
            return response()->json([ 'error' => 'El codigo no coincide', 'code' => 400 ]);
            //return redirect(route('home.announcements'))->with([ 'message' => 'Codigo incorrecto!', 'alert-type' => 'info' ]);
        }

        $user = Auth::user();

        $announcement->postulants()->attach($user);

        return response()->json([ 'code' => 200, 'announcement' => $announcement]);

        //return redirect(route('admin.announcements.index'))->with([ 'message' => 'Bienvenido a esta convocatoria!', 'alert-type' => 'info' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);

        $academics = DB::table('academics')->get();

        $items = DB::table('items')->get();

        if ($academics->isEmpty())
            return redirect(route('admin.academics.index'))->with([ 'message' => 'Para crear convocatoria debe tener areas disponibles!', 'alert-type' => 'info' ]);

        return view('admin.announcements.edit', [ 'announcement' => $announcement ,'academics' => $academics, 'items' => $items ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, $id)
    {
        $input = $request->all();

        $announcement = Announcement::find($id);

        $input['gestion'] = $request->gestion;
        $input['academic_id'] = $request->academic;

        $input['start_date_announcement'] = new Carbon($request->start_date_announcement);
        $input['end_date_announcement'] = new Carbon($request->end_date_announcement);
        $input['start_date_calification'] = new Carbon($request->start_date_calification);
        $input['end_date_calification'] = new Carbon($request->end_date_calification);

        $announcement->update($input);
        $announcement->save();

        // $announcement->areas()->detach();

        // $areas = Area::find($request->areas);

        // $announcement->areas()->attach($areas);

        return redirect(route('admin.announcements.index'))->with([ 'message' => 'Convocatoria actualizado exitosamente!', 'alert-type' => 'info' ]);
    }

    /**
     * Update the specified code in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCode(Request $request, Announcement $announcement)
    {
        $announcement->code = $request->code;
        $announcement->save();

        return response()->json($announcement);
    }

    /**
     * view the specified requirements in announcement.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function requirement(Announcement $announcement)
    {
        return view('admin.announcements.requirements.requirement_postulant',
            [ 'announcement' => $announcement ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with(['message' => 'Convocatoria eliminado exitosamente!', 'alert-type' => 'error']);
    }


    public function data(Announcement $announcement) 
    {
        $requirements = DB::table('requirements')->where('announcement_id', $announcement->id)->get();
        $conditions = DB::table('conditions')->where('announcement_id', $announcement->id)->get();
        $documents = DB::table('documents')->where('announcement_id', $announcement->id)->get();
        $events = DB::table('events')->where('announcement_id', $announcement->id)->get();
        $califications = DB::table('califications')->where('announcement_id', $announcement->id)->get();
        $ratings = DB::table('knowledge_ratings')->where('announcement_id', $announcement->id)->get();

        $data = [
            'announcement' => $announcement,
            'requirements' => $requirements,
            'conditions' => $conditions,
            'documents' => $documents,
            'events' => $events,
            'califications' => $califications,
            'ratings' => $ratings
        ];

        return view('admin.announcements.data', $data);
    }

    public function publish(Announcement $announcement)
    {
        return view('admin.announcements.publish', [ 'announcement' => $announcement ]);
    }

    public function publishStore(AvisoRequest $request, Announcement $announcement)
    {
        $input = $request->all();

        $path = $request->file('file')->store('publishes');

        $input['file'] = $path;
        $input['announcement_id'] = $announcement->id;

        $publish = new Publish($input);
        $publish->save();

        return redirect(route('admin.announcements.index'))
            ->with([ 
                'message' => 'Notas publicadas con exito!', 
                'alert-type' => 'success' 
            ]);
    }
}
