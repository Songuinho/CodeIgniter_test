<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function register_user($data)
    {
        $this->db->insert('backenduser', $data);
    }

}