<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SuperModel extends Model
{

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }

}