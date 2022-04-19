<?php

use LDAP\Result;

class testmodel extends CI_Model
{
    public function get_totalbiaya()
    {
        $this->db->where('idrawat', 'R002');
        $this->db->select_sum('biaya');
        $totalrawat = $this->db->get('rawattindakan')->row_array();

        print_r($totalrawat);
        echo $totalrawat['biaya'];
    }
}
