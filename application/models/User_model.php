<?php
class User_model extends CI_model {

    function create($fromArray){
        $this->db->insert('users',$fromArray);
    }

    function all() {
        return $users = $this->db->get('users')->result_array();
    }

    function getUser($userID) {

        $this->db->where('user_id', $userID);
        return $user = $this->db->get('users')->row_array();
    }
    
    function updateUser($userID,$fromArray) {
        $this->db->where('user_id',$userID);
        $this->db->update('users',$fromArray);
    }

    function deleteUser($userID) {
        $this->db->where('user_id',$userID);
        $this->db->delete('users');
    }

}
?>