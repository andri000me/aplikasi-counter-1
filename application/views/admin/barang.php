<?php
	include	'head.php';
?> 

	
	
	<div class="inner-block">
	
	<!--------------------------------------->
	
	<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
   
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <?php
  //deklarasi-variable-name-input
  $datalocal11='book_id';
  $datalocal21='a';
  $datalocal31='b';
  $datalocal41='c';
  $datalocal51='d';
  $datalocal61='e';
  $datalocal71='f';
  
  //deklarasi-variable-database
  $database11="id_barang";
  $database31="id_brand";
  $database41="id_kategori";
  $database51="harga";
  $database21="barang";
   $database61="tipe";
   $database71="poin";
//--------------------------------------------
  $table_11='table_id1';
  $add1='add_book1()';
  $save_a1='add1';
  $save_b1='update1';
  
  $edit_11='edit_book1';
  $edit_21='edit_book1(id)';
  
  $delete_11='delete_book1';
  $delete_21='delete_book1(id)';
  
  
   $form1='form1';
  $modal_form1='modal_form1';
  $notif1='notiff1';
  $notif2='notif1';
  ?>


  <div class="container">
   
    <center>

</center>
    <h3>Data	Barang</h3>
    <br />
    <button class="btn btn-primary" onclick="<?php	echo	$add1;?>"> Add Barang</button>
    <br />
    <br />
    <table id="<?php	echo	$table_11;?>" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
					<th>No</th>
					<th>Barang</th>
					<th>Brand</th>
					<th>Kategori</th>
					<th>Tipe</th>
					<th>Poin</th>
					<th>Harga</th>
					

          <th style="width:125px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody>
				<?php
				$no=1;
				foreach($barang as $book){?>
				     <tr>
				         <td><?php echo $no++;?></td>
				         
								 <td><?php echo $book->barang;?></td>
								<td><?php echo $book->brand;?></td>
								<td><?php echo $book->kategori;?></td>
								<td><?php echo $book->tipe;?></td>
									<td><?php echo $book->poin;?></td>
								<td>Rp.<?php echo number_format($book->harga);?></td>
								<td>
									<button class="btn btn-warning" onclick="<?php	echo	$edit_11;?>(<?php echo $book->id_barang;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
									<button class="btn btn-danger" onclick="<?php	echo	$delete_11;?>(<?php echo $book->id_barang;?>)"><i class="glyphicon glyphicon-remove"></i></button>


								</td>
				      </tr>
				     <?php }?>



      </tbody>

      <tfoot>
        <tr>
          			
					<th>No</th>
          <th>Barang</th>
          <th>Brand</th>
          <th>Kategori</th>
          <th>Tipe</th>
		   <th>Poin</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>

  </div>


 



  <script type="text/javascript">
  $(document).ready( function () {
      $('#<?php	echo	$table_11;?>').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function <?php	echo	$add1;?>
    {
      save_method = '<?php	echo	$save_a1;?>';
      $('#<?php	echo	 $form1;?>')[0].reset(); // reset form on modals
      $('#<?php	echo	$modal_form1;?>').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function <?php	echo	$edit_21;?>
    {
      save_method = '<?php	echo	$save_b1;?>';
      $('#<?php	echo	 $form1;?>')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/barang_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="<?php	echo$datalocal11;?>"]').val(data.<?php	echo$database11;?>);
            $('[name="<?php	echo$datalocal21;?>"]').val(data.<?php	echo$database21;?>);
            $('[name="<?php	echo$datalocal31;?>"]').val(data.<?php	echo$database31;?>);
            $('[name="<?php	echo$datalocal41;?>"]').val(data.<?php	echo$database41;?>);
            $('[name="<?php	echo$datalocal51;?>"]').val(data.<?php	echo$database51;?>);
			  $('[name="<?php	echo$datalocal61;?>"]').val(data.<?php	echo$database61;?>);
			   $('[name="<?php	echo$datalocal71;?>"]').val(data.<?php	echo$database71;?>);


            $('#<?php	echo	$modal_form1;?>').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Barang'); 
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == '<?php	echo	$save_a1;?>')
      {
          url = "<?php echo site_url('index.php/admin/barang_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/barang_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#<?php	echo	 $form1;?>').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              $('<?php	echo	$modal_form1;?>').modal('hide');
                       
				 $("#<?php	echo	$notif1;?>").html('<div class="alert alert-success"><button type="button" class="close">×</button>Succes</div>');

				 //timing the alert box to close after 5 seconds
				 window.setTimeout(function () {
					 $(".alert").fadeTo(500, 0).slideUp(500, function () {
						 $(this).remove();
					 });
				 }, 5000);

				 //Adding a click event to the 'x' button to close immediately
				 $('.alert .close').on("click", function (e) {
					 $(this).parent().fadeTo(500, 0).slideUp(500);
				 });
                        setTimeout(function(){location.reload()}, 2000);
             
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                //adding a 'x' button if the user wants to close manually
				 $("#<?php	echo	$notif2;?>").html('<div class="alert alert-danger"><button type="button" class="close">×</button>Tidak-boleh-sama</div>');

				 //timing the alert box to close after 5 seconds
				 window.setTimeout(function () {
					 $(".alert").fadeTo(500, 0).slideUp(500, function () {
						 $(this).remove();
					 });
				 }, 5000);

				 //Adding a click event to the 'x' button to close immediately
				 $('.alert .close').on("click", function (e) {
					 $(this).parent().fadeTo(500, 0).slideUp(500);
				 });
            }
        });
    }

    function <?php	echo	$delete_21;?>
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/admin/barang_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

  </script>
  
  <script src="<?php echo base_url('assests/jquery/jquery-3.1.0.min.js')?>"></script>
  <script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="<?php	echo	$modal_form1;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Barang</h4>
        <div id="<?php	echo	$notif2;?>" style="z-index: 9999999"></div>
		<div id="<?php	echo	$notif1;?>" style="z-index: 9999999"></div> 
      </div>
      <div class="modal-body form">
        <form action="#" id="<?php	echo	 $form1;?>" class="form-horizontal">
          <input type="hidden" value="" name="<?php	echo$datalocal11;	?>"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Barang</label>
              <div class="col-md-9">
                <input name="<?php	echo$datalocal21;	?>" placeholder="Masukan Nama Barang" class="form-control" type="text">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Brand</label>
              <div class="col-md-9">
			  <select  name="<?php	echo$datalocal31;	?>" class="form-control ">
			  <?php
			  foreach($brand as $book){?>
			  <option value="<?php echo  $book->id_brand ;?>" ><?php echo $book->brand ;?></option><?php	}	?>
			</select>

              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">Kategori</label>
              <div class="col-md-9">
			  <select  name="<?php	echo$datalocal41;	?>" class="form-control ">
			  <?php
			  foreach($kategori as $book){?>
			  <option value="<?php echo  $book->id_kategori ;?>" ><?php echo $book->kategori ;?></option><?php	}	?>
			</select>

              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">Tipe</label>
              <div class="col-md-9">
			  <select  name="<?php	echo$datalocal61;	?>" class="form-control ">
			 
			  
			  <option value="fokus" >fokus</option>
			  <option value="all" >all Type</option>
			 
			 
			  
			</select>

              </div>
            </div>
			
			<div class="form-group">
							<label class="control-label col-md-3">Poin</label>
							<div class="col-md-9">
								<input   	name="<?php	echo$datalocal71;	?>" placeholder="Masukan Poin" class="form-control" type="text">

							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Harga</label>
							<div class="col-md-9">
								<input   	name="<?php	echo$datalocal51;	?>" placeholder="Masukan Harga" class="form-control" type="text">

							</div>
						</div>

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  </body>
</html>

	
	
	<!----------------------------------------->
	
    
	<div class="clearfix"> </div>
</div>
<!--climate end here-->

<?php
	include	'sidemenu.php';
?>                    