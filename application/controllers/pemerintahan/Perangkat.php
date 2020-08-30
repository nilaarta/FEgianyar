<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perangkat extends CI_Controller
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
    
    public function bupati()
    {   
        $data['title'] = "Bupati";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function wakilbupati()
    {   
        $data['title'] = "Wakil Bupati";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function sekretariatdaerah()
    {   
        $data['title'] = "Sekretariat Daerah";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function sekretariatdewan()
    {   
        $data['title'] = "Sekretariat Dewan";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function inspektorat()
    {   
        $data['title'] = "Inspektorat";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function bappenda()
    {   
        $data['title'] = "Bappenda";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function dinasdaerah()
    {   
        $data['title'] = "Dinas Daerah";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function kecamatan()
    {   
        $data['title'] = "Kecamatan";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }

    public function daerah()
    {   
        $data['title'] = "Daerah";
        $data['content'] = 'pemerintahan/perangkat';
        $this->load->view('layouts/master', $data);
    }
}
