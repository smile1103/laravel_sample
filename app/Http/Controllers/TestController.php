<?php

namespace App\Http\Controllers;

use App\Events\RegistrationCompleted;
use App\Exceptions\EmailNotProvidedException;
use App\Utilities\SomethingNew;
use Illuminate\Http\Request;
use App\Widget;
use App\User;
use Facades\App\Utilities\RocketShip;

class TestController extends Controller
{

    public function __construct()
    {



    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       // $user = User::findOrFail(1);

        return RocketShip::blastOff();

        //$result = Widget::findOrFail(39);
        //throw new EmailNotProvidedException('facebook');
        //$Beatles = ['John', 'Paul', 'George', 'Ringo'];

       // alert()->overlay('Problem', 'Cannot hear','error');

        //return view('test.index', compact('Beatles'));

        //return view('test.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
