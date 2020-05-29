
<?php
	include 'menu.php';
?>

        <!-- Page Content  -->
   
<script>
$(document).ready(function(){
    barChart();

    $(window).resize(function(){
        barChart();
    });

    function barChart(){
        $('.bar-chart').find('.progress').each(function(){
            var itemProgress = $(this),
            itemProgressWidth = $(this).parent().width() * ($(this).data('persen') / 100);
            itemProgress.css('width', itemProgressWidth);
        });
    }
});
</script>
        
			<div class="card border-secondary mb-3" style="max-width: 25rem;">
			  <div class="card-header"><center>Target Fokus	Toko</center></div>
			  
				<div class="card-body text-secondary">
				<div class="alert alert-dark" role="alert">
				   target fokus	Toko  bulan ini
				</div>
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							<th>No</th>
							<th>Kategori </th>
							<th>unit </th>
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($target_toko_fokus as $pegawai){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $pegawai->kategori; ?></td>
						<td><?php echo $pegawai->p_fokus; ?></td>
						
					
						</tr>
						
						<?php } ?>
						
					
					</tbody>
				</table>
			</div>
			<!---------------------------------------------------------------------->
			
			<div class="alert alert-dark" role="alert">
				   Pencapaian target fokus Toko yg di peroleh bulan ini
				</div>
				
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
						foreach($target_toko_fokus_tercapai as $pegawai){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $pegawai->kategori; ?></td>
						<td><?php echo $pegawai->jum_target; ?></td>
						<td><?php echo $total=$pegawai->jum_target/$pegawai->p_fokus*100; ?> %</td>
						
						
					
						</tr>
						
						<?php } ?>
						
					
					</tbody>
				</table>
			</div>
			

			</div>
		 </div>
		  
		  <div class="card border-secondary mb-3" style="max-width: 25rem;">
			  <div class="card-header"><center>Target All Type</center></div>
			  
				<div class="card-body text-secondary">
				<div class="alert alert-dark" role="alert">
				     target all type pegawai bulan ini
				</div>
				
			 		<div class="table-responsive">
					 <table class="table table-bordered" >
						
						<thead class="thead-dark ">
						
						
						
						<tr>
							<th>No</th>
							<th>Kategori </th>
							<th> Tunit </th>
							
					
							 </tr>
					</thead>
					<tbody>
					
						<?php
						$no=1;
						foreach($target_toko_fokus as $pegawai){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $pegawai->kategori; ?></td>
						<td><?php echo $pegawai->p_all; ?></td>
						
					
						</tr>
						
						<?php } ?>
						
					
					</tbody>
				</table>
			</div>
			
			
		 <!---------------------------------------------------------------------->
			
			<div class="alert alert-dark" role="alert">
				   Pencapaian target All type pegawai yg di peroleh bulan ini
				</div>
				
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
						foreach($target_toko_all_tercapai as $pegawai){?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $pegawai->kategori; ?></td>
						<td><?php echo $pegawai->jum_target; ?></td>
						<td><?php echo $total=$pegawai->jum_target/$pegawai->p_all*100; ?> %</td>
						
						
					
						</tr>
						
						<?php } ?>
						
					
					</tbody>
				</table>
			</div>
			</div>
		 </div>
		 
		 <!----------------------------------------------------------------------------------------------------->
		 
		 
		 <?php
			include 'footer.php';
		 ?>