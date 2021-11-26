<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UnauthorizedException;

class UsernameController extends Controller
{
    public function show()
    {

        if (! request()->ajax()){

            throw new UnauthorizedException();

        }

        return Auth::user()->name;


    }
}
