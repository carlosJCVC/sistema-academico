<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Models\Document;
use App\Http\Requests\DocumentRequest;

class DocumentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Announcement $announcement)
    {
        return view('admin.announcements.documents.create', [ 'announcement' => $announcement ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request, Announcement $announcement)
    {
        $input = $request->all();
        $input['announcement_id'] = $announcement->id;

        $document = new Document($input);
        $document->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Documento creado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Document $document)
    {
        return View('admin.announcements.documents.edit', [ 'announcement' => $announcement, 'document' => $document ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, Announcement $announcement, Document $document)
    {
        $input = $request->all();

        $document->update($input);
        $document->save();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Documento actuaizado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Document $document)
    {
        $document->delete();

        return redirect(route('admin.data.index', $announcement->id))->with([ 'message' => 'Documento eliminado exitosamente!', 'alert-type' => 'error' ]);
    }
}
