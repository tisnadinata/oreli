<?php 
	include("header.php"); 
	include_once("functions/functions.php");	
?>
<html>
<head>
</head>
<body>
<?php 
	unset($_SESSION['filter_price']);
	unset($_SESSION['filter_color']);
	unset($_SESSION['filter_size']);
	$_SESSION['sort_order'] = "Nama Produk";
	$_SESSION['sort_by'] = "asc";
	$_SESSION['sort_limit'] = 12;
	$_SESSION['start_page'] = 1;
		if(isset($_GET['gender']) AND !isset($_GET['slug']) AND !isset($_GET['jenis'])){
			$produk_gender = $_GET['gender'];
			$produk_slug = "ALL";
			$produk_style = "ALL";
		}else if(isset($_GET['gender']) AND isset($_GET['slug']) AND !isset($_GET['jenis'])){
			$produk_gender = $_GET['gender'];
			$produk_slug = $_GET['slug'];
			$produk_style = "ALL";
		}else if(isset($_GET['gender']) AND isset($_GET['slug']) AND isset($_GET['jenis'])){
			$produk_gender = $_GET['gender'];
			$produk_slug = $_GET['slug'];
			$produk_style = $_GET['jenis'];
		}else{
			$produk_gender = "ALL";
			$produk_slug = "ALL";											
			$produk_style = "ALL";
		}
		$_SESSION['gender'] = $produk_gender;
		$_SESSION['slug'] = $produk_slug;
		$_SESSION['jenis'] = $produk_style;
?>
<script type="text/javascript">
function filter_price(value){
	var cbo = document.getElementById("cboPrice"+value);
	if(cbo.checked){
		var dataString = "filter_price=checked&cbo=cboPrice"+value;
	}else{
		var dataString = "filter_price=unchecked&cbo=cboPrice"+value;
	}
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#produk-list").css("height","auto");
			$("#produk-list").html(html);
			$("#produk-list").removeClass("four-in-row");
			$("#produk-list").addClass("three-in-row");
		}		
	});
}
function filter_color(value,warna){
	var cbo = document.getElementById("cboColor"+value);
	if(cbo.checked){
		var dataString = "filter_color=checked&cboWarna="+warna;
	}else{
		var dataString = "filter_color=unchecked&cboWarna="+warna;
	}
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#produk-list").css("height","auto");
			$("#produk-list").html(html);
			$("#produk-list").removeClass("four-in-row");
			$("#produk-list").addClass("three-in-row");
		}		
	});
}
function filter_size(value,size){
	var cbo = document.getElementById("cboSize"+value);
	if(cbo.checked){
		var dataString = "filter_size=checked&cboSize="+size;
	}else{
		var dataString = "filter_size=unchecked&cboSize="+size;
	}
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#produk-list").css("height","auto");
			$("#produk-list").html(html);
			$("#produk-list").removeClass("four-in-row");
			$("#produk-list").addClass("three-in-row");
		}		
	});
//	filter_refresh("price");
//	filter_refresh("color");
}
function filter_refresh(filter){
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: "filter_refresh="+filter,
		cache: false,
        success: function(html) {
			alert(html);
			$("#filter-"+filter).html(html);
		}
    });	
}
function sort_order(value){
	var dataString = "sort_order="+value;
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#produk-list").css("height","auto");
			$("#produk-list").html(html);
			$("#produk-list").removeClass("four-in-row");
			$("#produk-list").addClass("three-in-row");
		}
    });
}
function sort_by(value){
	var dataString = "sort_by="+value;
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#produk-list").css("height","auto");
			$("#produk-list").html(html);
			$("#produk-list").removeClass("four-in-row");
			$("#produk-list").addClass("three-in-row");
		}
    });
}
function sort_limit(value){
	var dataString = "sort_limit="+value;
	document.getElementById("row-view").setAttribute("onclick","sort_limit("+value+")");
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#produk-list").css("height","auto");
			$("#produk-list").html(html);
		}
    });
	refresh_pagination();
}
function goPage(value){
	var dataString = "start_page="+value;
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: dataString,
		cache: false,
        success: function(html) {
			$("#produk-list").css("height","auto");
			$("#produk-list").html(html);
		}
    });
	refresh_pagination();
}
function refresh_pagination(){
	$.ajax({
        type: "POST",
		url: "<?php echo getLink();?>/ajax.php",	
		data: "produk_pagination=1",
		cache: false,
        success: function(html) {
			$("#produk_pagination").html(html);
			$("#produk_pagination_mobile").html(html);
		}
    });
}
</script>
			<div id="pageContent" class="page-content">
    <!-- Breadcrumb section -->    
    <section class="breadcrumbs breadcrumbs-boxed">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="<?php echo getLink();?>/home">Home</a></li>
          <li><a href="<?php echo getLink();?>/list-asc">Produk</a></li>
			<?php
				if(isset($_GET['gender'])){
					echo "<li>".ucfirst(str_replace("_"," ",$_GET['gender']))."</li>";						
				}
				if(isset($_GET['slug'])){
					echo "<li>".ucfirst(str_replace("_"," ",$_GET['slug']))."</li>";						
				}
				if(isset($_GET['jenis'])){
					echo "<li>".ucfirst(str_replace("_"," ",$_GET['jenis']))."</li>";						
				}
			?>		  		  
        </ol>
      </div>
    </section>
	<br>
				<h2 class="text-center text-uppercase teks-bold" style="width:auto;font-family:'Menu Font';">
					<?php
						if(isset($_GET['gender']) AND !isset($_GET['slug']) AND !isset($_GET['jenis'])){
							echo str_replace("_"," ",$_GET['gender']);
						}else if(isset($_GET['gender']) AND isset($_GET['slug']) AND !isset($_GET['jenis'])){
							echo str_replace("_"," ",$_GET['slug']);
						}else if(isset($_GET['gender']) AND isset($_GET['slug']) AND isset($_GET['jenis'])){
							echo str_replace("_"," ",$_GET['jenis']);
						}else{
							echo "DAFTAR PRODUK";
						}
					?>
				</h2>
				<section class="content content--fill top-null">
					<div class="container" style="margin-top: -75px;">
						<div class="filters-row row">
							<div class="col-sm-4 col-md-5 col-lg-3 col-1"> 
								<a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"></span>Filter</a> 
							</div>
							<div class="col-sm-8 col-md-7 col-lg-6 col-2">
								<div class="filters-row__select">
									<label class="teks-bold">Urutkan: </label>
									<div class="select-wrapper">
										<select class="select--wd select--wd--sm" onChange="sort_order(this.value)" id="sort_order">
											<option>Nama Produk</option>
											<option>Terbanyak Terjual</option>
											<option>Harga Kecil ke Besar</option>
											<option>Harga Besar ke Kecil</option>
										</select>
									</div>
								</div>
								<?php
