<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rencanaaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if ($this->authentication->is_loggedin() === false) redirect('auth/logout');
        
    }

    public function index()
    {
        $data['content'] = 'profile/artilambang';
        $this->load->view('layouts/master', $data);
    }
    
}
