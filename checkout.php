<?php 
	include 'header.php'; 
	include_once("functions/functions.php");	
	unset($_SESSION['biaya_pengiriman']);
	unset($_SESSION['asuransi']);
?>

<script>
$(document).ready(function() {
	$("#asuransi").click( function(){
		if($(this).is(':checked')){
			var data = "asuransi=1";
		}else{			
			var data = "asuransi=0";
		}
		$.ajax({
			type: "POST",
			url: "<?php echo getLink();?>/ajax.php",
			data: data,
			cache: false,
			success: function(html) {
				$("#biayaAsuransi").html(html);
				refreshOngkirDanTotal();
			}
		});	
	});
    $("#tambahAlamat").change(function() {
		var isi = $(this).val();
		var dataString = 'informasiPengiriman='+isi;
		if(isi == "default"){
			$("#alamat-member").slideUp("slow");						
			$("#alamat-checkout").slideUp("slow");						
		}else if(isi == "tambah"){
			$("#alamat-member").slideUp("slow");						
			$("#alamat-checkout").slideDown("slow");		
			document.getElementById("btnGoStep3").setAttribute("onClick","setAlamatPengiriman()");
		}else{
			document.getElementById("btnGoStep3").removeAttribute("onClick");
			$.ajax({
				type: "POST",
				url: "<?php echo getLink();?>/ajax.php",
				data: dataString,
				cache: false,
				success: function(html) {
					$("#alamat-checkout").slideUp("slow");						
					$("#alamat-member").slideUp("slow");						
					$("#alamat-member").slideDown("slow");						
					$("#alamat-member").html(html);
					refreshOngkirDanTotal();
				}
			});						
		}
    });
});
function setAlamatPengiriman(){
		var email = $("#email").val();
		var nama_penerima = $("#nama_penerima").val();
		var alamat_penerima = $("#alamat_penerima").val();
		var provinsi = $("#provinsi").val();
		var kota = $("#kota").val();
		var kecamatan = $("#kecamatan").val();
		var kelurahan = $("#kelurahan").val();
		var kode_pos = $("#kode_pos").val();
		var tel_rumah = $("#tel_rumah").val();
		var tel_handphone = $("#tel_handphone").val();
		var dataString = 'btnGoStep3=1&email='+email+'&nama_penerima='+nama_penerima+"&alamat_penerima="+alamat_penerima+
		"&provinsi="+provinsi+"&kota="+kota+"&kecamatan="+kecamatan+"&kelurahan="+kelurahan+"&kode_pos="+kode_pos+"&tel_rumah="+tel_rumah+
		"&tel_handphone="+tel_handphone;	
		$.ajax({
			type: "POST",
			url: "<?php echo getLink();?>/ajax.php",
			data: dataString,
			cache: false,
			success: function(html) {
				refreshOngkirDanTotal();
			}
		});				
}
function refreshOngkirDanTotal(){
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",
		data: "ongkir=1",
		cache: false,
		success: function(html) {
			$("#ongkir").html(html);
		}
	});				
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",
		data: "total=1",
		cache: false,
		success: function(html) {
			$("#total").html(html);
		}
	});		
}
</script>
	<section class="breadcrumbs  hidden-xs">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">Checkout Belanja</li>
        </ol>
      </div>
    </section>
    
