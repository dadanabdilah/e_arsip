<?php

namespace App\Models;

use CodeIgniter\Model;

class Unit_model extends Model
{
    public function getdata()
    {
        $query = $this->db->query("select * from unit_kerja");
        return $query->getResult();
    }

    public function simpanData($table, $data)
    {
        $this->db->$table($table)->insert($data);
        return true;
    }

    public function editData($table, $data, $where)
    {
        $this->db->$table($table)->update($data, $where);
        return true;
    }

    public function hapusData($table, $where)
    {
        $this->db->$table($table)->delete($where);
        return true;
    }
}
