<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('my_notes');
        $this->conf->setRedirect();

        $this->notes = $this->db->query('SELECT * FROM notes');

    }

    function page($page)
    {
        return $this->load->view($page);
    }

    function notesData($id = 1)
    {
        $data['thisNote']   = $this->db->query("SELECT * FROM notes WHERE id={$id}");
        $data['notes_list'] = $this->db->query('SELECT * FROM notes');
        return $data;
    }

    function index()
    {
        $this->page('inc/header');
        $data['notes_list'] = $this->notes;
        $this->load->view('apps/notes/index', $data);
        $this->page('inc/footer');
    }

    function view($id = 0)
    {
        $data = $this->notesData($id);
        $this->load->view('apps/notes/view', $data);
    }

    function newNote()
    {
        $data = $this->notesData();
        $this->load->view('apps/notes/create', $data);
    }


    function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run()) {
            $this->my_notes->add();
        } else {
            $this->conf->msg('danger', 'Error! Missing required fields.');

        }
        $this->conf->redirectPrev();
    }

    function edit($id = 0)
    {
        $data = $this->notesData($id);
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run()) {
            $this->my_notes->edit($id);
        } else {
            $this->session->set_flashdata('result', '' . validation_errors());
            $this->load->view('apps/notes/edit', $data);
        }
    }

    function delete($id = "")
    {
        $this->my_notes->delete($id);
        $this->conf->redirectPrev();
    }
}