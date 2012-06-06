<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author cancha
 */
class Login extends CI_Controller{
    
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('login');
    }
    
    public function registrar()
    {
        $this->load->helper('url');
        $this->load->view('registrar_usuario');
    }
}

?>
