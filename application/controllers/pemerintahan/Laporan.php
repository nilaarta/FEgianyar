<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if ($this->authentication->is_loggedin() === false) redirect('auth/logout');
        
    }

    public function index()
    {
        $data['content'] = 'dashboard';
        $this->load->view('layouts/master', $data);
    }
    
    public function lakip()
    {   
        $data['title'] = "Lakip";
        $data['content'] = 'pemerintahan/laporan';
        $this->load->view('layouts/master', $data);
    }

    public function perjanjiankinerja()
    {   
        $data['title'] = "Perjanjian Kinerja";
        $data['content'] = 'pemerintahan/laporan';
        $this->load->view('layouts/master', $data);
    }

    public function rencanaaksi()
    {   
        $data['title'] = "Rencana Aksi";
        $data['content'] = 'pemerintahan/laporan';
        $this->load->view('layouts/master', $data);
    }

    public function renstra()
    {   
        $data['title'] = "Renstra";
        $data['content'] = 'pemerintahan/laporan';
        $this->load->view('layouts/master', $data);
    }

    public function renja()
    {   
        $data['title'] = "Renja";
        $data['content'] = 'pemerintahan/laporan';
        $this->load->view('layouts/master', $data);
    }

    public function iku()
    {   
        $data['title'] = "Iku";
        $data['content'] = 'pemerintahan/laporan';
        $this->load->view('layouts/master', $data);
    }

    
}
