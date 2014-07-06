<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tasks extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('my_tasks');
        //set to redirect
        $this->conf->setRedirect();
    }

    /*
     * taskDB()
     * define database tables for reuse in this instance
     */
    function tasksDB()
    {
        $data['tasks'] = $this->db->query('SELECT * FROM tasks');

        return $data;
    }

    function index()
    {
        $this->load->view('inc/header');
        $this->load->view('apps/todo/index', $this->tasksDB());
        $this->load->view('inc/footer');
    }

    /*
     * view()
     */
    function view()
    {
        $this->load->view('apps/todo/index', $this->taskDB);
    }

    /*
     * add()
     */
    function add()
    {
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');

        if ($this->form_validation->run() == FALSE) {
        } else {
            $this->my_tasks->add();
        }
        //redirect
        $this->conf->redirectPrev();
    }

    /*
     * delete()
     */
    function delete($id)
    {
        $this->my_tasks->delete($id);
        //redirect
        $this->conf->redirectPrev();
    }
}