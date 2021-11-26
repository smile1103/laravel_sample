<?php

namespace App\Http\AuthTraits\Social;

use App\Exceptions\AlreadySyncedException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\SocialProvider;
use App\Exceptions\CredentialsDoNotMatchException;

trait SyncsSocialUsers
{
    /**
     * @param $facebookUser
     * @return mixed
     */

    private function accountSynced($socialUser)
    {
        if ($this->authUserEmailMatches($socialUser)){

            return $this->verifyUserIds($socialUser);

        }

        return false;

    }

    private function checkIfAccountSyncedOrSync($socialUser)
    {
        //if you are logged in and accountSynced is true, you are already synced

        if ($this->accountSynced($socialUser)){

            throw new AlreadySyncedException;

        } else {

            // check for email match

            if ( ! $this->authUserEmailMatches($socialUser)) {

                throw new CredentialsDoNotMatchException;

            }

            // if emails match, then sync accounts

            $this->syncUserAccountWithSocialData($socialUser);

            alert()->success('Confirmed!', 'You are now synced...');

            return $this->redirectUser();

        }
    }

    private function syncUserAccountWithSocialData($socialUser)
    {
        // one last check to see if the social id already exists

        if ($this->socialIdAlreadyExists($socialUser)){

            throw new CredentialsDoNotMatchException;

        }
        // lookup user id and update create provider record

        SocialProvider::create([
            'user_id' => Auth::user()->id,
            'source'  => $this->provider,
            'source_id'  => $socialUser->id,
            'avatar'  => $socialUser->avatar
        ]);

    }
}