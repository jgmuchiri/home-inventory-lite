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

    /*
     * define database tables for reuse in this instance
     */
    function notesData($id = 0)
    {
        $data['thisNote']   = $this->db->query("SELECT * FROM notes WHERE id={$id}");
        $data['notes_list'] = $this->db->query('SELECT * FROM notes');
        return $data;
    }

    /*
     * index()
     * @params 0
     */
    function index()
    {
        $this->load->view('inc/header');
        $data['notes_list'] = $this->notes;
        $this->load->view('apps/notes/index', $data);
        $this->load->view('inc/footer');
    }

    /*
     * view()
     *@ params $id
     * if id is 0 display all notes else, display the note with the id
     **/
    function view($id = 0)
    {
        $data = $this->notesData($id);
        $this->load->view('apps/notes/view', $data);
    }

    /*
     * newNote()
     * new note form
     */
    function newNote()
    {
        $data = $this->notesData();
        $this->load->view('apps/notes/create', $data);
    }

    /*
     * create()
     * create note with validation
     */
    function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run()) {
            $this->my_notes->add();
        } else {
            $this->conf->msg('danger', 'Error! Missing required fields.');
        }

        $this->conf->redirectPrev(); // redirect to previous page
    }

    /*
     * edit()
     * @params $id
     * edit individual note
     */
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

    /*
     * delete()
     * delete note(s)
     */
    function delete($id = "")
    {
        $this->my_notes->delete($id);
        //redirect
        $this->conf->redirectPrev();
    }
}