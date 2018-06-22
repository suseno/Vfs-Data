<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vfs_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function get_vfs_nama()
	{
		$query = $this->db->query("
			SELECT kode, pengelola, m,b,u,o,total FROM
			(
			SELECT 
				uker_implementor AS kode,
				uker_nama_implementor AS pengelola,
				SUM(IF(peruntukkan ='MERCHANT',1,0)) m,
				SUM(IF(peruntukkan ='BRILINKS',1,0)) b,
				SUM(IF(peruntukkan ='UKER',1,0)) u,
				SUM(IF(peruntukkan ='OTHERS',1,0)) o,
				COUNT(tid) AS total
			FROM tb_terminaledc_ref a
			WHERE uker_implementor IN ('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI')
			GROUP BY uker_implementor
			UNION ALL

				SELECT
					IF (kanwil_nama_implementor = kanwil_nama_implementor,'Jumlah',0) kode,
					IF (kanwil_nama_implementor = kanwil_nama_implementor,'Grand Total',0) pengelola,
					SUM(IF(peruntukkan ='MERCHANT',1,0)) m,
					SUM(IF(peruntukkan ='BRILINKS',1,0)) b,
					SUM(IF(peruntukkan ='UKER',1,0)) u,
					SUM(IF(peruntukkan ='OTHERS',1,0)) o,
					COUNT(tid) as gt
				FROM tb_terminaledc_ref a
				WHERE uker_implementor IN ('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI')
			) a
		");
		
		return $query->result_array();
	}
	
	public function get_vfs_merk()
	{
		$query = $this->db->query("
			SELECT 
				merk_edc,
				SUM(IF(peruntukkan ='MERCHANT',1,0)) m,
				SUM(IF(peruntukkan ='BRILINKS',1,0)) b,
				SUM(IF(peruntukkan ='UKER',1,0)) u,
				SUM(IF(peruntukkan ='OTHERS',1,0)) o,
				count(tid) as total
			FROM tb_terminaledc_ref 
			WHERE merk_edc IN ('Ingenico','PAX','Verifone', 'Primavista', 'Kartuku', 'Undefined', 'Smartweb', 'Bringin Gigantara', 'PARTNERSHIP BRIZZI', 'Integra', '')
			AND uker_implementor IN ('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI')
			GROUP BY merk_edc
			UNION ALL

			SELECT 
				IF (merk_edc = merk_edc,'Grand Total',0) md,
				SUM(IF(peruntukkan ='MERCHANT',1,0)) m,
				SUM(IF(peruntukkan ='BRILINKS',1,0)) b,
				SUM(IF(peruntukkan ='UKER',1,0)) u,
				SUM(IF(peruntukkan ='OTHERS',1,0)) o,
				count(tid) as total
			FROM tb_terminaledc_ref 
			WHERE merk_edc IN ('Ingenico','PAX','Verifone', 'Primavista', 'Kartuku', 'Undefined', 'Smartweb', 'Bringin Gigantara', 'PARTNERSHIP BRIZZI', 'Integra', '')
			AND uker_implementor IN ('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI')
		");
		
		return $query->result_array();
	}
	
	public function get_vfs_gt()
	{
		$query = $this->db->query("
			SELECT
					IF (kanwil_nama_implementor = kanwil_nama_implementor,'Jumlah',0) kode,
					IF (kanwil_nama_implementor = kanwil_nama_implementor,'Grand Total',0) pengelola,
					SUM(IF(peruntukkan ='MERCHANT',1,0)) tm,
					SUM(IF(peruntukkan ='BRILINKS',1,0)) tb,
					SUM(IF(peruntukkan ='UKER',1,0)) tu,
					COUNT(tid) as gt
				FROM tb_terminaledc_ref a
				WHERE uker_implementor IN ('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI')
		");
		return $query->row();
	}
	
	// pengelola
	public function get_vfs($number,$offset)
	{
		$ui = array('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI');
		$this->db->select('*');
		$this->db->from('tb_terminaledc_ref');
		$this->db->where_in('uker_implementor', $ui);
		$this->db->limit($number, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}
	 
	public function get_jumlah_data(){
		$ui = array('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI');
		$this->db->select('*');
		$this->db->from('tb_terminaledc_ref');
		$this->db->where_in('uker_implementor', $ui);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// pengelola search
	public function get_vfs_search($tid=NULL, $mid=NULL, $nama_merchant=NULL, $peruntukkan=NULL, $uker_nama_implementor=NULL)
	{
		$ui = array('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI');
		$this->db->select('*');
		$this->db->from('tb_terminaledc_ref');
		if(!empty($tid)) { $this->db->like('tid', $tid); }
		if(!empty($nama_merchant)) { $this->db->like('nama_merchant', $nama_merchant); }
		if(!empty($mid)) { $this->db->like('mid', $mid); }
		if(!empty($peruntukkan)) { $this->db->like('peruntukkan', $mid); }
		if(!empty($uker_nama_implementor)) { $this->db->like('uker_nama_implementor', $mid); }
		$this->db->where_in('uker_implementor', $ui);
		$query = $this->db->get();
		return $query->result_array();
	}
}