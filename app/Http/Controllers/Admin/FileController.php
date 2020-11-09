<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\File;
use App\Requirement;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Get file
     */
    public function getRequirementFile(Announcement $announcement, Requirement $requirement)
    {
        $file = File::where('user_id', Auth::user()->id)
            ->where('requirement_id', $requirement->id)->first();

        if (!isset($file))
            return response()->json(['code' => 404, 'message' => 'no existe el registro']);

        return response()->json($file);
    }

    /**
     * Upload the specified file of user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, Announcement $announcement, Requirement $requirement)
    {
        $inputFile = $request->file('file');
        $user = Auth::user();
        $file = new File();
        $file->realname = $inputFile->getClientOriginalName();
        $file->checked = 0;
        $file->path = $inputFile->store(
            File::GeneratePathStore($announcement->id, $user->id),'public'
        );

//        Storage::disk('public')->put(File::GeneratePathStore($announcement->id, $user->id), $file_content)

        $file->user_id = $user->id;
        $file->requirement_id = $requirement->id;

        $file->save();

        return redirect(route('admin.requirements.files', $announcement->id))->with([ 'message' => 'Archivo subido exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Delete the specified file of user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRequirementFile(Request $request, Announcement $announcement, Requirement $requirement)
    {
        $file = File::where('user_id', Auth::user()->id)
            ->where('requirement_id', $requirement->id)->first();

        if (!isset($file))
            return response()->json(['code' => 404, 'message' => 'no existe el registro']);

        //Storage::deleteDirectory($directory);
        Storage::delete($file->path);
        $file->delete();

        return response()->json(['code' => 200, 'message' => 'delete successfully']);
    }
}