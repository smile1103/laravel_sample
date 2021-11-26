<?php

namespace App\Utilities;

use App\Utilities\Contracts\RocketShipContract;

class RocketShip implements RocketShipContract
{

    public $fuelTank;

    public $oxygen;

    public function __construct(FuelTank $fuelTank, Oxygen $oxygen)
    {

        $this->fuelTank = $fuelTank;

        $this->oxygen = $oxygen;


    }

    public function blastOff()
    {

        return 'Houston, we have ignition';

    }

}