<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Pengelola EDC</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a class="btn btn-success btn-md" href="<?php echo base_url(); ?>index.php/home/exportdata1">Export To Excell</a>
              </div>

            </div>
		</div>
		
		<form class="form-inline" action="<?php echo base_url(); ?>index.php/pengelolavfs/search"  method="POST">
			  <label class="sr-only" for="inlineFormInputName2">TID</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="tid" placeholder="TID">

			  <label class="sr-only" for="inlineFormInputName2">MID</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="mid" placeholder="MID">
			  
			  <label class="sr-only" for="inlineFormInputName2">Nama Merchant</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="nama_merchant" placeholder="Nama Merchant">
			  
			  <label class="sr-only" for="inlineFormInputName2">Peruntukkan</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="peruntukkan" placeholder="Peruntukkan">
			  
			  <label class="sr-only" for="inlineFormInputName2">Implementor</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="uker_nama_implementor" placeholder="Nama Uker Implementor">
			  
			  <button type="submit" class="btn btn-primary mb-2">Filter</button>
		</form>
		
        <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-lg">
				<thead>
				<tr>
					<th>#</th>
					<th>Tid</th>
					<th>Mid</th>
					<th>Nama Merchant</th>
					<th>Peruntukkan</th>
					<th>Uker Nama Implementor</th>
					<th>Merk Edc</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$no = 1;
				foreach ($vfsdata as $rows) { 
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rows['tid']; ?></td>
						<td><?php echo $rows['mid']; ?></td>
						<td><?php echo $rows['nama_merchant']; ?></td>
						<td><?php echo $rows['peruntukkan']; ?></td>
						<td><?php echo $rows['uker_nama_implementor']; ?></td>
						<td><?php echo $rows['merk_edc']; ?></td>
					</tr>
				<?php $no++; } ?>
				</tbody>
			</table>

        </div>

	</main>