<section class="content">
      <div class="container">
        <h2 class="text-uppercase">Checkout</h2>
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <div class="panel-group" id="checkout">
              <div class="panel panel-checkout" role="tablist">
                <div id="checkoutOption" class="panel-heading active" role="tab">
                  <h4 class="panel-title"> <a role="button" >PILIHAN BAYAR</a> </h4>
                  <div class="panel-heading__number">1.</div>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel">
                  <div class="panel-body">
                    <div class="row">
				<?php
					if(!isset($_SESSION['id_customer'])){							
				?>
                      <div class="col-sm-6">
                        <h6 class="text-uppercase"><strong>Pembayaran sebagai Tamu atau Daftar</strong></h6>
                        <p> Daftar menjadi Member untuk mendapatkan banyak keuntungan </p>
                          <label class="radio">
                            <input id="checkoutSebagai" type="radio" name="checkoutSebagai" value="nonmember" checked>
                            <span class="outer"><span class="inner"></span></span>Bayar Sebagai Tamu</label>
                          <label class="radio">
                            <input id="checkoutSebagai" type="radio" onClick="window.location.href = '<?php echo getLink().'/register'; ?>'" name="checkoutSebagai" value="daftar">
                            <span class="outer"><span class="inner"></span></span>Daftar Member</label>
                          <div class="divider divider--xs"></div>
                          <h6 class="text-uppercase"><strong>Mendaftar dan menghemat waktu !</strong></h6>
                          <p> Peluang Bisnis dengan menjadi Member!
								Daftar menjadi member dan dapatkan banyak kemudahan dan keuntungan : </p>
                          <ul>
                            <li><strong>Penghasilan bulanan dan tahunan</strong></li>
                            <li><strong>Belanja cepat dan mudah</strong></li>
                            <li><strong>Akses mudah ke status dan riwayat pesanan anda	</strong></li>
                          </ul>
                          <div class="divider divider--xs"></div>
                          <button data-toggle="collapse" aria-controls="collapseTwo" data-parent="#checkout" href="#collapseTwo" class="btn btn--wd" type="submit" name="btnGoStep2" id="btnGoStep2">LANJUT</button>
                      </div>
                      <div class="divider divider--sm visible-xs"> </div>
                      <div class="col-md-6">
						  <div class="row">
							<h4 class="text-uppercase h-pad-sm">LOGIN</h4> 
							<h5 class="text-uppercase h-pad-sm">Member dan Agen</h5> 
							<div class="hr"></div>
							<div class="divider divider--xs"></div>
							<form action="" method="POST">
								<div class="col-md-3">
									<label>Username:</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="input--wd input--wd--full" id="username" name="txtUsername" placeholder="Username">
								</div>
								<div class="divider divider--xxs"> </div>
								<div class="col-md-3">
									<label>Password:</label>
								</div>
								<div class="col-md-9">
									<input type="password" class="input--wd input--wd--full" name="txtPassword" id="password" placeholder="Password">
								</div>
								<div class="divider divider--xxs"> </div>
								<div class="col-md-3">
								</div>
								<div class="col-md-9">
									<p> <a href="<?php echo getLink()."/forgot-password";?>" target="_blank" >lupa kata sandi Anda? </a></p>
								</div>
								<div class="divider divider--xxs"> </div>
					<?php
						include_once 'captcha.php';
					?>
								<div class="divider divider--xxs"> </div>
								<div class="divider divider--xxs"> </div>
								<div class="divider divider--xxs"> </div>
								<div class="divider divider--xxs"> </div>
								<div class="divider divider--xxs"> </div>
								<div class="col-xs-1">
								</div>
								<div class="col-xs-10">
									<button class="btn btn--wd" type="submit" id="btnLogin" name="btnLogin" disabled>LOGIN</button>
								</div>
							</form>
								<div class="divider divider--xxs"> </div>
							<br>
							<?php
							if(isset($_POST['btnLogin'])){
								login("checkout");		
							}?>
							</br>
						  </div>
                      </div>
				<?php
					}else{
				?>
                      <div class="col-sm-9">
                        <h6 class="text-uppercase"><strong>Pembayaran sebagai : </strong><?php echo $_SESSION['nama_lengkap']; ?></h6>
                          <div class="divider divider--xs"></div>
                          <button data-toggle="collapse" aria-controls="collapseTwo" data-parent="#checkout" href="#collapseTwo" class="btn btn--wd" type="submit" name="btnGoStep2" id="btnGoStep2">LANJUT</button>
                      </div>
				<?php
					}
				?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		<form action="invoice" method="post" enctype="multipart/form-data">
            <div class="panel-group" id="checkout2">
              <div class="panel panel-checkout" role="tablist">
                <div id="informasiPengiriman" class="panel-heading" role="tab">
                  <h4 class="panel-title"> <a role="button" >Informasi Pengiriman</a> </h4>
                  <div class="panel-heading__number">2.</div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel">
                  <div class="panel-body">
				<?php
					if(isset($_SESSION['id_customer'])){
				?>
					<h6 class="text-uppercase"><strong>Kirim Ke</strong></h6>
                    <select class="form-control tambah-alamat" id="tambahAlamat" name="tambahAlamat" data-style="select--wd select--wd--lg">
						<option value='default'>Pilih Alamat</option>
						<?php
							getAlamatCheckout();
						?>
						<option value='tambah'>Tambah alamat baru</option>
					</select>
				<?php
					}
				?>
					<div class="divider divider--xs"></div>
					<div class="alamat-member" id="alamat-member" name="alamat-member" style="display: none;">
						<button data-toggle="collapse" href="#collapseThree"  aria-controls="collapseThree" data-parent="#checkout3" class="btn btn--wd" type="submit" name="btnGoStep3" id="btnGoStep3">LANJUT</button>
					</div>
					<br>
				<?php
					if(isset($_SESSION['id_customer'])){
				?>
					<div class="alamat-checkout" id="alamat-checkout" name="alamat-checkout" style="display: none;">
				<?php
					}else{
				?>
					<div class="alamat-checkout" id="alamat-checkout" name="alamat-checkout">							
				<?php
					}
				?>
						<div class="divider divider--xs"></div>
						<?php 
						if(isset($_SESSION['id_customer'])){
								echo'
						<div class="row">
							<div class="col-xs-4">
								<label>Alamat Sebagai / Nama Alamat:</label>
							</div>
							<div class="col-xs-8">
								<input type="text" name="nama_alamat" id="nama_alamat" class="input--wd input--wd--full" placeholder="Alamat Sebagai / Nama Alamat *">
								<input type="hidden" name="email" id="email" class="input--wd input--wd--full" placeholder="Email aktif *" value="'.$_SESSION['email'].'">
							</div>
						</div>
								';
						}else{
							echo ' <input type="hidden" name="nama_alamat" id="nama_alamat" value="Alamat Tamu"> 
						<br>
						<div class="row">
							<div class="col-xs-4">
								<label>Alamat E-Mail:</label>
							</div>
							<div class="col-xs-8">
								<input type="text" name="email" id="email" class="input--wd input--wd--full" placeholder="Email aktif *" >
							</div>
						</div>
							';

						}
						?>
						<br>
						<div class="row">
							<div class="col-xs-4">
								<label>Nama Penerima:</label>
							</div>
							<div class="col-xs-8">
								<input type="text" name="nama_penerima" id="nama_penerima" class="input--wd input--wd--full" placeholder="Nama Penerima *">
							</div>
						</div>
						<br>
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

						<div class="divider divider--xs"></div>
						<div class="row">
							<div class="col-xs-4">
								<label>No. Telepon/Kantor (Penerima)</label>
							</div>
							<div class="col-xs-8">
								<input type="text" name="tel_rumah" id="tel_rumah" class="input--wd input--wd--full" placeholder="No. Telepon/Kantor (Penerima) *">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-4">
								<label>No. Handphone (Penerima)</label>
							</div>
							<div class="col-xs-8">
								<input type="text" name="tel_handphone" id="tel_handphone" class="input--wd input--wd--full" placeholder="No. Handphone (Penerima) *">	
							</div>
						</div>
						<div class="divider divider--xs"></div>
						<div class="row">
							<div class="col-xs-12 ">
								<div class="col-xs-4">
									<label>Catatan Pengiriman:</label>
								</div>
								<div class="col-xs-8">
									<textarea class="textarea--wd textarea--wd--full" name="catatanPengiriman" id="catatanPengiriman" placeholder="Catatan untuk pengiriman"></textarea>
								</div>
								<div id="button3" style="display:none;">
								<button data-toggle="collapse" href="#collapseThree"  onClick="setAlamatPengiriman()"  aria-controls="collapseThree" data-parent="#checkout3" class="btn btn--wd" type="submit" name="btnGoStep3" id="btnGoStep3">LANJUT</button>
								</div>
							</div>							
						</div>
					
				</div>
                  </div>
						<br>
						<div class="hr"></div>
					<div class="divider divider--xs"></div>
                </div>
              </div>
            </div>
            <div class="panel-group" id="checkout3">
              <div class="panel panel-checkout" role="tablist">
                <div id="metodePengiriman" class="panel-heading" role="tab">
                  <h4 class="panel-title"> <a role="button" >METODE PENGIRIMAN & PEMBAYARAN</a> </h4>
                  <div class="panel-heading__number">3.</div>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel">
					<div class="panel-body">
						 <div class="col-md-5 col-xs-12">
							  <div class="card card--padding">
							  <h6 class="h-pad-sm">PENGIRIMAN</h6>
									<label class="radio">
									<input id="metodePengiriman" type="radio" name="metodePengiriman" value="JNE REG" checked>
									<span class="outer"><span class="inner"></span></span>JNE REG</label>
								<div class="checkbox-group">
									<input type="checkbox" id="asuransi" name="asuransi">
									<label for="asuransi"> <span class="check"></span> <span class="box"></span>Asuransi(agen ditanggung oreli)</label>
								</div>
							</div>
						 </div>
						 <div class="col-md-7 col-xs-12">
							  <div class="card card--padding">
							  <h6 class="h-pad-sm">PEMBAYARAN</h6>
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="BCA" checked>
									<span class="outer"><span class="inner"></span></span>BCA TRANSFER</label>
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="MANDIRI">
									<span class="outer"><span class="inner"></span></span>MANDIRI TRANSFER</label>							  

