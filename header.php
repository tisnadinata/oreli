<?php 
	session_start();
	if(isset($_SESSION['sponsor'])){
		setcookie("sponsor",$_SESSION['sponsor'], $time+(86400*7)); 				
	}
	include_once("functions/functions.php");	
	if(isset($_SESSION['lang'])){
		$lang = $_SESSION['lang'];
		if($lang == "en"){
			include 'lang/en.php';												
		}else if($lang == "id"){
			include 'lang/id.php';												
		}
	}else{
		include 'lang/id.php';												
	}

$_SESSION['title'] = "Oreli.co.id: Situs belanja online Luar Biasa";
	date_default_timezone_set("Asia/Jakarta");
?>
<html>
<head>
<!-- Basic -->
<meta charset="utf-8">
<title><?php echo $_SESSION['title']; ?></title>
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Oreli.co.id: Situs belanja online Luar Biasa">
<meta name="image" content="https://oreli.co.id/images/logo.png">
<meta property="og:description" content="Oreli.co.id: Situs belanja online Luar Biasa" />
<meta content='https://oreli.co.id/images/logo.png' property='og:image'/>
<link rel="shortcut icon" href="<?php echo getLink();?>/images/favicon/fav.png">
<link href="<?php echo getLink();?>/images/favicon/fav.png" rel='icon' type='image/x-icon'/>
<link rel="icon" type="image/png" href="<?php echo getLink();?>/images/favicon/fav.png">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Web Fonts  -->
<!-- Custom Fonts -->
<!--
<link href="http://db.onlinewebfonts.com/c/9d097da6a9a781eb3dbfd8fe6cab0066?family=DINNextW01-CondensedRegular" rel="stylesheet" type="text/css"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
<link href="https://fast.fonts.net/cssapi/6c8bae2a-9e7a-40fe-9cea-b2a177a76ed2.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
-->
<!-- Icon Fonts  -->
<link rel="stylesheet" href="<?php echo getLink();?>/font/style.css">
<!-- Vendor CSS -->
<link rel="stylesheet" href="<?php echo getLink();?>/vendor/waves/waves.css">
<link rel="stylesheet" href="<?php echo getLink();?>/vendor/slick/slick.css">
<link rel="stylesheet" href="<?php echo getLink();?>/vendor/slick/slick-theme.css">
<link rel="stylesheet" href="<?php echo getLink();?>/vendor/bootstrap-select/bootstrap-select.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo getLink();?>/css/custom.css">
<link rel="stylesheet" href="<?php echo getLink();?>/css/style.css">
<link rel="stylesheet" href="<?php echo getLink();?>/css/style-colors.css">
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="<?php echo getLink();?>/vendor/magnific-popup/magnific-popup.css">

<!-- JAVA SCRIPT COMBOBOX -->
<script type="text/javascript" src="<?php echo getLink();?>/js/jquery-1.6.min.js"></script>

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="<?php echo getLink();?>/vendor/rs-plugin/css/settings.css" media="screen" />
<!-- Head Libs -->

<!-- Modernizr -->
<script src="<?php echo getLink();?>/vendor/modernizr/modernizr.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
function validasi_alamat(){
	var value = $("#alamat_penerima").val();
	var panjang = value.length;
	var status = false;
	var i;
	for(i=0;i<panjang;i++){
		if(value.charAt(i) == "/"){
			status = true;
		}		
	}
	if(status == true){
		document.getElementById('warning_alamat').setAttribute("style","display:block");
	}else{
		document.getElementById('warning_alamat').setAttribute("style","display:none");
	}
}
var jawaban=0;
var captcha= new Array ();
function getrecaptchaTrue(){
    document.getElementById("recaptchaTrue").value = jawaban;;
}
function validateRecaptcha(){
    var recaptcha= document.getElementById("recaptcha").value;
    var validRecaptcha=0;
	if(jawaban!=recaptcha){
		validRecaptcha = 1;
	}
/*    for(var z=0; z<5; z++){
        if(recaptcha.charAt(z)!= captcha[z]){
            validRecaptcha++;
        }
    }
*/
    if (recaptcha == ""){
        document.getElementById('errCaptcha').innerHTML = '<span class="label label-warning"><b>Captcha harus di isi</b></span>';
		document.getElementById("btnLogin").setAttribute("disabled","");
    }else if (validRecaptcha>0){
        document.getElementById('errCaptcha').innerHTML = '<span class="label label-danger"><b>Maaf, captcha yang anda masukan salah</b></span>';
		document.getElementById("btnLogin").setAttribute("disabled","");
    }else{
        document.getElementById('errCaptcha').innerHTML = '<span class="label label-success"><b>Captcha benar, anda bisa melanjutkan</b></span>';
		document.getElementById("btnLogin").removeAttribute("disabled");
    }
}
function createCaptcha(){
    for(q=0; q<5 ; q++){
/*        if(q %2 ==0){
            captcha[q] = String.fromCharCode(Math.floor((Math.random()*26)+65));
        }else{      
            captcha[q] = Math.floor((Math.random()*10)+0);
        }
*/  
        if(q %2 ==0){
            captcha[q] = Math.floor((Math.random()*10)+1);
			jawaban = jawaban+captcha[q];
        }else{      
            captcha[q] = "+";
        }
	}
    thecaptcha=captcha.join("");
    document.getElementById('captcha').innerHTML=
     "<input type='text' class='input--wd captcha' placeholder='"+thecaptcha+"= ' disabled>"; 
}
</script>
<script>
function socialHover(id,img) {
	document.getElementById(id).src=img;
}

