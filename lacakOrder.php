
<?php include("header.php"); 
	include_once("functions/functions.php");	
?>
<html>
<body>
<div id="loader-wrapper" class="loader-off">
<div id="loader"></div>
</div>
<div class="wrapper"> 
  <div id="pageContent" class="page-content">
    <section class="content top-null">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-offset-1 aside-column">
            <section class="content">               
            <div class="card card--padding">
				  <div class="card__row-line">
				  <form action="" method="GET">
					<div class="row">
						<div class="col-xs-4 col-md-3">
							<label><b><h4>Nomor Transaksi</h4></b></label>
						</div>
						<div class="col-xs-8 col-md-4">
							<input type="text" name="detail" class="input--wd input--wd--full" placeholder="Nomor transaksi invoice">
						</div>
						<div class="col-xs-8 col-md-4">
							<button type="submit" class="btn btn--wd text-uppercase wave col-md-offset-9" >Lacak Order</button>
						</div>
					</div>
				  </form>
					<?php if(isset($_GET['detail'])){						
					?>
					<div class="divider divider--xss"></div>
					<h4 class="text-uppercase h-pad-sm teks-bold">Detail Pesanan : <?php echo $_GET['detail'];?></h4> 
					<div class="hr"></div>
				  <div class="row">
				  <div class="col-md-6">
					<div class="card card--padding">
					  <h4 class="h-pad-sm teks-bold">DIKIRIM KE</h4>
					  <table class="table">
					  <tbody>
					  <?php
							pesananTujuan();
					  ?>
					  </tbody>
					  </table>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="card card--padding">
					  <h4 class="h-pad-sm teks-bold">STATUS PESANAN</h4>
					  <table class="table">
					  <tbody>
					  <?php
							pesananTracking();
					  ?>
					  </tbody>
					</table>
					  
					</div>
				  </div>
				  </div>
				  <div class="divider divider--xxs"></div>
				  
					<?php
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
<?php include("footer.php"); ?>
</body>
</html>