
<?php include("header.php"); 
	include_once("functions/functions.php");	
?>
<html>
<body>
<script>
function setProduk(no_transaksi){
    var dataString = 'return_produk='+no_transaksi;
	$.ajax({
        type: "POST",
        url: "<?php echo getLink();?>/ajax.php",
        data: dataString,
        cache: false,
        success: function(html) {
			$("#kode_produk").html(html);
        }
    });
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
	  
			<h4 class="text-uppercase h-pad-sm">Return Barang</h4> 
            <div class="hr"></div>
				<div class="divider divider--xs"></div>
				<h5 class="text-uppercase h-pad-sm">Isi form di bawah ini sesuai dengan data transaksi anda.</h5> 
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
							echo '<input type="text" class="input--wd input--wd--full" onChange="setProduk(this.value)" name="no_transaksi" id="no_transaksi" placeholder="No Transaksi *" required>';
						}else{
							echo'
								<select class="form-control" onInput="setProduk(this.value)" name="no_transaksi" id="no_transaksi" data-style="select--wd"  data-width="100%" required>
									<option>Pilih nomor transaksi</option>
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
						<label>Produk yang Ditukar :</label>
					</div>
					<div class="col-xs-8">
						<select class="form-control"  name="kode_produk" id="kode_produk" data-style="select--wd"  data-width="100%" required>
							<option>Isi nomor transaksi</option>
						</select>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row ">
					<div class="col-xs-4">
						<label>Jumlah :</label>
					</div>
					<div class="col-xs-3">
						<input type="number" class="input--wd input--wd--full" name="jumlah" min="1" id="jumlah" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Keterangan :</label>
					</div>
					<div class="col-xs-8">
						<textarea class="textarea--wd textarea--wd--full" name="keterangan" placeholder="Keterangan pengembalian barang" required></textarea>
					</div>					
				</div>
				<div class="hr"></div>
				<div class="divider divider--xs"></div>
				<button class="btn btn--wd col-md-offset-10" type="submit" name="btnReturn">Selesai</button>
			</form>
		</div>
<?php 
	if(isset($_POST['btnReturn'])){
		returnBarang();
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