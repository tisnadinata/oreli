<?php

session_start();
include_once 'functions/functions.php';
if(isset($_POST['btnUpdateCart'])){
	updateCart();
}else if(isset($_POST['btnClearCart'])){
	clearCart();
}else if(isset($_POST['btnEstimasi'])){
	setEstimasiOngkir();
}else if(isset($_POST['btnKupon'])){
	setKuponDiskon();
}
?>
<meta http-equiv="Refresh" content="0;url=cart">