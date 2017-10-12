<?php include("header.php"); 
	include_once("functions/functions.php");	
	if(isset($_SESSION['id_customer'])){
?>
<html>
<head>
</head>
<body>
<script>
$(document).ready(function() {
    $("#kelurahan").change(function() {
        var kelurahan =$(this).val();
        var kecamatan =$('#kecamatan').val();
        var dataString = 'kl='+kelurahan+'/'+kecamatan;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/functions/functions.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#kode_pos").val(html);
            }
        });
    });
});
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
	  <?php 
	  if(isset($_GET['tambah'])){
	  ?>
			
            <h4 class="text-uppercase h-pad-sm">TAMBAH ALAMAT</h4> 
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
				<form action="" method='post' class="contact-form">
				<div class="row">
					<div class="col-xs-4">
						<label>Alamat Sebagai / Nama Alamat:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nama_alamat" class="input--wd input--wd--full" placeholder="Alamat Sebagai / Nama Alamat *" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Nama Penerima:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nama_penerima" class="input--wd input--wd--full" placeholder="Nama Penerima *"required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Alamat Penerima:</label>
					</div>
					<div class="col-xs-8">
								<textarea class="textarea--wd textarea--wd--full" name="alamat_penerima" oninput="validasi_alamat()" id="alamat_penerima" placeholder="Alamat Penerima *"></textarea>
								<span id="warning_alamat" class="label label-danger" style="display:none;">Alamat tidak boleh mengandung simbol / ; * { } ' "</span>
					</div>
				</div>
			<div class="divider divider--xs"></div>
            <div id="alamat_manual" style="/* display:none; */">
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-4 col-xs-6">
						<label>Provinsi:</label>
						<select class="form-control"  name="provinsi" id="provinsi" data-style="select--wd"  data-width="100%">
							<?php
								alamatProvinsi();
							?>
						</select>
					</div>
					<div class="col-md-4 col-xs-6">
						<label>Kota/Kabupaten:</label>
						<select class="form-control"  id="kota" name="kota" data-style="select--wd"  data-width="100%">
						</select>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-4 col-xs-6">
						<label>Kecamatan:</label>
						<select class="form-control"  id="kecamatan" name="kecamatan" data-style="select--wd"  data-width="100%">
						</select>
					</div>
					<div class="col-md-4 col-xs-6">
						<label>Kelurahan:</label>
						<select class="form-control"  id="kelurahan" name="kelurahan" data-style="select--wd"  data-width="100%">
						</select>
					</div>
				</div>
			</div>
			<div id="alamat_pos">
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-8 col-xs-12">
						<label>Kode Pos :</label>
					</div>
				</div>
                <div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-3 col-xs-6">
						<input type="text" name="kode_pos" id="kode_pos" class="input--wd input--wd--full" placeholder="Kode POS" readonly>
					</div>
					<div class="col-md-3 col-xs-6" style="display:none;">
						<label></label>
						<button type="button" id="cekPos" name="cekPos" class="btn btn--wd">Cek Pos</button>						
					</div>
					<div class="col-md-1 col-xs-12">
						<div id="alamatLoading" style="display:none;">
							<img src="<?php echo getLink();?>/images/ajax-loader.gif" />
						</div>
					</div>
				</div>
				<br>
				<div class="row" style="display:none;">
					<div class="col-md-4">
					</div>
					<div class="col-md-8 col-xs-12">
						<div class="checkbox-group">
							<input type="checkbox" id="tidak_tahu" name="tidak_tahu">
							<label for="tidak_tahu"> <span class="check"></span> <span class="box"></span>Tidak tahu kode pos saya.</label>
						</div>
					</div>
				</div>
			</div>
				
		<div class="divider divider--xs"></div>
                <div class="row">
					<div class="col-xs-4">
						<label>No. Telepon/Kantor (Penerima)</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="tel_rumah" class="input--wd input--wd--full" placeholder="No. Telepon/Kantor (Penerima) *"required>
					</div>
				</div>
                <div class="row">
					<div class="col-xs-4">
						<label>No. Handphone (Penerima)</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="tel_handphone" class="input--wd input--wd--full" placeholder="No. Handphone (Penerima) *"required>	
					</div>
				</div>
				
			
			
                <div class="divider divider--xs"></div>
                <button type="submit" name='btnTambahAlamat' class="btn btn--wd text-uppercase wave col-md-offset-10">Tambahkan</button>
				</form>
			
            
			
	  <?php }else if(isset($_GET['edit'])){
	  ?>	  
			<h4 class="text-uppercase h-pad-sm">EDIT ALAMAT</h4> 
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
				<form action="" method='post' name='editAlamat' id='editAlamat' class="contact-form">				
				<?php
					alamatEdit();
				?>						
                <div class="divider divider--xs"></div>
                <button type="submit" name='btnEditAlamat' class="btn btn--wd text-uppercase wave col-md-offset-10">Edit Alamat</button>
				</form>
	  
	  <?php 
	  }else if(isset($_GET['hapus'])){
		  alamatHapus();
	  }else{?>
			
          
          
            <h4 class="text-uppercase h-pad-sm">ALAMAT SAYA</h4> 
            <div class="hr"></div>
            <table class="table shopping-cart-table table-striped text-center order-history">
              <thead>
                <tr>
                  <th>Nama Alamat</th>
                  <th>Nama Penerima</th>
                  <th>Kota</th>
				  <th>Ongkir</th>
				  <th></th>
				  
                </tr>
              </thead>
              <tbody>
				<?php getAlamatSaya(); ?>
				<tr>
					<td colspan="4"></td>
					<td colspan="2"><a href="alamat/tambah" class="btn btn--wd" style="background-color:green">Tambah Alamat</a> </td>
				</tr>
              </tbody>
			  
			  
            </table>
			
            
			
        
<?php } 
		if(isset($_POST['btnTambahAlamat'])){
			alamatTambah();	
		}
?>	

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