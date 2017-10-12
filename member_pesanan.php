<?php include("header.php"); 
	include_once("functions/functions.php");	
	if(isset($_SESSION['id_customer'])){
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
          <div class="col-md-3 aside-column">
		    <?php include("menu_member.php"); ?>
          </div>
          <div class="col-md-9 aside-column">
            <section class="content"> 
              
            <div class="card card--padding">
          <div class="card__row-line">
		  
			<?php if(isset($_GET['detail'])){
				
			?>
				<h4 class="text-uppercase h-pad-sm">Detail Pesanan</h4> 
				<div class="hr"></div>
			  <?php
				pesananDetailList();
			  ?>			  
       		<div class="divider divider--xss"></div>
				<div class="hr"></div>
				<div class="divider divider--xss"></div>
          <div class="row">
          <div class="col-md-6">
            <div class="card card--padding">
              <h4 class="h-pad-sm">DIKIRIM KE</h4>
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
              <h4 class="h-pad-sm">STATUS PESANAN</h4>
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
			}else if(isset($_GET['return'])){
				
			?>

			  <h4 class="text-uppercase h-pad-sm">PESANAN YANG DI RETURN</h4> 
				<div class="hr"></div>
			<div class="col-md-12">
			<form action="" method="post">
			<?php
				pesananReturnList();
			?>
			</form>
			</div>
			<div class='col-md-4'>
			
			</div>
       		<div class="divider divider--xss"></div>
		  
		<?php
		}else if(isset($_GET['refund'])){
			?>
			<h4 class="text-uppercase h-pad-sm">REFUND PEMBAYARAN</h4>  
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
            <form action="" method="post" class="contact-form">
				<?php
					pesananRefund();
				?>
				<div class="divider divider--xs"></div>
					<button type="submit" name="btnRefund" class="btn btn--wd text-uppercase wave col-md-offset-9">REFUND</button>
			</form>
		<?php
		}else{
			?>
            <h4 class="text-uppercase h-pad-sm">Pesanan Saya</h4> 
            <div class="hr"></div>
            <table class="table shopping-cart-table table-striped text-center order-history">
              <thead>
                <tr>
                  <th>No Transaksi</th>
                  <th>Waktu</th>
                  <th>Total Pembayaran</th>
                  <th>Total Dibayar</th>
				  <th>Status</th>
				  <th></th>
				  
                </tr>
              </thead>
              <tbody>
				<?php getPesananSaya(); ?>
				
              </tbody>
            </table>
			
			<?php } ?>
			
            
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
<?php include("footer.php"); 
	}else{
		echo'<meta http-equiv="Refresh" content="0;url='.getLink().'">';
	}
?>
</body>
</html>