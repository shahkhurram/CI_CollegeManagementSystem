<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->model('RegisterModel');
		$checkAdminExist = $this->RegisterModel->checkAdminExist();
		$this->load->view('home', ['checkAdminExist' => $checkAdminExist]);
	}
	public function adminRegister()
	{
		$this->load->model('RegisterModel');
		$roles = $this->RegisterModel->registerRoles();
		$this->load->view('register', ['roles' => $roles]);
	}
	public function adminSignup()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('gender', 'Name', 'required');
		$this->form_validation->set_rules('role_id', 'Role', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run()) {
			$data = $this->input->post();
			$data = array
			(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'role_id' => $this->input->post('role_id'),
				'password' => md5($this->input->post('password')),
			);
			$this->load->model('RegisterModel');
			if ($this->RegisterModel->insert($data)) {
				$this->session->set_flashdata('user_saved', 'Admin has  Registered Successfully !!');
				redirect('welcome');
			} else {
				$this->session->set_flashdata('failed', 'Oops.. Something Went Wrong !!!!');
				redirect('welcome/adminregister');
			}
		} else {
			$this->adminRegister();
		}
	}
	public function adminLogin()
	{
		if ($this->session->userData('id')) {
			return redirect('admin/dashboard');
		}
		$this->load->view('login');
	}
	public function Signin()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->load->model('LoginModel');
			$userExist = $this->LoginModel->Signin($email, $password);
			if ($userExist) {
				if ($userExist->id == '1') {
					$sessionData =
						[
							'id' => $userExist->id,
							'name' => $userExist->name,
							'email' => $userExist->email,
							'role_id' => $userExist->role_id
						];
					$this->session->set_userdata($sessionData);
					return redirect("admin/dashboard");
				} else if ($userExist->id > '1') {
					$sessionData =
						[
							'id' => $userExist->id,
							'name' => $userExist->name,
							'email' => $userExist->email,
							'college_id' => $userExist->college_id,
							'role_id' => $userExist->role_id
						];
					$this->session->set_userdata($sessionData);
					return redirect("users/dashboard");
				}
			} else {
				$this->session->set_flashdata('failed', 'Please enter correct details');
				$this->load->view('login');
			}

		} else {
			$this->load->view('login');
		}
	}
	public function logout()
	{
		$this->session->unset_userData('id');
		return redirect('welcome/adminlogin');
	}
}
?>