<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_inventory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function add()
    {
        $data = array(
            'item'     => $this->input->post('item'),
            'location' => $this->input->post('location'),
            'model'    => $this->input->post('model'),
            'serial'   => $this->input->post('serial'),
            'price'    => $this->input->post('price'),
            'value'    => $this->input->post('value')

        );
        if ($this->db->insert('inventory', $data)) {
            $this->conf->msg('success', 'Item added!');
        } else {
            $this->conf->msg('danger', 'Error adding item!');
        }
    }

    function delete($id)
    {
        $data['id'] = $id;

        $this->db->where('id', $id);
        if ($this->db->delete('inventory', $data)) {
            $this->conf->msg('success', 'Item deleted!');
        } else {
            $this->conf->msg('danger', 'Error deleting item');
        }
    }

    function edit($id)
    {
        $data = array(
            'item'     => $this->input->post('item'),
            'location' => $this->input->post('location'),
            'model'    => $this->input->post('model'),
            'serial'   => $this->input->post('serial'),
            'price'    => $this->input->post('price'),
            'value'    => $this->input->post('value')

        );
        $this->db->where('id',$id);
        if ($this->db->update('inventory', $data)) {
            $this->conf->msg('success', 'Item updated!');
        } else {
            $this->conf->msg('danger', 'Error updating item!');
        }

        redirect('inventory');
    }
}