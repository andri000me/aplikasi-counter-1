
<?php
	include 'menu.php';
?>


	<form action="<?php echo base_url(). 'pegawai/cari_lap_statistik_h'; ?>" method="post">
			<input	type="date"	name="tgl"></input>
			<button type="submit" class="btn btn-danger	btn-sm">Search</button>
	</form>

<div class="card border-secondary mb-3" style="max-width: 40rem;">
			  <div class="card-header"><center>Data Pengunjung	Tanggal	<?php echo date('d F Y',strtotime($tgl_1)); ?></center></div>
			  
				<div class="card-body text-secondary">
				
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							
							<th>Pengunjung beli </th>
							<th>Pengunjung Tidak beli </th>
							<th>Total Pengunjung </th>
							
					
							 </tr>
					</thead>
					<tbody>
					
						
						<tr>
						<td><?php echo $beli ?> orang</td>
						<td><?php echo $tdk; ?> orang</td>
						<td><?php  echo $u=$tdk+$beli?> orang</td>
						
					
						</tr>
						
						
						
					
					</tbody>
				</table>
			</div>
			</div>
			
			
			
			  
				
			</div>
		
			</div>
			
			<br><br>

					
					
					<!--------------------/isi grafik------------------>
				
				</div>
		
			</div>
			
		 
		 <?php
			include 'footer.php';
		 ?>