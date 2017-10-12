<?php 
	include("header.php"); 
	include_once("functions/functions.php");	
?>
<html>
<body>
  <div id="pageContent"> 
    <!-- Breadcrumb section -->
    
    <section class="breadcrumbs  hidden-xs">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">Error</li>
        </ol>
      </div>
    </section>
    
    <!-- Content section -->
    <section class="content">
      <div class="container">
			<div class="not-found-box">
				<div class="not-found-box__image">
					<img src="images/page-404.png" alt="">
					<div class="not-found-box__text">
						<h2 class="text-left">404 ERROR. <br>PAGE NOT FOUND :(</h2>
						<h4 class="text-left">Silahkan kembali ke halaman awal atau halaman sebelumnya.</h4>
					</div>
				</div>
			</div>
      </div>
    </section>
    <!-- End Content section --> 
  </div>

<?php 
	include("footer.php"); 
?>
</body>
</html>