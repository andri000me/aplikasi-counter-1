
<?php
	include 'menu.php';
?>

	<form action="<?php echo base_url(). 'pegawai/cari_lap_produk_b'; ?>" method="post">
				<div class="form-group">
       
             
			  <select  name="bln" class="form-control ">
			 
			  <option value="" >Bulan</option>
			  <option value="01" >Januari</option>
			  <option value="03" >Februari</option>
			  <option value="03" >Maret</option>
			   <option value="04" >April</option>
			  <option value="05" >Mei</option>
			  <option value="06" >Juni</option>
			   <option value="07" >Juli</option>
			  <option value="08" >Agustus</option>
			  <option value="09" >Septeber</option>
			   <option value="10" >Oktober</option>
			  <option value="11" >November</option>
			  <option value="12" >Desember</option>
			  
			</select>


            </div>
			<div class="form-group">
             
            
			  <select  name="thn" class="form-control ">
			 
			  <option value="" >Tahun</option>
			  <option value="2019" >2019</option>
			  <option value="2020" >2020</option>
			  <option value="2021" >2021</option>
			   <option value="2022" >2022</option>
			 
			  
			</select>

             
            </div>
			<button type="submit" class="btn btn-danger	btn-sm">Search</button>
	</form>

		   <?php	if($level=='pegawai'){?>
		 <div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>	Laporan	Penjualan	Produk	Individu	Bulan	<?php echo date(' F Y',strtotime($tgl_1)); ?></center></div>
			  
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
			  <div class="card-header"><center>	Laporan	Penjualan	Produk	All	Pegawai	Bulan	<?php echo date(' F Y',strtotime($tgl_1)); ?></center></div>
			  
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