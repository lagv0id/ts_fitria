<?php

class Obatmodel extends CI_Model
{
    public function get_obat()
    {
        return $this->db->get('obat')->result_array();
    }
}
