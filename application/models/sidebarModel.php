<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SidebarModel extends CI_Model
{
    public function dataSidebar()
    {
       $query = $this->db->query("SELECT * FROM `user_sub_menu`");
       return $query->result();
    }
}
