<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Documents extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
    }

    function page($page, $data = array())
    {
        $this->conf->inc('header');
        $this->load->view('apps/documents/' . $page . '', $data);
        $this->conf->inc('footer');
    }

    function index()
    {
        $this->page('index');

    }

    function files()
    {
        $this->load->view('apps/documents/files');
    }

    function delete($id)
    {

    }

}