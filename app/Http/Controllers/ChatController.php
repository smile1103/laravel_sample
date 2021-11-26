<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePosted;
use App\Message;

class ChatController extends Controller
{

    public function index()
    {


        return view('chat.index');



    }

    public function getMessages(Request $request)
    {

        if ( ! $request->ajax()) {

            throw new UnauthorizedException();

        }

        $messages = Message::with('user')->MostRecent()->get();

        $messages = array_reverse($messages->toArray());

        return $messages;



    }

    public function postMessage(Request $request)
    {

        if ( ! $request->ajax()) {

            throw new UnauthorizedException();

        }


        $user = Auth::user();


        $message = $user->messages()->create([

            'message' => request()->get('message')
        ]);

        broadcast(new MessagePosted($message, $user))->toOthers();

        return ['status' => 'OK'];


    }
}
