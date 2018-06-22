<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolauko extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('uko_model');
        $this->load->helper('url_helper');
		$this->load->library('pagination');

    }
	
	public function index()
	{
		$data['title'] = 'Home Portal UKO Report';
		$jumlah_data = $this->uko_model->get_jumlah_data();
		$config['base_url'] = base_url().'index.php/pengelolauko/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 30;
		$from = $this->uri->segment(3);
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="page-item"><i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="page-item"><i class="fa fa-long-arrow-left"></i>';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$data['ukodata'] = $this->uko_model->get_uko($config['per_page'],$from);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/menu');
		$this->load->view('pengelolauko/index', $data);
		$this->load->view('layout/footer');
	}
	
	public function search()
	{
		$data['title'] = 'Home Portal UKO Report';
		
		$tid = $this->input->post('tid');
		$mid = $this->input->post('mid');
		$nama_merchant = $this->input->post('nama_merchant');
		$peruntukkan = $this->input->post('peruntukkan'); 
		$uker_nama_implementor = $this->input->post('uker_nama_implementor');
		
		
		$data['ukodata'] = $this->uko_model->get_uko_search($tid, $mid, $nama_merchant, $peruntukkan, $uker_nama_implementor);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/menu');
		$this->load->view('pengelolauko/search', $data);
		$this->load->view('layout/footer');
	}
	
	
}