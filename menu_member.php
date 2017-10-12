			<h4 class="text-uppercase categories-title hidden-sm hidden-xs">Menu</h4>
		    <h4 class="text-uppercase categories-title visible-sm visible-xs" id="categoriesMenu">Menu<span class="icon icon-arrow-down"></span><span class="icon icon-arrow-up"></span></h4>
<?php
	if(isset($_SESSION['id_customer'])){
?>
            <ul class="nav navbar-nav navbar-nav--vertical">
				<li> <a href="<?php echo getLink()?>/member/akun" class="dropdown-toggle"><span class="link-name">Akun Saya</span></a></li>
				<li> <a href="<?php echo getLink()?>/member/alamat" class="dropdown-toggle"><span class="link-name">Alamat Saya</span></a></li>
				<li> <a href="<?php echo getLink()?>/member/rekening" class="dropdown-toggle"><span class="link-name">Rekening Saya</span></a></li>
				<li> <a href="<?php echo getLink()?>/member/pesanan" class="dropdown-toggle"><span class="link-name">Riwayat Transaksi</span></a></li>
				<li> <a href="<?php echo getLink()?>/member/poin" class="dropdown-toggle"><span class="link-name">Poin & Bonus Tahunan</span></a></li>
				<li> <a href="<?php echo getLink()?>/member/downline" class="dropdown-toggle"><span class="link-name">Downline Saya</span></a></li>
				<li> <a href="<?php echo getLink()?>/member/undang-member" class="dropdown-toggle"><span class="link-name">Undang Calon Member</span></a></li>
			</ul>            
            <div class="divider divider--sm"></div>
<?php
	}else{
?>
		  <ul class="nav navbar-nav navbar-nav--vertical">
				<li> <a href="<?php echo getLink()?>/login" class="dropdown-toggle"><span class="link-name"><?php echo $menu_login; ?></span></a></li>
				<li> <a href="<?php echo getLink()?>/register" class="dropdown-toggle"><span class="link-name"><?php echo $auth_register; ?></span></a></li>
				<li> <a href="<?php echo getLink()?>/forgot-password" class="dropdown-toggle"><span class="link-name"><?php echo $menu_lost; ?></span></a></li>
            </ul>
<?php
	}
?>