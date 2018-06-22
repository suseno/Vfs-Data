<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Edc_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	
	public function get_edc()
	{
		$query = $this->db->query("SELECT * FROM tb_dash_edcpro WHERE kanwil_nama_implementor NOT IN ('Grand Total')");
		return $query;
	}
	
	public function get_edc_gt()
	{
		$query = $this->db->query("SELECT * FROM tb_dash_edcpro WHERE kanwil_nama_implementor = 'Grand Total'");
		return $query;
	}
}