<?php 
	include 'header.php' ;
	include_once("functions/functions.php");	
?>
<script>
function deleteWishlist(kode){
	var dataString = "deleteWishlist="+kode;
	$.ajax({
		type: "POST",
		url: "<?php echo getLink();?>/ajax.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$("#table-wishlist").html(html);
		}
	});	
}
</script>
<section class="breadcrumbs  hidden-xs">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">Produk Wishlist</li>
        </ol>
      </div>
    </section>
    
    <!-- Content section -->
    <section class="content">
      <div class="container">
        <h2 class="text-uppercase">Wishlist</h2>
        <div class="card card--padding">
          <table class="table shopping-cart-table">
            <thead>
              <tr class="text-uppercase">
                <th>&nbsp;</th>
                <th class="text-left">Product Name</th>
                <th class="text-center">Unit Price </th>
                <th class="text-center">Status/Stock</th>
                <th class="text-center">Remove</th>
              </tr>
            </thead>
            <tbody id="table-wishlist">
			<?php getWishlist(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <div class="divider divider--xs"></div>
    <div class="divider divider--xs"></div>
    <div class="divider divider--xs"></div>
    <!-- End Content section --> 
    <!-- End Content section --> 
	
	<?php
		include 'footer.php' 
	?>