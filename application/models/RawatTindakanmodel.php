<?php

class RawatTindakanmodel extends CI_Model
{
    // public function get_rawat()
    // {
    //     return $this->db->get('rawat')->result_array();
    // }

    // public function get_rawat_detail($id)
    // {
    //     $this->db->where('idrawat', $id);
    //     return $this->db->get('rawat')->row_array();
    // }

    public function insert_rawat_tindakan($a)
    {
        $data = [
            'idrawattindakan' => $a['idrawattindakan'],
            'idrawat' => $a['idrawat'],
            'idtindakan' => $a['idtindakan'],
            'namadokter' => $a['namadokter'],
            'biaya' => $a['biaya']
        ];

        return $this->db->insert('rawattindakan', $data);
    }

    // public function update_rawat($a, $id)
    // {
    //     $kekurangan = ($a['totaltindakan'] + $a['totalobat']) - $a['uangmuka'];

    //     if ($kekurangan < 0) {
    //         $kekurangan = '0';
    //     }

    //     $data = [
    //         'idrawat' => $a['idrawat'],
    //         'tglrawat' => $a['tglrawat'],
    //         'totaltindakan' => $a['totaltindakan'],
    //         'totalobat' => $a['totalobat'],
    //         'totalharga' => $a['totaltindakan'] + $a['totalobat'],
    //         'uangmuka' => $a['uangmuka'],
    //         'kurang' => $kekurangan,
    //         'idpasien' => $a['idpasien'],
    //     ];
    //     $this->db->where('idrawat', $id);
    //     return $this->db->update('rawat', $data);
    // }
}
