<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatObat extends CI_Controller
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
        $this->load->model('RawatObatmodel');
        $this->load->model('Rawatmodel');
        $this->load->model('Obatmodel');
        $this->load->model('Pasienmodel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['list'] = $this->RawatObatmodel->get_rawat_obat();
        $this->load->view('rawatObat/rawatObat', $data);
    }

    public function add()
    {
        $data['obat'] = $this->Obatmodel->get_obat();
        $data['rawat'] = $this->Rawatmodel->get_rawat();
        $this->load->view('rawatObat/rawatObat_insert', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('idrawatobat', 'ID Rawat-Obat', 'required|is_unique[rawatobat.idrawatobat]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', 'Data gagal ditambah, tolong cek isian form lagi.');
            redirect(base_url('rawat'));
        } else {
            $this->RawatObatmodel->insert_rawat_obat($this->input->post());
            $this->RawatObatmodel->update_rawat_obat_data($this->input->post());
            $this->session->set_flashdata('pesan', 'Data rawat-obat berhasil ditambah');
            redirect(base_url('rawatobat'));
        }
    }

    public function edit($id)
    {
        $data['obat'] = $this->Obatmodel->get_obat();
        $data['rawat'] = $this->Rawatmodel->get_rawat();
        $data['detail'] = $this->RawatObatmodel->get_rawat_obat_detail($id);
        $this->load->view('rawatObat/rawatObat_edit', $data);
    }

    public function update($id)
    {
        $this->RawatObatmodel->update_rawat_obat(($this->input->post()), $id);
        $this->RawatObatmodel->update_rawat_obat_data($this->input->post());
        $this->session->set_flashdata('pesan', 'Data rawat-obat berhasil diedit.');
        redirect(base_url('rawatobat'));
    }

    public function delete($a)
    {
        $this->db->where('idrawatobat', $a);
        if ($this->db->delete('rawatobat')) {
            $this->session->set_flashdata('pesan', 'Data rawat-obat berhasil dihapus.');
            redirect(base_url('rawatobat'));
        }
    }
}
