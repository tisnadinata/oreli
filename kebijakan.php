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
    <section class="content top-null">
      <div class="container">
        <div class="row">
          <div class="col-md-3 aside-column">
			<h4 class="text-uppercase categories-title hidden-sm hidden-xs">Kebijakan oreli.co.id</h4>
		    <h4 class="text-uppercase categories-title visible-sm visible-xs" id="categoriesMenu">Kebijakan oreli.co.id<span class="icon icon-arrow-down"></span><span class="icon icon-arrow-up"></span></h4>
			<ul class="nav navbar-nav navbar-nav--vertical">
				<li> <a href="<?php echo getLink();?>/kebijakan/syarat_ketentuan" class="dropdown-toggle"><span class="link-name">Syarat & Ketentuan</span></a></li>
				<li> <a href="<?php echo getLink();?>/kebijakan/faq" class="dropdown-toggle"><span class="link-name">FAQ</span></a></li>
				<li> <a href="<?php echo getLink();?>/kebijakan/privacy_policy" class="dropdown-toggle"><span class="link-name">Privacy Policy</span></a></li>
            </ul>
		  </div>
          <div class="col-md-9 col-xs-12 aside-column">
            <section class="content">               
            <div class="card card--padding">
				<div class="card__row-line">
					<?php
						$kebijakan = explode("/",$_GET['kebijakan']);
						include_once("kebijakan_".$kebijakan[0].".php");
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
<?php 
	include("footer.php"); 
?>
</body>
</html>