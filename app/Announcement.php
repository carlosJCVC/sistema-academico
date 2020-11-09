<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Announcement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'code',
        'academic_id',
        'start_date_announcement',
        'end_date_announcement',
        'start_date_calification',
        'end_date_calification'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function academic()
    {
        return $this->hasOne('App\Models\Academic');
    }

    /**
     * Get the requirements for the announcement.
     */
    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }

    /**
     * Get the conditions for the announcement.
     */
    public function conditions()
    {
        return $this->hasMany('App\Models\Condition');
    }

    /**
     * Get the documents for the announcement.
     */
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }

    /**
     * Get the califications for the announcement.
     */
    public function califications()
    {
        return $this->hasMany('App\Models\Calification');
    }

    /**
     * Get the ratings for the announcement.
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    /**
     * Get the events for the announcement.
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    /**
     * Get the publish for the announcement.
     */
    public function publish()
    {
        return $this->hasOne('App\Models\Publish');
    }

    /**
     * Get the requirements required.
     */
    public function requiredRequirements()
    {
        $announcement = $this;

        return Requirement::where('announcement_id', $announcement->id)->where('required', 1)->get();
    }

    /**
     * Get the requirements general.
     */
    public function generalRequirements()
    {
        $announcement = $this;

        return Requirement::where('announcement_id', $announcement->id)->where('required', 0)->get();
    }

    /**
     * The users that belong to the announcement.
     */
    public function postulants()
    {
        return $this->belongsToMany('App\Postulant', 'announcement_user', 'announcement_id', 'user_id');
    }

    public function getHour()
    {
        $date = strtotime($this->end_date_announcement);

        return date('H:m:s', $date);
    }

}
