
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
		 
		 <form action="<?php echo base_url(). 'pegawai/cari_lap_kepuasan_p_h'; ?>" method="post">
			<input	type="date"	name="tgl"></input>
			<button type="submit" class="btn btn-danger	btn-sm">Search</button>
	</form>

		 
		 <div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>	Laporan	Kepuasan	Pelanggan	Tanggal	<?php echo date('d F Y',strtotime($tgl_1)); ?></center></div>
			  
				<div class="card-body text-secondary">
				<?php
						foreach($kepuasan_h1 as $transaksi1);
						$tot=$transaksi1->tot_rating1;
						$no=1;
						foreach($kepuasan_h as $transaksi){
							
							
							?>
						
						<?php

for ($i = 0; $i <	$transaksi->tot_rating; $i++){?>
    <span class="fa fa-star checked"></span>
<?php	}

?>
						
						
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?php	echo$r4=$transaksi->tot_rating/$tot*100;?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $transaksi->tot_rating; ?></div>
</div>
						<?php	}?>
				
			 		
			
			

			</div>
		 </div>
		 </div>
		 <?php



?>
 <?php
	include 'footer.php';
 ?>