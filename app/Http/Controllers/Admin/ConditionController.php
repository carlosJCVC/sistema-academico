<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Models\Condition;
use App\Http\Requests\ConditionRequest;

class ConditionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Announcement $announcement)
    {
        return view('admin.announcements.conditions.create', [ 'announcement' => $announcement ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConditionRequest $request, Announcement $announcement)
    {
        $input = $request->all();
        $input['announcement_id'] = $announcement->id;

        $condition = new Condition($input);
        $condition->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Condicion creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Condition $condition)
    {
        return View('admin.announcements.conditions.edit', [ 'announcement' => $announcement, 'condition' => $condition ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConditionRequest $request, Announcement $announcement, Condition $condition)
    {
        $input = $request->all();

        $condition->update($input);
        $condition->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'requisito actuaizado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Condition $condition)
    {
        $condition->delete();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Requisito eliminado exitosamente!', 'alert-type' => 'error' ]);
    }
}
