<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of donacion
 *
 * @author cancha
 */
class Donacion extends CI_Controller {
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('donacion');
    }
}

?>
