<?php 
	include 'header.php' ;
	
	include_once("functions/functions.php");	
?>
<script>
function hitungOngkir(){
	var provinsi = "provinsi="+$("#provinsi").val();
	var kota = "kota="+$("#kota").val();
	var kecamatan = "kecamatan="+$("#kecamatan").val();
	var kelurahan = "kelurahan="+$("#kelurahan").val();
	var dataString = "btnEstimasi=1&"+provinsi+"&"+kota+"&"+kecamatan+"&"+kelurahan;
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$("#ongkos").html("Rp"+html);
		}
	});	
}
</script>
	<section class="breadcrumbs  hidden-xs">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">Keranjang Belanja</li>
        </ol>
      </div>
    </section>
    
    <!-- Content section -->
    <section class="content">
      <div class="container">
        <div class="card card--padding">
        <h2 class="text-uppercase hidden-xs">Keranjang Belanja</h2>
        <h3 class="text-uppercase visible-xs">Keranjang Belanja</h3>
		<form action=""  method="post" id="frmShoppingcart" name="frmShoppingcart">
          <table class="table shopping-cart-table text-center">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Nama Produk</th>
                <th>&nbsp;</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
			<?php
				getCartList("cart");
			?>
            </tbody>
          </table>
          <div class="hr"></div>
          <div class="divider divider--xs"></div>
          <div class="row shopping-cart-btns">
            <div class="col-sm-4 col-md-4"><a href="home" class="btn btn--wd pull-left">Lanjutkan Belanja</a></div>
            <div class="divider divider--xs visible-xs"></div>
            <div class="col-sm-8 col-md-8"><button type="submit" name="btnClearCart" id="btnClearCart" class="btn btn--wd btn--light pull-right" style="background-color:#F44336 !important;">Hapus Daftar Belanja</button>
              <div class="divider divider--xs visible-xs"></div>
              <button type="submit" name="btnUpdateCart" id="btnUpdateCart" class="btn btn--wd pull-right">Update Daftar Belanja</button></div>
          </div>
          <div class="divider divider--xxs"></div>
        </div>
        <div class="divider divider--xs"></div>
        <div class="row">
          <div class="col-md-4">
            <div class="card card--padding">
              <h4 class="h-pad-sm">KODE DISKON</h4>
              <p>Masukan kode kupon/voucher anda jika ada.</p>
              <input type="text" name="kode_kupon" class="input--wd input--wd--full">
              <div class="divider divider--xs"></div>
				<?php
				if(isset($_POST['btnKupon'])){
					setKuponDiskon();
				}
				?>
              <div class="divider divider--xs"></div>
              <button type="submit" name="btnKupon" class="btn btn--wd text-uppercase wave waves-effect">PAKAI KUPON/VOUCHER</button>
            </div>
          </div>
		</form>
          <div class="divider divider--xs visible-sm visible-xs"></div>
          <div class="col-md-8">
            <div class="card card--padding">
              <h4 class="h-pad-sm text-uppercase">Perkiraan Ongkos Kirim</h4>
              <p>Masukan tujuan pengiriman untuk mendapatkan estimasi biaya.</p>
              <div class="row">
				<div class="col-md-3 col-xs-12">   
					<label>Provinsi:</label>
					<select class="form-control provinsi"   name="provinsi" id="provinsi" >
                    <?php
						alamatProvinsi();
					?>
					</select>
                </div>
				<div class="col-md-3 col-xs-12">
					<label>Kota/Kabupaten:</label>
					<select class="form-control kota"  id="kota" name="kota" data-style="select--wd select--wd--lg">
					</select>
                </div>
				<div class="col-md-3 col-xs-12">
					<label>Kecamatan:</label>
					<select class="form-control kecamatan"  id="kecamatan" name="kecamatan" data-style="select--wd select--wd--lg">
					</select>
                </div>
				<div class="col-md-3 col-xs-12">
					<label>Kelurahan:</label>
					<select class="form-control kelurahan"  id="kelurahan" name="kelurahan" data-style="select--wd select--wd--lg">
					</select>
				</div>
              </div>
              <div class="divider divider--xs"></div>
              <div class="row">
				<div class="col-md-3 col-xs-12">   
					<button type="submit" id="btnEstimasi" name="btnEstimasi" onClick="hitungOngkir()" class="btn btn--wd text-uppercase wave waves-effect">HITUNG BIAYA</button>
                </div>
				<div class="col-md-3 col-xs-6">   
					<div style="font-size:1.5em;">Ongkos Kirim:</div>
                </div>
				<div class="col-md-2 col-xs-6">   
					<div style="font-size:1.5em;" id="ongkos">Rp</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="divider divider--md"></div>
        <div class="row">
          <div class="col-sm-6 col-md-2">
          </div>
          <div class="col-sm-6 col-md-5">
            <table class="table table-total">
              <tbody>
			  <?php
				if(isset($_SESSION['kupon_diskon'])){
					echo '
		                <tr>
						  <th class="text-left"> Diskon Kupon/Voucher </th>
						  <th class="text-right">'.getKuponDiskon().'</th>
						</tr>
					';					
				}
				if(isset($_SESSION['estimasi_ongkir'])){
					echo '
		                <tr>
						  <th class="text-left">Ongkos Kirim </th>
						  <th class="text-right">Rp '.getEstimasiOngkir().'</th>
						</tr>
					';					
				}
			  ?>
                <tr>
                  <th class="text-left"> Subtotal </th>
                  <th class="text-right">Rp <?php echo setHarga(getCartPrice()); ?></th>
                </tr>
                <tr>
                  <td class="text-left"><strong>Jumlah Total</strong></td>
                  <td class="text-right"><strong>Rp <?php echo setHarga(getCartPriceFinal()); ?></strong></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="text-center">
			
            <div class="col-sm-12 col-md-5"> 
			<?php
				if(getCartPrice() > 0){
					if(isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 3){
						if(getOrderJum() >= 0 OR getCartJum() >= 1){
							echo'<a href="checkout" class="btn btn--wd btn--xl">Lanjut ke Pembayaran</a>';
						}else{
							echo'<a href="checkout" class="btn btn--wd btn--xl disabled">Lanjut ke Pembayaran</a>';
							echo'<br>Minimal pembelian pertama member 2 item. ';
						}
					}else if(isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 2){
						if(getCartPrice() > 20000000){
							echo'<a href="checkout" class="btn btn--wd btn--xl">Lanjut ke Pembayaran</a>';
						}else{
							echo'<a href="checkout" class="btn btn--wd btn--xl disabled">Lanjut ke Pembayaran</a>';
							echo'<br>Minimal pembelian agen Rp 20.000.000 (sebelum diskon)';
						}
					}else{
						echo'<a href="checkout" class="btn btn--wd btn--xl">Lanjut ke Pembayaran</a>';
					}
				}else{
					echo'<a href="checkout" class="btn btn--wd btn--xl disabled">Lanjut ke Pembayaran</a>';
				}
			?>
              <div class="divider divider--xs"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
              <div class="divider divider--xs"></div>
              <div class="divider divider--xs"></div>
    <!-- End Content section --> 
	
	<?php
		if(isset($_POST['btnUpdateCart'])){
			updateCart();
		}else if(isset($_POST['btnClearCart'])){
			clearCart();
		}else if(isset($_POST['btnEstimasi'])){
			setEstimasiOngkir();
		}
		include 'footer.php' 
	?>