<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    /**
     * Check if username and password exist in database
     *
     * @param array $user Array contains username and password
     * @return object
     */
    public function login(array $user)
    {
        $query = $this->db->where([
            'username' => $user['username'],
            'password' => $user['password'],
        ])->get('users', 1);
        return $query;
    }
}

/* End of file User_model.php */
