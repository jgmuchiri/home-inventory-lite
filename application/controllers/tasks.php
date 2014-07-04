<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tasks extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('my_tasks');
        $this->conf->setRedirect();

        $this->data['tasks']=$this->db->query('SELECT * FROM tasks');
    }

    function index()
    {
        $this->load->view('inc/header');
        $this->load->view('apps/todo/index',$this->data);
        $this->load->view('inc/footer');
    }

    function view(){
        $this->load->view('apps/todo/index',$this->data);
    }
    function add()
    {
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');

        if ($this->form_validation->run() == FALSE) {
        } else {
            $this->my_tasks->add();
        }
        $this->conf->redirectPrev();
    }
    function delete($id){
        $this->my_tasks->delete($id);
        $this->conf->redirectPrev();
    }
}