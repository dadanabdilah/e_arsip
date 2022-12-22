<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'disposisi';
    protected $primaryKey       = 'id_disposisi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_terima', 'tingkat_keamanan', 'tgl_selesai', 'id_sm', 'disposisi', 'status', 'id_bidang'];

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

    public function withSuratMasuk()
    {
        return $this->join('surat_masuk', 'surat_masuk.id_sm = disposisi.id_sm');
    }

    public function withBidang()
    {
        return $this->join('bidang', 'bidang.id_bidang = disposisi.id_bidang');
    }
}
