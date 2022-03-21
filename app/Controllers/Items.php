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
        $serial = new SerialNumberModel();
        $selectAll = $serial->select('*');
        $serialNumber = $selectAll->join('item', 'serial_number.item_id = item.item_id', 'left');

        $data = [
            'items' => $serialNumber->paginate(10),
            'pager' => $serialNumber->pager->getPageCount(),
        ];

        echo json_encode($data);
    }
}

