<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load models
        $this->load->model('my_inventory');

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


        if (isset($_GET['sort'])) { // sort by columns
            $data['items'] = $this->db->query('SELECT * FROM inventory ORDER BY ' . $_GET['sort'] . ' ASC');
        } else if (isset($_GET['location'])) { //sort by location
            $this->db->where('location', $_GET['location']);
            $data['items'] = $this->db->get('inventory');
        } else { // show all items
            $data['items'] = $this->db->query('SELECT * FROM inventory');
        }

        $this->load->view('apps/inventory/index', $data);

        $this->load->view('inc/footer');
    }

    /*
     * view()
     * @params 0
     *  list inventory items
     */
    function view()
    {
        $data['items'] = $this->db->query('SELECT * FROM inventory');
        $this->load->view('apps/inventory/index', $data);
    }

    /*
     * create()
     * @params 0
     * display form to add item
     */
    function create()
    {
        $this->load->view('apps/inventory/create');
    }

    /*
     * add()
     * @params 0
     * add item to inventory
     */
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

    /*
     * edit_form()
     * @params $id
     * display edit form
     */
    function edit_form($id)
    {
        $data['item'] = $this->db->query("SELECT * FROM inventory WHERE id={$id}");
        $this->load->view('apps/inventory/edit', $data);
    }

    /*
     * edit()
     * @params $id
     * edit inventory item
     */
    function edit($id)
    {
        $this->form_validation->set_rules('item', 'Item', 'required');
        if ($this->form_validation->run()) {
            $this->my_inventory->edit($id);
        } else {
            $this->conf->msg('danger', 'Error! Please check all required fields.');
        }
        $this->conf->redirectPrev();
    }

    /*
     * delete()
     * @params $id
     *  delete item
     */
    function delete($id)
    {
        $this->my_inventory->delete($id);
        $this->conf->redirectPrev();
    }

    /*
     * lodEdit()
     * @params 0
     * load location edit form
     */
    function locEdit(){
        $data=array(
            'locations'=>$this->db->get('inventory_locations')->result()
        );
        $this->load->view('apps/inventory/loc-edit-form',$data);
    }
    function locAdd(){
        $this->form_validation->set_rules('locName', 'location name', 'required');
        if ($this->form_validation->run()) {
            $this->my_inventory->loc_add();
        } else {
            $this->conf->msg('danger', 'Error! Please check all required fields.');
        }
        $this->conf->redirectPrev();
    }
    /*
     * updateLoc()
     * @params $id
     */
    function locUpdate($id){
        $this->form_validation->set_rules('locName[]', 'location name', 'required');
        if ($this->form_validation->run()) {
            $this->my_inventory->loc_update($id);

        } else {
            $this->conf->msg('danger', 'Error! Please check all required fields.');
        }
        $this->conf->redirectPrev();
    }
}