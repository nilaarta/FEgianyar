<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	
	public function get_pertanyaan($id){
		$this->db->select('*');
        $this->db->where('pertanyaan_skm',$id);
        // $this->db->join('tb_jawaban', 'tb_jawaban.jawaban_pertanyaan_id = tb_pertanyaan.pertanyaan_id', 'left');
		return $this->db->get('tb_pertanyaan')->result();
    }

    public function get_jawaban($id){
		$this->db->select('*');
        $this->db->where('jawaban_pertanyaan_id',$id);
        // $this->db->join('tb_jawaban', 'tb_jawaban.jawaban_pertanyaan_id = tb_pertanyaan.pertanyaan_id', 'left');
		return $this->db->get('tb_jawaban')->result();
    }

    public function add_pertanyaan($data){
        $this->db->insert('tb_pertanyaan',$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    public function add_pertanyaan_jawaban($data){
        $this->db->insert('tb_jawaban',$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    public function delete_pertanyaan($id){
        $this->db->where('pertanyaan_id', $id);
        return $this->db->delete('tb_pertanyaan');
    }

    public function delete_pertanyaan_jawaban($id){
        $this->db->where('jawaban_pertanyaan_id', $id);
        return $this->db->delete('tb_jawaban');
    }

    public function delete_pertanyaan_respon($id){
        $this->db->where('respon_pertanyaanid', $id);
        return $this->db->delete('tb_respon');
    }

    public function update_pertanyaan($id, $data){
        $this->db->where('pertanyaan_id', $id);
        return $this->db->update('tb_pertanyaan', $data);
    }

    public function update_jawaban($id, $data){
        $this->db->where('jawaban_id', $id);
        return $this->db->update('tb_jawaban', $data);
    }

    
    // public function get_shelf_article($warehouse){
    //     $this->db->select('*');
    //     $this->db->where('ref_shelf.deleted',0);
    //     $this->db->where('rack_warehouse_id',$warehouse);
    //     $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
    //     $this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
	// 	$this->db->join('ref_user', 'ref_shelf.shelf_created_by = ref_user.user_id', 'left');
	// 	return $this->db->get('ref_shelf')->result();
    // }

    // public function scan_shelf($id, $code){
	// 	$this->db->select('*');
	// 	$this->db->where('ref_shelf.deleted',0);
    //     $this->db->where('shelf_code',$code);
    //     $this->db->where('rack_warehouse_id',$id);
    //     $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
    //     $this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
    //     $check_exists = $this->db->get('ref_shelf')->row();

	// 	if(!empty($check_exists)){
	// 		return array(
    //             'success'   => true,
    //             'data'      => $check_exists
    //         );
	// 	}else{
    //         return array(
    //             'success'   => false,
    //             'data'      => null
    //         );
	// 	}
		
	// }

	public function add_article_single($data, $code, $warehouse){
		$this->db->select('*');
		$this->db->where('article_code',$code);
		$this->db->where('ref_article.deleted',0);
        $this->db->where('rack_warehouse_id',$warehouse);
        $this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
		$check_exists = $this->db->get('ref_article')->row();

		if($check_exists){
			return false;
		}else{
			return $this->db->insert('ref_article', $data);
		}
		
    }

    public function add_article_item_single($data, $code, $warehouse){
		$this->db->select('*');
		$this->db->where('article_item_code',$code);
		$this->db->where('ref_article.deleted',0);
        $this->db->where('rack_warehouse_id',$warehouse);
        $this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
		$check_exists = $this->db->get('ref_article')->row();

		if($check_exists){
			return false;
		}else{
			return $this->db->insert('ref_article', $data);
		}
		
    }
    
    public function check_exists_article($warehouse, $code){
		$this->db->select('*');
		$this->db->where('ref_article.deleted',0);
        $this->db->where('article_code',$code);
        $this->db->where('rack_warehouse_id',$warehouse);
        $this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
		$check_exists = $this->db->get('ref_article')->row();

		if($check_exists){
			return true;
		}else{
			return false;
		}
    }
    
    public function check_exists_article_item($warehouse, $code){
		$this->db->select('*');
		$this->db->where('ref_article.deleted',0);
        $this->db->where('article_item_code',$code);
        $this->db->where('rack_warehouse_id',$warehouse);
        $this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
		$check_exists = $this->db->get('ref_article')->row();

		if($check_exists){
			return true;
		}else{
			return false;
		}
	}

	public function delete_article($id, $data){
		$this->db->where('article_id', $id);
    	return $this->db->update('ref_article', $data);
	}
	
	public function update_article($id, $data, $code, $warehouse){
        $this->db->where('article_id', $id);
        return $this->db->update('ref_article', $data);
    }
    
    public function update_article_item($id, $data, $code, $warehouse){
        $this->db->where('article_id', $id);
        return $this->db->update('ref_article', $data);
	}

	public function scan_article($id, $code){
		$this->db->select('*');
		$this->db->where('ref_article.deleted',0);
        $this->db->where('article_code',$code);
		$this->db->where('rack_warehouse_id',$id);
		$this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
        $check_exists = $this->db->get('ref_article')->row();

		if(!empty($check_exists)){
			return array(
                'success'   => true,
                'data'      => $check_exists
            );
		}else{
            return array(
                'success'   => false,
                'data'      => null
            );
		}
		
	}

	public function check_upload_article($id, $code, $type){
		if($type == 1){
			$this->db->select('*');
			$this->db->where('ref_article.deleted',0);
			$this->db->where('article_item_code',$code);
			$this->db->where('rack_warehouse_id',$id);
			$this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
			$this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
			$this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
			$check_exists = $this->db->get('ref_article')->row();

			if(!empty($check_exists)){
				return array(
					'success'   => true,
					'data'      => $check_exists
				);
			}else{
				return array(
					'success'   => false,
					'data'      => null
				);
			}
		}else{
			$this->db->select('*');
			$this->db->where('ref_article.deleted',0);
			$this->db->where('article_code',$code);
			$this->db->where('rack_warehouse_id',$id);
			$this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
			$this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
			$this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
			$check_exists = $this->db->get('ref_article')->row();

			if(!empty($check_exists)){
				return array(
					'success'   => true,
					'data'      => $check_exists
				);
			}else{
				return array(
					'success'   => false,
					'data'      => null
				);
			}
		}
	}

	public function code_article($id, $code){
		$this->db->select('*');
		$this->db->where('ref_article.deleted',0);
        $this->db->where('article_item_code',$code);
		$this->db->where('rack_warehouse_id',$id);
		$this->db->join('ref_shelf', 'ref_article.article_shelf_id = ref_shelf.shelf_id', 'left');
        $this->db->join('ref_rack', 'ref_shelf.shelf_rack_id = ref_rack.rack_id', 'left');
        $this->db->join('ref_warehouse', 'ref_rack.rack_warehouse_id = ref_warehouse.warehouse_id', 'left');
        $check_exists = $this->db->get('ref_article')->row();

		if(!empty($check_exists)){
			return array(
                'success'   => true,
                'data'      => $check_exists
            );
		}else{
            return array(
                'success'   => false,
                'data'      => null
            );
		}
		
	}
}
