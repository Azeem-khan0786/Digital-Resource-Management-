<?php
 class Role_model extends CI_Model {
    public function get_all_roles() {
        $query = $this->db->get('Roletable'); // Assuming you have a 'roles' table
        return $query->result_array();
    }
}
?>