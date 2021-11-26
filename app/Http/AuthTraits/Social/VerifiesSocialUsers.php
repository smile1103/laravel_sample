<?php

namespace App\Http\AuthTraits\Social;

use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Auth;
use App\SocialProvider;
use App\User;

trait VerifiesSocialUsers
{
    private function authUserEmailMatches($socialUser)
    {

        return $socialUser->email == Auth::user()->email;

    }

    /**
     * @param $facebookUser
     * @return mixed
     */

    private function socialIdAlreadyExists($socialUser)
    {

        return SocialProvider::where('source_id', '=', $socialUser->id)->exists();

    }

    /**
     * @return mixed
     */

    private function socialUserAlreadyLoggedIn()
    {

        return Auth::check();

    }

    private function socialUserHasNoEmail($socialUserEmail)
    {

        return $socialUserEmail == null;

    }

    private function verifyProvider($provider)
    {

        if ( ! in_array($provider, $this->approvedProviders)){

            throw new UnauthorizedException();

        }

    }

    /**
     * @param $socialUser
     * @return bool
     */

    private function verifyUserIds($socialUser)
    {
        return (SocialProvider::where('source_id', $socialUser->id)
            ->where('user_id', Auth::id())
            ->where('source', $this->provider)
            ->exists()) ? true : false;

    }

    /**
     * @param $socialUser
     * @return mixed
     */

    private function userWhereEmailMatches($socialUser)
    {

        return User::where('email', $socialUser->email)->first();

    }

    /**
     * @param $socialUser
     * @param $authUser
     * @return mixed
     */

    private function matchesIds($socialUser, User $authUser)
    {

        return $authUser->socialProviders()->where('source', $this->provider)
            ->where('source_id', $socialUser->id)
            ->first();

    }
}