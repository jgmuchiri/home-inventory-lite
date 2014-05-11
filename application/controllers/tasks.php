<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tasks extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('my_tasks');
    }
    function index()
    {
        $data['tasks']=$this->db->query('SELECT * FROM tasks');
        $this->load->view('apps/todo/index',$data);
    }

    function add()
    {
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('tasks');
        } else {
            $this->my_tasks->add();
        }
    }
    function delete($id){
        $this->my_tasks->delete($id);
        redirect('tasks');
    }
}