<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Loader extends CI_Loader {
    public function admin_view($template_name, $vars = array(), $return = FALSE)
    {
        $content  = $this->view('admin/header', $vars, $return);
        $content .= $this->view('admin/'.$template_name, $vars, $return);
        $content .= $this->view('admin/footer', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
    public function template_view($template_name, $vars = array(), $return = FALSE,$attr = FALSE)
    {
        if($attr == FALSE){
            $content  = $this->view('frontend/header', $vars, $return);
            $content .= $this->view('frontend/'.$template_name, $vars, $return);
            $content .= $this->view('frontend/footer', $vars, $return);
        }else{
            $content .= $this->view('frontend/'.$template_name, $vars, $return);
        }
        if ($return)
        {
            return $content;
        }
    }
}