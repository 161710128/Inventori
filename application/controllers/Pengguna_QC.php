<?php
class Pengguna_QC extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'quality' && $this->session->login['role'] != 'super') redirect();
        $this->data['aktif'] = 'Pengguna_QC';
        $this->load->model('M_quality_control', 'm_qc');
    }

    public function index()
    {
        $this->data['title'] = 'Data Pengguna QC';
        $this->data['titleHead'] = 'Data Pengguna QC';
        $this->data['all_petugas'] = $this->m_qc->lihat();
        $this->data['no'] = 1;

        $this->load->view('pengguna/qc/lihat', $this->data);
    }

    public function tambah()
    {
        $this->data['title'] = 'Data Pengguna QC';
        $this->data['titleHead'] = 'Data Pengguna QC';

        $dariDB = $this->m_qc->cekkodepenggguna();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 5, 3);
        $kodeBarangSekarang = $nourut + 1;
        $this->data['kode_pengguna'] = $kodeBarangSekarang;

        $this->load->view('pengguna/qc/tambah', $this->data);
    }

    public function proses_tambah()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];

        if ($this->m_qc->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Pengguna Admin <strong>Berhasil</strong> Ditambahkan!');
            redirect('Pengguna_QC');
        } else {
            $this->session->set_flashdata('error', 'Data Pengguna Admin <strong>Gagal</strong> Ditambahkan!');
            redirect('Pengguna_QC');
        }
    }

    public function ubah($kode)
    {
        $this->data['title'] = 'Data Pengguna QC';
        $this->data['titleHead'] = 'Data Pengguna QC';
        $this->data['pengguna'] = $this->m_qc->lihat_kode($kode);
        $this->load->view('pengguna/qc/ubah', $this->data);
    }

    public function proses_ubah($kode)
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];

        if ($this->m_qc->ubah($data, $kode)) {
            $this->session->set_flashdata('success', 'Data Pengguna Admin <strong>Berhasil</strong> Ditambahkan!');
            redirect('Pengguna_QC');
        } else {
            $this->session->set_flashdata('error', 'Data Pengguna Admin <strong>Gagal</strong> Ditambahkan!');
            redirect('Pengguna_QC');
        }
    }
}
