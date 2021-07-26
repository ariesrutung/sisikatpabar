<?php
 
class Statistik extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('m_setting');
        $this->load->library('session');
    } 


    /*
     * Listing of laporan
     */
    function index()
    {
        $getkab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $getkab->result();

        //grafik jumlah lap jalan/drainase berdasarkan kabkota
        $grapkabkota = $this->db->query("SELECT w.nama,
        (SELECT COUNT(l.id) FROM laporan l JOIN wilayah_2020 y ON y.kode=l.lokasi_kabkota WHERE l.lokasi_kabkota=w.kode AND infrastruktur='jalan') AS totaljalan,
        (SELECT COUNT(l.id) FROM laporan l JOIN wilayah_2020 y ON y.kode=l.lokasi_kabkota WHERE l.lokasi_kabkota=w.kode AND infrastruktur='drainase') AS totaldrainase
        FROM wilayah_2020 w WHERE LENGTH(w.kode) = 5 AND w.kode LIKE '92%' ORDER BY w.kode ASC");
        $data['grapkabkota'] = $grapkabkota->result();
        $this->load->view('statistik',$data);
    }
}