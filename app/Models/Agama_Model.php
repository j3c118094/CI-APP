<?php namespace App\Models;

use CodeIgniter\Model;

class Agama_Model extends Model
{
    protected $table      = 'agama';
    protected $primaryKey = 'kode_agama';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['agama'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}