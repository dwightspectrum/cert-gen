<?php

namespace App\Controllers;
use App\Models\VentilatorModel;
use App\Models\PumpModel;
use App\Models\BurnerModel;

class Dashboard extends BaseController
{
    public function index()
    {   
        $session = session();
        $data['sessData'] = $session->get();

        $ventilator = new VentilatorModel();
        $data['ventilator'] = $ventilator->countAllResults();

        $pump = new PumpModel();
        $data['pump'] = $pump->countAllResults();

        $burner = new BurnerModel();
        $data['burner'] = $burner->countAllResults();

        return $this->loadView('components/dashboard', $data); 
    }

}
