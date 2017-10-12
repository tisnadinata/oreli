<?php include("header.php"); 
	include_once("functions/functions.php");	
?>
<html>
<body>
<script>
function metode(isi){
		if(isi == "tunai"){
			$(".no_rekening").slideDown("slow");						
			document.getElementById("no_rekening").setAttribute("required","");
		}else{
			document.getElementById("no_rekening").removeAttribute("required");
			$(".no_rekening").slideUp("slow");						
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
          <div class="col-md-7  col-md-offset-2 aside-column">
            <section class="content"> 
            <div class="card card--padding">
          <div class="card__row-line">
	  
			<h4 class="text-uppercase h-pad-sm">Konfirmasi Pembayaran</h4> 
            <div class="hr"></div>
				<div class="divider divider--xs"></div>
				<h5 class="text-uppercase h-pad-sm">Isi form di bawah ini sesuai dengan data transfer anda.</h5> 
				<div class="hr"></div>
				<div class="divider divider--xs"></div>
            <form action="" method="post" class="contact-form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xs-4">
						<label>No Transaksi :</label>
					</div>
					<div class="col-xs-8">
					<?php
						if(!isset($_SESSION['id_customer'])){
							echo '<input type="text" class="input--wd input--wd--full" name="no_transaksi" id="no_transaksi" placeholder="No Transaksi *" required>';
						}else{
							echo'
								<select class="selectpicker" name="no_transaksi" id="no_transaksi" data-style="select--wd"  data-width="100%">
							';
									getNoTransaksi();
							echo'
								</select>
							';
						}
					?>						
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
						<label>Pembayaran Atas Nama :</label>
					</div>
					<div class="col-xs-8">
						<input type="text" class="input--wd input--wd--full" name="atas_nama" id="atas_nama" placeholder="Pembayaran Atas Nama*" required>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
						<label>Pembayaran Melalui :</label>
					</div>
					<div class="col-xs-8">
						  <label class="radio">
                            <input id="pembayaran" type="radio" onChange="metode(this.value)" name="pembayaran" value="atm" checked>
                            <span class="outer"><span class="inner"></span></span>Transfer ATM</label>
                          <label class="radio">
                            <input id="pembayaran" type="radio" onChange="metode(this.value)" name="pembayaran" value="tunai">
                            <span class="outer"><span class="inner"></span></span>Setoran Tunai</label>
                          <label class="radio">
                            <input id="pembayaran" type="radio" onChange="metode(this.value)" name="pembayaran" value="internet">
                            <span class="outer"><span class="inner"></span></span>Internet Banking</label>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row ">
					<div class="no_rekening" style="display: none;">
						<div class="col-xs-4">
							<label>Nomor Rekening :</label>
						</div>
						<div class="col-xs-8">
							<input type="text" class="input--wd input--wd--full" name="no_rekening" id="no_rekening" placeholder="Nomor Rekening Yang di Pakai">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Rekening Tujuan :</label>
					</div>
					<div class="col-xs-8">
						<select class="selectpicker" name="rekening_tujuan" id="rekening_tujuan" data-style="select--wd"  data-width="100%">
					<?php
						getRekeningOreli();
					?>						
						</select>
					</div>					
				</div>
<!--				<div class="row">
					<div class="col-xs-4">
						<label>Bukti Pembayaran (jika ada): </label>
					</div>
					<div class="col-xs-8">
						<label class="control-label">Pilih File</label>
						<input id="file_bukti"  name="file_bukti" type="file" class="file" required>
					</div>
				</div>
-->				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
						<label>Waktu Transfer :</label>
					</div>
					<div class="col-xs-4">
						<input type="date" class="input--wd input--wd--full" name="tgl_transfer" id="tgl_transfer" placeholder="waktu transfer" required>
					</div>
					<div class="col-xs-4">
						<input type="time" class="input--wd input--wd--full" name="jam_transfer" id="jam_transfer" placeholder="waktu transfer" required>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">
						<label>Jumlah Transfer :</label>
					</div>
					<div class="col-xs-8">
						<input type="text" class="input--wd input--wd--full" name="jumlah_transfer" id="jumlah_transfer" placeholder="Jumlah uang yang di transfer *" required>
					</div>
				</div>
				<div class="hr"></div>
				<div class="divider divider--xs"></div>
				<button class="btn btn--wd col-md-offset-7" type="submit" name="btnKonfirmasi">Konfirmasi Pembayaran</button>
			</form>
		</div>
<?php 
	if(isset($_POST['btnKonfirmasi'])){
		konfirmasiPembayaran();
	}
	if(isset($_POST['btnLogin'])){
		login("konfirmasi-pembayaran");		
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