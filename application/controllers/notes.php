<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('my_notes');
        $this->conf->setRedirect();
    }
    function page($page){
        return $this->conf->inc($page);
    }

    function notesData($id=1){
        $data['thisNote']=$this->db->query("SELECT * FROM notes WHERE id={$id}");
        $data['notes_list'] = $this->db->query('SELECT * FROM notes');
        return $data;
    }

    function index($id = 0)
    {
        $this->page('header');
        $data=$this->notesData($id);
        $this->load->view('apps/notes/index', $data);
        $this->page('footer');

    }

    function create()
    {
        $this->page('header');
        $data=$this->notesData();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run()) {
            $this->my_notes->add();
        } else {
            $this->session->set_flashdata('result', '' . validation_errors());
            $this->load->view('apps/notes/create',$data);
        }
        $this->page('footer');
    }


    function edit($id = 0)
    {
        $this->page('header');
        $data=$this->notesData($id);
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run()) {
            $this->my_notes->edit($id);
        } else {
            $this->session->set_flashdata('result', '' . validation_errors());
            $this->load->view('apps/notes/edit',$data);
        }
        $this->page('footer');
    }
    function delete($id="")
    {
        $this->my_notes->delete($id);
        redirect('notes');
    }
}