<!--								<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="DOKU-04">
									<span class="outer"><span class="inner"></span></span>DOKU WALLET</label>							  
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="DOKU-06">
									<span class="outer"><span class="inner"></span></span>BRIPay</label>							  
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="DOKU-02">
									<span class="outer"><span class="inner"></span></span>CLICKPAY MANDIRI</label>							  
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="DOKU-24">
									<span class="outer"><span class="inner"></span></span>BCA KLICKPAY</label>							  
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="DOKU-14">
									<span class="outer"><span class="inner"></span></span>ALFA DOKU</label>							  
-->
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="DOKU-15">
									<span class="outer"><span class="inner"></span></span>CREDIT CARD</label>							  
									<label class="radio">
									<input id="metodePembayaran" type="radio" name="metodePembayaran" value="DOKU-05">
									<span class="outer"><span class="inner"></span></span>BANK TRANSFER (VIRTUAL ACCOUNT)</label>							  
							</div>
						 </div>
                    </div>
					<div class="panel-body">
					  <button data-toggle="collapse" href="#collapseFour" aria-controls="collapseFour" data-parent="#checkout3" class="btn btn--wd" type="submit" name="btnGoStep4" id="btnGoStep4">LANJUT</button>
					</div>
                </div>
              </div>
              <div class="panel panel-checkout" role="tablist">
                <div id="orderReview" class="panel-heading" role="tab">
                  <h4 class="panel-title"> <a role="button" >ORDER REVIEW</a> </h4>
                  <div class="panel-heading__number">4.</div>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel">
                  <div class="panel-body">
							
						  <table class="table shopping-cart-table text-center">
							<thead>
							  <tr>
								<th>Nama produk</th>
								<th>&nbsp;</th>
								<th>Harga produk </th>
								<th>Qty</th>
								<th>Subtotal</th>
							  </tr>
							</thead>
							<tbody>
							 <?php
								getCartList("preview");
							?>
							</tbody>
						  </table>
						  <div class="hr"></div>
						  <div class="divider divider--xs"></div>
						  
						  <div class="divider divider--xxs"></div>
						<div class="row">
						  <div class="col-sm-6 col-md-4">
							<h4>TOTAL PESANAN</h4>
						  </div>
						  <div class="col-sm-6 col-md-8">
							<table class="table">
							  <tbody>
								<tr>
								  <td class="text-left"> Total Harga produk </td>
								  <td class="text-right"> Rp <?php echo setHarga(getCartPrice()); ?></td>
								</tr>
								<tr>
								  <td class="text-left"> Diskon produk <br> 
									<?php 
									if(isset($_SESSION['tipe'])){
										if($_SESSION['tipe']==3){
											echo "member";											
										}else if($_SESSION['tipe']==2){
											echo "agen";											
										}
									}
									if(isset($_SESSION['tipe']) AND isset($_SESSION['kupon_diskon'])){
										echo "+";										
									}
									if(isset($_SESSION['kupon_diskon'])){
										echo "kupon(".getKuponDiskon($_SESSION['kupon_diskon']).")";
									} 
									?>
									
								  </td>
								  <td class="text-right"> Rp ( - ) <?php echo setHarga(getCheckoutDiskon()); ?></td>
								</tr>
								<tr>
								  <td class="text-left"> Ongkos Kirim </td>
								  <td class="text-right"> Rp <span id="ongkir"> 
									<?php 
									if(getCheckoutOngkir() > 0){
										echo getCheckoutOngkir();
									}else{
										echo "( pilih alamat pengiriman )";											
									}
									?>
								  </span></td>
								</tr>
								<tr>
									<?php 
										if(isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 2){
											echo '<td class="text-left"> Asuransi (ditanggung oreli) </td>';
										}else{
											echo '<td class="text-left"> Asuransi </td>';
										}
									?>
								  <td class="text-right"> Rp <span id="biayaAsuransi"> 
									<?php 
										echo setHarga(getAsuransi());
									?>
								  </span></td>
								</tr>
								<tr>
								  <td class="text-left"> Diskon Ongkos Kirim </td>
								  <td class="text-right"> Rp ( - ) <?php echo setHarga(getSubsidiOngkir()); ?></td>
								</tr>
								<tr>
								  <td class="text-left"> Diskon Hari Ini </td>
								  <td class="text-right"> Rp ( - )  <?php echo setHarga(getKodeUnik()); ?></td>
								</tr>
								<tr>
								  <th class="text-left"><h5><b>Total Pembayaran</b></h5></th>
								  <th class="text-right"><h5><b> Rp <span id="total"> 
									<?php 
									if(getCheckoutOngkir()==0){
										echo "( pilih alamat pengiriman )";											
									}else{
										echo setHarga(getCheckoutTotal());
									}
									?></span></b></h5>
								  </th>
								</tr>
							  </tbody>
							</table>
						  </div>
							<div class="col-md-12">
								<span class="label label-warning hidden-xs"><b>* Untuk mengubah alamat pengiriman silahkan isi ulang form alamat pengiriman dan klik button LANJUT.</b></span>
								<span class="label label-warning visible-xs"><b>* Untuk mengubah alamat pengiriman silahkan isi ulang form <br> alamat pengiriman dan klik button LANJUT.</b></span>
							</div>
						</div>
						<div class="divider divider--xs"></div>
						<button data-toggle="collapse" href="#collapseThree"  aria-controls="collapseThree" data-parent="#checkout3" class="btn btn--wd" type="submit" style="background-color:red;">KEMBALI</button>
						<?php
							if(getCartPrice() > 0){
								if(isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 3){
									if(getOrderJum() >= 0 OR getCartJum() >= 1){									
										echo'<button type="submit" name="btnCheckout" class="btn btn--wd text-uppercase wave">CHECKOUT</button>';
									}else{
										echo'<button type="submit" name="btnCheckout" class="btn btn--wd text-uppercase wave disabled">CHECKOUT</button>';
										echo'<br>Minimal pembelian pertama member 2 item. ';
									}
								}else if(isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 2){
									if(getCartPrice() > 20000000){
										echo'<button type="submit" name="btnCheckout" class="btn btn--wd text-uppercase wave">CHECKOUT</button>';
									}else{
										echo'<button type="submit" name="btnCheckout" class="btn btn--wd text-uppercase wave disabled">CHECKOUT</button>';
										echo'<br>Minimal pembelian agen Rp 20.000.000 (sebelum diskon)';
									}
								}else{
									echo'<button type="submit" name="btnCheckout" class="btn btn--wd text-uppercase wave">CHECKOUT</button>';
								}
							}else{
								echo'<button type="submit" name="btnCheckout" class="btn btn--wd text-uppercase wave disabled">CHECKOUT</button>';
							}
						?>
					</div>
                </div>
              </div>
            </div>
          </div>
		 </form>
        </div>
      </div>
    </section>
	<div class="divider divider--xs"></div>
	
<?php include 'footer.php'; ?>