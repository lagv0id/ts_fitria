<?php

class Rawatmodel extends CI_Model
{
    public function get_rawat()
    {
        return $this->db->get('rawat')->result_array();
    }

    public function get_rawat_detail($id)
    {
        $this->db->select('*');
        $this->db->join('pasien','pasien.idpasien = rawat.idpasien');  
        // $this->db->join('rawattindakan','rawat.idrawat = rawattindakan.idrawat');    
        $query = $this->db->get_where('rawat',array('idrawat'=>$id));
        return $query->row_array();
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
        $totaltindakan = $this->db->get('rawattindakan')->row_array();

        $this->db->where('idrawat', $a['idrawat']);
        $this->db->select_sum('harga');
        $totalobat = $this->db->get('rawatobat')->row_array();

        $kekurangan = ($totaltindakan['biaya'] + $totalobat['harga']) - $a['uangmuka'];

        if ($kekurangan < 0) {
            $kekurangan = '0';
        }

        $data = [
            'idrawat' => $a['idrawat'],
            'tglrawat' => $a['tglrawat'],
            'totaltindakan' => $totaltindakan['biaya'],
            'totalobat' => $totalobat['harga'],
            'totalharga' => $totaltindakan['biaya'] + $totalobat['harga'],
            'uangmuka' => $a['uangmuka'],
            'kurang' => $kekurangan,
            'idpasien' => $a['idpasien'],
        ];

        $this->db->where('idrawat', $id);
        return $this->db->update('rawat', $data);
    }
}
