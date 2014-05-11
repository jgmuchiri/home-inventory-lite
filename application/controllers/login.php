<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function index()
    {
        $this->load->view("auth/login");
    }
    function password(){
        $this->load->view("auth/password");
    }
    function register(){
        $this->load->view("auth/register");
    }
}