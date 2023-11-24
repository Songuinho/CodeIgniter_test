<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('adminpanel/registerview');
    }

    public function register_post()
    {
        $this->form_validation->set_message('required', 'Ce champ est obligatoire');
        $this->form_validation->set_message('matches', 'Le champ de %s ne correspond pas au mot de passe saisi');

        $this->form_validation->set_rules('username', 'Nom', 'required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('confirm_pwd', 'Confirmation du mot de passe', 'required|matches[password]');

        $data = array(
            'username' => $this->input->post('username'),
            'confirm_pwd' => $this->input->post('confirm_pwd'),
            'password' => $this->input->post('password'), PASSWORD_DEFAULT
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            // print_r($data);die();
            $this->load->view('adminpanel/registerview', array('errors' => $errors, 'data'=>$data));
        } else {
            
            $sql = "INSERT INTO `backenduser` (`username` , `password` ) VALUES ( ?, ?);";
            $this->db->query($sql, array($data['username'], $data['password']));
            // $this->user_model->register_user($data);
            redirect('admin/login');
        }
    }
}
