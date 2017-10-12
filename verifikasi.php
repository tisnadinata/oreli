<?php
	include 'header.php';
	include_once("functions/functions.php");	
?>
<html>
<body>
  <div id="pageContent" class="page-content">
 	<!-- Breadcrumb section -->
		
		<section class="breadcrumbs  hidden-xs">
		  <div class="container">
			<ol class="breadcrumb breadcrumb--wd pull-left">
			  <li><a href="#">Home</a></li>
			  <li>Verifikasi</li>
			  <li class="active"><?php echo ucfirst($_GET['verifikasi']);?></li>
			</ol>
		  </div>
		</section>
   <section class="content top-null">
      <div class="container">
        <div class="row">
		<div class="col-md-10 col-md-offset-1 col-xs-12 aside-column">
            <section class="content">               
				<div class="card card--padding">
					<?php 
						if($_GET['verifikasi']=="email"){
							if($_GET['value']!="0"){
								verifikasiAkun("email",$_GET['value'],'');
							}else{
								echo'<h4 class="text-uppercase" style="text-align:center;">Silahkan cek email anda untuk verifikasi</h4>';
								kirimVerifikasi("email",$_SESSION['id_customer']);
							}							
						}else if($_GET['verifikasi']=="handphone"){
							kirimVerifikasi("handphone",$_SESSION['id_customer']);
					?>
								<div class="row">
									<div class="col-md-12">
									<form action="" method="post">
										<div class="col-md-12">
										<h4 class="text-uppercase" style="text-align:center;">Silahkan masukan token yang anda terima melalui sms</h4>
										<div class="col-md-6 col-md-offset-3">
											<div class="col-md-6">
												<input type="text" name="token" id="token" class="input--wd input--wd--full" placeholder="Kode token">
											</div>
											<div class="col-md-6">
												<button type="submit" name='btnVerifikasi' class="btn btn--wd text-uppercase wave">Verifikasi</button>
											</div>
										</div>
									</form>
									</div>
						<div class="divider divider--xs"></div>
									<h6 class="" style="text-align:center;">Tidak terima sms ? <a href="">Kirim Lagi </a></h4>
								</div>
							<?php
							if(isset($_POST['btnVerifikasi'])){
								verifikasiAkun("handphone",$_GET['value'],$_POST['token']);
							}
						}
					?>
				</div>
            </section>
        </div>
      </div>
    </section>
    <!-- End Content section --> 
  </div>
  
</div>
<?php 
	include 'footer.php';
 ?>
</body>
</html>