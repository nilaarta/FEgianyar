<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Foto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if ($this->authentication->is_loggedin() === false) redirect('auth/logout');
        
    }

    public function index()
    {
        $data['content'] = 'detail/foto';
        $this->load->view('layouts/master', $data);
    }
    
}
