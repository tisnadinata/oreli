<?php
	include 'header.php';
	include_once("functions/functions.php");	
?>
<html>
<head>
<div class="wrapper"> 
  <!-- Header section -->
	<?php
	if((!isset($_GET['home']) OR isset($_GET['sponsor'])) AND !isset($_COOKIE['sponsor'])){
		if(!isset($_GET['sponsor'])){
			echo'<script type="text/javascript"> window.location = "home" </script>';
		}else{
			$cek = $mysqli->query("select * from tbl_customer where id_customer='$_GET[sponsor]'");
			if($cek->num_rows > 0){
				$time = time();
				if(!isset($_SESSION['sponsor'])){
					$_SESSION['sponsor'] = $_GET['sponsor'];					
				}
//				setcookie("sponsor",$_GET['sponsor'], $time+(86400*7)); 				
//				echo'<script type="text/javascript"> window.location = "'.$_GET['sponsor'].'" </script>';
			}else{
//				setcookie('sponsor', '', time()-(86400*7));
			echo'<script type="text/javascript"> window.location = "home" </script>';
			}
			$cek->close();
		}
	}
	
	?>
  <!-- End Header section -->
  <div id="pageContent" class="page-content">
    <section class="content" id="slider"> 
      
      <!-- Slider section --> 
      
      <!--
	#################################
		- THEMEPUNCH BANNER -
	#################################
	--> 
      <!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
      <div class="tp-banner-container hidden-xs" style="height:550px !important;">
        <div class="tp-banner" >
          <ul>
            <!-- SLIDE  -->
			<?php
			$stmt = $mysqli->query("select * from tbl_banner where jenis='slide'");
			while($data = $stmt->fetch_array()){
				echo'
					<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide"> 
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="slide1" data-bgposition="center center" data-bgfit="cover" style="width:100%;" data-bgrepeat="no-repeat"/></a>
					</li>            
				';
			}
			$stmt->close();
			?>
          </ul>
        </div>
      </div>
    </section>
      <div class="tp-banner-container visible-xs" >
        <div class="tp-banner" >
          <ul>
            <!-- SLIDE  -->
			<?php
			$stmt = $mysqli->query("select * from tbl_banner where jenis='slide'");
			while($data = $stmt->fetch_array()){
				echo'
					<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide"> 
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="slide1" data-bgposition="center center" data-bgfit="cover" style="width:100%;" data-bgrepeat="no-repeat"/></a>
					</li>            
				';
			}
			$stmt->close();
			?>
          </ul>
        </div>
      </div>
    </section>
    
    <!-- END REVOLUTION SLIDER --> 
    
    <!-- End Slider section --> 
    <!-- MOBILE VERSION 
    <section class="content visible-xs" style=" margin-top: -85%; ">
      <div class="container">
        <div class="row hide-outer-animation">
          <div class="col-md-7 col-lg-8">
            <div class="text-center">
              <div class="banner banner--image hover-squared animation" data-animation="fadeInLeft" data-animation-delay="0s"> 
				<?php
				$stmt = $mysqli->query("select * from tbl_banner where jenis='banner1' order by id_banner desc");
				$data = $stmt->fetch_array();
					echo'
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="" width = "100%" height = "auto"  /></a>  
					';
				$stmt->close();
				?>
				<div class="product-category__hover caption"></div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-lg-4 col-xs-6">
            <div class="banner banner--image hover-squared animation" data-animation="fadeInRight" data-animation-delay="0s">
				<?php
				$stmt = $mysqli->query("select * from tbl_banner where jenis='banner2' order by id_banner desc");
				$data = $stmt->fetch_array();
					echo'
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="" class="img-responsive" /></a>  
					';
				$stmt->close();
				?>              
              <div class="product-category__hover caption"></div>
            </div>
		</div>
		<div class="col-md-5 col-lg-4 col-xs-6">
            <div class="banner banner--image banner--last banner--light hover-squared animation" data-animation="fadeInRight" data-animation-delay="0s">
				<?php
				$stmt = $mysqli->query("select * from tbl_banner where jenis='banner2' order by id_banner desc");
				$data = $stmt->fetch_array();
				$data = $stmt->fetch_array();
					echo'
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="" class="img-responsive" /></a>  
					';
				$stmt->close();
				?>              
              <div class="product-category__hover caption"></div>
            </div>
		</div>
        </div>
      </div>
    </section>    
	-->
    <!-- WEBSITE VERSION 
    <section class="content hidden-xs" style="margin-bottom:10%;margin-top:0%;">
      <div class="container">
        <div class="row hide-outer-animation">
          <div class="col-md-7 col-lg-8">
            <div class="text-center">
              <div class="banner banner--image hover-squared animation" data-animation="fadeInLeft" data-animation-delay="0s"> 
				<?php
				$stmt = $mysqli->query("select * from tbl_banner where jenis='banner1' order by id_banner desc");
				$data = $stmt->fetch_array();
					echo'
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="" width = "100%" height = "auto"  /></a>  
					';
				$stmt->close();
				?>
				<div class="product-category__hover caption"></div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-lg-4 col-xs-6">
            <div class="banner banner--image hover-squared animation" data-animation="fadeInRight" data-animation-delay="0s">
				<?php
				$stmt = $mysqli->query("select * from tbl_banner where jenis='banner2' order by id_banner desc");
				$data = $stmt->fetch_array();
					echo'
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="" class="img-responsive" /></a>  
					';
				$stmt->close();
				?>              
              <div class="product-category__hover caption"></div>
            </div>
		</div>
		<div class="col-md-5 col-lg-4 col-xs-6">
            <div class="banner banner--image banner--last banner--light hover-squared animation" data-animation="fadeInRight" data-animation-delay="0s">
				<?php
				$stmt = $mysqli->query("select * from tbl_banner where jenis='banner2' order by id_banner desc");
				$data = $stmt->fetch_array();
				$data = $stmt->fetch_array();
					echo'
						<a href="'.$data['url'].'"><img src="'.$data['source'].'" alt="" class="img-responsive" /></a>  
					';
				$stmt->close();
				?>              
              <div class="product-category__hover caption"></div>
            </div>
		</div>
        </div>
      </div>
    </section>    
	-->
	<!-- ALUR BISNIS ORELI -->
	<section class="content" style="margin-bottom:10%;padding-top:0% !important;">
      <div class="container">
        <div class="row hide-outer-animation">
          <div class="col-md-12 col-lg-12 col-lg-12">
            <div class="text-center">
              <div class="banner banner--image hover-squared animation" data-animation="fadeInLeft" data-animation-delay="0s"> 
				<a href="home"><img src="images/alur-bisnis.jpg" alt="" width = "100%" height = "auto"  /></a>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    

    <section class="content" style="margin-top: -10%;margin-bottom: 2%;">
      <div class="container">                 
        <h2 class="text-center text-uppercase teks-bold" style="width:auto;font-family:'Menu Font';"><?php echo $produk_terbaru;?></h2>
        <div class="row product-carousel mobile-special-arrows animated-arrows product-grid four-in-row">
		<?php
			newProduk();
		?>
        </div>
      </div>
    </section>   
	<section class="content content--fill top-null">
		<div class="container">
        <h2 class="text-center text-uppercase teks-bold" style="font-family:'Menu Font';"><?php echo $daftar_kategori;?></h2>
			<div class="product-category-carousel mobile-special-arrows animated-arrows slick">
				<?php
					subList();																
				?>							
			</div>
		</div>
	</section>
    <!-- End Content section --> 
  </div>
<?php
	include 'footer.php';
?>
  </div>

</body>
</html>