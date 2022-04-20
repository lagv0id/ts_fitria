<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat extends CI_Controller
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


    function __construct()
    {
        parent::__construct();
        $this->load->model('Rawatmodel');
        $this->load->model('Pasienmodel');
        $this->load->model('RawatObatmodel');
        $this->load->model('RawatTindakanmodel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['list'] = $this->Rawatmodel->get_rawat();
        $this->load->view('rawat/rawat', $data);
    }

    public function add()
    {
        $data['list'] = $this->Pasienmodel->get_pasien();
        $this->load->view('rawat/rawat_insert', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('idrawat', 'ID Rawat', 'is_unique[rawat.idrawat]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data gagal ditambah, tolong cek isian form lagi.');
            redirect(base_url('rawat'));
        } else {
            $this->Rawatmodel->insert_rawat($this->input->post());
            $this->session->set_flashdata('pesan', 'Data rawat berhasil ditambah');
            redirect(base_url('rawat'));
        }
    }

    public function edit($id)
    {
        $data['list'] = $this->Pasienmodel->get_pasien();
        $data['detail'] = $this->Rawatmodel->get_rawat_detail($id);
        $this->load->view('rawat/rawat_edit', $data);
    }

    public function update($id)
    {
        $this->Rawatmodel->update_rawat(($this->input->post()), $id);
        $this->session->set_flashdata('pesan', 'Data rawat berhasil diedit.');
        redirect(base_url('rawat'));
    }

    public function delete($id)
    {
        $this->db->where('idrawat', $id);
        if ($this->db->delete('rawat')) {
            $this->session->set_flashdata('pesan', 'Data rawat berhasil dihapus.');
            redirect(base_url('rawat'));
        }
    }

    public function print($id)
    {
        $data['detail'] = $this->Rawatmodel->get_rawat_detail($id);
        $data['rt'] = $this->RawatTindakanmodel->get_rawat_detail($id);
        $data['ro'] = $this->RawatObatmodel->get_rawat_detail($id);
        $this->load->view('rawat/rawat_print', $data);
    }
}
