<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aviso extends Model
{
    const DIRECTORY = 'avisos';
    const PATH_STORE = self::DIRECTORY;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'file',
    ];

    public function readHumansDate() {
        $date = new Carbon($this->created_at);
        return $date->diffForHumans();
    }
}
