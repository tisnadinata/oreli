<?php 
	include("header.php"); 
	include_once("functions/functions.php");	
	$nama_lengkap = null;
	$jk = null;
	$tempat_lahir = null;
	$tahun_lahir = null;
	$bulan_lahir = null;
	$tanggal_lahir = null;
	$alamat_lengkap = null;
	$provinsi = null;
	$kota = null;
	$kecamatan = null;
	$kelurahan = null;
	$tel_rumah = null;
	$tel_handphone = null;
	$email = null;
?>
<html>
<head>
</head>
<body>
<script>
function generateReferal(){
	var nama = $("#nama_penerima").val();
	nama = nama.substr(0,3);
	var lahir = $("#tglLahir").val() + $("#bulanLahir").val();
	lahir = lahir.substr(0,3);
	var dataString = "generateReferal="+nama+lahir;
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#link_undangan").val(html);
		}		
	});	
}

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
function validasi(form){
  var mincar = 3;
  var stat = 0;
  if (form.nama_penerima.value.length < mincar){
    alert("Panjang Nama Minimal 3 Karater!");
    form.nama_penerima.focus();
	stat = 1;
  }else{
	    pola_telepon=/^[0-9]{10,13}$/;
	   if (!pola_telepon.test(form.tel_rumah.value)){
		  alert ('No telepon minimal 10 digit dan hanya boleh Angka!');
		  form.tel_rumah.focus();
		stat = 1;
	   }else{
			if (!pola_telepon.test(form.tel_handphone.value)){
			  alert ('No telepon minimal 10 digit dan hanya boleh Angka!');
			  form.tel_handphone.focus();
				stat = 1;
			}

	   }
  }
  if(stat == 1){
    return (false);
  }else{
	return (true);	  
  }
}
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
		  
		  <?php if(isset($_GET['login']) AND !isset($_SESSION['id_customer'])){
		?>
	  
            <h4 class="text-uppercase h-pad-sm">LOGIN</h4> 
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
            <form action="#" method="post" class="contact-form">
				<div class="row">
					<div class="col-xs-4">
						<label><?php echo $auth_username; ?>:</label>
					</div>
					<div class="col-xs-8">
					<?php
					if(isset($_COOKIE['cookielogin'])){
						echo'<input type="text" class="input--wd input--wd--full" id="txtUsername" name="txtUsername" placeholder="Username*" value="'.$_COOKIE['cookielogin']['user'].'">';
					}else{
						echo'<input type="text" class="input--wd input--wd--full" id="txtUsername" name="txtUsername" placeholder="Username*">';
					}
					?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Password:</label>
					</div>
					<div class="col-xs-8">
					<?php
					if(isset($_COOKIE['cookielogin'])){
						echo'<input type="password" class="input--wd input--wd--full" id="txtPassword" name="txtPassword" value="'.$_COOKIE['cookielogin']['pass'].'">';
					}else{
						echo'<input type="password" class="input--wd input--wd--full" id="txtPassword" name="txtPassword">';
					}
					?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-8 col-xs-offset-4">						
					<?php
						include_once 'captcha.php';
					?>
<!--						<div class="g-recaptcha" data-sitekey="6LdZWR8TAAAAAD7a8ie6b37b6SBH73CeSYErIc1o"></div>
-->					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-8 col-xs-offset-4">
						<div class="checkbox-group">
						  <input type="checkbox" id="rememberMe" value="true" name="rememberMe">
						  <label for="rememberMe"> <span class="check"></span> <span class="box"></span>Remember Me</label>
						</div>
						<div class="divider divider--xs"></div>
						<button type="submit" id="btnLogin" name="btnLogin" class="btn btn--wd text-uppercase wave" disabled>Login</button>
					</div>
				</div>
			</form>
		  <?php }else if(isset($_GET['register']) AND !isset($_SESSION['id_customer'])){
	if(isset($_POST['btnRegister'])){
		if($_POST['txtPassword'] == $_POST['txtRePassword']){
			customerInsert();
		}else{
			$nama_lengkap = ucfirst($_POST['nama_penerima']);
			$jk = $_POST['jenis_kelamin'];
			$tempat_lahir = $_POST['tempat_lahir'];
			$tahun_lahir = $_POST['tahunLahir'];
			$bulan_lahir = $_POST['bulanLahir'];
			$tanggal_lahir = $_POST['tglLahir'];
			$alamat_lengkap = $_POST['alamat_penerima'];
			$provinsi = $_POST['provinsi'];
			$kota = $_POST['kota'];
			$kecamatan = $_POST['kecamatan'];
			$kelurahan = $_POST['kelurahan'];
			$tel_rumah = $_POST['tel_rumah'];
			$tel_handphone = $_POST['tel_handphone'];
			$email = $_POST['email'];
			echo '		
				<div class="alert alert-warning" role="alert" align="center">
					<b>Password tidak sama !!</b>
				  </div>
			';		

		}
	}	
	  ?>
	  
			<h4 class="text-uppercase h-pad-sm"><?php echo $auth_register; ?></h4> 
            <div class="hr"></div>
				<div class="divider divider--xs"></div>
				<h5 class="text-uppercase h-pad-sm"><?php echo $auth_register2; ?></h5> 
				<div class="hr"></div>
				<div class="divider divider--xs"></div>
				<div class="divider divider--xs"></div>
            <form action="" method="post" class="contact-form" onSubmit="return validasi(this)" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xs-4">
						<label><?php echo $auth_register_sponsor; ?> :</label>
					</div>
					<div class="col-xs-8">
					<?php 
					if(isset($_SESSION['sponsor'])){
						$sponsor = $_SESSION['sponsor'];
						echo'<input type="text" class="input--wd input--wd--full" name="kode_referal" id="kode_referal" placeholder="'.$auth_register_sponsor.'" value="'.$sponsor.'" disabled>';						
					}else{
						echo'<input type="text" class="input--wd input--wd--full" name="kode_referal" id="kode_referal" placeholder="'.$auth_register_sponsor.'">';
					}
					?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label><?php echo $auth_register_nama; ?> :</label>
					</div>
					<div class="col-xs-8">
						<input type="text" class="input--wd input--wd--full" name="nama_penerima" id="nama_penerima" placeholder="<?php echo $auth_register_nama; ?> *" value="<?php echo $nama_lengkap; ?>" required>
						*Nama akun harus sama dengan atas nama rekening anda.
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
						<label><?php echo $auth_register_kelamin; ?> :</label>
					</div>
					<div class="col-xs-8">
						<label class="radio">
                            <input id="jenis_kelamin" type="radio" name="jenis_kelamin" value="L" checked>
                            <span class="outer"><span class="inner"></span></span><?php echo $auth_register_pria; ?> </label>
                          <label class="radio">
                            <input id="jenis_kelamin" type="radio" name="jenis_kelamin" value="P">
                            <span class="outer"><span class="inner"></span></span><?php echo $auth_register_wanita; ?> </label>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
						<label><?php echo $auth_register_tempat; ?> :</label>
					</div>
					<div class="col-xs-8">
						<input type="text" value="<?php echo $tempat_lahir; ?>" class="input--wd input--wd--full" name="tempat_lahir" id="tempat_lahir" placeholder="<?php echo $auth_register_tempat; ?> *" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<label><?php echo $auth_register_tanggal; ?> :</label>
					</div>
					<div class="col-md-2 col-xs-4">
                <label class="hidden-xs"><?php echo $auth_register_tahun; ?>:</label>
                <select class="form-control" name="tahunLahir" id="tahunLahir" data-style="select--wd"  data-width="100%">
				<?php
					echo "<option  value='$tahun_lahir'>$tahun_lahir</option>";
					$now=date('Y');
					for($thn=($now-16);$thn>1900;$thn--){
						echo "<option value='$thn'>$thn</option>";
					}
				?>
                 </select>
              </div>
					<div class="col-md-4 col-xs-4">
                <label class="hidden-xs"><?php echo $auth_register_bulan; ?> :</label>
                <select class="form-control" id="bulanLahir" name="bulanLahir"  data-style="select--wd"  data-width="100%">
				<?php
					echo "<option  value='$bulan_lahir'>$bulan_lahir</option>";
				$bln=array(1=>"Januari","Februari","Maret","April","Mei", "Juni","July","Agustus","September","Oktober", "November","Desember");
				$i=1;
				for($bulan=1; $bulan<=12; $bulan++){
					if($i < 10){
						echo "<option value='0$i'>$bln[$bulan]</option>";						
					}else{
						echo "<option value='$i'>$bln[$bulan]</option>";
					}
					$i++;
				}
				?>
				</select>
              </div>
					<div class="col-md-2 col-xs-4">
                <label class="hidden-xs"><?php echo $auth_register_tgl; ?> :</label>
                <select class="form-control"  id="tglLahir" name="tglLahir"  data-style="select--wd"  data-width="100%">
				<?php
					echo "<option  value='$tanggal_lahir'>$tanggal_lahir</option>";
					$i=1;
					while($i<=31){
						echo "<option value='$i'>$i</option>";
						$i++;
					}
				?>
                </select>
              </div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<label><?php echo $auth_register_alamat; ?> :</label>
					</div>
					<div class="col-md-8 col-xs-12">
								<textarea class="textarea--wd textarea--wd--full" name="alamat_penerima" oninput="validasi_alamat()" id="alamat_penerima" placeholder="Alamat Penerima *"><?php echo $alamat_lengkap; ?></textarea>
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
						<label><?php echo $auth_register_telepon; ?> </label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="tel_rumah" class="input--wd input--wd--full" value="<?php echo $tel_rumah; ?>" placeholder="<?php echo $auth_register_telepon; ?> *">
					</div>
				</div>
                <div class="row">
					<div class="col-xs-4">
						<label><?php echo $auth_register_handphone; ?> </label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="tel_handphone" class="input--wd input--wd--full" value="<?php echo $tel_handphone; ?>" placeholder="<?php echo $auth_register_handphone; ?> *">	
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="hr"></div>
				<div class="divider divider--xs"></div>
				<h5 class="text-uppercase h-pad-sm"><?php echo $auth_register_informasi; ?> </h5> 
				<div class="hr"></div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
						<label>Email:</label>
					</div>
					<div class="col-xs-8">
						<input type="email" name="email" value="<?php echo $email; ?>" class="input--wd input--wd--full" placeholder="E-Mail *">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Password :</label>
					</div>
					<div class="col-xs-8">
						<input type="password" name="txtPassword" class="input--wd input--wd--full" placeholder="Password *">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Re-Password :</label>
					</div>
					<div class="col-xs-8">
						<input type="password"  name="txtRePassword"  class="input--wd input--wd--full" placeholder="">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-4 col-xs-12">						
					<?php
						include_once 'captcha.php';
					?>
<!--					<div class="g-recaptcha" style="margin-left: -7%;" data-sitekey="6LdZWR8TAAAAAD7a8ie6b37b6SBH73CeSYErIc1o"></div>
-->					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-8 col-xs-12">
						<div class="checkbox-group">
							<input type="checkbox" id="kebijakan" name="kebijakan">
							<label for="kebijakan"> <span class="check"></span> <span class="box"></span><?php echo $auth_register_syarat; ?></label>
						</div>
					</div>
				</div>  
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-md-4 col-xs-2">
					</div>
					<div class="col-md-3 col-xs-10">
						<button type="submit"  name="btnRegister" id="btnRegister" class="btn btn--wd text-uppercase wave disabled"><?php echo $button_daftar; ?></button>
					</div>
				</div>				
			</form>
			
		  <?php }else if(isset($_GET['lostpassword'])  AND !isset($_SESSION['id_customer'])){
	  ?>
	  
	  <h4 class="text-uppercase h-pad-sm">Lost Password?</h4> 
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
            <form action="" method="post" class="contact-form">
				<div class="row">
					<div class="col-xs-4">
						<label>Email:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="email" class="input--wd input--wd--full" placeholder="Alamat Email *">
					</div>
				</div>					
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
					</div>
					<div class="col-xs-8">
						<button type="submit" name="btnLostPassword" class="btn btn--wd text-uppercase wave"><?php echo $menu_lost2; ?></button>
					</div>
				</div>					
			</form>
			
		  <?php }else if(isset($_SESSION['id_customer'])){?>
					<meta http-equiv="Refresh" content="0;url:akun">
		  <?php }?>
	  
			</div>
<?php 
	if(isset($_POST['btnLogin'])){
		login("member/akun");		
	}
	if(isset($_POST['btnLostPassword'])){
		lupaPassword();
	}
	if(isset($_GET['reset'])){
		resetPassword();
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
?>
</body>
</html>