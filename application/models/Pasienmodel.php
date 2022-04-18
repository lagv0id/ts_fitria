<?php

class Pasienmodel extends CI_Model
{
    public function get_pasien()
    {
        return $this->db->get('pasien')->result_array();
    }

    // public function get_pasien_detail($id)
    // {
    //     $this->db->where('idrawat', $id);
    //     return $this->db->get('rawat')->row_array();
    // }

    // public function insert_pasien($a)
    // {
    //     $data = [
    //         'idrawat' => $a['idrawat'],
    //         'tglrawat' => $a['tglrawat'],
    //         'totaltindakan' => $a['totaltindakan'],
    //         'totalobat' => $a['totalobat'],
    //         'totalharga' => $a['totaltindakan'] + $a['totalobat'],
    //         'uangmuka' => $a['uangmuka'],
    //         'kurang' => ($a['totaltindakan'] + $a['totalobat']) - $a['uangmuka'],
    //         'idpasien' => $a['idpasien'],
    //     ];

    //     return $this->db->insert('rawat', $data);
    // }

    // public function update_obat($a, $id)
    // {
    //     $data = [
    //         'idobat' => $a['idobat'],
    //         'nama' => $a['namaobat'],
    //         'harga' => $a['hargaobat']
    //     ];
    //     $this->db->where('idobat', $id);
    //     return $this->db->update('obat', $data);
    // }
}
