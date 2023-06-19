<?php 
    class UserModel extends CI_Model
    {
        public function getUserById($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('user')->row_array();
        }
    }
