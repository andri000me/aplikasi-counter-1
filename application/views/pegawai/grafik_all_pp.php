
<?php
	include 'menu.php';
?>

	 <div class="alert alert-primary" role="alert">
  <?php	echo	$username;?>
</div>


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
    text: 'Data Penjualan	All	Produk Individu	Bulan  <?php	echo	date(' F Y',strtotime($tgl_1));	?>'
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