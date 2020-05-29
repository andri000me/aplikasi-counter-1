
<?php
	include 'menu.php';
?>

		 
		 <form action="<?php echo base_url(). 'pegawai/cari_grafik_all'; ?>" method="post">
				<div class="form-group">
       
             
			  <select  name="bln" class="form-control ">
			 
			  <option value="" >Bulan</option>
			  
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


		<div class="card-body text-secondary">
				<?php	foreach($grafik_pengunjung_beli as $data){	?>
							
							
							
					<?php	}	?>
						
<div id="container8" style="height: 400px; min-width: 320px; max-width: 600px; margin: 0 auto"></div>
<div id="container2" style="height: 400px; min-width: 320px; max-width: 600px; margin: 0 auto"></div>


<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
<script>
Highcharts.chart('container8', {
  chart: {
    type: 'bar',
    marginLeft: 150
  },
  title: {
    text: 'Data Penjualan	All	Produk Bulan  <?php	echo	date(' F Y',strtotime($tgl_1));	?>'
  },
  subtitle: {
    text: 'Total	Penjualan	All	Produk'
  },
  
  xAxis: {
    type: 'category',
    title: {
      text: null
    },
    min: 0,
    max: 4,
    scrollbar: {
      enabled: true
    },
    tickLength: 0
  },
  yAxis: {
    min: 0,
    max: 100,
    title: {
      text: 'Jumlah produk',
      align: 'high'
    }
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    enabled: false
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'jumlah produk',
    data: [
	
		
		<?php	foreach($grafik_pengunjung_beli as $data){	?>
		["<?php	echo	date('d F Y',strtotime($data->tgl_transaksi));?>", <?php	echo	$data->jumlah_barang;?>],
		<?php	}?>
    ]
  }]
});

</script>	
			
		 
 <?php
	include 'footer.php';
 ?>