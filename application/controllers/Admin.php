<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function dashboard()
    {
        $this->load->model('RegisterModel');
        $users = $this->RegisterModel->viewAllColleges();
        $this->load->view('dashboard', ['users' => $users]);
    }
    public function addCollege()
    {
        $this->load->view('addcollege');
    }
    public function addStudent()
    {
        $this->load->model('RegisterModel');
        $colleges = $this->RegisterModel->registerCollege();
        $this->load->view('addstudent', ['colleges' => $colleges]);
    }
    public function createCollege()
    {
        $this->form_validation->set_rules('college_name', 'College Name', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            $this->load->model('RegisterModel');
            if ($this->RegisterModel->makeCollege($data)) {
                $this->session->set_flashdata('message', 'College has Registered Successfully..');
            } else {
                $this->session->set_flashdata('message', 'Oops.. College Registration failed.....');
            }
            return redirect('admin/addCollege');
        } else {
            $this->load->view('addcollege');
        }
    }
    public function addCoadmin()
    {
        $this->load->model('RegisterModel');
        $roles = $this->RegisterModel->registerRoles();
        $colleges = $this->RegisterModel->registerCollege();
        $this->load->view('addcoadmin', ['roles' => $roles, 'colleges' => $colleges]);
    }
    public function createcoadmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('college_id', 'College ID', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('gender', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            $data['password'] = md5($this->input->post('password'));
            $data['cpassword'] = md5($this->input->post('cpassword'));
            $this->load->model('RegisterModel');
            if ($this->RegisterModel->registerCoadmin($data)) {
                $this->session->set_flashdata('message', 'CO-Admin OR User has been Registered successfully');
            } else {
                $this->session->set_flashdata('alert', 'Registration Failed. Cannot Registered...');
            }
            redirect('admin/addCoadmin');
        } else {
            $this->addCoadmin();
        }
    }
    public function coadmins()
    {
        $this->load->model('RegisterModel');
        $coadmins = $this->RegisterModel->viewAllColleges();
        $this->load->view('viewcoadmins', ['coadmins' => $coadmins]);
    }
    public function createStudent()
    {
        $this->form_validation->set_rules('student_name', 'Student Name', 'required');
        $this->form_validation->set_rules('college_id', 'College name', 'required');
        $this->form_validation->set_rules('gender', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('course', 'Course name', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            $this->load->model('RegisterModel');
            if ($this->RegisterModel->insertStudent($data)) {
                $this->session->set_flashdata('message', 'Student Added Successfully..');
            } else {
                $this->session->set_flashdata('alert', 'Ooops.. Something Went Wrong!!!');
            }
            redirect('admin/addStudent');
        } else {
            $this->addStudent();
        }
    }
    public function viewStudents($college_id)
    {
        $this->load->model('RegisterModel');
        $students = $this->RegisterModel->getStudents($college_id);
        $this->load->view('viewstudents', ['students' => $students]);
    }
    public function editStudent($id)
    {
        $this->load->model('RegisterModel');
        $studentData = $this->RegisterModel->getStudentrecord($id);
        $colleges = $this->RegisterModel->registerCollege();
        $this->load->view('editStudent', ['studentData' => $studentData, 'colleges' => $colleges]);
    }
    public function modifyStudent($id)
    {
        $this->form_validation->set_rules('student_name', 'Student Name', 'required');
        $this->form_validation->set_rules('college_id', 'College name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('course', 'Course name', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            $this->load->model('RegisterModel');
            if ($this->RegisterModel->updateStudent($data, $id)) {
                $this->session->set_flashdata('message', 'Student Updated Successfully');
                redirect("admin/editStudent/{$id}");
            } else {
                $this->session->set_flashdata('alert', 'Oops.. Can not  Updated ');
            }
        } else {
            $this->editStudent($id);
        }
    }
    public function deleteStudent($id)
    {
        $this->load->model('RegisterModel');
        if ($this->RegisterModel->removeStudent($id)) 
        {
            return redirect("admin/dashboard");
        }
    }
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userData('id')) 
        {
            return redirect('welcome/adminlogin');
        }
    }
}