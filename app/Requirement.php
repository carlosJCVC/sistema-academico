<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Requirement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title', 'description', 'announcement_id', 'required', 'quantity', 'hours', 'destine' ];

    /**
     * Get the file record associated with the requirement.
     */
    public function file()
    {
        return $this->hasOne('App\File');
    }

    public function requirementFile()
    {
        $user = Auth::user();

        return File::where('user_id', $user->id)->where('requirement_id', $this->id)->first();
    }

    /**
     * Get the file record associated with the requirement and user.
     */
    public function requirementFileUser($user)
    {
        return File::where('user_id', $user->id)->where('requirement_id', $this->id)->first();
    }
}
