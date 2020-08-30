<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function count_pertanyaan(){
        $this->db->select('*');
		$this->db->where('pertanyaan_skm',$this->session->userdata('skm_id'));
		return $this->db->get('tb_pertanyaan')->num_rows();
	}

	public function count_responden($mulai, $selesai){
        $this->db->select('*');
		$this->db->where('m_respon_skm_id',$this->session->userdata('skm_id'));
		$this->db->where('m_respon_tanggal >=', $mulai);
		$this->db->where('m_respon_tanggal <=', $selesai);
		return $this->db->get('tb_m_respon')->num_rows();
	}

	public function get_list_pertanyaan(){
		$this->db->select('*');
		$this->db->where('pertanyaan_skm',$this->session->userdata('skm_id'));
		$this->db->where('pertanyaan_flaghitungskor',1);
		$this->db->where('pertanyaan_jenis','pilihan');
		return $this->db->get('tb_pertanyaan')->result();
	}

	public function get_jawaban_pertanyaan($id){
        $this->db->select('*');
		$this->db->where('jawaban_pertanyaan_id',$id);
		$this->db->where('jawaban_flaghitungskor',1);
		$this->db->where('jawaban_jenis','pilihan');
		return $this->db->get('tb_jawaban')->result();
	}

	public function get_skor_pertanyaan($id, $mulai, $selesai){
        $this->db->select('*');
		$this->db->where('respon_jawabanid',$id);
		$this->db->where('respon_tgl >=', $mulai);
		$this->db->where('respon_tgl <=', $selesai);
		return $this->db->get('tb_respon')->num_rows();
	}

	public function skor_respon($mulai, $selesai){
        $this->db->select_sum('respon_skor');
		$this->db->where('respon_skm_id',$this->session->userdata('skm_id'));
		$this->db->where('respon_tgl >=', $mulai);
		$this->db->where('respon_tgl <=', $selesai);
		return $this->db->get('tb_respon')->result();
	}
	

}
