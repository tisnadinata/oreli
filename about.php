<?php 
	include("header.php"); 
	include_once("functions/functions.php");	
?>
<html>
<body>

<div id="loader-wrapper" class="loader-off">
<div id="loader"></div>
</div>
<div class="wrapper"> 
  <div id="pageContent" class="page-content">
 	<!-- Breadcrumb section -->
		
		<section class="breadcrumbs  hidden-xs">
		  <div class="container">
			<ol class="breadcrumb breadcrumb--wd pull-left">
			  <li><a href="#">Home</a></li>
			  <li class="active">Tentang Kami</li>
			</ol>
		  </div>
		</section>
   <section class="content top-null">
      <div class="container">
        <div class="row">
		<div class="col-md-10 col-md-offset-1 col-xs-12 aside-column">
            <section class="content">               
			<div class="card card--padding">
             <h2 class="text-uppercase"><?php echo $about_us; ?></h2>
			<hr>
				<div class="card__row-line"  style="text-align: justify;">
					<b>ORELI</b> adalah PT Toko Ritel Indonesia, Badan hukum yang didirikan di Indonesia yang bertujuan melakukan usaha perdagangan online atau E-Commerce.  ORELI fokus pada perdangangan produk-produk fashion yang berkualitas dengan harga yang pas di kantong. Saat ini, ORELI memasarkan produk fashion dengan merk Estee, merk Indonesia dengan kualitas terjamin terutama pakaian berbahan dasar Denim. Pabrik kami memiliki  kapasitas dan kapabiltas memproduksi produk setara merk ternama internasional, dengan bahan dan standar kualitas yang tinggi dan terjamin.
					Kami akan terus menghadirkan dan menambah portofolio produk berkualitas lainnya kepada anda tidak  terbatas pada pakaian saja. Saat ini tim creative kami sedang mempersiapkan produk berkualitas lainnya baik sepatu, tas, dan aksesoris lainnya, tentunya dengan standar kualitas ORELI yang terjamin. 
					Oreli adalah E-commerce dan sistem pemasaran berjaringan dengan sistem membership dan keagenan. Member dan agen Oreli adalah sekaligus reseller dan dapat membuat grup dengan mengajak calon member lain bergabung. Sebuah grup yang terdiri dari member/agen dan member yang disponsorinya, bertujuan mengumpulkan poin sebanyak-banyaknya untuk mendapatkan bonus bulanan dan bonus tahunan sebanyak-banyaknya. Perhatian! Oreli bukan MLM!
					
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
<?php 
	include("footer.php"); 
?>
</body>
</html>