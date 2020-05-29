
<?php
	include 'menu.php';
?>
<div class="alert alert-warning" role="alert">
				 <center>  Data Statistik Konter</center>
</div>
<div class="card border-secondary mb-3" style="max-width: 40rem;">
			  <div class="card-header"><center>Data Pengunjung</center></div>
			  
				<div class="card-body text-secondary">
				<div class="alert alert-dark" role="alert">
				   Data Statistik Pengunjung Hari Ini
				</div>
				
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
						<td><?php echo $beli ?> orang</td>
						<td><?php echo $tdk; ?> orang</td>
						<td><?php  echo $u=$tdk+$beli?> orang</td>
						
					
						</tr>
						
						
						
					
					</tbody>
				</table>
			</div>
			</div>
			
			
			
			  
				<div class="card-body text-secondary">
				<div class="alert alert-dark" role="alert">
				   Data Statistik Pengunjung Bulan Ini
				</div>
				
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
			
			<br><br>
			
			<div class="card border-secondary mb-3" style="max-width: 70rem;">
			  <div class="card-header"><center>Grafik Pengunjung</center></div>
			  
				<div class="card-body text-secondary">
					
					<!--------------------isi grafik------------------>
					<div id="container7" style="height: 400px; min-width: 320px; max-width: 600px; margin: 0 auto"></div><div id="container1" style="height: 400px; min-width: 320px; max-width: 600px; margin: 0 auto"></div>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script>
Highcharts.chart('container7', {
  chart: {
    type: 'bar',
    marginLeft: 150
  },
  title: {
    text: 'Data Jumlah Pengunjung Harian Periode Bulan ini '
  },
  subtitle: {
    text: 'Pengunjung: Pengunjung Beli'
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
      text: 'Jumlah Orang',
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
    name: 'jumlah orang',
    data: [
	 <?php foreach($grafik_pengunjung_beli as $tgl){?>
      ["<?php echo date('d F Y',strtotime($tgl->tgl_transaksi)); ?>", <?php echo	$jumlah_total_beli; ?>],
     <?php } ?>
    ]
  }]
});

</script>
<script>
Highcharts.chart('container1', {
  chart: {
    type: 'bar',
    marginLeft: 150
  },
  title: {
    text: 'Data Jumlah Pengunjung Harian Periode Bulan ini '
  },
  subtitle: {
    text: 'Pengunjung: Pengunjung Tidak Beli'
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
      text: 'Jumlah orang',
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
    name: 'jumlah orang',
    data: [
	 <?php foreach($grafik_pengunjung_tdk as $tgl){?>
      ["<?php echo date('d F Y',strtotime($tgl->tgl_transaksi)); ?>", <?php echo $tgl->jumlah; ?>],
     <?php } ?>
    ]
  }]
});

</script>
					
					
					<!--------------------/isi grafik------------------>
				
				</div>
		
			</div>
			
		 
		 <?php
			include 'footer.php';
		 ?>