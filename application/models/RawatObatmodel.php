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

    public function get_rawat_detail($id)
    {
        $this->db->where('idrawat', $id);
        return $this->db->get('rawatobat')->result_array();
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

    public function total_obat()
    {

        $data = $this->db->query("SELECT SUM(rawatobat.jumlah) as total, obat.nama as idobat FROM rawatobat, obat WHERE rawatobat.idobat = obat.idobat GROUP BY idobat;")->result_array();

        $total = [];
        $idobat = [];

        foreach ($data as $item) {
            array_push($total, $item['total']);
            array_push($idobat, $item['idobat']);
        };

        $obat = ['idobat' => $idobat, 'total' => $total];

        return $obat;
    }

    public function total_obat_id()
    {
        return $this->db->select('idobat')->from('rawatobat')->group_by("idobat")->get();
    }

    public function total_obat_bytgl()
    {

        $data = $this->db->query("SELECT count(rawatobat.idrawatobat) as jumlahObat, rawat.tglrawat as tglrawat
        FROM rawatobat, rawat, obat
        WHERE rawatobat.idobat = obat.idobat AND rawatobat.idrawat = rawat.idrawat
        GROUP BY rawat.tglrawat")->result_array();

        $jumlahObat = [];
        $tglrawat = [];

        foreach ($data as $item) {
            array_push($jumlahObat, $item['jumlahObat']);
            array_push($tglrawat, $item['tglrawat']);
        };

        $obat = ['tglrawat' => $tglrawat,'jumlahObat' => $jumlahObat];

        return $obat;
    }
}
