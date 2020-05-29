
<?php

	include 'menu.php';
?>
 <script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script>
<?php if($this->session->flashdata('success')){ ?>

        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>

    
    <?php } ?>

<a href="<?php echo base_url(). 'pegawai/no_transaksi'; ?>" class="btn btn-danger">Keranjang	
<span class="badge badge-light">
	<?php
	foreach($jum as $tot)
	{
		echo  $tot->jum ;
	}
	?>

</span>
</a>	<a	href="<?php echo site_url('pegawai/tdk_beli')?>" class="btn btn-success">Tidak	Beli</a><br><br>

<div class="alert alert-secondary" role="alert">
	<form action="<?php echo base_url(). 'pegawai/produk'; ?>" method="post">
		<label class="control-label col-md-3">Filter</label>
		<div class="form-group">
             <select width="30" name="kategori" class="form-control ">
			  <?php
			  foreach($kategori as $book){?>
			  <option value="<?php echo  $book->kategori ;?>" ><?php echo $book->kategori ;?></option><?php	}	?>
			</select>

             
            </div>
			<button type="submit" class="btn btn-danger">Sumbit</button>
	</form>
</div>

<br>

<div id="mainbody">
<form id="filter-form"> <input name="filter" id="filter" value="" maxlength="30" size="30" type="text"	class="form-control"width="100"	placeholder="Cari	Produk"></form>

<table class="food_planner">
<thead>
	<tr>
		<th colspan="4"><center>Produk</center></th>
	<tr>
	<tr>
		<th ><center>No</center></th>
		<th ><center>Nama	Barang</center></th>
		<th ><center>Harga</center></th>
		<th ><center>Action</center></th>
	<tr>

</thead>
    <tbody><tr style="display: table-row;">
          </tr>
		    <?php
			$no=1;
			  foreach($filter as $book){?>
		  <tr>
			<td><?php	echo	$no++;?></td>
			<td>&nbsp; &nbsp; &nbsp;<?php echo  $book->barang ;?></td>
			<td>	Rp.<?php echo  number_format($book->harga );?></td>
			<td ><center>
				<form action="<?php echo base_url(). 'pegawai/tambah_produk'; ?>" method="post">
				<input name="id_barang" type="hidden"	value="<?php echo  $book->id_barang ;?>"/>
				<button type="submit" class="btn btn-success	btn-sm">add</button>
				</form>
			
				</a></center></td>
			
			</tr>
			  <?php	}	?>
		  
		  </tbody></table><br><br></form>


	</div>
	
</body></html>


		 
		
 <?php
	include 'footer.php';
 ?>
 