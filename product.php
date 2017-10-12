<?php
	include 'header.php';
	include_once("functions/functions.php");	
	unset($_SESSION['produk_warna']);
	unset($_SESSION['produk_ukuran']);
?>
<html>
<body>
<script type="text/javascript">
function stok(qty){
	document.getElementById("qty").setAttribute("max",qty);
}
function setProdukImage(id,warna,jum){
	var harga = 'harga_refresh='+warna;
	var data = 'ukuran_refresh='+warna;
	var dataString = 'setSmall='+warna+'&jum='+jum;
    $.ajax({
        type: "POST",
        url: "<?php echo getLink();?>/ajax.php",
        data: data,
        cache: false,
        success: function(result) {
			document.getElementById("ukuran").innerHTML = result;
        }
    });
    $.ajax({
        type: "POST",
        url: "<?php echo getLink();?>/ajax.php",
        data: harga,
        cache: false,
        success: function(result) {
			var result = result.split("/");
			document.getElementById("produkHarga").innerHTML = result[0];
			document.getElementById("produkPP").innerHTML = result[1];
			document.getElementById("produkPS").innerHTML = result[2];
        }
    });
    $.ajax({
        type: "POST",
        url: "<?php echo getLink();?>/ajax.php",
        data: dataString,
        cache: false,
        success: function(result) {
			var result = result.split("/");
			var data1 = result[0].split("@");
			var data2 = result[1].split("@");
			for(i=1;i<data1.length;i++){
				var radio = data1[i].split("-");
				var span = data1[i].split("-");
				for(j=1;j<data2.length;j++){
					if(data1[i] == data2[j]){
						warnaMobile = data2[j].replace("_"," ");	warnaMobile = warnaMobile.replace("_"," ");		
						warnaMobile = data2[j].replace("_"," ");	warnaMobile = warnaMobile.replace("_"," ");		
						var image = "<?php echo getLink();?>/images/products/"+id+"-"+warnaMobile+".jpg";
						warna = warna.replace("_"," "); 	warna = warna.replace("_"," ");		
						warna = warna.replace("_"," "); 	warna = warna.replace("_"," ");		
						document.getElementById("colorStat").innerHTML = warna;
						var isi = document.getElementById("span"+radio[0]).getAttribute("style");
						var style = isi+"border-color:red;border-width:2px;";
						document.getElementById("span"+span[0]).setAttribute("style",style);
						document.getElementById("breadWarna").innerHTML = warna;
						document.getElementById("radio"+radio[0]).setAttribute("checked",'');
						document.getElementById("mobile_image"+(j-1)).setAttribute("src",image);
						document.getElementById(data1[i]).setAttribute("style","display:block;margin-bottom: 10px;");
						break;
					}else{
						var isi = document.getElementById("span"+radio[0]).getAttribute("style");
						var isi = isi.split(";");
						var style = isi[0]+";"+isi[1]+";"+isi[2]+";"+isi[3]+";";
						document.getElementById("span"+span[0]).setAttribute("style",style);

						document.getElementById("radio"+radio[0]).removeAttribute("checked");
						document.getElementById(data1[i]).setAttribute("style","display:none;margin-bottom: 10px;");
					}
				}
			}
        }
    });
}
function refresRunWarna(){
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: "warna_refresh=1",
		cache: false,
        success: function(html) {
			$("#warnaProduk").html(html);
		}
    });	
}
</script>
  <div id="pageContent"> 
    
    <!-- Breadcrumb section -->
    
    <section class="breadcrumbs breadcrumbs-boxed">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="<?php echo getLink();?>/home">Home</a></li>
          <li><a href="<?php echo getLink();?>/list-asc">Produk</a></li>
          <li class="active">
				<?php 
					$bread = explode("/",str_replace('_',' ',$_GET['produk']));
					$nama = $bread[0];
					if(count($bread)>1){
						$warna = $bread[1];						
					}
					echo $nama." / <label id='breadWarna'>".str_replace('_',' ',$warna)."</label>";
				?>
		  </li>
        </ol>
      </div>
    </section>
    
    <!-- Content section -->
    <section class="content">
      <div class="container">
        <div class="row product-info-outer col-md-10">
          <?php
			produkDetail();
		  ?>
        </div>
        <div class="row col-sm-12 col-md-1">
			<center>
				<img src="<?php echo getLink();?>/images/banner/diskon.gif" />
			</center>
        </div>
      </div>
    </section>
    <section class="content content--fill">
      <div class="container" style="margin-top:-50px;"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">
          <li class="active"><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase teks-bold">DESCRIPTION</a></li>
          <li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase teks-bold">Reviews</a></li>
          <li><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase teks-bold">Sizing Guide</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content tab-content--wd">
          <div role="tabpanel" class="tab-pane active" id="Tab1">
			<?php 
				produkDetailDeskripsi();
			?>
          </div>
          <div role="tabpanel" class="tab-pane" id="Tab2">
            <h6><strong>REVIEW CUSTOMER</strong></h6>
			<div style="overflow:auto;width:100%;height:auto;">
			<?php
			$url = explode('-',$_GET['produk']);
			$nama_produk = str_replace('_',' ',$url[0]);
			$stmt = $mysqli->prepare("select kode_produk from tbl_produk where nama_produk='$nama_produk'");
			$stmt->execute();	$stmt->bind_result($kode_produk);	$stmt->fetch();	$stmt->close();

				getProdukReview($kode_produk);
			?>
			</div>
            <div class="divider divider--xs"></div>
            <table class="table table-params">
              <tbody>
                <tr>
                  <td class="text-right"><strong>QUALITY</strong></td>
                  <td><div class="rating rating--big">
				  <?php
					getProdukRating($kode_produk,"quality");
				  ?>
				  </div></td>
                </tr>
                <tr>
                  <td class="text-right"><strong>PRICE</strong></td>
                  <td><div class="rating rating--big">
				  <?php
					getProdukRating($kode_produk,"price");
				  ?>
				  </div></td>
                </tr>
                <tr>
                  <td class="text-right"><strong>VALUE</strong></td>
                  <td><div class="rating rating--big">
				  <?php
					getProdukRating($kode_produk,"value");
				  ?>
				  </div></td>
                </tr>
              </tbody>
            </table>
            <div class="divider divider--xs"></div>
            <h6><strong>WRITE YOUR OWN REVIEW</strong></h6>
            <p>YOU'RE REVIEWING:  
				<?php
					$url = explode('-',$_GET['produk']);
					echo str_replace('_',' ',$url[0]);
				?>
			</p>
            <p>HOW DO YOU RATE THIS PRODUCT?</p>
            <div class="divider divider--xs"></div>
            <form action="" method="post" class="contact-form">
            <div class="table-responsive">
              <table class="table table-params">
                <tbody>
                  <tr>
                    <td class="text-right"></td>
                    <td class="text-center"><div class="rating rating--big"><span class="icon-star-fill"></span><span class="icon-star empty-star"></span><span class="icon-star empty-star"></span><span class="icon-star empty-star"></span><span class="icon-star empty-star"></span></div></td>
                    <td class="text-center"><div class="rating rating--big"><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star empty-star"></span><span class="icon-star empty-star"></span><span class="icon-star empty-star"></span></div></td>
                    <td class="text-center"><div class="rating rating--big"><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star empty-star"></span><span class="icon-star empty-star"></span></div></td>
                    <td class="text-center"><div class="rating rating--big"><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star empty-star empty-star"></span></div></td>
                    <td class="text-center"><div class="rating rating--big"><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star-fill"></span><span class="icon-star-fill"></span></div></td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>QUALITY</strong></td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingQuality" type="radio" name="ratingQuality" value="1" checked>
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingQuality" type="radio" name="ratingQuality" value="2">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingQuality" type="radio" name="ratingQuality" value="3" >
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingQuality" type="radio" name="ratingQuality" value="4" >
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingQuality" type="radio" name="ratingQuality" value="5" >
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>

                  </tr>
                  <tr>
                    <td class="text-right"><strong>PRICE</strong></td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingPrice" type="radio" name="ratingPrice" value="1" checked>
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingPrice" type="radio" name="ratingPrice" value="2">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingPrice" type="radio" name="ratingPrice" value="3">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingPrice" type="radio" name="ratingPrice" value="4">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingPrice" type="radio" name="ratingPrice" value="5">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>

                  </tr>
                  <tr>
                    <td class="text-right"><strong>VALUE</strong></td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingValue" type="radio" name="ratingValue" value="1" checked>
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingValue" type="radio" name="ratingValue" value="2">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingValue" type="radio" name="ratingValue" value="3">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingValue" type="radio" name="ratingValue" value="4">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                    <td class="text-center">
					<label class="radio" style="display:inline-table;margin:-5px;">
                            <input id="ratingValue" type="radio" name="ratingValue" value="5">
                            <span class="outer"><span class="inner"></span></span>
					</label>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="divider divider--xs"></div>
              <label>Nickname<span class="required">*</span></label>
              <input type="text" name="nickname" class="input--wd input--wd--full" required>
              <label>Review<span class="required">*</span></label>
              <textarea name="review"  class="textarea--wd input--wd--full"  required></textarea>
              <div class="divider divider--xs"></div>
              <button type="submit" name="btnReview" class="btn btn--wd text-uppercase wave">Submit Review</button>
            </form>
          </div>
		  <div role="tabpanel" class="tab-pane" id="Tab3">
			 <h6 class="text-uppercase"><strong>Konversi Ukuran Produk</strong></h6>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-md-6 col-md-offset-1">
						<?php 
							getSizingGuide();
						?>
					</div>
				</div>
          </div>
        </div>
      </div>
    </section>
		  <?php
			 if(isset($_POST['btnReview'])){
				 produkReview();
			 }
 		 ?>
    <section class="content" style="margin-top: -10%;">
      <div class="container">                 
        <h2 class="text-center text-uppercase teks-bold" style="width:auto;font-family:'Menu Font';">REKOMENDASI KAMI</h2>
        <div class="row product-carousel mobile-special-arrows animated-arrows product-grid four-in-row">
		<?php
			rekomendasiProduk();
		?>
        </div>
      </div>
    </section>   
    <!-- End Content section --> 
  </div>
 <?php
	include 'footer.php';
 ?>
</body>
</html>