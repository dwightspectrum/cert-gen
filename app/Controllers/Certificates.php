<?php

namespace App\Controllers;
use App\Models\VentilatorModel;
use App\Models\SerialNumberModel;
use App\Models\ItemModel;
use App\Models\PumpModel;
use App\Models\BurnerModel;
use App\Libraries\HWIPDF;

class Certificates extends BaseController
{
    public function index()
    {
        $session = session();
        $data['sessData'] = $session->get();
    }

    public function ventilator($serial_number_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $serial= new SerialNumberModel();
        $item = new ItemModel();

        $data['serial'] = $serial->find($serial_number_id);
        $data['serial']['item'] = $data['serial'] ? $item->find($data['serial']['item_id']) : null;

        return $this->loadview('certificates/ventilator/ventilator', $data);


    }
  
    private function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

    public function ventilatorReport() {
        $ventilator = new VentilatorModel();
        $signaturesB64 = $this->request->getVar('signatures');

        if ($signaturesB64) {
            $file_name = $this->generateRandomString(10) . '.png';
            $decoded = base64_decode($signaturesB64);
            file_put_contents(realpath(".").'/assets/img/signatures/' . $file_name, $decoded);
        }   

        $data = [
            'image_data' => $this->request->getVar('image_data') ?? null,
            'serial_no' => $this->request->getVar('serial_no') ?? null,
            'item' => $this->request->getvar('item')  ?? null,
            'verified_place' => $this->request->getvar('verified_place') ?? null,
            'isolation' => $this->request->getVar('isolation') ?? null,
            'inspector' => $this->request->getVar('inspector') ?? null,
            'place' => $this->request->getVar('place') ?? null,
            'date' => $this->request->getVar('date') == 'null' ? null : $this->request->getVar('date'),
            'signatures' => $file_name ?? null,
        ];

        $ventilator->save($data);

        echo json_encode([
            'success' => true, 
            'message' => 'Save successfully!'
        ]);
    }

    public function listVentilatorView() {
        $session = session();
        $data['sessData'] = $session->get();

        return $this->loadView('certificates/ventilator/list', $data);
    }

    public function listAllVentilator () {

        $ventilator =  VentilatorModel::search( $this->request->getVar('search') );
        $lists = $ventilator->paginate(10);
        $data = [
            'items' => $lists,
            'pager' => $ventilator->pager->getPageCount(),
        ];

        echo json_encode($data);
    }

    public function removeEachVentilator($ventilator_id) {
        $ventilator = new VentilatorModel();

        $data['ventilator'] = $ventilator->find($ventilator_id);

        if ($data['ventilator']['signatures'] && file_exists(FCPATH . '/assets/img/signatures/' . $data['ventilator']['signatures'])) {
            unlink(FCPATH . '/assets/img/signatures/' . $data['ventilator']['signatures']);
        }

        $ventilator->delete($ventilator_id);

        echo json_encode([
            'success' => true,
            'message' => 'Deleted Succesfully'
        ]);
    }