function socialHoverOut(id,img) {
	document.getElementById(id).src=img;
}
function isiAlamat(berdasarkan){
	if(berdasarkan == 0){
		document.getElementById("kode_pos").removeAttribute("readonly");
		document.getElementById("provinsi").setAttribute("disabled","");
		document.getElementById("kota").setAttribute("readonly","");
		document.getElementById("kecamatan").setAttribute("readonly","");
		document.getElementById("kelurahan").setAttribute("readonly","");
//		$("#alamat_manual").slideUp("slow");						
//		$("#alamat_pos").slideDown("slow");						
	}else if(berdasarkan == 1){			
//		$("#alamat_pos").slideUp("slow");						
//		$("#alamat_manual").slideDown("slow");						
		document.getElementById("provinsi").removeAttribute("disabled");
		document.getElementById("provinsi").removeAttribute("readonly");
		document.getElementById("kota").removeAttribute("readonly");
		document.getElementById("kecamatan").removeAttribute("readonly");
		document.getElementById("kelurahan").removeAttribute("readonly");
		document.getElementById("kode_pos").setAttribute("readonly","");
	}
}
function delCart(kode_produk){
        var kode = kode_produk;
        var dataString = 'deleteFromCart='+kode;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/ajax.php",
            data: dataString,
            cache: false,
            success: function(response) {
                location.reload();
            }
        });
}
function delCartAll(){
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/ajax.php",
            data: dataString,
            cache: false,
            success: function(response) {
                location.reload();
            }
        });
}
function setLang(lang){
	var dataString = "lang="+lang;
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",
        data: dataString,
        cache: false,
        success: function(response) {
            location.reload();
        }
    });
}

function setAlamat(kode_pos,data){	
    var dataString = 'set_kode_pos='+kode_pos+"&kode_pos_data="+data;
    $.ajax({
        type: "POST",
        url: "<?php echo getLink();?>/functions/functions.php",
        data: dataString,
        cache: false,
        success: function(html) {
			$("#"+data).html(html);
			if(data=="kelurahan"){
				document.getElementById("button3").setAttribute("style","display:block;");				
			}
        }
    });
}
function setPos(){
		document.getElementById("provinsi").removeAttribute("disabled");
		setAlamat($("#kode_pos").val(),"provinsi");
		setAlamat($("#kode_pos").val(),"kota");
		setAlamat($("#kode_pos").val(),"kecamatan");
		setAlamat($("#kode_pos").val(),"kelurahan");

}

