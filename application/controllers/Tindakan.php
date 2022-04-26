<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan extends CI_Controller
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
        $this->load->model('Tindakanmodel');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['list'] = $this->Tindakanmodel->get_tindakan();
        $this->load->view('tindakan/tindakan', $data);
    }
    public function add_Tindakan()
    {
        $this->load->view('tindakan/addTindakan');
    }
    public function edit_Tindakan($a)
    {
        // mengambil data dari tabel penerbit melalui method get_daftar_penerbit dari Model PenerbitModel
        $data['detail'] = $this->Tindakanmodel->get_daftar_tindakan($a);
        $this->load->view('tindakan/editTindakan', $data);
    }
    public function insert()
    {
        if ($this->Tindakanmodel->insert($this->input->post())) {
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah');
            redirect(base_url('Tindakan'));
        } else {
            $this->session->set_flashdata('pesan', 'Data tidak berhasil ditambah');
            redirect(base_url('Admin/add_Tindakan'));
        }
    }
    public function Update_Tindakan($id)
    {
        $this->Tindakanmodel->update($this->input->post(), $id);
        redirect(base_url('Tindakan'));
    }
    public function delete($a)
    {
        $this->db->where('idtindakan', $a);
        $this->db->delete('tindakan');
        redirect(base_url('Tindakan'));
    }
}
