<?php

namespace App\Http\AuthTraits\Social;

trait SetsAuthUser
{
    /**
     * @param $socialUser
     * @return User
     * @throws \App\Exceptions\CredentialsDoNotMatchException
     * @throws \App\Exceptions\EmailAlreadyInSystemException
     */

    private function setAuthUser($socialUser)
    {
        $authUser = $this->findOrCreateUser($socialUser);

        return $authUser;

    }

    private function setSocialUserName($socialUser)
    {

        switch ($this->provider) {

            case 'github' :

                is_null($socialUser->name) ? $this->userName = $socialUser->nickname :

                $this->userName = $socialUser->name;

                break;

            case 'facebook' :

                $this->userName = $socialUser->name;

                break;

            default :

                is_null($socialUser->name) ? $this->userName = $this->createUserName() :

                $this->userName = $socialUser->name;

                break;


        }

    }

    private function createUserName()
    {

        return  str_random(15);

    }
}