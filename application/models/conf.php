<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conf extends CI_Model
{
    /*
     * setRedirect()
     * @params 0
     * set redirect session
     * to set controller page for redirect use $this->conf->setRedirect();
     **/

    function setRedirect()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->session->set_userdata('last_page', $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_userdata('last_page', base_url());
        }
    }

    /*
     * redirectPrev()
     * @params 0
     * redirect to prev
     */
    function redirectPrev()
    {
        redirect($this->session->userdata('last_page'));
    }

    /*
     * msg()
     * @params $type, $msg
     * call status messages
     */
    function msg($type, $msg)
    {
        $this->session->set_flashdata('result', '<p id="msg" class="alert alert-' . $type . '">' . $msg . '</p>');
    }

    /*
     * isLoggedIn()
     * @params 0
       * Check whether user is logged in to access current resource
       * return TRUE if logged in else FALSE
       */
    function isLoggedIn()
    {
        //checks set session
        if ($this->session->userdata('logged_in')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * editor()
     * load niceEdit to a div
     * @params $div
     * may not be compatible with some javascripts
     */
    function  editor($div)
    {
        $editorLocation=base_url().'assets/plugins/niceEdit';

        $js = "<script type='text/javascript' src='{$editorLocation}/nicEdit.js'>
             </script>
                <script type='text/javascript'>
                //<![CDATA[
                bkLib.onDomLoaded(function() {
                    new nicEditor({iconsPath : '{$editorLocation}/nicEditorIcons.gif'
                }).panelInstance($div);
            });
            //]]>
        </script>";

        return $js;
    }

    /*
     * settings()
     * @params $name
     * reads site settings from DB
     */
    function settings($name){
        $q = $this->db->get('site_settings')->result();
        foreach($q as $r){
            return $r->$name;
        }
        return false;
    }
}