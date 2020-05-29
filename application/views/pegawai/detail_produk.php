
<?php

	include 'menu.php';
?>

<table class="food_planner">
<thead>
	<tr>
		<th colspan="4">No	Transaksi	:	<?php	foreach($transaksi as $book1);echo	$book1->no_transaksi;		?>	---	<?php	echo	date('d F Y',strtotime($book1->tgl_transaksi));	?></th>
		
	<tr>
	<tr>
		<th ><center>No</center></th>
		<th ><center>Nama	Barang</center></th>
		<th ><center>Harga</center></th>
		<th ><center>Kategori</center></th>
	<tr>

</thead>
    <tbody><tr style="display: table-row;">
          </tr>
		    <?php
			$no=1;
			  foreach($transaksi as $book){?>
		  <tr>
			<td><?php	echo	$no++;?></td>
			<td><?php echo  $book->barang ;?></td>
			<td>	Rp.<?php echo  number_format($book->harga );?></td>
			<td ><?php echo  $book->kategori ;?></td>
			
			</tr>
			  <?php	}	?>
			 <tr>
			 <td	>*</td>
				<td	>
				SubTotal
				</td>
				<td>Rp.<?php	foreach($subtotal as $book1);echo	number_format($book1->subtotal)?></td>
			  <td	>*</td>
			 </tr>
		  
		  </tbody></table><br>
		  <form action="<?php echo base_url(). 'pegawai/simpan_produk'; ?>" method="post">
				<input name="no_transaksi" type="hidden"	value="<?php echo  $book1->no_transaksi ;?>"/>
				<button type="submit" class="btn btn-success	btn-sm">Simpan</button>
				</form>


	</div>
	
</body></html>


		 
		
 <?php
	include 'footer.php';
 ?>
 