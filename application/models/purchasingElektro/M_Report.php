<?php

class M_Report extends CI_Model { 

	public function cek_minggu()
    {
        $query = $this->db->query("SELECT nama_komponen AS NamaBarang, 
                                    CONCAT(YEAR(tanggal),'/', WEEK(tanggal)) AS TahunMinggu, 
                                    SUM(IF(YEARWEEK(tanggal), jumlah,0)) AS JumlahBarang 
                                    from tbl_detail_pengambilan 
                                    GROUP BY TahunMinggu, nama_komponen");
        return $query->result(); 
    }
    public function cek_bulan()
    {
        $query = $this->db->query("SELECT nama_komponen AS NamaBarang, 
                                    CONCAT(YEAR(tanggal),'/', MONTH(tanggal)) AS TahunBulan, 
                                    SUM(IF(YEARWEEK(tanggal), jumlah,0)) AS JumlahBarang 
        from tbl_detail_pengambilan 
        GROUP BY TahunBulan, nama_komponen");
        return $query->result(); 
    } 
}