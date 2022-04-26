<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RawatObatmodel');
        $this->load->model('RawatTindakanmodel');
    }

    public function index()
    {
        $this->load->view('dashboard');
    }

    public function graph()
    {
        $this->load->view('graph');
    }

    public function get_total_obat()
    {
        $data = $this->RawatObatmodel->total_obat();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function get_total_tindakan()
    {
        $data = $this->RawatTindakanmodel->total_tindakan();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function get_total_tindakan_bytgl()
    {
        $data = $this->RawatTindakanmodel->total_tindakan_bytgl();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function get_total_obat_bytgl()
    {
        $data = $this->RawatObatmodel->total_obat_bytgl();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
