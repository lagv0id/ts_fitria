<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
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
        $this->load->model('Obatmodel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['list'] = $this->Obatmodel->get_obat();
        $this->load->view('obat/obat', $data);
    }

    public function serverside()
    {
        $this->load->view('obat/obat_serverside');
    }

    public function add()
    {
        $this->load->view('obat/obat_insert');
    }

    public function insert()
    {
        $this->form_validation->set_rules('idobat', 'ID Obat', 'is_unique[obat.idobat]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data gagal ditambah, tolong cek isian form lagi.');
            redirect(base_url('obat'));
        } else {
            $this->Obatmodel->insert_obat($this->input->post());
            $this->session->set_flashdata('pesan', 'Data obat berhasil ditambah');
            redirect(base_url('obat'));
        }
    }

    public function edit($id)
    {
        $data['detail'] = $this->Obatmodel->get_obat_detail($id);
        $this->load->view('obat/obat_edit', $data);
    }

    public function update($id)
    {
        $this->Obatmodel->update_obat(($this->input->post()), $id);
        $this->session->set_flashdata('pesan', 'Data obat berhasil diedit.');
        redirect(base_url('obat'));
    }

    public function delete($id)
    {
        $this->db->where('idobat', $id);
        if ($this->db->delete('obat')) {
            $this->session->set_flashdata('pesan', 'Data obat berhasil dihapus.');
            redirect(base_url('obat'));
        }
    }

    public function proses()
    {
        // DB table to use
        $table = 'obat';

        // Table's primary key
        $primaryKey = 'idobat';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array('db' => 'idobat', 'dt' => 0),
            array('db' => 'nama', 'dt' => 1),
            array('db' => 'harga', 'dt' => 2)
        );

        // SQL server connection information
        $sql_details = array(
            'user' => 'kairos',
            'pass' => 'tsdiklat',
            'db'   => 'ts_fitria',
            'host' => 'localhost'
        );

        $this->load->library('ssp');

        echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }
}