$(document).ready(function() {
	$("#kebijakan").click( function(){
		if($(this).is(':checked')){
			$("#btnRegister").removeClass("disabled");
		}else{			
			$("#btnRegister").addClass("disabled");
		}
	});
	$("#tidak_tahu").click( function(){
			var dataString = 'setProv=1';
			$.ajax({
				type: "POST",
				url: "<?php echo getLink();?>/functions/functions.php",
				data: dataString,
				cache: false,
				success: function(html) {
					$("#provinsi").html(html);
				}
			});
		if($(this).is(':checked')){
			document.getElementById("provinsi").removeAttribute("disabled");
			document.getElementById("provinsi").removeAttribute("readonly");
			document.getElementById("kota").innerHTML = "<option value=''></option>";
			document.getElementById("kecamatan").innerHTML = "<option value=''></option>";
			document.getElementById("kelurahan").innerHTML = "<option value=''></option>";
			document.getElementById("kode_pos").setAttribute("readonly","");		
			document.getElementById("kode_pos").value = "";
		}else{		
			document.getElementById("provinsi").setAttribute("disabled","");
			document.getElementById("kota").innerHTML = "<option value=''></option>";
			document.getElementById("kecamatan").innerHTML = "<option value=''></option>";
			document.getElementById("kelurahan").innerHTML = "<option value=''></option>";
			document.getElementById("kode_pos").removeAttribute("readonly");
			document.getElementById("kode_pos").value = "";
		}
		document.getElementById("button3").setAttribute("style","display:none;");
	});
/*    $("#kode_pos").change(function() {
		document.getElementById("button3").setAttribute("style","display:block;");
		document.getElementById("provinsi").removeAttribute("disabled");
		document.getElementById("provinsi").setAttribute("readonly","");
		setAlamat($("#kode_pos").val(),"provinsi");
		setAlamat($("#kode_pos").val(),"kota");
		setAlamat($("#kode_pos").val(),"kecamatan");
		setAlamat($("#kode_pos").val(),"kelurahan");
    });
*/    $("#provinsi").change(function() {
		$("#alamatLoading").css('display', 'block');
        var provinsi =$(this).val();
        var dataString = 'prov='+provinsi;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/functions/functions.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#kota").html(html);
                $("#kode_pos").val("");
            }
        });
		$("#alamatLoading").css('display', 'none');
    });
    $("#kota").change(function() {
		$("#alamatLoading").css('display', 'block');
        var kota =$(this).val();
        var dataString = 'kt='+kota;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/functions/functions.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#kecamatan").html(html);
            }
        });
		$("#alamatLoading").css('display', 'none');
    });
    $("#kecamatan").change(function() {
		$("#alamatLoading").css('display', 'block');
        var kecamatan =$(this).val();
        var dataString = 'kc='+kecamatan;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/functions/functions.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#kelurahan").html(html);
            }
        });
		$("#alamatLoading").css('display', 'none');
    });
    $("#kelurahan").change(function() {
		$("#alamatLoading").css('display', 'block');
        var kelurahan =$(this).val();
        var kecamatan =$('#kecamatan').val();
        var dataString = 'kl='+kelurahan+'/'+kecamatan;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/functions/functions.php",
            data: dataString,
            cache: false,
            success: function(html) {
				document.getElementById("button3").setAttribute("style","display:block;");
                $("#kode_pos").val(html);
            }
        });
		$("#alamatLoading").css('display', 'none');
    });

	$("#cekPos").click( function(){
		$("#alamatLoading").css('display', 'block');
		setPos();
		$("#alamatLoading").css('display', 'none');
	});
});

</script>
</head>
<body>
<div id="loader-wrapper" class="loader-off">
	<div id="loader"></div>
</div>
<!-- Modal Search -->
<div class="overlay overlay-scale">
  <button type="button" class="overlay-close"> ✕ </button>
  <div class="overlay__content">
    <form id="search-form" class="search-form outer" action="#" method="post">
      <div class="input-group input-group--wd">
        <input type="text" class=" input--full" placeholder="Nama produk ...">
        <span class="input-group__bar"></span> </div>
      <button class="btn btn--wd text-uppercase wave waves-effect">Cari</button>
    </form>
  </div>
</div>
<!-- / end Modal Search -->

