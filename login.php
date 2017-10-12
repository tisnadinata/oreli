<?php
	include 'functions/functions.php';
	if(isset($_POST['btnLoginAkun'])){
		login("member/akun");
	}else if(isset($_POST['btnLogin'])){
		login("checkout");		
	}
?>
