<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_inventory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * add()
     * @params 0
     */
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

    /*
     * delete()
     * @params $id
     */
    function delete($id)
    {
        //delete files
        $this->db->where('inventory_id', $id);
        $q = $this->db->get('upload')->result();
        foreach ($q as $r) {
            unlink('./assets/documents/uploads/' . $r->file);
        }

        //delete inventory info
        if ($this->db->delete('inventory', array('id' => $id))) {
            $this->conf->msg('success', 'Item deleted!');
        } else {
            $this->conf->msg('danger', 'Error deleting item');
        }

        //delete uploads data
        $this->db->delete('upload', array('inventory_id' => $id));
    }

    /*
     * edit()
     * @params $id
     */
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
        $this->db->where('id', $id);
        if ($this->db->update('inventory', $data)) {
            $this->conf->msg('success', 'Item updated!');
        } else {
            $this->conf->msg('danger', 'Error updating item!');
        }

    }

    function loc_update($id)
    {
        $data['loc'] = $this->input->post('locName');
        $this->db->where('id', $id);
        if ($this->db->update('inventory_locations', $data)) {
            $this->conf->msg('success', 'Locations updated!');
        } else {
            $this->conf->msg('danger', 'Error updating locations!');
        }


    }

    /*
     * loc_add()
     * @params $id
     */
    function loc_add()
    {
        $data['loc'] = $this->input->post('locName');

        if ($this->db->insert('inventory_locations', $data)) {
            $this->conf->msg('success', 'Locations updated!');
        } else {
            $this->conf->msg('danger', 'Error updating locations!');
        }
    }
}