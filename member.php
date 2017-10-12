
<?php include("header.php"); 
	include_once("functions/functions.php");	
	if(isset($_SESSION['id_customer'])){
?>
<html>

<body>
<div id="loader-wrapper" class="loader-off">
<div id="loader"></div>
</div>
<div class="wrapper"> 
  <div id="pageContent" class="page-content">
    <section class="content top-null">
      <div class="container">
        <div class="row">
          <div class="col-md-3 aside-column">
		    <?php include("menu_member.php"); ?>
          </div>
          <div class="col-md-9 aside-column">
            <section class="content"> 
            <?php 
				if(isset($_GET['password'])){
			?>		 
            <div class="card card--padding">
			  <div class="card__row-line">
				<h4 class="text-uppercase h-pad-sm"><?php echo $member_password; ?></h4>  
			  </div>
				<div class="card__row-line">
					<div class="divider divider--xs"></div>
					<form action="" method="post" class="contact-form">
						<div class="row">
							<div class="col-xs-4 col-md-3">
								<label><b><?php echo $member_password_old; ?> :</b></label>
							</div>
							<div class="col-xs-8 col-md-4">
								<input type="text" name="pass" class="input--wd input--wd--full" placeholder="<?php echo $member_password_old; ?>" required>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 col-md-3">
								<label><b><?php echo $member_password_new; ?> </b></label>
							</div>
							<div class="col-xs-8 col-md-4">
								<input type="text" name="newPass" class="input--wd input--wd--full" placeholder="<?php echo $member_password_new; ?>" required>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 col-md-3">
								<label><b>Re-Password</b></label>
							</div>
							<div class="col-xs-8 col-md-4">
								<input type="text" name="renewPass" class="input--wd input--wd--full" placeholder="Re Password" required>
							</div>
						</div>
						<div class="divider divider--xs"></div>
						<div class="divider divider--xs"></div>
						<?php
							echo '<button type="submit" name="btnEditPassword" class="btn btn--wd text-uppercase wave col-md-offset-9" >'.$member_password.'</button>';
						?>
					</form>
				</div>
						<?php
							if(isset($_POST['btnEditPassword'])){
								editPassword();						
							}
						?>
			</div>
			<?php 
				}else{
			?>	
            <div class="card card--padding">
			  <div class="card__row-line">
				<h4 class="text-uppercase h-pad-xs">Akun Saya</h4>
			  </div>
				<div class="card__row-line">
				<h4 class="text-uppercase h-pad-xs">Informasi Akun</h4>
				<table class="table-address" width="100%">
				  <tbody>
					<?php getInformasiAkun(); ?>
				  </tbody>
				</table>
				<a href="<?php echo getLink();?>/member/akun/password" class="btn btn--wd">Ganti Password</a> 
				</div>
			</div>
			<?php 
				}
			?>	
            </section>
            
          </div>
        </div>
      </div>
    </section>
    <!-- End Content section --> 
  </div>
  
</div>
<?php include("footer.php"); 

	}else{
		echo'<meta http-equiv="Refresh" content="0;url='.getLink().'/404.php">';
	}
?>
</body>
</html>