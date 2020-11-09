<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\File;
use App\Http\Requests\FileRequest;
use App\Http\Requests\RequerimentRequest;
use App\Requirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Announcement $announcement)
    {
        $requirements = $announcement->requirements;

        return view('admin.announcements.requirements.index', [ 'requirements' => $requirements, 'announcement' => $announcement ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Announcement $announcement)
    {
        return view('admin.announcements.requirements.create', [ 'announcement' => $announcement ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequerimentRequest $request, Announcement $announcement)
    {
        $input = $request->all();
        $input['announcement_id'] = $announcement->id;

        $requirement = new Requirement($input);
        $requirement->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Requisito creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Requirement $requirement)
    {
        return View('admin.announcements.requirements.edit', [ 'announcement' => $announcement, 'requirement' => $requirement ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequerimentRequest $request, Announcement $announcement, Requirement $requirement)
    {
        $input = $request->all();

        $requirement->update($input);
        $requirement->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Requisito actuaizado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Requirement $requirement)
    {
        $requirement->delete();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Requisito eliminado exitosamente!', 'alert-type' => 'error' ]);
    }
}
