<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'user_id'];

    public function scopeMostRecent($query)
    {
        return $query->orderBy('created_at', 'desc')->limit(10);
    }


    public function user()
    {

        return $this->belongsTo(User::class);

    }

}
