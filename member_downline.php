
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
            <h4 class="text-uppercase h-pad-sm">DOWNLINE SAYA</h4> 
			<label><b>Jumlah Downline Saya : </b><?php downlineJumlah(); ?> orang.</label>
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
            <table class="table shopping-cart-table table-striped text-center order-history">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Waktu</th>
                  <th>Nama Downline</th>
				  <th>No. HP</th>
				  <th>Email</th>
				  <th>Jumlah Transaksi</th>
                </tr>
              </thead>
              <tbody>
				<?php getDownlineSaya(); ?>
				
              </tbody>
			  
			  
            </table>
			
            
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