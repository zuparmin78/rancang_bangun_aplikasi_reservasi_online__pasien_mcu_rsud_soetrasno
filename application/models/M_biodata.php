<?php 

class M_biodata extends CI_Model {

    function tampil_data(){
		return $this->db->get('profiletamu');
	}

    function input_data($data,$table){
        $this->db->insert($table,$data);
        }

    function hapus_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
     
    function edit_data($where,$table){		
            return $this->db->get_where($table,$where);
        }
       
     
    function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        } 

        function Takun()   {
        return $this->db->get('profiletamu');
         } 
         
        
}
