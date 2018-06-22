<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model('uko_model');
        $this->load->helper('url_helper');

    }
	
	public function index()
	{
		$data['title'] = 'Home Portal UKO Report';
		// PUT Data VFS
		$data['ukoname'] = $this->uko_model->get_uko_nama();
		$data['ukomerk'] = $this->uko_model->get_uko_merk();
		$data['ukogt'] = $this->uko_model->get_uko_gt();
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/menu');
		$this->load->view('uko/index', $data);
		$this->load->view('layout/footer');
	}
	
	public function export1()
	{
		$ukoname = $this->uko_model->get_uko_nama();
		$ukogt = $this->uko_model->get_uko_gt();
		$filename = 'UKO-Export-01-'.date('Y-m-d').'-Excel.xls';
		header("Content-type: application/vnd-ms-excell");
		header("Content-Disposition: attachment; filename=".$filename);
				
		echo '<table class="table table-striped table-bordered table-hover table-lg" border="1">
				<thead>
					<tr>
						<th width="20px">NO</th>
						<th width="100px">KODE</th>
						<th>PENGELOLA EDC</th>
						<th width="10%">MERCHANT</th>
						<th width="10%">BRILINK</th>
						<th width="10%">UKO</th>
						<th width="10%">OTHER</th>
						<th width="10%">Total</th>
						<th width="10%">%</th>
					</tr>
				</thead>
				
				<tbody>';	
				$no=1;
				$gt=$ukogt->gt;
				foreach ($ukoname as $rows) { 
 				$t=$rows['total'];
				$p=($t*100)/$gt;
				if($rows['kode']=='Jumlah') { $nomor=""; } else { $nomor=$no; }
				echo'<tr>
						<td>'.$nomor.'</td>
						<td>'.$rows['kode'].'</td>
						<td>'.$rows['pengelola'].'</td>
						<td>'.$rows['m'].'</td>
						<td>'.$rows['b'].'</td>
						<td>'.$rows['u'].'</td>
						<td>'.$rows['o'].'</td>
						<td>'.$rows['total'].'</td>
						<td>'.number_format($p,2,",",".").'</td>
					</tr>';
				$no++; }
				
			echo'</tbody>

            </table>';
			
	}
	
	public function export2()
	{
		$ukomerk = $this->uko_model->get_uko_merk();
		$filename = 'UKO-Export-02-'.date('Y-m-d').'-Excel.xls';
		header("Content-type: application/vnd-ms-excell");
		header("Content-Disposition: attachment; filename=".$filename);
				
		echo '<table class="table table-striped table-bordered table-hover table-lg" border="1">
				<thead>
					<tr class="text-center">
						<th rowspan="2">Merk EDC</th>
						<th colspan="4">Peruntukan</th>
						<th rowspan="2" width="10%">Grand Total</th>
					</tr>
					<tr>
						<th width="10%">MERCHANT</th>
						<th width="10%">BRILINKS</th>
						<th width="10%">UKER</th>
						<th width="10%">OTHERS</th>
					</tr>
				</thead>
				
				<tbody>';	
				foreach ($ukomerk as $rows) { 
				echo'<tr>
						<td>'.$rows['merk_edc'].'</td>
						<td>'.$rows['m'].'</td>
						<td>'.$rows['b'].'</td>
						<td>'.$rows['u'].'</td>
						<td>'.$rows['o'].'</td>
						<td>'.$rows['total'].'</td>
					</tr>';
				}
				
			echo'</tbody>

            </table>';	
	}
}