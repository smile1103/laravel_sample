<?php

namespace App\Http\AuthTraits\Social;

use App\User;
use App\SocialProvider;
use App\Exceptions\EmailAlreadyInSystemException;
use App\Exceptions\CredentialsDoNotMatchException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\TransactionFailedException;

trait FindsOrCreatesUsers
{
    /**
     * Return user if exists; create and return if not
     *
     * @param $facebookUser
     * @return User
     */

    private function findOrCreateUser($socialUser)
    {

        // is email already in table?

        if ( $authUser = $this->userWhereEmailMatches($socialUser)){

            //  scenario where email is already in table
            // is the provider source correct and does the social id match?
            // if there is a match, return $authUser, if not throw exception

            if ( ! $this->matchesIds($socialUser, $authUser)) {

                // exception instructs user to login first, then sync
                // covers scenario where there are matching emails, but no matching id
                //  or where there is existing social id and it doesn't match

                throw new EmailAlreadyInSystemException;

            }

            // if email and id matches, return the $authUser

            return $authUser;
        }

        // scenario where no matching email, but social id already exists

        if ($this->socialIdAlreadyExists($socialUser)){

            throw new CredentialsDoNotMatchException;

        }

        // if no user matching social exists, we create one

        $authUser = $this->makeNewUser($socialUser);

        return $authUser;

    }

    private function makeNewUser($socialUser)
    {

        //create user if not already exists and email does not already exist.

        $password = $this->makePassword();

        DB::beginTransaction();

        try{

            $authUser = User::create([
                'name' => $this->userName,
                'email' => $socialUser->email,
                'password' => $password,
                'status_id' => 10,
            ]);

            SocialProvider::create([
                'user_id' => $authUser->id,
                'source'  => $this->provider,
                'source_id' => $socialUser->id,
                'avatar' => $socialUser->avatar,
            ]);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();

            throw new TransactionFailedException();

        }

        return $authUser;

    }

    /**
     * @return string
     */

    private function makePassword()
    {

        $passwordParts = rand() . str_random(12);
        $password = bcrypt($passwordParts);

        return $password;

    }
}