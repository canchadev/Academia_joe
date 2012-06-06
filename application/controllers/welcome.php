<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Video');
        $this->load->helper('url');
    }
    /**
     * 
     */
    public function index() {
        $videosCarrousel = $this->Video->getVideosCarrousel();
        $this->load->view('welcome_message', 
            array(
                'videosCarrousel' => $videosCarrousel
            )
        );
    }

}

