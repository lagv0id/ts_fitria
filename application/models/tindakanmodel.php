<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tindakanmodel extends CI_Model {

	function get_tindakan()
    {
        return $this->db->get('tindakan')->result_array();
    }
    function get_daftar_tindakan($id)
    {
        $this->db->where('idtindakan', $id);
        return $this->db->get('tindakan')->row_array();
    }
    function insert($a)
    {
        $data = [
            'idtindakan' => $a['idtindakan'],
            'namatindakan' => $a['namatindakan'],
            'biaya' => $a['biaya'],
            
        ];
        // melakukan insert ke tabel ts_fitria
        return $this->db->insert('tindakan', $data);
    }
    function update($a, $id)
    {
        $data = [
            'idtindakan' => $a['idtindakan'],
            'namatindakan' => $a['namatindakan'],
            'biaya' => $a['biaya']
        ];
        $this->db->where('idtindakan', $id);
        // melakukan update ke tabel ts_fitria
        return $this->db->update('tindakan', $data);
    }

    function delete($a)
    {
        $this->db->where('idtindakan', $a);
        // menghapus data pada tabel ts_fitria
        return $this->db->delete('tindakan');
    }
}

?>

</html>

}