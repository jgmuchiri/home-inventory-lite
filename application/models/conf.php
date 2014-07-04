<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conf extends CI_Model
{
    // set redirect
    function setRedirect()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->session->set_userdata('last_page', $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_userdata('last_page', base_url());
        }
        //redirect($this->session->userdata('last_page'));
    }

    //redirect to previous
    function redirectPrev()
    {
        redirect($this->session->userdata('last_page'));
    }

    //call status messages
    function msg($type, $msg)
    {
        $this->session->set_flashdata('result', '<p id="msg" class="alert alert-' . $type . '">' . $msg . '</p>');
    }

    /* Check whether user is logged in to access current resource
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

    function  editor($div)
    {
        $base = base_url();

        $js = "<script type='text/javascript' src='{$base}assets/js/nicEdit.js'>
             </script>
                <script type='text/javascript'>
                //<![CDATA[
                bkLib.onDomLoaded(function() {
                    new nicEditor({iconsPath : '{$base}assets/img/nicEditorIcons.gif'
                }).panelInstance($div);
            });
            //]]>
        </script>";

        return $js;
    }
}