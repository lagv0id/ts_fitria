<?php

class Rawatmodel extends CI_Model
{
    public function get_rawat()
    {
        return $this->db->get('rawat')->result_array();
    }

    public function get_rawat_detail($id)
    {
        $this->db->where('idrawat', $id);
        return $this->db->get('rawat')->row_array();
    }

    public function insert_rawat($a)
    {
        $data = [
            'idrawat' => $a['idrawat'],
            'tglrawat' => $a['tglrawat'],
            'uangmuka' => $a['uangmuka'],
            'idpasien' => $a['idpasien'],
        ];

        return $this->db->insert('rawat', $data);
    }

    public function update_rawat($a, $id)
    {
        $this->db->where('idrawat', $a['idrawat']);
        $this->db->select_sum('biaya');
        $totalrawat = $this->db->get('rawattindakan')->row_array();

        $this->db->where('idrawat', $a['idrawat']);
        $this->db->select_sum('harga');
        $totalobat = $this->db->get('rawatobat')->row_array();

        $kekurangan = ($totalrawat['biaya'] + $totalobat['harga']) - $a['uangmuka'];

        if ($kekurangan < 0) {
            $kekurangan = '0';
        }

        $data = [
            'idrawat' => $a['idrawat'],
            'tglrawat' => $a['tglrawat'],
            'totaltindakan' => $totalrawat['biaya'],
            'totalobat' => $totalobat['harga'],
            'totalharga' => $totalrawat['biaya'] + $totalobat['harga'],
            'uangmuka' => $a['uangmuka'],
            'kurang' => $kekurangan,
            'idpasien' => $a['idpasien'],
        ];

        $this->db->where('idrawat', $id);
        return $this->db->update('rawat', $data);
    }
}
