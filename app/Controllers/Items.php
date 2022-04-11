<?php

namespace App\Controllers;
use App\Models\ItemModel;
use App\Models\SerialNumberModel;

class Items extends BaseController
{
    public function index()
    {
        $session = session();
        $data['sessData'] = $session->get();
       
        return $this->loadView('components/items', $data);
    }

    public function getItems(){ 
        $serial = SerialNumberModel::search( $this->request->getVar('search') );
        
        $selectAll = $serial->select('*');
        $selectAll->join('item', 'serial_number.item_id = item.item_id', 'left');

        $data = [
            'items' => $selectAll->paginate(10),
            'pager' => $selectAll->pager->getPageCount(),
        ];

        echo json_encode($data);
    }   
    public function getItemsId($serial_id) {
        $serial= new SerialNumberModel();
        echo json_encode($serial->find($serial_id));
    }
   
}

