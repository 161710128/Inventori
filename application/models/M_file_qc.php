<?php

class M_file_qc extends CI_Model
{

    public function lihat()
    {
        return $this->db->get('tb_file_qc')->result();
    }
    public function tambah($file)
    {
        return $this->db->insert('tb_file_qc', $file);
    }
}
