<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if ($this->authentication->is_loggedin() === false) redirect('auth/logout');
        $this->load->model('Dashboard_model', 'model');
    }

    public function index()
    {
        $data['content'] = 'dashboard';
        $this->load->view('layouts/master', $data);
    }

    public function get_dashboard(){
        $mulai = $this->input->post('mulai');
        $selesai = $this->input->post('selesai');

        echo json_encode(
            [
                'pertanyaan'    => $this->model->count_pertanyaan(),
                'responden'    => $this->model->count_responden($mulai, $selesai),
                'skor'    => $this->model->skor_respon($mulai, $selesai),
            ] 
        );
    }

    public function get_chart(){
        $mulai = $this->input->post('mulai');
        $selesai = $this->input->post('selesai');

        $data = $this->model->get_list_pertanyaan();

        foreach($data as $k=> $item1)
        {
            $data[$k]->jawaban = $this->model->get_jawaban_pertanyaan($item1->pertanyaan_id);
            foreach($data[$k]->jawaban as $a=> $item2)
            {
                $data[$k]->jawaban[$a]->skor = $this->model->get_skor_pertanyaan($item2->jawaban_id, $mulai, $selesai);
            }
            
        }

        echo json_encode($data);
    }

    
}
