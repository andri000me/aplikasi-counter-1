
<?php
	include 'menu.php';
?>

		 
		 <form action="<?php echo base_url(). 'pegawai/cari_lap_produk'; ?>" method="post">
			<input	type="date"	name="tgl"></input>
			<button type="submit" class="btn btn-danger	btn-sm">Search</button>
	</form>

		   <?php	if($level=='pegawai'){?>
		 <div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>	Laporan	Penjualan	Produk	Individu	Tanggal	<?php echo date('d F Y',strtotime($tgl_1)); ?></center></div>
			  
				<div class="card-body text-secondary">
				
				
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
							<th> Poin</th>
						
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
						<td><?php echo $transaksi->poin; ?></td>
			
						<td>Rp <?php echo number_format($transaksi->tot_harga); ?></td>
						<td><?php echo date('d F Y',strtotime($transaksi->tgl_transaksi)) ?></td>
						
					
						</tr>
						
						<?php } ?>
						
					
					</tbody>
				</table>
			</div>
			
			

			</div>
		 </div>
		   <?php	}	?>
		 <div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>	Laporan	Penjualan	Produk	All	Pegawai	Tanggal	<?php echo date('d F Y',strtotime($tgl_1)); ?></center></div>
			  
				<div class="card-body text-secondary">
				
				
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
							<th> poin</th>
						
							<th> Total	Harga</th>
							<th> Tanggal Transaksi</th>
							
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($t_pegawai_b_barang as $transaksi){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $transaksi->barang; ?></td>
						<td><?php echo $transaksi->brand; ?></td>
						<td><?php echo $transaksi->kategori; ?></td>
						<td><?php echo $transaksi->tipe; ?></td>
						<td><?php echo $transaksi->jum_barang; ?></td>
						<td><?php echo $transaksi->poin; ?></td>
						
			
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