<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use DB;
use App\Aviso;
use App\Models\Publish;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $avisos = Aviso::orderBy('created_at', 'asc')->take(8)->get();
        // $announcements = Announcement::orderBy('created_at', 'asc')->take(4)->get();
        //return view('home', [ 'announcements' => $announcements, 'avisos' => $avisos ]);
        // return view('auth.login');

        // return redirect('login');
        return view('home');
    }

    // public function login()
    // {
    //     return view('auth.login');
    // }

    // public function register()
    // {
    //     return view('auth.register');
    // }

    // public function resetPassword()
    // {
    //     return view('auth.reset');
    // }

    // public function announcements()
    // {
    //     $announcements = Announcement::orderBy('created_at', 'asc')->get();

    //     return view('announcement', ['announcements' => $announcements]);
    // }

    // public function getAnnouncement(Announcement $announcement)
    // {
    //     $announcement = Announcement::where('id', $announcement->id)
    //         ->with('requirements', 'conditions', 'documents', 'califications.subcalifications', 'ratings.subratings', 'events')
    //         ->first();

    //     return view('showAnnouncement', ['announcement' => $announcement]);
    // }

    // public function publishes()
    // {
    //     $publishes = Announcement::with('publish')->get();

    //     $filtered = $publishes->filter(function ($value, $key) {
    //         return !is_null($value->publish);
    //     });

    //     return view('publishes', ['publishes' => $filtered]);
    // }

    // public function publishDownload(Publish $publish)
    // {
    //     $url = storage_path('app/' . $publish->file);

    //     return response()->download($url);
    // }
}
