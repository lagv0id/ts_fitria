<?php

class RawatObatmodel extends CI_Model
{
    public function get_rawat_obat()
    {
        return $this->db->get('rawatobat')->result_array();
    }

    public function get_rawat_obat_detail($id)
    {
        $this->db->where('idrawatobat', $id);
        return $this->db->get('rawatobat')->row_array();
    }

    public function insert_rawat_obat($a)
    {
        $this->db->where('idobat', $a['idobat']);
        $obat = $this->db->get('obat')->row_array();

        $data = [
            'idrawatobat' => $a['idrawatobat'],
            'idrawat' => $a['idrawat'],
            'idobat' => $a['idobat'],
            'jumlah' => $a['jumlah'],
            'harga' => $obat['harga'] * $a['jumlah']
        ];

        return $this->db->insert('rawatobat', $data);
    }

    public function update_rawat_obat($a, $id)
    {
        $this->db->where('idobat', $a['idobat']);
        $obat = $this->db->get('obat')->row_array();

        $data = [
            'idrawatobat' => $a['idrawatobat'],
            'idrawat' => $a['idrawat'],
            'idobat' => $a['idobat'],
            'jumlah' => $a['jumlah'],
            'harga' => $obat['harga'] * $a['jumlah']
        ];

        $this->db->where('idrawatobat', $id);
        return $this->db->update('rawatobat', $data);
    }
}
