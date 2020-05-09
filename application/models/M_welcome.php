<?php 

class M_welcome extends CI_model {
    
    public function insert_entry($ajax_data){
        return $this->db->insert('user', $ajax_data);
    }

    public function get_entry(){
        $query =  $this->db->get('user');
        if(count($query->result()) > 0){
            return $query->result();
        }
    }

    public function delete_entry($del_id){
        return $this->db->delete("user", ['id' => $del_id]);
    }

    // Edit
    public function edit_entry($edit_id){
        $query = $this->db->get_where("user", ['id' => $edit_id]);
        if(count($query->result()) > 0){
            return $query->row();
        }
    }


    public function update_entry($data){
        return $this->db->update("user", $data, array('id' => $data['id']));
    }


}