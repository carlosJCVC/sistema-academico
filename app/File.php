<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    const DIRECTORY = 'announcements';
    const PATH_STORE = self::DIRECTORY;

    protected $fillable = ['name', 'path', 'realname', 'checked'];

    /**
     * Get the user that owns the file.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param $userId
     * @return string
     */
    public static function GeneratePathStore($announcementId, $userId)
    {
        return self::PATH_STORE.'/'.$announcementId.'/'.$userId;
    }
}