<div class="wrapper"> 
  <!-- Header section -->
  <header class="header header--sticky">
    <div class="header-line" style="background-image: url('<?php echo getLink();?>/images/bg.jpg');background-size: 40px;">
      <div class="container">
        <div class="pull-left">
          <div class="social-links social-links--colorize">
            <ul>
              <li class="social-links__item teks-bold"><?php echo $pilih_bahasa;  ?> : </li>
              <li class="social-links__item"><a href="#" onClick="setLang('id')"><span class="languages__item__flag flag"><img src="<?php echo getLink();?>/images/flags/id.png" alt=""/></span></a></li>
              <li class="social-links__item"><a href="#" onClick="setLang('en')"><span class="languages__item__flag flag"><img src="<?php echo getLink();?>/images/flags/us.png" alt=""/></span></a></li>
            </ul>
          </div>
        </div>
        <div class="pull-right hidden-xs">
          <div class="user-links">
            <ul>
			<?php
				if(isset($_SESSION['id_customer'])){
			?>
				  <li class="user-links__item">(<?php echo $_SESSION['nama_lengkap'];?>) <a href="<?php echo getLink();?>/logout" style="font-family:'Roboto Medium';color:red;text-decoration:none;">Log Out</a></li>
				  <li class="user-links__item">|</li>
				  <li class="user-links__item"><a href="<?php echo getLink();?>/member/akun"><?php echo $akun_saya; ?></a></li>
            <?php					
				}else{
			?>
				  <li class="user-links__item"><a href="<?php echo getLink();?>/login" style="font-family:'Roboto Medium';">Log In</a></li>
				  <li class="user-links__item">|</li>
				  <li class="user-links__item"><a href="<?php echo getLink();?>/register" style="font-family:'Roboto Medium';"><?php echo $daftar_member; ?></a></li>
            <?php		
				}
			?>
				  <li class="user-links__item">|</li>
				  <li class="user-links__item"><a href="<?php echo getLink();?>/wishlist">Wishlist</a></li>
				  <li class="user-links__item">|</li>
				  <li class="user-links__item"><a href="<?php echo getLink();?>/konfirmasi-pembayaran"><?php echo $konfirmasi_pembayaran; ?></a></li>
				  <li class="user-links__item">|</li>
				  <li class="user-links__item"><a href="<?php echo getLink();?>/return">return barang</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header__dropdowns-container">
      <div class="header__dropdowns">
        <div class="header__search  header__search--to-right pull-left hidden-xs"> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button visible-xs" data-toggle="modal" data-target="#searchModal"><span class="icon icon-search"></span></a>
          <form action="<?php echo getLink();?>/list" method="post">
            <button type="submit" name="btnCari" class="btn btn--icon header__search__button"><span class="icon icon-search"></span></button>
            <input  type="text" name="txtProdukCari" class="header__search__input" placeholder="Cari barang anda ..." />
          </form>
        </div>
        <?php
			getCart();
		?>
      </div>
    </div>
    <nav class="navbar navbar-wd" id="navbar">
      <div class="container">
		<div class="navbar-header pull-left hidden-xs" style="position:relative;margin-right:25px;">
			<a class="logo" href="<?php echo getLink();?>"> 
			<img class="logo-default" src="<?php echo getBrand();?>" style="width:175px;height:auto;margin-top:8px;" /> 
			<img class="logo-mobile" src="<?php echo getBrand();?>" alt=""/> <img class="logo-transparent" src="<?php echo getLink();?>/images/logo-transparent.png" alt=""/> </a> 
		</div>
        <div class="pull-left" id="slidemenu">
          <div class="slidemenu-close visible-xs">✕</div>
          <ul class="nav navbar-nav" style="width:auto;font-family:'Exo2SemiBold Font';"> 
			  <li class="visible-xs wave">
				<span class="link-name teks-bold" style="font-size:18px;">
				<form action="list"  method="post" style="width:250px">
					<div class="row">
						<div class="col-xs-10">
							<input class="form-control" name="txtProdukCari" type="text" placeholder="Search here ..." / style="width:100%;margin: 10px 0 0 5px;padding: 10px;">
						</div>
						<div class="col-xs-1">
							<button type="submit" name="btnCari" class="btn btn--icon header__search__button"><span class="icon icon-search"></span></button>
						</div>
					</div>
				</form>
				</span>
			  </li>		  
				<li><a href="<?php echo getLink();?>" class="wave"><span class="link-name teks-bold text-uppercase" style="font-size:18px;"><?php echo $header_home;?></span></a></li>
				<li class="hidden-xs">
	            <?php 
					getMenuPanel(); 
				?>
				</li>
				<li class="visible-xs">
	            <?php 
					getMenuPanelMobile(); 
				?>
				</li>
				<li class="visible-xs"><a href="<?php echo getLink()."/konfirmasi-pembayaran";?>" class="wave"><span class="link-name teks-bold" style="font-size:18px;"><?php echo $konfirmasi_pembayaran; ?></span></a></li>
				<li class="visible-xs"><a href="<?php echo getLink()."/return";?>" class="wave"><span class="link-name teks-bold" style="font-size:18px;">RETURN BARANG</span></a></li>
				<li class="visible-xs"><a href="<?php echo getLink()."/wishlist";?>" class="wave"><span class="link-name teks-bold" style="font-size:18px;">WISHLIST</span></a></li>
			<?php
				if(isset($_SESSION['id_customer'])){
			?>
				<li class="visible-xs"><a href="<?php echo getLink()."/member/akun";?>" class="wave"><span class="link-name teks-bold" style="font-size:18px;"><?php echo $akun_saya; ?></span></a></li>
				<li class="visible-xs"><a href="<?php echo getLink()."/logout";?>" class="wave"><span class="link-name teks-bold" style="font-size:18px;">LOG OUT</span></a></li>
            <?php					
				}else{
			?>
				<li class="visible-xs"><a href="<?php echo getLink()."/register";?>" class="wave"><span class="link-name teks-bold" style="font-size:18px;"><?php echo $daftar_member; ?></span></a></li>
				<li class="visible-xs"><a href="<?php echo getLink()."/login";?>" class="wave"><span class="link-name teks-bold" style="font-size:18px;">LOGIN</span></a></li>
            <?php					
				}
			?>
          </ul>
        </div>
        <div class="navbar-header visible-xs" style="position:absolute;text-align:center;">
          <button type="button" class="navbar-toggle" id="slide-nav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <!--  Logo  --> 
          <a class="logo" href="<?php echo getLink();?>" style="left:47%;"> 
			<img class="logo-mobile" src="<?php echo getBrand();?>" style="width:100px;height:auto;margin-top:13px;" alt=""/> <img class="logo-transparent" src="<?php echo getLink();?>/images/logo-transparent.png" alt=""/> 
		  </a> 
          <!-- End Logo --> 
        </div>
      </div>
    </nav>
  </header>
  </body>
</html>