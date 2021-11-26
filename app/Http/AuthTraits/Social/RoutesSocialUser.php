<?php

namespace App\Http\AuthTraits\Social;

use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\ConnectionNotAcceptedException;

trait RoutesSocialUser
{
    /**
     * @param $authUser
     */

    private function loginAuthUser($authUser)
    {

        Auth::login($authUser, true);

    }

    private function logoutIfUserNotActiveStatus()
    {

        return $this->checkStatusLevel();

    }

    public function redirectToProvider($provider)
    {

        return Socialite::driver($provider)->redirect();

        //->scopes(['public_profile', 'email'])->redirect();

    }

    private function redirectUser()
    {

        if (Auth::user()->isAdmin()){

            return redirect()->route('admin');

        }

        return redirect()->route('home');
    }

    private function getUserFromSocialite($provider)
    {

        try {

            $socialUser = Socialite::driver('facebook')->user();

        }

        catch (\Exception $e) {

            throw new ConnectionNotAcceptedException();

        }

            return $socialUser;

    }
}