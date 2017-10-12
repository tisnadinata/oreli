<?php 
	include("header.php"); 
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
              
            <div class="card card--padding">
          <div class="card__row-line">
		  
		  <?php if(isset($_GET['tambah'])){
	  ?>
	  
            <h4 class="text-uppercase h-pad-sm">TAMBAH REKENING</h4> 
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
            <form action="" method="post" enctype="multipart/form-data" id="frmTambahRekening" name="frmTambahRekening" class="contact-form">
				<div class="row">
					<div class="col-xs-4">
						<label>Nama Bank:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nama_bank" class="input--wd input--wd--full" placeholder="Nama Bank *" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>No. Rekening:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nomor_rekening" class="input--wd input--wd--full" placeholder="Nomor Rekening" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Atas Nama Rekening:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="atas_nama" class="input--wd input--wd--full" placeholder="Atas Nama *" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Foto Buku Tabungan: </label>
					</div>
					<div class="col-xs-8">
						<label class="control-label">Pilih File</label>
						<input id="file_foto"  name="file_foto" type="file" class="file" required>
					</div>
				</div>
				<div class="divider divider--xs"></div>
                <button type="submit" name="btnTambahRekening" class="btn btn--wd text-uppercase wave">Tambahkan</button>
				<?php
					rekeningTambah();
				?>
			</form>
			
		  <?php }else if(isset($_GET['edit'])){
	  ?>
	  
				<h4 class="text-uppercase h-pad-sm">EDIT REKENING</h4> 
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
             <form action="" method="post" enctype="multipart/form-data" id="frmEditRekening" name="frmEditRekening" class="contact-form">
				<?php
					rekeningEdit();
				?>
				<div class="divider divider--xs"></div>
                <button type="submit" name="btnEditRekening" class="btn btn--wd text-uppercase wave">Edit Rekening</button>
			</form>
			
		  <?php }else if(isset($_GET['hapus'])){
			  rekeningHapus();
		  }else{
	  ?>
	  
	  <h4 class="text-uppercase h-pad-sm">REKENING SAYA</h4> 
            <table class="table shopping-cart-table table-striped text-center order-history">
              <thead>
                <tr>
                  <th>Bank</th>
                  <th>Atas Nama</th>
                  <th>No. Rekening</th>
                  <th>Status</th>
				  <th></th>
				  
                </tr>
              </thead>
              <tbody>
				<?php getRekeningSaya(); ?>
				<tr>
					<td colspan="4"></td>
					<td colspan="1"><a href="rekening/tambah" class="btn btn--wd" style="background-color:green">Tambah Rekening</a> </td>
				</tr>
              </tbody>
            </table>
			
		  <?php }?>
	  
	  
			</div>
        </div>
			
              
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
		echo'<meta http-equiv="Refresh" content="0;url='.getLink().'">';
	}
?>
</body>
</html>