<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {   
        $session = session();
        $data['sessData'] = $session->get();

        return $this->loadView('components/dashboard', $data); 
    }
}
