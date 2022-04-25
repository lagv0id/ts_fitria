<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatTindakan extends CI_Controller
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
        $this->load->model('RawatTindakanmodel');
        $this->load->model('Rawatmodel');
        $this->load->model('Tindakanmodel');
        $this->load->model('Pasienmodel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['list'] = $this->RawatTindakanmodel->get_rawat_tindakan();
        $this->load->view('rawatTindakan/rawatTindakan', $data);
    }

    public function add()
    {
        $data['tindakan'] = $this->Tindakanmodel->get_tindakan();
        $data['rawat'] = $this->Rawatmodel->get_rawat();
        $this->load->view('rawatTindakan/rawatTindakan_insert', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('idrawattindakan', 'ID Rawat-Tindakan', 'is_unique[rawattindakan.idrawattindakan]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', 'Data gagal ditambah, tolong cek isian form lagi.');
            redirect(base_url('rawat'));
        } else {
            $this->RawatTindakanmodel->insert_rawat_tindakan($this->input->post());
            $this->RawatTindakanmodel->update_rawat_tindakan_data($this->input->post());
            $this->session->set_flashdata('pesan', 'Data rawat-tindakan berhasil ditambah');
            redirect(base_url('rawattindakan'));
        }
    }

    public function edit($id)
    {
        $data['tindakan'] = $this->Tindakanmodel->get_tindakan();
        $data['rawat'] = $this->Rawatmodel->get_rawat();
        $data['detail'] = $this->RawatTindakanmodel->get_rawat_tindakan_detail($id);
        $this->load->view('rawatTindakan/rawattindakan_edit', $data);
    }

    public function update($id)
    {
        $this->RawatTindakanmodel->update_rawat_tindakan(($this->input->post()), $id);
        $this->RawatTindakanmodel->update_rawat_tindakan_data($this->input->post());
        $this->session->set_flashdata('pesan', 'Data rawat-tindakan berhasil diedit.');
        redirect(base_url('rawattindakan'));
    }

    public function delete($a)
    {
        $this->db->where('idrawattindakan', $a);
        if ($this->db->delete('rawattindakan')) {
            $this->session->set_flashdata('pesan', 'Data rawat-tindakan berhasil dihapus.');
            redirect(base_url('rawattindakan'));
        }
    }
}
