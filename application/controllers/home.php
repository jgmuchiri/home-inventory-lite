<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->conf->setRedirect();

    }
function page($page){
    return $this->load->view($page);
}
function index()
	{
        $this->page('inc/header');
        $this->load->view('index');
        $this->page('inc/footer');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */