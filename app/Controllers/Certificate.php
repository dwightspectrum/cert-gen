<?php

namespace App\Controllers;
use App\Models\VentilatorModel;

class Certificate extends BaseController
{
    public function index()
    {
        $session = session();
        $data['sessData'] = $session->get();
    }

    public function ventilator() {
        $session = session();
        $data['sessData'] = $session->get();

        return $this->loadView('certificates/ventilator/ventilator', $data);
    }
    public function ventilatorReport() {
        $ventilator = new VentilatorModel();
        $data = [
            'image_data' => $this->request->getVar('image_data'),
            'ventilator_id' => $this->request->getVar('ventilator_id')
        ];

        $ventilator->save($data);

        echo json_encode([
            'success' => true, 
            'message' => 'Save successfully!'
        ]);
    }
}
