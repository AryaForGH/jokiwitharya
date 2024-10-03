<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
</head>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

        public function __construct() {
                parent:: __construct();
                $this->load->model('User_model');
                $this->load->helper(array('form', 'url'));
                $this->load->library('session');
        }

        public function register() {
                $this->load->view('register');
                
        }

        public function register_user() {
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');
                $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

                $data = array (
                        'username' => $username,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => $password
                );

                $result = $this->User_model->register_user($data);
                if ($result) {
                        $this->session->set_flashdata('message', 'Registration Successful!');
                        redirect('user/login');
                } else {
                        $this->session->set_flashdata('message', 'Registration Failed!');
                        redirect('user/register');
                }
        }

        public function login() {
                $this->load->view('login');
                
        }

        public function login_user() {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->User_model->login($username, $password);
                if ($user) {
                        $this->session->set_userdata('user', $user);
                        redirect('user/dashboard');
                } else {
                        log_message('error', 'Login Failed for user: '. $username);
                        
                        $this->session->set_flashdata('message', 'Invalid Login!');
                        redirect('user/login');
                }
        }

        public function dashboard() {
                
                $this->load->view('header');
                if (!$this->session->userdata('user')) {
                        redirect('user/login');
                }
                $this->load->view('dashboard');
                $this->load->view('footer');
                    

        }

        public function about() {
                $this->load->view('about');
        }

        public function logout() {
                $this->session->unset_userdata('user');
                redirect('user/login');
        }
}