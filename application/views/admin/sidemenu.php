<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2020	E-Coounter <a href="http://w3layouts.com/" target="_blank"></a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="<?php echo site_url('admin')?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        
		        <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Form Pegawai</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >
		            <li id="menu-mensagens" style="width: 120px" ><a href="<?php echo site_url('admin/form_pegawai')?>">Form Pegawai</a>		              
		            </li>
		            <li id="menu-arquivos" ><a href="<?php echo site_url('admin/form_target_pegawai')?>">Form	Target</a></li> 
		            
		            
				
					  
		          </ul>
		        </li>
				<li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Form Barang</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >
		          	<li id="menu-arquivos" ><a href="<?php echo site_url('admin/form_produk_fokus')?>">Form	Produk Fokus</a></li>
		          	<li id="menu-arquivos" ><a href="<?php echo site_url('admin/form_Barang')?>">Form Barang</a></li>
		 			<li id="menu-arquivos" ><a href="<?php echo site_url('admin/form_brand')?>">Form Brand</a></li>
		        	<li id="menu-arquivos" ><a href="<?php echo site_url('admin/form_kategori')?>">Form	Kategori</a></li>
		          </ul>
		        </li>
				<li id="menu-comunicacao" ><a href="<?php echo site_url('pegawai')?>"><i class="fa fa-book nav_icon"></i><span>Report/Laporan</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         
		        </li>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="<?php cetak(base_url());?>asset/js/jquery.nicescroll.js"></script>
		<script src="<?php cetak(base_url());?>asset/js/scripts.js"></script>
		<!--//scrolling js-->

<!-- mother grid end here-->
</body>
</html> 