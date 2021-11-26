<?php

namespace App\Http\AuthTraits\Social;

use App\Exceptions\EmailNotProvidedException;
use Redirect;
use Socialite;
use Illuminate\Support\Facades\Request;

trait ManagesSocialAuth
{
    // the traits contain the methods needed for the handleProviderCallback

    use FindsOrCreatesUsers,
        RoutesSocialUser,
        SetsAuthUser,
        SyncsSocialUsers,
        VerifiesSocialUsers;

    private $userName;

    private $provider;

    private $approvedProviders = [ 'facebook', 'github'];

    public function handleProviderCallback($provider)
    {

        $this->verifyProvider($this->provider = $provider);



        $socialUser = $this->getUserFromSocialite($provider);


        $providerEmail = $socialUser->getEmail();

        if ($this->socialUserHasNoEmail($providerEmail)) {

            throw new EmailNotProvidedException;

        }

        $this->setSocialUserName($socialUser);

        if ($this->socialUserAlreadyLoggedIn()) {

            $this->checkIfAccountSyncedOrSync($socialUser);

        }

        // set authUser from socialUser

        $authUser = $this->setAuthUser($socialUser);

        $this->loginAuthUser($authUser);

        $this->logoutIfUserNotActiveStatus();

        return $this->redirectUser();

    }
}