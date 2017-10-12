<?php
	include 'header.php';
	include_once("functions/functions.php");	
?>
<html>
<body>
<!-- Google map -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
	// Basic options for a simple Google Map
	// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom: 11,

		// The latitude and longitude to center the map (always required)
		center: new google.maps.LatLng(-6.1755247,106.8206013), // New York

		// How you would like to style the map. 
		// This is where you would paste any style found on Snazzy Maps.
		styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]
	};

	// Get the HTML DOM element that will contain your map 
	// We are using a div with id="map" seen below in the <body>
	var mapElement = document.getElementById('map');

	// Create the Google Map using our element and options defined above
	var map = new google.maps.Map(mapElement, mapOptions);

	// Let's also add a marker while we're at it
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(-6.1755247,106.8206013),
		map: map,
		title: 'oreli.id'
	});
}
</script>
  <div id="pageContent"> 
    
    <!-- Breadcrumb section -->
    
    <section class="breadcrumbs  hidden-xs">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">Contact Us</li>
        </ol>
      </div>
    </section>
    
    <!-- Content section -->
    <section class="content content--parallax content--parallax--high top-null bottom-null" data-image="images/parallax-bg-03.jpg"> </section>
    <section class="content content--fill top-null">
      <div class="container">
		<form class="contact-form" name="contactform" method="post" action="">
          <div class="row">
            <div class="col-sm-7">
              <h2 class="text-uppercase text-center">KIRIM KAMI PESAN</h2>
             <div class="input-group input-group--wd">
                <input type="text" class="input--full" name="name" required>
                <span class="input-group__bar"></span>
                <label>Nama Lengkap (diperlukan)</label>
              </div>
              <div class="input-group input-group--wd">
                <input type="text" class="input--full" name="email" required>
                <span class="input-group__bar"></span>
                <label>E-Mail Aktif (diperlukan)</label>
              </div>
              <div class="input-group input-group--wd">
                <input type="text" class="input--full" name="subject" required>
                <span class="input-group__bar"></span>
                <label>Subject</label>
              </div>
              <div class="input-group input-group--wd">
                <textarea class="textarea--full" name="message"></textarea>
                <span class="input-group__bar"></span>
                <label>Pesan Anda</label>
              </div>
              <button type="submit" id="submit" name="btnKirimPesan" class="btn btn--wd text-uppercase wave">Kirim Pesan</button>
            </div>
            <div class="divider divider--sm visible-xs"></div>
            <div class="col-sm-5 text-center">
              <div class="divider divider--lg visible-lg"></div>
              <h2 class="text-uppercase">Let’s Start Now!</h2>
              <p>In pellentesque lorem condimentum dui morbi pulvinar dui non quam pretium ut lacinia tortor. Fusce lacinia tempor malesuada. Fringilla penatibus orci est non mollit, suspendisse pulvinar egestas a donec. Vulputate mi dui suscipit, molestie vulputate libero fusce iaculis suscipit. Sapien pede libero.</p>
              <p>Main Office: Jakarta<br/>
                Phones: 081223459494<br/>
                Email: <a href="#">cs@oreli.id</a></p>
            </div>
          </div>
        </form>
		 <?php
			if(isset($_POST['btnKirimPesan'])){
				hubungiKami();
			}
		 ?>

      </div>
    </section>
    <section class="content fullwidth top-null bottom-null">
      <div id="map"></div>
    </section>
    <!-- End Content section --> 
  </div>
 <?php
	include 'footer.php';
	if(isset($_POST['btnKirimPesan'])){
		hubungiKami();
	}
 ?>
</body>
</html>