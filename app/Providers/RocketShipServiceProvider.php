<?php

namespace App\Providers;

use App\Utilities\RocketShip;
use Illuminate\Support\ServiceProvider;
use App\Utilities\Oxygen;
use App\Utilities\FuelTank;

class RocketShipServiceProvider extends ServiceProvider
{

    protected $defer = true;

    protected $aliases = [
        'Rocket' => 'App\Utilities\Contracts\RocketShipContract'
    ];


    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app
             ->bind('App\Utilities\Contracts\RocketShipContract',
                    function(){

                 return new RocketShip(new FuelTank(), new Oxygen());


                    });
    }


}
