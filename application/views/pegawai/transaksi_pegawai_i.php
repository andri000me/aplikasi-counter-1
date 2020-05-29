
<?php
	include 'menu.php';
?>
<div class="alert alert-warning" role="alert">
				 <center>  Data Transaksi Pegawai Individu</center>
</div>
		 
		 
<div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>Data Transaksi</center></div>
			  
				<div class="card-body text-secondary">
				<div class="alert alert-dark" role="alert">
				   Data Transaksi  Individu per hari ini
				</div>
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							<th>No</th>
							<th>No transaksi </th>
							<th> Total Transaksi</th>
							
						
							<th> Total	Harga</th>
							<th> Tanggal Transaksi</th>
							
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($t_pegawai_i as $transaksi){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $transaksi->no_transaksi; ?></td>
						<td><?php echo $transaksi->jum_transaksi; ?></td>
						
			
						<td>Rp <?php echo number_format($transaksi->tot_harga); ?></td>
						<td><?php echo date('d F Y',strtotime($transaksi->tgl_transaksi)) ?></td>
						
					
						</tr>
						
						<?php } ?>
						<tr>
							<td>#</td>
							<td	>Total	</td>
							<td	><?php	foreach($t_pegawai_tot	as	$tot)
								echo	$tot->jum_transaksi;
									?></td>
							<td>Rp.	<?php	foreach($t_pegawai_tot	as	$tot)
								echo	number_format($tot->tot_harga);
									?>	,-</td>
							<td>	<?php	foreach($t_pegawai_tot	as	$tot)
								echo	date('d F Y',strtotime($tot->tgl_transaksi))
									?>	</td>
						</tr>
					
					</tbody>
				</table>
			</div>
			
			

			</div>
		 </div>
		 
		 <div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>	Transaksi	Barang</center></div>
			  
				<div class="card-body text-secondary">
				<div class="alert alert-dark" role="alert">
				   Data Detail	Transaksi  Barang	Individu per hari ini
				</div>
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							<th>No</th>
							<th>Barang </th>
							<th> Brand</th>
							<th> Kategori</th>
							<th> Jenis	Target</th>
							<th> Jumlah	Barang</th>
							
						
							<th> Total	Harga</th>
							<th> Tanggal Transaksi</th>
							
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($t_pegawai_i_barang as $transaksi){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $transaksi->barang; ?></td>
						<td><?php echo $transaksi->brand; ?></td>
						<td><?php echo $transaksi->kategori; ?></td>
						<td><?php echo $transaksi->tipe; ?></td>
						<td><?php echo $transaksi->jum_barang; ?></td>
						
			
						<td>Rp <?php echo number_format($transaksi->tot_harga); ?></td>
						<td><?php echo date('d F Y',strtotime($transaksi->tgl_transaksi)) ?></td>
						
					
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