    public function ventilatorPDF($ventilator_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $ventilator = new VentilatorModel();

        $data['ventilator'] = $ventilator->find($ventilator_id);

        $html = view('certificates/ventilator/pdf', $data);
        $hwiPdf = new HWIPDF;
        $pdf = $hwiPdf->init($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        return $pdf->Output('Ventilator.pdf', \Mpdf\Output\Destination::STRING_RETURN);
    }

    public function getVentilatorId($ventilator_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $ventilator = new VentilatorModel();

        $data['ventilator'] = $ventilator->find($ventilator_id);
        if ($data['ventilator']) {
            $data['ventilator']['signatures'] = base_url() . '/assets/img/signatures/' . $data['ventilator']['signatures'];
        }

        return $this->loadview('certificates/ventilator/edit', $data);


    }

    public function editEachVentilator($ventilator_id) {

        $ventilator = new VentilatorModel();
        $signaturesB64 = $this->request->getVar('signatures');

        if ($signaturesB64) {
            $file_name = $this->generateRandomString(10) . '.png';
            $decoded = base64_decode($signaturesB64);
            file_put_contents(realpath(".").'/assets/img/signatures/' . $file_name, $decoded);
        }   

        $ventilator->where('ventilator_id', $ventilator_id);
        
        $data = [
            'image_data' => $this->request->getVar('image_data'),
            'serial_no' => $this->request->getVar('serial_no'),
            'item' => $this->request->getvar('item'),
            'verified_place' => $this->request->getvar('verified_place'),
            'isolation' => $this->request->getVar('isolation'),
            'inspector' => $this->request->getVar('inspector'),
            'place' => $this->request->getVar('place'),
            'date' => $this->request->getVar('date') == 'null' ? null : $this->request->getVar('date'),
            'signatures' => $file_name,
        ];
           
            $ventilator->update($ventilator_id, $data);
        
        echo json_encode([
            'success' => true, 
            'message' => 'Update successfully!'
        ]);

    }

    public function pump($serial_number_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $serial= new SerialNumberModel();
        $item = new ItemModel();

        $data['serial'] = $serial->find($serial_number_id);
        $data['serial']['item'] = $data['serial'] ? $item->find($data['serial']['item_id']) : null;

        return $this->loadview('certificates/pump/pump', $data);


    }
  
    public function pumpReport() {
        $pump = new PumpModel();
        $signaturesB64 = $this->request->getVar('signatures');

        if ($signaturesB64) {
            $file_name = $this->generateRandomString(10) . '.png';
            $decoded = base64_decode($signaturesB64);
            file_put_contents(realpath(".").'/assets/img/signatures/' . $file_name, $decoded);
        }   

        $data = [
            'image_data' => $this->request->getVar('image_data') ?? null,
            'serial_no' => $this->request->getVar('serial_no') ?? null,
            'item' => $this->request->getvar('item')  ?? null,
            'verified_place' => $this->request->getvar('verified_place') ?? null,
            'isolation' => $this->request->getVar('isolation') ?? null,
            'inspector' => $this->request->getVar('inspector') ?? null,
            'place' => $this->request->getVar('place') ?? null,
            'date' => $this->request->getVar('date') == 'null' ? null : $this->request->getVar('date'),
            'signatures' => $file_name ?? null,
        ];

        $pump->save($data);

        echo json_encode([
            'success' => true, 
            'message' => 'Save successfully!'
        ]);
    }

    public function listPumpView() {
        $session = session();
        $data['sessData'] = $session->get();
        return $this->loadView('certificates/pump/list', $data);
    }

    public function listAllPump () {

        $pump =  PumpModel::search( $this->request->getVar('search') );
        $lists = $pump->paginate(10);
        $data = [
            'items' => $lists,
            'pager' => $pump->pager->getPageCount(),
        ];

        echo json_encode($data);

    
    }

    public function removeEachPump($pump_id) {
        $pump = new PumpModel();

        $data['pump'] = $pump->find($pump_id);

        if ($data['pump']['signatures'] && file_exists(FCPATH . '/assets/img/signatures/' . $data['pump']['signatures'])) {
            unlink(FCPATH . '/assets/img/signatures/' . $data['pump']['signatures']);
        }

        $pump->delete($pump_id);

        echo json_encode([
            'success' => true,
            'message' => 'Deleted Succesfully'
        ]);
    }

    public function pumpPDF($pump_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $pump = new PumpModel();

        $data['pump'] = $pump->find($pump_id);

        $html = view('certificates/pump/pdf', $data);
        $hwiPdf = new HWIPDF;
        $pdf = $hwiPdf->init($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        return $pdf->Output('Pump.pdf', \Mpdf\Output\Destination::STRING_RETURN);
    }

    public function getPumpId($pump_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $pump = new PumpModel();

        $data['pump'] = $pump->find($pump_id);
        if ($data['pump']) {
            $data['pump']['signatures'] = base_url() . '/assets/img/signatures/' . $data['pump']['signatures'];
        }

        return $this->loadview('certificates/pump/edit', $data);

    }

    public function editEachPump($pump_id) {

        $pump = new PumpModel();
        $signaturesB64 = $this->request->getVar('signatures');

        if ($signaturesB64) {
            $file_name = $this->generateRandomString(10) . '.png';
            $decoded = base64_decode($signaturesB64);
            file_put_contents(realpath(".").'/assets/img/signatures/' . $file_name, $decoded);
        }   

        $pump->where('pump_id', $pump_id);
        
        $data = [
            'image_data' => $this->request->getVar('image_data'),
            'serial_no' => $this->request->getVar('serial_no'),
            'item' => $this->request->getvar('item'),
            'verified_place' => $this->request->getvar('verified_place'),
            'isolation' => $this->request->getVar('isolation'),
            'inspector' => $this->request->getVar('inspector'),
            'place' => $this->request->getVar('place'),
            'date' => $this->request->getVar('date') == 'null' ? null : $this->request->getVar('date'),
            'signatures' => $file_name,
        ];
           
        $pump->update($pump_id, $data);
        
        echo json_encode([
            'success' => true, 
            'message' => 'Update successfully!'
        ]);

    }

    public function burner($serial_number_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $serial= new SerialNumberModel();
        $item = new ItemModel();

        $data['serial'] = $serial->find($serial_number_id);
        $data['serial']['item'] = $data['serial'] ? $item->find($data['serial']['item_id']) : null;

        return $this->loadview('certificates/burner/burner', $data);

    }
  
    public function burnerReport() {
        $pump = new BurnerModel();
        $signaturesB64 = $this->request->getVar('signatures');

        if ($signaturesB64) {
            $file_name = $this->generateRandomString(10) . '.png';
            $decoded = base64_decode($signaturesB64);
            file_put_contents(realpath(".").'/assets/img/signatures/' . $file_name, $decoded);
        }   

        $data = [
            'image_data' => $this->request->getVar('image_data') ?? null,
            'serial_no' => $this->request->getVar('serial_no') ?? null,
            'item' => $this->request->getvar('item')  ?? null,
            'verified_place' => $this->request->getvar('verified_place') ?? null,
            'isolation' => $this->request->getVar('isolation'),
            'inspector' => $this->request->getVar('inspector') ?? null,
            'place' => $this->request->getVar('place') ?? null,
            'date' => $this->request->getVar('date') == 'null' ? null : $this->request->getVar('date'),
            'signatures' => $file_name ?? null,
        ];

        $pump->save($data);

        echo json_encode([
            'success' => true, 
            'message' => 'Save successfully!'
        ]);
    }

    public function listBurnerView() {
        $session = session();
        $data['sessData'] = $session->get();
        return $this->loadView('certificates/burner/list', $data);
    }

    public function listAllBurner () {

        $burner =  BurnerModel::search( $this->request->getVar('search') );
        $lists = $burner->paginate(10);
        $data = [
            'items' => $lists,
            'pager' => $burner->pager->getPageCount(),
        ];

        echo json_encode($data);    

    
    }

    public function removeEachBurner($burner_id) {
        $burner = new BurnerModel();

        $data['burner'] = $burner->find($burner_id);

        if ($data['burner']['signatures'] && file_exists(FCPATH . '/assets/img/signatures/' . $data['burner']['signatures'])) {
            unlink(FCPATH . '/assets/img/signatures/' . $data['burner']['signatures']);
        }

        $burner->delete($burner_id);

        echo json_encode([
            'success' => true,
            'message' => 'Deleted Succesfully'
        ]);
    }

    public function burnerPDF($burner_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $burner = new BurnerModel();

        $data['burner'] = $burner->find($burner_id);

        $html = view('certificates/burner/pdf', $data);
        $hwiPdf = new HWIPDF;
        $pdf = $hwiPdf->init($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        return $pdf->Output('Pump.pdf', \Mpdf\Output\Destination::STRING_RETURN);
    }

    public function getBurnerId($burner_id) {
        $session = session();
        $data['sessData'] = $session->get();

        $burner = new BurnerModel();

        $data['burner'] = $burner->find($burner_id);
        if ($data['burner']) {
            $data['burner']['signatures'] = base_url() . '/assets/img/signatures/' . $data['burner']['signatures'];
        }

        return $this->loadview('certificates/burner/edit', $data);


    }

    public function editEachBurner($burner_id) {

        $burner = new BurnerModel();
        $signaturesB64 = $this->request->getVar('signatures');

        if ($signaturesB64) {
            $file_name = $this->generateRandomString(10) . '.png';
            $decoded = base64_decode($signaturesB64);
            file_put_contents(realpath(".").'/assets/img/signatures/' . $file_name, $decoded);
        }   

        $burner->where('burner_id', $burner_id);
        
        $data = [
            'image_data' => $this->request->getVar('image_data'),
            'serial_no' => $this->request->getVar('serial_no'),
            'item' => $this->request->getvar('item'),
            'verified_place' => $this->request->getvar('verified_place'),
            'isolation' => $this->request->getVar('isolation'),
            'inspector' => $this->request->getVar('inspector'),
            'place' => $this->request->getVar('place'),
            'date' => $this->request->getVar('date') == 'null' ? null : $this->request->getVar('date'),
            'signatures' => $file_name,
        ];
           
        $burner->update($burner_id, $data);
        
        echo json_encode([
            'success' => true, 
            'message' => 'Update successfully!'
        ]);

    }


}
