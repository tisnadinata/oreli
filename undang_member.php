
<?php include("header.php"); 
	include_once("functions/functions.php");	
	if(isset($_SESSION['id_customer'])){
?>
<html>
<body>
<script>
</script>
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
              
            <div class="card card--padding">
          <div class="card__row-line">
			<h2 class="text-uppercase text-center h-pad-sm"><strong>UNDANG CALON MEMBER BARU</strong></h2> 
            <div class="hr"></div>
				<div class="divider divider--xs"></div>
				<h6 class="text-center">
					Anda dapat mengundang calon member baru/prospek untuk bergabung ke dalam jaringan grup Anda, hanya dengan memasukan alamat e-mail.
					Calon member baru/prospek akan menerima e-mail dimana mereka dapat menerima link kode member anda dan bergabung bersama grup anda.
				</h6>
				<div class="hr"></div>
				<div class="divider divider--xs"></div>
			<h4 class="text-uppercase h-pad-sm">UNDANG member BARU</h4> 
				<h6 class="h-pad-sm">
					Anda dapat mengundang setiap orang untuk menjadi member.
				</h6>
				<div class="divider divider--xs"></div>				
            <form action="" method="post" class="contact-form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<h5 class="text-uppercase h-pad-sm">
							1. Data Calon member
						</h5>
					</div>
					<div class="col-md-7">
						<div class="col-xs-7">
							<label>Nama Lengkap:</label>
						</div>
						<div class="col-xs-12">
							<input type="text" class="input--wd input--wd--full" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap " required>
						</div>
					</div>
					<div class="col-md-7">
						<div class="col-xs-7">
							<label>E-Mail:</label>
						</div>
						<div class="col-xs-12">
							<input type="text" class="input--wd input--wd--full" name="email" id="email" placeholder="E-Mail aktif" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<label>Pesan Anda :</label>
					</div>
					<div class="col-xs-12">
						<textarea class="textarea--wd textarea--wd--full" name="pesan_anda" id="pesan_anda" placeholder="Pesan untuk calon member baru" required></textarea>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-3 col-xs-offset-9">
						<button type="submit"  name="btnKirimUndangan" id="btnKirimUndangan" class="btn btn--wd text-uppercase wave">Kirim Undangan</button>
					</div>
				</div>				
			</form>  
			</div>
		</div>
<?php 
	if(isset($_POST['btnKirimUndangan'])){
		undangMember();
	}
?>              
        </div>
            </section>
            
          </div>
        </div>
      </div>
    </section>
    <!-- End Content section --> 
  </div>
  
</div>
<?php 
	include("footer.php"); 
	}else{
		echo'<meta http-equiv="Refresh" content="0;url='.getLink().'">';
	}
?>
</body>
</html>