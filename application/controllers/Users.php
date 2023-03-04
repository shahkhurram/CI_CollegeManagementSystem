<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{
    public function dashboard()
    {
        $this->load->model('RegisterModel');
        $college_id = $this->session->userdata('college_id');
        $students = $this->RegisterModel->getStudents($college_id);
        $this->load->view('users', ['students' => $students]);

    }

}
?>