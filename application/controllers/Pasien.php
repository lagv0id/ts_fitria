<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
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
        $this->load->model('Pasienmodel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['list'] = $this->Pasienmodel->get_pasien();
        $this->load->view('pasien/pasien', $data);
    }

    public function delete($id)
    {
        if ($this->Pasienmodel->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect(base_url('Pasien'));
        }
    }

    public function edit($id)
    {
        $data['edit'] = $this->Pasienmodel->edit($id);
        $this->load->view('pasien/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('idpasien');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tgllahir = $this->input->post('tgllahir');
        $notelp = $this->input->post('notelp');

        $datalama = $this->Pasienmodel->getDataById($id);

        if (
            $datalama['idpasien'] != $id || $datalama['nama'] != $nama
            || $datalama['alamat'] != $alamat || $datalama['tgllahir'] != $tgllahir || $datalama['notelp'] != $notelp
        ) {
            $data = [
                'idpasien' => $id,
                'nama' => $nama,
                'alamat' => $alamat,
                'tgllahir' => $tgllahir,
                'notelp' => $notelp
            ];
            $this->Pasienmodel->update($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diedit');
            redirect(base_url('Pasien'));
        } else {
            $this->session->set_flashdata('pesan', 'Tidak mengubah data');
            redirect(base_url('Pasien'));
        }
    }

    public function add()
    {
        $this->load->view('pasien/add');
    }

    public function insert()
    {
        $id = $this->input->post('idpasien');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tgllahir = $this->input->post('tgllahir');
        $notelp = $this->input->post('notelp');

        $data = [
            'idpasien' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'tgllahir' => $tgllahir,
            'notelp' => $notelp
        ];
        $this->Pasienmodel->insert($data, $id);
        $this->session->set_flashdata('pesan', 'Data berhasil ditambah');
        redirect(base_url('Pasien'));
    }

    public function print()
    {
        $data['list'] = $this->Pasienmodel->get_pasien();
        $this->load->view('pasien/printpasien', $data);
    }
}
