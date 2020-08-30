<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->authentication->is_loggedin() === false) redirect('auth/logout');
        $this->load->model('Pertanyaan_model', 'model');
    }

    public function index()
    {
        $data['content'] = 'pertanyaan';
        $this->load->view('layouts/master', $data);
    }

    public function get_pertanyaan(){
        $data = $this->model->get_pertanyaan($this->session->userdata('skm_id'));
        echo json_encode($data);
    }

    public function get_jawaban(){
        $data = $this->model->get_jawaban($this->input->post('pertanyaan_id'));
        echo json_encode($data);
    }
    

    public function add_pertanyaan(){
        $pertanyaan = $this->input->post('pertanyaan_data');
        $skm = $this->session->userdata('skm_id');
        $jawaban= $this->input->post('jawaban');
        $skor= $this->input->post('skor');
        $hitung= $this->input->post('hitung');
        $jenis= $this->input->post('jenis');

        $jenis1 = 'pilihan';
        if($jenis == 1){
            $jenis1 = 'isian';
        }

        $data = array(
            'pertanyaan_data' => $pertanyaan,
            'pertanyaan_skm'           => $skm,
            'pertanyaan_flaghitungskor'    => $hitung,
                    'pertanyaan_jenis'             => $jenis1,
        );

        $id_pertanyaan = $this->model->add_pertanyaan($data);
        foreach($skor as $k=> $item1)
        {
            if($hitung == 0){
                $data_umum = array(
                    'jawaban_pertanyaan_id'        => $id_pertanyaan,
                    'jawaban_pilihan'           => $jawaban[$k],
                    'jawaban_flaghitungskor'    => $hitung,
                    'jawaban_jenis'             => $jenis1,
                    'jawaban_skor'             => 0,
                );
                $this->model->add_pertanyaan_jawaban($data_umum);
            }else{
                $data_khusus = array(
                    'jawaban_pertanyaan_id'        => $id_pertanyaan,
                    'jawaban_pilihan'           => $jawaban[$k],
                    'jawaban_flaghitungskor'    => $hitung,
                    'jawaban_jenis'             => $jenis1,
                    'jawaban_skor'             => $item1,
                );
                $this->model->add_pertanyaan_jawaban($data_khusus);
            }
            
        }
        echo json_encode(true);
    }

    public function add_pertanyaan_isian(){
        $pertanyaan = $this->input->post('pertanyaan_data');
        $skm = $this->session->userdata('skm_id');
        $jawaban= $this->input->post('jawaban');
        $hitung= $this->input->post('hitung');
        $jenis= $this->input->post('jenis');

        $jenis1 = 'pilihan';
        if($jenis == 1){
            $jenis1 = 'isian';
        }

        $data = array(
            'pertanyaan_data' => $pertanyaan,
            'pertanyaan_skm'           => $skm
        );

        $id_pertanyaan = $this->model->add_pertanyaan($data);
       
        $datas = array(
            'jawaban_pertanyaan_id'         => $id_pertanyaan,
            'jawaban_flaghitungskor'        => $hitung,
            'jawaban_jenis'                 => $jenis1,
            'jawaban_skor'                  => 0,
            'jawaban_tipe_input'            => $jawaban,
        );
        $this->model->add_pertanyaan_jawaban($datas);

        echo json_encode(true);
            
    }

    public function delete_pertanyaan(){
        $id = $this->input->post('pertanyaan_id');
        $this->model->delete_pertanyaan_respon($id);
        $this->model->delete_pertanyaan_jawaban($id);
        $this->model->delete_pertanyaan($id);
        echo json_encode(true);
    }

    public function update_pertanyaan(){
        $id_pertanyaan = $this->input->post('pertanyaan_id');
        $jawaban = $this->input->post('jawaban');
        $data = array(
            'pertanyaan_data'   => $this->input->post('pertanyaan_data')
        );
        $this->model->update_pertanyaan($id_pertanyaan, $data);
        foreach($this->input->post('jawaban_id') as $k=> $item1)
        {
            $data_umum = array(
                'jawaban_pilihan'           => $jawaban[$k],
            );
            $this->model->update_jawaban($item1, $data_umum);
        }
        echo json_encode(true);
    }

    public function update_pertanyaan_isian(){
        $id_pertanyaan = $this->input->post('pertanyaan_id');
        $jawaban = $this->input->post('jawaban');
        $jawaban_id = $this->input->post('jawaban_id');
        $data = array(
            'pertanyaan_data'   => $this->input->post('pertanyaan_data')
        );

        $this->model->update_pertanyaan($id_pertanyaan, $data);

        $data_umum = array(
            'jawaban_tipe_input'           => $jawaban,
        );
        $this->model->update_jawaban($jawaban_id, $data_umum);
        
        echo json_encode(true);
    }



    

    public function article_list(){
        $warehouse = $this->session->userdata('warehouse_id');
        $data['data'] = $this->model->article_list($warehouse);
        echo json_encode($data);
    }

    public function get_shelf_article(){
        $warehouse = $this->session->userdata('warehouse_id');
        echo json_encode($this->model->get_shelf_article($warehouse));
    }

    public function add_article_single(){
        $code = $this->input->post('article_code');

        $this->db->select('shelf_id');
        $this->db->where('ref_shelf.deleted', 0);
        $this->db->where('shelf_code', $this->input->post('shelf_code'));
        $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $id = $this->db->get('ref_shelf')->row();

        $data = array(
            'article_code'          => $this->input->post('article_code'),
            'article_type'          => 2,
            'article_created_by'    => $this->session->userdata('user_id'),
            'article_shelf_id'      => $id->shelf_id,
            'created_at'            => date('Y-m-d H:i:s')
        );
        echo json_encode($this->model->add_article_single($data, $code, $this->session->userdata('warehouse_id')));
    }

    public function add_article_item_single(){
        $code = $this->input->post('article_code');

        $this->db->select('shelf_id');
        $this->db->where('ref_shelf.deleted', 0);
        $this->db->where('shelf_code', $this->input->post('shelf_code'));
        $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $id = $this->db->get('ref_shelf')->row();

        $data = array(
            'article_item_code'     => $this->input->post('article_code'),
            'article_type'          => 1,
            'article_created_by'    => $this->session->userdata('user_id'),
            'article_shelf_id'      => $id->shelf_id,
            'created_at'            => date('Y-m-d H:i:s')
        );
        echo json_encode($this->model->add_article_item_single($data, $code, $this->session->userdata('warehouse_id')));
    }

    public function check_exists_article(){
        $code = $this->input->post('article_code');
        echo json_encode($this->model->check_exists_article($this->session->userdata('warehouse_id'),$code));
    }

    public function check_exists_article_item(){
        $code = $this->input->post('article_code');
        echo json_encode($this->model->check_exists_article_item($this->session->userdata('warehouse_id'),$code));
    }

    public function delete_article(){
        $data = array(
            'updated_at'    => date('Y-m-d H:i:s'),
            'deleted'       => 1
        );
        $id = $this->input->post('article_id');
        echo json_encode($this->model->delete_article($id, $data));
    }

    public function add_article_multiple(){
        $code = $this->input->post('article_array');

        $this->db->select('shelf_id');
        $this->db->where('ref_shelf.deleted', 0);
        $this->db->where('shelf_code', $this->input->post('shelf_code'));
        $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $id = $this->db->get('ref_shelf')->row();

        foreach($code as $row) {
            $data = array(
                'article_code'          => $row,
                'article_type'          => 2,
                'article_created_by'    => $this->session->userdata('user_id'),
                'article_shelf_id'      => $id->shelf_id,
                'created_at'            => date('Y-m-d H:i:s')
            );
            $this->model->add_article_single($data, $row, $this->session->userdata('warehouse_id'));
        }
        echo json_encode(true);
    }

    public function add_article_item_multiple(){
        $code = $this->input->post('article_array');

        $this->db->select('shelf_id');
        $this->db->where('ref_shelf.deleted', 0);
        $this->db->where('shelf_code', $this->input->post('shelf_code'));
        $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $id = $this->db->get('ref_shelf')->row();

        foreach($code as $row) {
            $data = array(
                'article_item_code'     => $row,
                'article_type'          => 1,
                'article_created_by'    => $this->session->userdata('user_id'),
                'article_shelf_id'      => $id->shelf_id,
                'created_at'            => date('Y-m-d H:i:s')
            );
            $this->model->add_article_item_single($data, $row, $this->session->userdata('warehouse_id'));
        }
        echo json_encode(true);
    }

    public function update_article(){
        $this->db->select('shelf_id');
        $this->db->where('ref_shelf.deleted', 0);
        $this->db->where('shelf_code', $this->input->post('shelf_code'));
        $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $ids = $this->db->get('ref_shelf')->row();

        $data = array(
            'updated_at'              => date('Y-m-d H:i:s'),
            'article_code'            => $this->input->post('article_code'),
            'article_shelf_id'        => $ids->shelf_id,
        );
        $id = $this->input->post('article_id');
        echo json_encode($this->model->update_article($id, $data, $this->input->post('article_code'), $this->session->userdata('warehouse_id')));
    }

    public function update_article_item(){
        $this->db->select('shelf_id');
        $this->db->where('ref_shelf.deleted', 0);
        $this->db->where('shelf_code', $this->input->post('shelf_code'));
        $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $ids = $this->db->get('ref_shelf')->row();

        $data = array(
            'updated_at'              => date('Y-m-d H:i:s'),
            'article_item_code'            => $this->input->post('article_code'),
            'article_shelf_id'        => $ids->shelf_id,
        );
        $id = $this->input->post('article_id');
        echo json_encode($this->model->update_article_item($id, $data, $this->input->post('article_code'), $this->session->userdata('warehouse_id')));
    }

    public function scan_article(){
        $code = $this->input->post('article_code');
        echo json_encode($this->model->scan_article($this->session->userdata('warehouse_id'),$code));
    }

    public function code_article(){
        $code = $this->input->post('article_item_code');
        echo json_encode($this->model->code_article($this->session->userdata('warehouse_id'),$code));
    }

    public function check_upload_article(){
        $code = $this->input->post('article_code');
        $type = $this->input->post('type');
        echo json_encode($this->model->check_upload_article($this->session->userdata('warehouse_id'),$code, $type));
    }

    public function add_upload(){
        $article = $this->input->post('article');
        $type = $this->input->post('type');

        if($type == 1){
            foreach($article as $row) {
                $this->db->select('shelf_id');
                $this->db->where('ref_shelf.deleted', 0);
                $this->db->where('shelf_code', $row['Shelf']);
                $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
                $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
                $ids = $this->db->get('ref_shelf')->row();

                $data = array(
                    'article_item_code'     => $row['Article'],
                    'article_type'          => 1,
                    'article_created_by'    => $this->session->userdata('user_id'),
                    'article_shelf_id'      => $ids->shelf_id,
                    'created_at'            => date('Y-m-d H:i:s')
                );
                $this->model->add_article_item_single($data, $row['Article'], $this->session->userdata('warehouse_id'));
            }
        }else{
            foreach($article as $row) {
                $this->db->select('shelf_id');
                $this->db->where('ref_shelf.deleted', 0);
                $this->db->where('shelf_code', $row['Shelf']);
                $this->db->where('rack_warehouse_id',$this->session->userdata('warehouse_id'));
                $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
                $ids = $this->db->get('ref_shelf')->row();

                $data = array(
                    'article_code'     => $row['Article'],
                    'article_type'          => 2,
                    'article_created_by'    => $this->session->userdata('user_id'),
                    'article_shelf_id'      => $ids->shelf_id,
                    'created_at'            => date('Y-m-d H:i:s')
                );
                $this->model->add_article_single($data, $row['Article'], $this->session->userdata('warehouse_id'));
            }
        }

        echo json_encode(true);
    }
}
