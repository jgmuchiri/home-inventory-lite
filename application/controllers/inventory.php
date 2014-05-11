<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('my_inventory');
    }

    function page($page)
    {
        return $this->conf->inc($page);
    }

    function index()
    {
        $this->page('header');
        $data['items'] = $this->db->query('SELECT * FROM inventory');
        $this->load->view('apps/inventory/index', $data);
        $this->page('footer');
    }

    function add()
    {
        $this->form_validation->set_rules('item', 'Item', 'required');

        if ($this->form_validation->run()) {
            $this->my_inventory->add();
        } else {
            $this->conf->msg('danger', 'Error adding item!');
        }
        redirect('inventory');
    }

    function edit($id)
    {
        $this->form_validation->set_rules('item', 'Item', 'required');

        if ($this->form_validation->run()) {
            $this->my_inventory->edit($id);
        } else {
            $this->conf->inc('header');

            $data=array(
                'list'=>$this->db->query("SELECT * FROM inventory"),
                'item'=>$this->db->query("SELECT * FROM inventory WHERE id={$id}")
            );
            $this->load->view('apps/inventory/edit',$data);
            $this->conf->inc('footer');
        }
    }
    function delete($id){
        $this->my_inventory->delete($id);
        redirect('inventory');
    }
}