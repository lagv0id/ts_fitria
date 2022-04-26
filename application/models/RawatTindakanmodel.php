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

    public function get_rawat_detail($id)
    {
        $this->db->where('idrawat', $id);
        return $this->db->get('rawattindakan')->result_array();
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

    public function total_tindakan()
    {

        $data = $this->db->query("SELECT COUNT(rawattindakan.idrawattindakan) as total, rawattindakan.namadokter as namadokter FROM rawattindakan, rawat WHERE rawattindakan.idrawat=rawat.idrawat GROUP BY rawattindakan.namadokter;")->result_array();

        $total = [];
        $namadokter = [];

        foreach ($data as $item) {
            array_push($total, $item['total']);
            array_push($namadokter, $item['namadokter']);
        };

        $tindakan = ['namadokter' => $namadokter, 'total' => $total];

        return $tindakan;
    }

    public function total_tindakan_bytgl()
    {

        $data = $this->db->query("SELECT count(rawattindakan.idrawattindakan) as jumlahRawat, rawat.tglrawat as tglrawat
        FROM rawattindakan, rawat, tindakan
        WHERE rawattindakan.idtindakan = tindakan.idtindakan AND rawattindakan.idrawat = rawat.idrawat
        GROUP BY rawat.tglrawat")->result_array();

        $jumlahRawat = [];
        $tglrawat = [];

        foreach ($data as $item) {
            array_push($jumlahRawat, $item['jumlahRawat']);
            array_push($tglrawat, $item['tglrawat']);
        };

        $tindakan1 = ['tglrawat' => $tglrawat,'jumlahRawat' => $jumlahRawat];

        return $tindakan1;
    }
}
