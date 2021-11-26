<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =['user_id',
                          'first_name',
                          'last_name',
                          'birthdate',
                          'gender'];


    protected $dates = [ 'birthdate'];



    public function showGender($gender)
    {

        return $gender == 1 ? 'Male' : 'Female';

    }

    public function fullName()
    {

        return $this->first_name . ' ' . $this->last_name;

    }

    public function user()
    {

        return $this->belongsTo('App\User');

    }

}
