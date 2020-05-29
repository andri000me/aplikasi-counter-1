<html lang="en">
  <head>
  	<title>Dasboard Pegawai</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php cetak(base_url());?>tem_pegawai/css/style.css">
		<link href="<?php cetak(base_url());?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
		 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <link href="<?php cetak(base_url());?>asset/flavorzoom_files/flavorzoom.css" rel="stylesheet" type="text/css">
 
<script type="text/javascript" src="<?php cetak(base_url());?>asset/flavorzoom_files/my_food_plan_pick_foods.js"></script>
<script type="text/javascript" src="<?php cetak(base_url());?>asset/flavorzoom_files/jquery.uitablefilter.js"></script>


		
	</head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php cetak(base_url());?>tem_pegawai/images/logo.png);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="<?php echo site_url('pegawai/index')?>" >Home</a>
	           
	          </li>
			  <?php	if($level=='pegawai'){?>
	          <li>
                    <a href="<?php echo site_url('pegawai/produk')?>">Produk</a>
                </li>
			  <?php	}else{
				  
			  }	?>
				
				
	          <li>
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Target</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
					  <?php	if($level=='pegawai'){?>
                <li>
                        <a href="<?php echo site_url('pegawai/target_pegawai')?>">Target Pegawai</a>
                </li>
				 <?php	}else{
				  
			  }	?>
                <li>
                        <a href="<?php echo site_url('pegawai/target_toko')?>">Target Toko</a>
                </li>
                
                
	            </ul>
	          </li>
			  <li>
	            <a href="#homeSubmenu22" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Laporan	Harian</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu22">
                <li>
                        <a href="<?php echo site_url('pegawai/lap_statistik_h')?>">Statistik	Pengunjung	perhari</a>
                </li>
                <li>
                        <a href="<?php echo site_url('pegawai/lap_produk')?>">Penjualan	Produk</a>
                </li>
				<li>
                        <a href="<?php echo site_url('pegawai/rank_poin')?>">Ranking	Penjualan</a>
                </li>
				<li>
                        <a href="<?php echo site_url('pegawai/lap_kepuasan_p_h')?>">Kepuasan	Pelanggan</a>
                </li>
                
                
	            </ul>
	          </li>
			   <li>
	            <a href="#homeSubmenu221" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Laporan	Bulanan</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu221">
                <li>
                        <a href="<?php echo site_url('pegawai/lap_statistik_b')?>">Statistik	Pengunjung	perhari</a>
                </li>
                <li>
                        <a href="<?php echo site_url('pegawai/lap_produk_b')?>">Penjualan	Produk</a>
                </li>
				<li>
                        <a href="<?php echo site_url('pegawai/rank_poin_b')?>">Ranking	Penjualan</a>
                </li>
				
                
                
	            </ul>
	          </li>
			   <li>
	            <a href="#homeSubmenu1221" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Grafik</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu1221">
                <li>
                        <a href="<?php echo site_url('pegawai/grafik_pengunjung')?>">	Pengunjung</a>
                </li>
                <li>
                        <a href="<?php echo site_url('pegawai/grafik_all')?>">Penjualan	all	produk	</a>
                </li>
				<li>
                        <a href="<?php echo site_url('pegawai/grafik_all_p')?>">Penjualan	all	produk	individu	</a>
                </li>
				<li>
                        <a href="<?php echo site_url('pegawai/grafik_poin')?>">	Perolehan	Poin</a>
                </li>
				
                
                
	            </ul>
	          </li>
	          
	          <li>
              <a href="<?php echo site_url('Auth/logout')?>">Logout</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> <br> E-Coounter<i class="icon-heart" aria-hidden="true"></i> by <a>Yuliana Krismonica</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
		
		   <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
             <div><font color="orange" size="5"> E-Coounter</font></div>
           
          </div>
        </nav>