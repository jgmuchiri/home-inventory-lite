<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->conf->setRedirect();
    }
	function index(){
		$this->load->view('apps/calendar/index');	
	}
	function edit(){

	}
	function delete(){
		
	}
}