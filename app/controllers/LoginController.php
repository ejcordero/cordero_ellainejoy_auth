<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: LoginController
 * 
 * Automatically generated via CLI.
 */
class LoginController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->library('lauth');
        $this->call->library('session');
    }

    public function index() {
        if ($this->io->method() == 'post') {
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            
            $user_id = $this->lauth->login($email, $password);
            if ($user_id) {
                $this->lauth->set_logged_in($user_id);
                redirect('users'); 
            } else {
                echo "Invalid email or password";
            }
        } else {
            $this->call->view('auth/login'); 
        }
    }

    public function logout() {
        $this->lauth->set_logged_out();
        redirect('login');
    }
}