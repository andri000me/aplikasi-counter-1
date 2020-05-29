
<?php
	include 'menu.php';
	error_reporting(0);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<div class="card bg-light mb-3" style="max-width: 40rem;">
  <div class="card-header">Akun	Pegawai</div>
  <div class="card-body">
      
        <p class="card-text">	Name	is	<?php	foreach($p_u as $tot);echo	$tot->username;?><br>
			email		<?php	foreach($pegawai as $tot);echo	$tot->email;?><br>
			
	
	</p><p class="card-text"><small class="text-muted">Tingkat	kepuasan	pelayanan	terhadap	pembeli</small><br>
<!--star5-->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span><div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?php	echo$r5=$star5/$tot_star*100;?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php	echo$star5?></div>
</div>
<!--star4-->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span><div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?php	echo$r4=$star4/$tot_star*100;?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php	echo$star4?></div>
</div>

<!--star4-->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span><div class="progress">
   <div class="progress-bar" role="progressbar" style="width: <?php	echo$r3=$star3/$tot_star*100;?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php	echo$star3?></div>

</div>
<!--star4-->
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span><div class="progress">
   <div class="progress-bar" role="progressbar" style="width: <?php	echo$r2=$star2/$tot_star*100;?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php	echo$star2?></div>

</div>
<!--star4-->
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span><div class="progress">
    <div class="progress-bar" role="progressbar" style="width: <?php	echo$r1=$star1/$tot_star*100;?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php	echo$star1?></div>

</div>
        
      </div>
</div>

<div class="card bg-light mb-3" style="max-width: 40rem;">
  <div class="card-header">Poin	Bulan	<?php echo date(' F Y',strtotime($tgl)); ?></div>
  <div class="card-body">
         <p class="card-text"><small class="text-muted">Total	Poin	dari	Penjualan	produk	Pada	semua	kategori</small>

					<h1><?php	foreach($poin as $tot);echo	$tot->total_poin;?>	Poin</h1>	<br>
		
	</p>
        
      </div>
</div>


  
 
  
  
  <div class="card border-secondary mb-3" style="max-width: 40rem;">
			  <div class="card-header"><center>Pencapaian	Target Fokus	Bulan	<?php echo date(' F Y',strtotime($tgl)); ?></center></div>
			  
				<div class="card-body text-secondary">
				
				
			 	
			<!---------------------------------------------------------------------->
			
		
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							<th>No</th>
							<th>Kategori </th>
							<th>Unit </th>
							<th>Pencapaian </th>
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($target_pegawai_fokus_tercapai as $pegawai){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $pegawai->kategori; ?></td>
						<td><?php echo $pegawai->jumlah_target; ?></td>
						<td><?php echo $total=$pegawai->jumlah_target/$pegawai->fokus*100; ?> %</td>
						
						
					
						</tr>
						
						<?php } ?>
						
					
					</tbody>
				</table>
			</div>
			

			</div>
		 </div>
		 
		 
  
  
  <div class="card border-secondary mb-3" style="max-width: 40rem;">
			  <div class="card-header"><center>Pencapaian	Target All	type	Bulan	<?php echo date(' F Y',strtotime($tgl)); ?></center></div>
			  
				<div class="card-body text-secondary">
				
				
			 	
			<!---------------------------------------------------------------------->
			
		
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							<th>No</th>
							<th>Kategori </th>
							<th>Unit </th>
							<th>Pencapaian </th>
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($target_pegawai_all_type_tercapai as $pegawai){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $pegawai->kategori; ?></td>
						<td><?php echo $pegawai->jumlah_target; ?></td>
						<td><?php echo $total=$pegawai->jumlah_target/$pegawai->all*100; ?> %</td>
						
						
					
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