/*									echo'
										<a href="#" onClick=sort_by("asc") class="icon icon-arrow-down"></a>
										&nbsp 
										<a href="#" onClick=sort_by("desc") class="icon icon-arrow-up"></a> 
									';
*/								?>
							</div>
							<div class="col-lg-3 visible-lg col-3">
								<ul class="pagination pull-right" id="produk_pagination">
								<?php
									showPagination($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_limit']);										
								?>
								</ul>
							</div>
						</div>
						<div class="outer open">
							<div id="leftCol">
								<div id="filtersCol" class="filters-col">
									<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>
								<div class="filters-col__select visible-xs">
									<label class="teks-bold">Urutkan: </label>
									<div class="select-wrapper">
										<select class="select--wd select--wd--sm" onChange="sort_order(this.value)" id="sort_order">
											<option>Nama Produk</option>
											<option>Terbanyak Terjual</option>
											<option>Harga Kecil ke Besar</option>
											<option>Harga Besar ke Kecil</option>
										</select>
									</div>
								</div>
							<form action="" method="post">
								<div class="filters-col__collapse open">
									<h4 class="filters-col__collapse__title text-uppercase teks-bold">COLOR</h4>
									<div class="filters-col__collapse__content">
										<ul class="filter-list" id="filter-color">
										<?php
											produkFilterColor($_SESSION['gender'],$_SESSION['slug']);
										?>
										</ul>
									</div>
								</div>
								<div class="filters-col__collapse open">
									<h4 class="filters-col__collapse__title text-uppercase teks-bold">Size</h4>
									<div class="filters-col__collapse__content">
										<ul class="filter-list" id="filter-size" style="width: 100%;display: inline-flex;">
										<?php
											produkFilterSize($_SESSION['gender'],$_SESSION['slug']);
										?>
										</ul>
									</div>
								</div>
								<div class="divider divider--xs"></div>
							</form>
								</div>
							</div>
							<div id="centerCol">
								<!-- Modal -->
								<div class="modal quick-view zoom" id="quickView"  style="opacity: 1">
									<div class="modal-dialog">
										<div class="modal-content"> </div>
									</div>
								</div>
								<!-- /.modal -->
								<div class="products-grid products-listing products-col products-isotope four-in-row" id="produk-list">
									<?php
										if(!isset($_POST['btnCari'])){
											produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_order'],$_SESSION['sort_by'],$_SESSION['sort_limit'],$_SESSION['start_page']);											
										}else{
											produkCari($_POST['txtProdukCari'],$_SESSION['sort_order'],$_SESSION['sort_by'],$_SESSION['sort_limit'],$_SESSION['start_page']);
										}
									?>
								</div>
							</div>
						</div>
						<div class="hidden-lg text-center">
							<div class="divider divider--sm"></div>
							<ul class="pagination" id="produk_pagination_mobile">
								<?php
									showPagination($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_limit']);										
								?>
							</ul>
						</div>
					</div>
				</section>
			</div>
			
		</div>

<?php include("footer.php"); ?>
	</body>
</html>