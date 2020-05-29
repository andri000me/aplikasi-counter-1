
<?php
	include 'menu.php';
?>


	<form action="<?php echo base_url(). 'pegawai/cari_lap_statistik_b'; ?>" method="post">
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

<div class="card border-secondary mb-3" style="max-width: 40rem;">
			  <div class="card-header"><center>Data Pengunjung	Bulan	<?php echo date(' F Y',strtotime($tgl_1)); ?></center></div>
			  
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
						<td><?php echo $beli_bln ?> orang</td>
						<td><?php echo $tdk_bln; ?> orang</td>
						<td><?php  echo $u=$tdk_bln+$beli_bln?> orang</td>
						
					
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