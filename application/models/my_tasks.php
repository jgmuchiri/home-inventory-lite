<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_tasks extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    /*
     * add()
     * @params 0
     */
    function add(){
        $data = array(
            'name'  => $this->input->post("task_name")
        );
        if($this->db->insert('tasks',$data)){
            $this->conf->msg('success','Task created!');
            redirect('tasks');
        }else{
            $this->conf->msg('danger','Error creating task!');
            redirect('tasks');
        }
    }
    /*
     * delete()
     * @params $id
     */
    function delete($id){
        if($id !==""){
            $data=array('id'=>$id);

            $this->db->where('id',$id);
            if($this->db->delete('tasks',$data)){
                $this->conf->msg('success','Task deleted!');
            }
            else{
                $this->conf->msg('danger','Error deleting task!');
            }

        }
    }
}