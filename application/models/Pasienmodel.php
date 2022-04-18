<?php

class Pasienmodel extends CI_Model
{
    public function get_pasien()
    {
        return $this->db->get('pasien')->result_array();
    }

    function delete($id){
        $this->db->where('idpasien',$id);
        return $this->db->delete('pasien');
    }

    function edit($id){
        $this->db->where('idpasien', $id);
        return $this->db->get('pasien')->row_array();
    }

    function getDataById($id){ 
        $this->db->where('idpasien', $id);
        return $this->db->get('pasien')->row_array(); 
    } 

    function update($data,$id){
        $this->db->where('idpasien',$id);
        return $this->db->update('pasien',$data);
    }

    function insert($data){
		$this->db->insert('pasien',$data);
	}

}
