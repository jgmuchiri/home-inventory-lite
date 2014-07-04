<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('my_inventory');
        $this->conf->setRedirect();
    }

    function page($page)
    {
        return $this->load->view($page);
    }

    function index(){
        $this->page('inc/header');
        if(isset($_GET['sort'])){
            $data['items'] = $this->db->query('SELECT * FROM inventory ORDER BY '.$_GET['sort'].' ASC');
        }else if(isset($_GET['location'])){
            $this->db->where('location',$_GET['location']);
            $data['items'] = $this->db->get('inventory');
        }
        else{
            $data['items'] = $this->db->query('SELECT * FROM inventory');
        }



        $this->load->view('apps/inventory/index', $data);
        $this->page('inc/footer');
    }
    function view(){
        $data['items'] = $this->db->query('SELECT * FROM inventory');
        $this->load->view('apps/inventory/index', $data);
    }
    function create(){
        $this->page('apps/inventory/create');
    }
    function add()
    {
        $this->form_validation->set_rules('item', 'Item', 'required');

        if ($this->form_validation->run()) {
            $this->my_inventory->add();
        } else {
            $this->conf->msg('danger', 'Error adding item!');
        }
        $this->conf->redirectPrev();
    }

    function edit_form($id)
    {
        $data['item'] = $this->db->query("SELECT * FROM inventory WHERE id={$id}");
        $this->load->view('apps/inventory/edit', $data);
    }

    function edit($id)
    {
        $this->form_validation->set_rules('item', 'Item', 'required');
        if ($this->form_validation->run()) {
            $this->my_inventory->edit($id);
        }else{
            $this->conf->msg('danger','Entry validation failed! Please check all required fields.');
        }
        $this->conf->redirectPrev();
    }

    function delete($id)
    {
        $this->my_inventory->delete($id);
        $this->conf->redirectPrev();
    }
}