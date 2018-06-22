<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Data Berdasarkan Unit Kerja Operasional</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a class="btn btn-success btn-md" href="<?php echo base_url(); ?>index.php/dashboard/export1">Export To Excell</a>
              </div>

            </div>
          </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-lg">
				<thead>
					<tr>
						<th width="20px">NO</th>
						<th>PENGELOLA EDC</th>
						<th width="10%">MERCHANT</th>
						<th width="10%">BRILINK</th>
						<th width="10%">UKER</th>
						<th width="10%">OTHERS</th>
						<th width="10%">Total</th>
						<th width="10%">%</th>
					</tr>
				</thead>
				
				<tbody> 	
				<?php 
				$no=1;
				$gt=$ukogt->gt;
				foreach ($ukoname as $rows) { 
				$t=$rows['total'];
				$p=($t*100)/$gt;

				?>
					<tr>
						<td><?php if($rows['kode']=='Jumlah') { } else { echo $no; } ?></td>
						<td><?php if($rows['kode']=='Jumlah') { } else { echo $rows['kode']; } ?></td>
						<td><?php if($rows['kode']=='Jumlah') { echo '<b>'.$rows['m'].'</b>'; } else { echo $rows['m']; } ?></td>
						<td><?php if($rows['kode']=='Jumlah') { echo '<b>'.$rows['b'].'</b>'; } else { echo $rows['b']; } ?></td>
						<td><?php if($rows['kode']=='Jumlah') { echo '<b>'.$rows['u'].'</b>'; } else { echo $rows['u']; } ?></td>
						<td><?php if($rows['kode']=='Jumlah') { echo '<b>'.$rows['o'].'</b>'; } else { echo $rows['o']; } ?></td>
						<td><?php if($rows['kode']=='Jumlah') { echo '<b>'.$rows['total'].'</b>'; } else { echo $rows['total']; } ?></td>
						<td><b><?php echo number_format($p,2,",","."); ?></b></td>
					</tr>
				<?php $no++; } ?>
				</tbody>

            </table>
        </div>
		
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Data Berdasarkan Merk EDC</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a class="btn btn-success btn-md" href="<?php echo base_url(); ?>index.php/dashboard/export2">Export To Excell</a>
              </div>
            </div>
        </div>

		<div class="table-responsive">
            
			<table class="table table-striped table-bordered table-hover table-lg">
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
				<tbody> 
				<?php 
				foreach ($ukomerk as $rows) { 
				?>
					<tr>
						<td><?php echo $rows['merk_edc']; ?></td>
						<td><?php echo $rows['m']; ?></td>
						<td><?php echo $rows['b']; ?></td>
						<td><?php echo $rows['u']; ?></td>
						<td><?php echo $rows['o']; ?></td>
						<td><?php echo $rows['total']; ?></td>
					</tr>
				<?php } ?>
				</tbody>
            </table>
			
        </div>

		
        </main>
