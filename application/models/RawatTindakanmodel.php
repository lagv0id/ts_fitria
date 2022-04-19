<?php

class RawatTindakanmodel extends CI_Model
{
    public function get_rawat_tindakan()
    {
        return $this->db->get('rawattindakan')->result_array();
    }

    public function get_rawat_tindakan_detail($id)
    {
        $this->db->where('idrawattindakan', $id);
        return $this->db->get('rawattindakan')->row_array();
    }

    public function insert_rawat_tindakan($a)
    {
        $this->db->where('idtindakan', $a['idtindakan']);
        $tindakan = $this->db->get('tindakan')->row_array();

        $data = [
            'idrawattindakan' => $a['idrawattindakan'],
            'idrawat' => $a['idrawat'],
            'idtindakan' => $a['idtindakan'],
            'namadokter' => $a['namadokter'],
            'biaya' => $tindakan['biaya']
        ];

        return $this->db->insert('rawattindakan', $data);
    }

    public function update_rawat_tindakan($a, $id)
    {
        $this->db->where('idtindakan', $a['idtindakan']);
        $tindakan = $this->db->get('tindakan')->row_array();

        $data = [
            'idrawattindakan' => $a['idrawattindakan'],
            'idrawat' => $a['idrawat'],
            'idtindakan' => $a['idtindakan'],
            'namadokter' => $a['namadokter'],
            'biaya' => $tindakan['biaya']
        ];

        $this->db->where('idrawattindakan', $id);
        return $this->db->update('rawattindakan', $data);
    }
}
