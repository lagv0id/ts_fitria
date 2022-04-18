<?php

class Obatmodel extends CI_Model
{
    public function get_obat()
    {
        return $this->db->get('obat')->result_array();
    }

    public function get_obat_detail($id)
    {
        $this->db->where('idobat', $id);
        return $this->db->get('obat')->row_array();
    }

    public function insert_obat($a)
    {
        $data = [
            'idobat' => $a['idobat'],
            'nama' => $a['namaobat'],
            'harga' => $a['hargaobat']
        ];

        return $this->db->insert('obat', $data);
    }

    public function update_obat($a, $id)
    {
        $data = [
            'idobat' => $a['idobat'],
            'nama' => $a['namaobat'],
            'harga' => $a['hargaobat']
        ];
        $this->db->where('idobat', $id);
        return $this->db->update('obat', $data);
    }
}
