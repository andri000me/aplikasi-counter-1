
<?php
	include 'menu.php';
?>

		 
		 <form action="<?php echo base_url(). 'pegawai/cari_lap_rank_poin'; ?>" method="post">
			<input	type="date"	name="tgl"></input>
			<button type="submit" class="btn btn-danger	btn-sm">Search</button>
	</form>

		 
		 <div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>	Laporan	Ranking	Penjualan	Pegawai	Tanggal	<?php echo date('d F Y',strtotime($tgl_1)); ?></center></div>
			  
				<div class="card-body text-secondary">
				
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							<th>No</th>
							<th>Nama </th>
							<th> Total	Poin</th>
							
							
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($rank_poin as $transaksi){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $transaksi->username; ?></td>
						<td><?php echo $transaksi->total_poin; ?></td>
						
			
						
						
					
						</tr>
						
						<?php } ?>
						
					
					</tbody>
				</table>
			</div>
			
			

			</div>
		 </div>
 <?php
	include 'footer.php';
 ?>