<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->helper(array('form', 'url'));
        $this->conf->setRedirect();
    }
    /*
     * index()
     * @params $inventoryID
     */

    function index($inventoryID)
    {
        $this->uploadForm($inventoryID);
    }

    /*
     * do_upload()
     * @params 0
     * upload file
     */
    function do_upload()
    {
        $config = array(
            'upload_path'   => './assets/documents/uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg',
            //'max_size'      => '100',
            //'max_width'     => '1240',
            //'max_height'    => '720',
            'encrypt_name'  => true,
        );


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $this->conf->msg('danger', 'Unable to upload. Please try again...');
        } else {
            $upload_data = $this->upload->data();
            $data_ary    = array(
                'inventory_id' => $this->input->post('inventoryID'),
                'title'        => $upload_data['client_name'],
                'file'         => $upload_data['file_name'],
                'width'        => $upload_data['image_width'],
                'height'       => $upload_data['image_height'],
                'type'         => $upload_data['image_type'],
                'size'         => $upload_data['file_size'],
                'date'         => time(),
            );

            $this->db->insert('upload', $data_ary);

            $data = array('upload_data' => $upload_data);

            if ($data) {
                $this->conf->msg('success', 'Image uploaded successfully!');
            } else {
                $this->conf->msg('danger', 'Unable to upload. Please try again...');
            }


        }
        //redirect
        $this->conf->redirectPrev();
    }

    /*
     * view()
     * @params $id
     * view file(s)
     * view all files if $id is not defined. Otherwise, view only one.
     */
    function view($id = 0)
    {
        if ($id !== 0) {
            if (strpbrk($id, '.')) {
                $data['imgWidth']  = 'auto';
                $data['imgHeight'] = 'auto';
                $this->db->where('file', $id);
            } else {
                $data['imgWidth']  = '250px';
                $data['imgHeight'] = '250px';
                $this->db->where('inventory_id', $id);
            }

            $data['images'] = $this->db->get('upload')->result();
            $this->load->view('apps/upload/view_file', $data);

        }
    }

    /*
     * uploadForm()
     * @params $id
     * display upload form
     */
    function uploadForm($id)
    {
        $data['inventoryID'] = $id;
        $this->load->view('apps/upload/upload_form', $data);
    }

}