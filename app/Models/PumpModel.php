<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Traits\Search;

class PumpModel extends Model
{
    use Search;
    protected $DBGroup          = 'default';
    protected $table            = 'pump';
    protected $primaryKey       = 'pump_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'item', 
                                    'serial_no', 
                                    'image', 
                                    'image_data', 
                                    'verified_place',
                                    'isolation', 
                                    'inspector', 
                                    'place', 
                                    'date', 
                                    'signatures'
                                ];
                                 
    protected $searchable       = ['serial_no'];


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
