<?php
 
class Skruasjalan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('m_setting');
        $this->load->library('session');
        $this->load->model('M_skruasjalan');
        $this->load->library('recaptcha'); 
    } 


    /*
     * Listing of laporan
     */
    function index()
    {       

        $recaptcha = $this->recaptcha->create_box();
        $data['recaptcha2'] = $recaptcha;
        $data['_view'] = 'public/skruasjalan';
        $data['title'] = 'SI-SIKAT | SK Ruas Jalan';
        $data['skruasjalan'] = $this->M_skruasjalan->get_all_skruasjalan();
        $this->load->view('public/layout',$data);
    }

    function download()
    {
        $this->load->helper('download');
        $this->load->helper('file');
        $idsk = $this->input->post('idsk');

        $skruasjalan = $this->M_skruasjalan->get_skruasjalan($idsk);
        $file = 'upload/skruasjalan/'.$skruasjalan->filesk;
        force_download($file, NULL);
    }


   
}