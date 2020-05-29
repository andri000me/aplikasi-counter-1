<?php
include	'head.php';
?>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Coounter Login</h1>
			</div>
			<div class="login-block">
				<form id="logForm">
					<input type="text" name="email" placeholder="Email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<button type="submit" class="btn btn-lg btn-primary btn-block"><span id="logText"></span></button>
					
					<div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
						<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
						<span id="message"></span>
					</div>
					
				</form>
			
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2020 Statistik. Mega	Elektronik	  <a>By Yuliana Krismonica</a> </p>
</div>	
<!--COPY rights end here-->

<script type="text/javascript">
	$(document).ready(function(){
		$('#logText').html('Sign In');
		$('#logForm').submit(function(e){
			e.preventDefault();
			$('#logText').html('Checking...');
			var url = '<?php echo base_url(); ?>';
			var user = $('#logForm').serialize();
			var login = function(){
				$.ajax({
					type: 'POST',
					url: url + 'index.php/auth/login',
					dataType: 'json',
					data: user,
					success:function(response){
						$('#message').html(response.message);
						$('#logText').html('Login');
						if(response.error){
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#logForm')[0].reset();
							setTimeout(function(){
								location.reload();
							}, 3000);
						}
					}
				});
			};
			setTimeout(login, 3000);
		});

		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
	});
</script>
<?php
include	'js.php';
?>


                      
						
