<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function show(Announcement $announcement)
    {
        return view('announcements.show', [ 'announcement' => $announcement ]);
    }
}
