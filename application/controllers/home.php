<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // set session cookie to redirect here
        $this->conf->setRedirect();

    }

    /*
     * index()
     * @params 0
     */
    function index()
    {
        $this->load->view('inc/header');
        $this->load->view('index');
        $this->load->view('inc/footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */