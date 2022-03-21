<?php

namespace App\Controllers;

class Steps extends BaseController
{
    public function index () {
        $session = session();
        $data['sessData'] = $session->get();

        return $this->loadView('components/steps', $data);
    }


  

}
