<?php
$server="localhost";
$userdb="root";
$passdb="";
$db="dgt";
$koneksi=mysqli_connect($server, $userdb, $passdb);
$database=mysqli_select_db($koneksi, $db);

$sql="
			SELECT
				tr.uker_implementor AS kode,
				tr.uker_nama_implementor AS pengelola,
				COUNT(tr.tid) AS total
			FROM tb_terminaledc_ref tr
			WHERE tr.uker_implementor IN ('BGT','BSU','CSA','IMS','ING','JDN','KTK','NRA','PVS','SKD','VSI')
			GROUP BY tr.uker_implementor
";

$query=mysqli_query($koneksi, $sql);




?>
<html>
<head>
	<title>Test</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
	<body>

	<nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow">
	  
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
			VFS Report
	  </a>

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
	  
	<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-lg">
				<thead>
					<tr>
						<th width="20px">NO</th>
						<th>PENGELOLA EDC</th>
						<th width="80px">MERCHANT</th>
						<th width="80px">BRILINK</th>
						<th width="80px">UKO</th>
						<th width="80px">Total</th>
						<th width="80px">%</th>
					</tr>
				</thead>
				
				<tbody> 	
				<?php 
				$no=1;
				while ($rows=mysqli_fetch_array($query)) {
				//$merchant = $this->vfs_model->get_vfs_jenis('MERCHANT', $rows['kode']);
				//$brilinks = $this->vfs_model->get_vfs_jenis('BRILINKS', $rows['kode']);
				//$uker = $this->vfs_model->get_vfs_jenis('UKER', $rows['kode']);
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rows['pengelola']; ?></td>
						<td><?php echo $rows['total']; ?></td>
						<td><?php //echo $brilinks['total']; ?></td>
						<td><?php //echo $uker['total']; ?></td>
						<td><?php //echo $rows['total']; ?></td>
						<td><?php //$persen = $rows['total']?></td>
					</tr>
				<?php $no++; } ?>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td>Grand Total</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
            </table>
        </div>
    </main>	
	
	</div>
    </div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	
	</body>
</html>