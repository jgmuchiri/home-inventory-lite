<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_notes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function add(){
        $data = array(
            'title'  => $this->input->post("title"),
            'content'  => $this->input->post("content"),
            'date'  => time()
        );
        if($this->db->insert('notes',$data)){
           $this->conf->msg('success','Note created');
        }else{
            $this->conf->msg('danger','Error creating note');
        }
        redirect('notes');
    }
    function delete($id){
        if($id !==""){
            $data=array('id'=>$id);

            $this->db->where('id',$id);
            if($this->db->delete('notes',$data)){
                $this->conf->msg('success','Note deleted!');
            }else{
                $this->conf->msg('danger','Error deleting note');
            }
        }
    }
    function edit($id){
        $data = array(
            'title'  => $this->input->post("title"),
            'content'  => $this->input->post("content")
        );
        $this->db->where('id',$id);
        if($this->db->update('notes',$data)){
            $this->conf->msg('success','Note updated');
        }else{
            $this->conf->msg('danger','Error updating note');
        }
        redirect('notes');
    }
}