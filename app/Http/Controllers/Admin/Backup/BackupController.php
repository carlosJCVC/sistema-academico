<?php

namespace App\Http\Controllers\Admin\Backup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;

// https://gist.github.com/kikoseijo/d4ec87a121cba7bcb6231bfa046be291

class BackupController extends Controller
{
    public function index()
    {
        if (!count(config('laravel-backup.backup.destination.disks'))) {
            dd(trans('backpack::backup.no_disks_configured'));
        }

        $this->data['backups'] = [];

        foreach (config('laravel-backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();

            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                    $this->data['backups'][] = [
                        'file_path'     => $f,
                        'file_name'     => str_replace('backups/', '', $f),
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                        'download'      => ($adapter instanceof Local) ? true : false,
                    ];
                }
            }
        }

        // reverse the backups, so the newest one would be on top
        $this->data['backups'] = array_reverse($this->data['backups']);
        $this->data['title'] = 'Backups';

        // dd($this->data);
        // return view('backupmanager::backup', $this->data);
        return view('admin.backups.index', $this->data);
    }

    public function create()
    {
        try {
            ini_set('max_execution_time', 300);
            // start the backup process
            // Artisan::call('backup:run');
            // $output = Artisan::output();
            Artisan::call('backup:run', ['--only-db' => 'true']);
            $output = Artisan::output();

            // log the results
            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
            // return the results as a response to the ajax call
            echo $output;
        } catch (\Exception $e) {
            Response::make($e->getMessage(), 500);
        }

        return 'success';
    }

    /**
     * Downloads a backup zip file.
     */
    public function download()
    {
        $disk = Storage::disk(request()->get('disk'));
        $file_name = request()->get('file_name');
        $adapter = $disk->getDriver()->getAdapter();

        if ($adapter instanceof Local) {
            $storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();

            if ($disk->exists($file_name)) {
                return response()->download($storage_path . $file_name);
            } else {
                abort(404, 'La copia de seguridad no existe.');
            }
        } else {
            abort(404, 'Solo se permiten descargas del sistema de archivos local.');
        }
    }

    /**
     * Deletes a backup file.
     */
    public function delete($file_name)
    {
        $disk = Storage::disk(request()->get('disk'));

        if ($disk->exists($file_name)) {
            $disk->delete($file_name);

            return 'success';
        } else {
            abort(404, 'La copia de seguridad no existe.');
        }
    }
}
