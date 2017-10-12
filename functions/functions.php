<?php 
/*
$con = mysqli_connect("localhost","orelicoi_oreli","_o^a+iJaX(3V","orelicoi_betaoreli");
$mysqli = new mysqli("localhost","orelicoi_oreli","_o^a+iJaX(3V","orelicoi_betaoreli");
*/
$con = mysqli_connect("localhost","root","","db_oreli");
$mysqli = new mysqli("localhost","root","","db_oreli");
	
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 // getting the user IP address
function getIpCustomer(){
$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP Tidak Dikenali';
 
    return $ipaddress;
}
function enkripPassword($value){
	return sha1(md5($value));	
}
function setHarga($harga){
	return number_format($harga,0,",",".");
}
function getKonversiPoin(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='konversi_poin'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getDiskonNonMember(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='dis_nonmember'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getDiskonAgen(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='dis_agen'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getDiskonMember(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='dis_member'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getDefaultReferal(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='default_referal'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getSubsidiOngkir(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='subsidi_ongkir'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getFacebook(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='kontak_facebook'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getTwitter(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='kontak_twitter'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getInstagram(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='kontak_instagram'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getTelepon(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='kontak_telepon'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getBrand(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='brand'");
	$row = $stmt->fetch_assoc();
	return $row['keterangan'];	
	$stmt->close();
}
function getLink(){
	global $mysqli;
	$stmt = $mysqli->query("SELECT keterangan FROM tbl_pengaturan WHERE nama_pengaturan='link'");
	$row = $stmt->fetch_array();
	return $row['keterangan'];	
	$stmt->close();
}
function getProdukKodeTampil($kode_produk){
	$kode_produk = str_replace(".","",$kode_produk);
	return $kode_produk;
}
function getProdukKode($kode_produk){
	$kode_produk = explode(".",$kode_produk);
	return $kode_produk;
}
function getProdukGender($kode_produk){
	global $mysqli;
	$kode_produk = explode(".",$kode_produk);
	$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori='gender'");
	$i=1;
	while($row = $stmt->fetch_assoc()){
		if($kode_produk[1]==$i){
			return $row['nama_kategori'];
			break;
		}
		$i++;
	}
	$stmt->close();
}
function getProdukJenis($kode_produk){
	global $mysqli;
	$kode_produk = explode(".",$kode_produk);
	$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori='jenis_produk'");
	$i=1;
	while($row = $stmt->fetch_assoc()){
		if($kode_produk[2]==$i){
			return $row['nama_kategori'];
			break;
		}
		$i++;
	}
	$stmt->close();
}
function getProdukBahan($kode_produk){
	global $mysqli;
	$kode_produk = explode(".",$kode_produk);
	$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori='bahan'");
	$i=1;
	while($row = $stmt->fetch_assoc()){
		if($kode_produk[3]==$i){
			return $row['nama_kategori'];
			break;
		}
		$i++;
	}
	$stmt->close();
}
function getProdukStyle($kode_produk){
	global $mysqli;
	$kode_produk = explode(".",$kode_produk);
	$stmt = $mysqli->query("select nama_kategori from tbl_kategori where lower(kategori)='style'");
	$i=1;
	while($row = $stmt->fetch_assoc()){
		if($kode_produk[4]==$i){
			return $row['nama_kategori'];
			break;
		}
		$i++;
	}
	$stmt->close();

}
function getProdukEfek($kode_produk){
	global $mysqli;
	$kode_produk = explode(".",$kode_produk);
	$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori='efek'");
	$i=1;
	while($row = $stmt->fetch_assoc()){
		if($kode_produk[5]==$i){
			return $row['nama_kategori'];
			break;
		}
		$i++;
	}
	$stmt->close();

}
function getProdukukuran($kode_produk){
	global $mysqli;
	$kode_produk = explode(".",$kode_produk);
	$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori='ukuran'");
	$i=1;
	while($row = $stmt->fetch_assoc()){
		if($kode_produk[6]==$i){
			return $row['nama_kategori'];
			break;
		}
		$i++;
	}
	$stmt->close();
}
function getProdukWarna($id_produkwarna){
	global $mysqli;
	$stmt = $mysqli->query("select warna from tbl_produkwarna where id_produkwarna='$id_produkwarna'");
	$row = $stmt->fetch_assoc();
	return $row['warna'];
	$stmt->close();
}
function getProdukHargaTambahan($kode_produk,$warna_produk){
	global $mysqli;
	$warna_produk = str_replace('_',' ',$warna_produk);
	$stmt = $mysqli->prepare("select tambahanHarga from tbl_produkwarna where kode_produk='$kode_produk' AND warna='$warna_produk'");
	$stmt->execute();
	$stmt->bind_result($harga_tambah);
	$stmt->fetch();
	$stmt->close();
	return $harga_tambah;
}
function getProdukPoinTambahan($kode_produk,$warna_produk){
	global $mysqli;
	$warna_produk = str_replace('_',' ',$warna_produk);
	$stmt = $mysqli->prepare("select poin_downline,poin_upline from tbl_produk where kode_produk='$kode_produk'");
	$stmt->execute();
	$stmt->bind_result($poin_downline,$poin_upline);
	$stmt->fetch();	$stmt->close();
	$stmt = $mysqli->prepare("select tambahanPP,tambahanPS from tbl_produkwarna where kode_produk='$kode_produk' AND warna='$warna_produk'");
	$stmt->execute();
	$stmt->bind_result($tambahanPP,$tambahanPS);
	$stmt->fetch();	$stmt->close();
	return " ".($poin_downline+$tambahanPP)." / ".($poin_upline+$tambahanPS)." ";
}

function getMenuDropdown(){
	
	global $mysqli; 
	
	$stmt = $mysqli->query("SELECT * FROM tbl_kategori where kategori='gender' and nama_kategori !='unisex'");
	$i = 1;
	while($row = $stmt->fetch_assoc()){		
		$id_kategori = $row['id_kategori'];
		$kategori = $row['kategori'];
		$nama_kategori = $row['nama_kategori'];
		echo "<li><a href='".getLink()."/list/".$nama_kategori."' class='dropdown-toggle'><span class='link-name'>$nama_kategori</span><span class='caret caret--dots'></span></a>";
		echo "<ul class='dropdown-menu animated fadeIn' role='menu'>";
		$stmt2 = $mysqli->query("select distinct(replace(substr(kode_produk,5,2),'.','')) as kode from tbl_produk where publish=1 AND (replace(substr(kode_produk,3,2),'.','')=$i OR replace(substr(kode_produk,3,2),'.','')=3)");
		while($data = $stmt2->fetch_assoc()){
			$kode = $data['kode'];
				$stmt3 = $mysqli->query("select nama_kategori from tbl_kategori where kategori='jenis_produk'");
				$j=1;
				while($data = $stmt3->fetch_assoc()){
					$jenis_bahan = $data['nama_kategori'];
					if($j == $kode){
						echo "<li><a href='".getLink()."/list/".$nama_kategori."/".$jenis_bahan."'>".ucfirst($jenis_bahan)."</a></li>";						
					}
					$j++;
				}
				$stmt3->close();	
		}			
		echo "</ul></li>";
		$stmt2->close();	
		$i++;
	}
	$stmt->close();	
}
function getOrderJum(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("select no_transaksi from tbl_order where id_customer = '$id_customer'");
	return $stmt->num_rows;
}
function getMenuPanelMobile(){
	global $mysqli; 
	
	$stmt = $mysqli->query("SELECT * FROM tbl_kategori where kategori='gender' and nama_kategori !='unisex'");
	$i = 1;
	while($row = $stmt->fetch_assoc()){		
		$id_kategori = $row['id_kategori'];
		$kategori = $row['kategori'];
		$nama_kategori = $row['nama_kategori'];
echo'
			<li class="menu-large visible-xs" ><a href="'.getLink().'/list/'.$nama_kategori.'" class="dropdown-toggle">
			<span class="link-name teks-bold text-uppercase" style="font-size:18px;">'.$nama_kategori.'</span>
			<span class="caret caret--dots visible-xs" style="top:40%;top:40%;color: black;"></span></a>
		';
		//UNTUK VERSI MOBILE
		echo'
              <div class="dropdown-menu megamenu animated fadeIn" style="width:100%;background-color:#61788c;">
                <div class="container">
                  <ul class="megamenu__columns" style="color:white;">
					<li class="level-menu level1">
                      <ul>
		';?>
						<li class="title" style="font-size: 1.3em;font-family:'Exo2Reguler Font';">Kategori</li>
		<?php 
							$stmt2 = $mysqli->query("select distinct(replace(substr(kode_produk,5,2),'.','')) as kode from tbl_produk where publish=1 AND (replace(substr(kode_produk,3,2),'.','')=$i OR replace(substr(kode_produk,3,2),'.','')=3)");
							while($data = $stmt2->fetch_assoc()){
								$kode = $data['kode'];
									$stmt3 = $mysqli->query("select nama_kategori from tbl_kategori where kategori='jenis_produk'");
									$j=1;
									while($data = $stmt3->fetch_assoc()){
										$jenis_bahan = $data['nama_kategori'];
										if($j == $kode){
		?>
										<li class="level2" style="font-size:1.05em;font-family:'Exo2Reguler Font' !important;"><a style="color:white;" href="<?php echo getLink().'/list/'.$nama_kategori.'/'.$jenis_bahan;?>"><?php echo ucfirst($jenis_bahan);?></a></li>
		<?php 
										}
										$j++;
									}
									$stmt3->close();	
							}			
							$stmt2->close();	
		echo'       	</ul>
					</li>
					<li class="level-menu level1">
                      <ul>
		';?>
						<li class="title" style="font-size: 1.3em;font-family:'Exo2Reguler Font';">Jeans By Fit</li>
		<?php 
							$stmt2 = $mysqli->query("select distinct(replace(substr(kode_produk,5,2),'.','')) as kode,kode_produk from tbl_produk where publish=1 AND (replace(substr(kode_produk,3,2),'.','')=$i OR replace(substr(kode_produk,3,2),'.','')=3)");
							$recent = "/";
							while($data = $stmt2->fetch_assoc()){
								$kode = $data['kode'];
								$kode_produk = $data['kode_produk'];								
								$cek = strpos($recent,"/".getProdukStyle($kode_produk)."/");
								if(getProdukBahan($kode_produk) == "jeans" AND getProdukUkuran($kode_produk) == "long"){
									if($cek === false) { 
		?>
											<li class="level2" style="font-size:1.05em;font-family:'Exo2Reguler Font' !important;"><a style="color:white;" href="<?php echo getLink().'/list/'.getProdukGender($kode_produk).'/pants/'.str_replace(" ","_",getProdukStyle($kode_produk));?>"><?php echo ucfirst(getProdukStyle($kode_produk));?></a></li>
		<?php 
									}
									$recent = $recent.getProdukStyle($kode_produk)."/";
								}
							}			
							$stmt2->close();	
		echo'       	</ul>
					</li>
					';
		echo'
					</ul>
                </div>
              </div>
			</li>
		';
		$i++;
	}
	$stmt->close();	
}
function getMenuPanel(){	
	global $mysqli; 
	
	$stmt = $mysqli->query("SELECT * FROM tbl_kategori where kategori='gender' and nama_kategori !='unisex'");
	$i = 1;
	while($row = $stmt->fetch_assoc()){		
		$id_kategori = $row['id_kategori'];
		$kategori = $row['kategori'];
		$nama_kategori = $row['nama_kategori'];
		if(strtolower($nama_kategori)=='men'){
			$nama_kategori2 = "Pria";			
		}else{
			$nama_kategori2 = "Wanita";			
		}
		echo'
			<li class="menu-large hidden-xs" ><a href="'.getLink().'/list/'.$nama_kategori.'" class="dropdown-toggle">
			<span class="link-name teks-bold text-uppercase" style="font-size:18px;">'.$nama_kategori2.'</span>
			<span class="caret caret--dots visible-xs" style="top:40%;top:40%;color: black;"></span></a>
		';
		//UNTUK VERSI WEBSITE
		echo'
              <div class="dropdown-menu megamenu animated fadeIn" style="width:45%;margin-left:30%;background-color:#61788c;">
                <div class="container">
                  <ul class="megamenu__columns" style="color:white;">
					<li class="level-menu level1">
                      <ul>
		';?>
						<li class="title" style="font-size: 1.3em;font-family:'Exo2Reguler Font';">Kategori</li>
		<?php 
							$stmt2 = $mysqli->query("select distinct(replace(substr(kode_produk,5,2),'.','')) as kode from tbl_produk where publish=1 AND (replace(substr(kode_produk,3,2),'.','')=$i OR replace(substr(kode_produk,3,2),'.','')=3)");
							while($data = $stmt2->fetch_assoc()){
								$kode = $data['kode'];
									$stmt3 = $mysqli->query("select nama_kategori from tbl_kategori where kategori='jenis_produk'");
									$j=1;
									while($data = $stmt3->fetch_assoc()){
										$jenis_bahan = $data['nama_kategori'];
										if($j == $kode){
		?>
										<li class="level2" style="font-size:1.05em;font-family:'Exo2Reguler Font' !important;"><a style="color:white;" href="<?php echo getLink().'/list/'.$nama_kategori.'/'.$jenis_bahan;?>"><?php echo ucfirst($jenis_bahan);?></a></li>
		<?php 
										}
										$j++;
									}
									$stmt3->close();	
							}			
							$stmt2->close();	
		echo'       	</ul>
					</li>
					<li class="level-menu level1">
                      <ul>
		';?>
						<li class="title" style="font-size: 1.3em;font-family:'Exo2Reguler Font';">Jeans By Fit</li>
		<?php 
							$stmt2 = $mysqli->query("select distinct(replace(substr(kode_produk,5,2),'.','')) as kode,kode_produk from tbl_produk where publish=1 AND (replace(substr(kode_produk,3,2),'.','')=$i OR replace(substr(kode_produk,3,2),'.','')=3)");
							$recent = "/";
							while($data = $stmt2->fetch_assoc()){
								$kode = $data['kode'];
								$kode_produk = $data['kode_produk'];								
								$cek = strpos($recent,"/".getProdukStyle($kode_produk)."/");
								if(getProdukBahan($kode_produk) == "jeans" AND getProdukUkuran($kode_produk) == "long"){
									if($cek === false) { 
		?>
											<li class="level2" style="font-size:1.05em;font-family:'Exo2Reguler Font' !important;"><a style="color:white;" href="<?php echo getLink().'/list/'.getProdukGender($kode_produk).'/pants/'.str_replace(" ","_",getProdukStyle($kode_produk));?>"><?php echo ucfirst(getProdukStyle($kode_produk));?></a></li>
		<?php 
									}
									$recent = $recent.getProdukStyle($kode_produk)."/";
								}
							}			
							$stmt2->close();	
		echo'       	</ul>
					</li>
					';
		echo'
					</ul>
                </div>
              </div>
			</li>
		';
		$i++;
	}
	$stmt->close();	
}
function subList(){
	global $mysqli;
	$gen='';
	if(isset($_GET['slug'])){			
		if(isset($_GET['gender'])){
			$kategori = str_replace("_"," ",$_GET['gender']);		
		}else{
			$kategori = str_replace('_',' ',$_GET['slug']);
		}
		if($kategori == "men"){
			$gen = 1;
		}else if($kategori == "women"){
			$gen = 2;
		}
	}
	if(!isset($_GET['slug'])){
		$stmt = $mysqli->query("select replace(substr(kode_produk,5,2),'.','') as jenis, replace(substr(kode_produk,3,2),'.','') as gender, kode_produk,nama_produk from tbl_produk where publish=1 group by jenis,gender");
		while($data = $stmt->fetch_assoc()){
				$kode_produk = $data['kode_produk'];
				$nama_produk = $data['nama_produk'];
				$nama_sub = getProdukJenis($kode_produk);
				$gender = getProdukGender($kode_produk);
				$jenis = $data['jenis'];
				if(strtolower($gender) == "men"){
					$gen = 1;
				}else if(strtolower($gender) == "women"){
					$gen = 2;
				}
				$stmt2 = $mysqli->query("select kode_produk from tbl_produkstok where replace(substr(kode_produk,5,2),'.','')=$jenis AND (replace(substr(kode_produk,3,2),'.','')=$gen OR replace(substr(kode_produk,3,2),'.','')=3) GROUP BY id_produkwarna");
				$row = $stmt2->fetch_array();
				$jumlah = $stmt2->num_rows;
				$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."'");
				if($stmt3->num_rows > 0){
					$data = $stmt3->fetch_assoc();
					$src = getLink()."/images/products/".$data['kode'].'-'.$data['warna'].'-'.$data['id_image'].'.jpg';
				}else{
					$src = getLink()."/images/products/standard.jpg";	
				}				
				$stmt3->close();
				printf('
					<div class="product-category hover-squared" style="">
						<a href="'.getLink().'/list/%s/%s"><img src="'.$src.'" data-lazy="'.$src.'" alt="#"></a>
						<div class="product-category__hover caption"></div>
						<div class="product-category__info">
							<div class="product-category__info__ribbon">
								<h5 class="product-category__info__ribbon__title">%s %s</h5>
								<div class="product-category__info__ribbon__count">%s products</div>
							</div>
						</div>
					</div>
				',$gender,$nama_sub,$gender,$nama_sub,$jumlah);
		}
		$stmt->close();
	}else if(!isset($_GET['gender']) AND isset($_GET['slug'])){
		$stmt = $mysqli->query("select distinct(replace(substr(kode_produk,5,2),'.','')) as jenis, kode_produk,nama_produk from tbl_produk where publish=1 AND (replace(substr(kode_produk,3,2),'.','')=$gen OR replace(substr(kode_produk,3,2),'.','')=3) group by jenis");
		while($data = $stmt->fetch_assoc()){
				$kode_produk = $data['kode_produk'];
				$nama_produk = $data['nama_produk'];
				$nama_sub = getProdukJenis($kode_produk);
				$gender = getProdukGender($kode_produk);
				if($gender == $kategori OR $gender == "unisex"){
					$jenis = $data['jenis'];
					$stmt2 = $mysqli->query("select count(kode_produk) as jum from tbl_produk where replace(substr(kode_produk,5,2),'.','')=$jenis AND (replace(substr(kode_produk,3,2),'.','')=$gen OR replace(substr(kode_produk,3,2),'.','')=3) AND publish=1");
					$row = $stmt2->fetch_array();
					$jumlah = $row['jum'];
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."'");
					if($stmt3->num_rows > 0){
						$data = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$data['kode'].'-'.$data['warna'].'-'.$data['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}				
					$stmt3->close();
					printf('
						<div class="product-category hover-squared">
							<a href="'.getLink().'/list/%s/%s"><img src="'.$src.'" data-lazy="'.$src.'" alt="#"></a>
							<div class="product-category__hover caption"></div>
							<div class="product-category__info">
								<div class="product-category__info__ribbon">
									<h5 class="product-category__info__ribbon__title">%s</h5>
									<div class="product-category__info__ribbon__count">%s products</div>
								</div>
							</div>
						</div>
					',$kategori,$nama_sub,$nama_sub,$jumlah);
				}
		}
		$stmt->close();
	}
}
function getAlamatCheckout(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("SELECT id_alamat,nama_alamat,nama_penerima,id_kota FROM tbl_customeralamat WHERE id_customer='$id_customer'");
	while($row = $stmt->fetch_assoc()){
		$id_alamat = $row['id_alamat'];
		$nama_alamat = $row['nama_alamat'];
		$nama_penerima = $row['nama_penerima'];
		$id_kota = $row['id_kota'];
		$stmt2 = $mysqli->prepare("SELECT kota FROM tbl_kota WHERE id_kota=?");
		$stmt2->bind_param('i',$id_kota);
		$stmt2->execute();
		$stmt2->bind_result($nama_kota);
		$stmt2->fetch();
		echo"<option value='$id_alamat'>$nama_alamat ($nama_penerima , $nama_kota)</option>";
		$stmt2->close();
	}
	$stmt->free();
}
function getInformasiAkun(){
	global $mysqli;
	if(!isset($_SESSION['id_customer'])){
		?>
			<meta http-equiv="Refresh" content="0; URL=home">
		<?php		
	}
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("SELECT 
		tbl_customer.nama_lengkap,
		tbl_customer.jk,
		tbl_customer.email,
		tbl_customer.file_ktp,
		tbl_customer.npwp,
		tbl_customer.referal,
		tbl_customer.tipe,
		tbl_customer.status,
		tbl_customeralamat.alamat_penerima,
		tbl_kota.kode_pos,
		tbl_customeralamat.tel_rumah,
		tbl_customeralamat.tel_handphone,
		tbl_kota.provinsi,
		tbl_kota.kota,
		tbl_kota.kecamatan,
		tbl_kota.kelurahan,
		tbl_kota.biaya
			FROM tbl_customer,tbl_customeralamat,tbl_kota
				WHERE tbl_customer.id_customer=? AND tbl_customer.id_customer=tbl_customeralamat.id_customer AND tbl_kota.id_kota=tbl_customeralamat.id_kota");
	$stmt->bind_param("s", $id_customer);
	$stmt->execute();
	$stmt->bind_result($nama_lengkap,$jk,$email,$file_ktp,$npwp,$referal,$tipe,$status,$alamat,$kode_pos,$tel_rumah,$tel_handphone,$provinsi,$kota,$kecamatan,$kelurahan,$biaya);
	$stmt->fetch();
	$stmt->close();
	if($jk == "L"){
		$jk = "Laki-laki";
	}else if($jk == "P"){
		$jk = "Perempuan";
	}
	$otp = enkripPassword(randomPassword());
	if($status=="email" OR $status=="hp"){
		if($status=="email"){
			$tel_handphone = $tel_handphone." (<a href='".getLink()."/verifikasi/handphone/$otp' target='_blank'>kirim verifikasi</a>)";
		}else if($status=="hp"){
			$email = $email." (<a href='".getLink()."/verifikasi/email/0' target='_blank'>kirim verifikasi</a>)";
		}
		$status = '
					<span class="label label-warning"><b>50% terverifikasi</b></span>
				';		
	}else if($status=="terverifikasi"){
		$status = '
					<span class="label label-success"><b>Sudah terverifikasi</b></span>
				';		
	}else{
		$email = $email." (<a href='".getLink()."/verifikasi/email/0' target='_blank'>kirim verifikasi</a>)";
		$tel_handphone = $tel_handphone." (<a href='".getLink()."/verifikasi/handphone/$otp' target='_blank'>kirim verifikasi</a>)";
		$status = '
			<span class="label label-danger"><b>Belum terverifikasi</b></span>
		';		
	}
	printf("
			<tr>
                <th valign='top'>Nama:</th>
                <td>%s</td>
            </tr>
			<tr>
                <th class='hidden-xs'>Jenis Kelamin:</th>
                <th valign='top' class='visible-xs'>JK:</th>
                <td>%s</td>
            </tr>
            <tr>
                <th valign='top'>Email:</th>
                <td>%s</a></td>
            </tr>
            <tr>
            <th valign='top'>Alamat Lengkap:</th>
                <td>%s<br>
                    Kelurahan: %s<br>
                    Kecamatan: %s<br>
					Kabupaten/Kota: %s<br>
					Provinsi: %s<br>
					Kode Pos: %s</td>
            </tr>
            <tr>
                <th class='hidden-xs'>Nomor Pokok Wajib Pajak(NPWP):</th>
                <th class='visible-xs'>NPWP :</th>
                <td>%s</td>
            </tr>
            <tr>
                <th class='hidden-xs'>No. Telepon Rumah/Kantor:</th>
                <th class='visible-xs'>Telepon: </th>
                <td>%s</td>
            </tr>
			<tr>
                <th class='hidden-xs'>No. Handphone:</th>
                <th class='visible-xs'>Handphone: </th>
                <td>%s</td>
            </tr>
			<tr>
                <th class='hidden-xs'>Status Akun:</th>
                <th class='visible-xs'>Status Akun:</th>
                <td>%s</td>
            </tr>
	",$nama_lengkap,$jk,$email,$alamat,$kelurahan,$kecamatan,$kota,$provinsi,$kode_pos,$npwp,$tel_rumah,$tel_handphone,$status);
}
function kirimVerifikasi($tipe,$user){
	global $mysqli;
	$sql= "SELECT 
		tbl_customer.email,
		tbl_customer.status,
		tbl_customeralamat.tel_handphone
			FROM tbl_customer,tbl_customeralamat
				WHERE tbl_customer.id_customer='".$_SESSION['id_customer']."' AND tbl_customer.id_customer=tbl_customeralamat.id_customer GROUP BY tbl_customer.email";
	$stmt= $mysqli->query($sql);
	$row = $stmt->fetch_array();
	if($tipe=="handphone"){
		$value = explode("/",$_GET['value']);
		$otp = substr($value[0],0,5);
		sendSMS("verifikasi",strtoupper($otp),$row['tel_handphone']);
	}
	if($tipe=="email"){
		require_once('library/function.php');
		$value = enkripPassword($_SESSION['email'].$_SESSION['id_customer']);
		$to       = $_SESSION['email'];
		$subject  = 'Verifikasi Email di oreli.co.id';
		$message  = "Silahkan klik link berikut untuk verifikasi email anda <a href='https://oreli.co.id/verifikasi/email/$value'> https://oreli.co.id/verifikasi/email/$value </a>";
		smtp_mail($to, $subject, $message, '', '', 0, 0, false);
	}
}
function verifikasiAkun($tipe,$value,$token){
	global $mysqli;
	$value = explode("/",$value);
	$user = $_SESSION['id_customer'];
	$otp = strtoupper(substr($value[0],0,5));	
	if($tipe=="handphone"){
		if($otp==$token){
			$stmt = $mysqli->query("select status from tbl_customer where id_customer='".$user."'");
			$row = $stmt->fetch_array();
			if($row['status']=="email" OR $row['status']=="hp"){
				$stmt = $mysqli->query("update tbl_customer set status='terverifikasi' where id_customer='".$user."'");
				if($stmt){
					echo '		
						<div class="divider divider--xs"></div>
						 <div class="alert alert-success" role="alert" align="center">
							<b>Verifikasi nomor handphone anda berhasil.</b>
						  </div>
					';					
					echo'<meta http-equiv="Refresh" content="2; URL='.getLink().'/member/akun">';
				}else{
					echo '		
						<div class="divider divider--xs"></div>
						<div class="alert alert-danger" role="alert" align="center">
							<b>Verifikasi gagal dilakukan, silahkan coba lain kali.</b>
						  </div>
					';					
				}
			}else{
				$stmt = $mysqli->query("update tbl_customer set status='hp' where id_customer='".$user."'");
				if($stmt){
					echo '		
						<div class="divider divider--xs"></div>
						 <div class="alert alert-success" role="alert" align="center">
							<b>Verifikasi nomor handphone anda berhasil.</b>
						  </div>
					';					
					echo'<meta http-equiv="Refresh" content="2; URL='.getLink().'/member/akun">';
				}else{
					echo '		
						<div class="divider divider--xs"></div>
						<div class="alert alert-danger" role="alert" align="center">
							<b>Verifikasi gagal dilakukan, silahkan coba lain kali.</b>
						  </div>
					';					
				}
			}
		}else{
			echo '		
				<div class="alert alert-danger" role="alert" align="center">
					<b>Kode token anda salah, silahkan coba lain kali.</b>
				  </div>
			';					
		}
	}else if($tipe=="email"){
		$stmt = $mysqli->query("select id_customer,email,status from tbl_customer where id_customer='".$user."'");
		$row = $stmt->fetch_array();
		$token = strtoupper(substr(enkripPassword($row['email'].$user),0,5));
		if($otp==$token){
			if($row['status']==0){
				$stmt = $mysqli->query("update tbl_customer set status='terverifikasi' where id_customer='".$user."'");
				if($stmt){
					echo '		
						<div class="divider divider--xs"></div>
						<div class="alert alert-success" role="alert" align="center">
							<b>Verifikasi email anda berhasil.</b>
						  </div>
					';					
					echo'<meta http-equiv="Refresh" content="2; URL='.getLink().'/member/akun">';
				}else{
					echo '		
						<div class="divider divider--xs"></div>
						<div class="alert alert-danger" role="alert" align="center">
							<b>Verifikasi gagal dilakukan, silahkan coba lain kali.</b>
						  </div>
					';					
				}
			}else{
				$stmt = $mysqli->query("update tbl_customer set status='email' where id_customer='".$user."'");
				if($stmt){
					echo '		
						<div class="divider divider--xs"></div>
						 <div class="alert alert-success" role="alert" align="center">
							<b>Verifikasi email anda berhasil.</b>
						  </div>
					';					
					echo'<meta http-equiv="Refresh" content="2; URL='.getLink().'/member/akun">';
				}else{
					echo '		
						<div class="divider divider--xs"></div>
						<div class="alert alert-danger" role="alert" align="center">
							<b>Verifikasi gagal dilakukan, silahkan coba lain kali.</b>
						  </div>
					';					
				}
			}
		}else{
			echo '		
				<div class="alert alert-danger" role="alert" align="center">
					<b>Kode token anda salah, silahkan coba lain kali.</b>
				  </div>
			';					
		}
	}
}
function alamatHapus(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$id_alamat = $_GET['hapus'];
	$stmt = $mysqli->prepare("DELETE FROM tbl_customeralamat WHERE id_customer=? AND id_alamat=? AND nama_alamat NOT LIKE 'Alamat Saya'");
	$stmt->bind_param('si',$id_customer,$id_alamat);
	$stmt->execute();
	$stmt->close();
		echo'<meta http-equiv="Refresh" content="0; URL='.getLink().'/member/alamat">';
}

if(isset($_POST['setProv'])){
	alamatProvinsi();
}else if(isset($_POST['prov'])){
	alamatKota($_POST['prov']);
}else if(isset($_POST['kt'])){
	alamatKecamatan($_POST['kt']);		
}else if(isset($_POST['kc'])){
	alamatKelurahan($_POST['kc']);		
}else if(isset($_POST['kl'])){
	alamatPos($_POST['kl']);		
}else if(isset($_POST['set_kode_pos'])){
	alamatKodePos($_POST['set_kode_pos'],$_POST['kode_pos_data']);		
}	
function alamatTambah(){
	global $mysqli;
		if(isset($_SESSION['id_customer'])){
			$id_customer = $_SESSION['id_customer'];			
		}else{
			$id_customer = $_POST['id_customer'];						
		}
		$nama_alamat = $_POST['nama_alamat'];
		$nama_penerima = $_POST['nama_penerima'];
		$alamat_penerima = str_replace("/"," ",$_POST['alamat_penerima']);
		$provinsi = $_POST['provinsi'];
		$kota = $_POST['kota'];
		$kecamatan = $_POST['kecamatan'];
		$kelurahan = $_POST['kelurahan'];
		$kode_pos = $_POST['kode_pos'];
		$tel_rumah = $_POST['tel_rumah'];
		$tel_handphone = $_POST['tel_handphone'];
			$stmt = $mysqli->prepare("SELECT id_kota FROM tbl_kota WHERE provinsi=? AND kota=? AND kecamatan=? AND kelurahan=? AND kode_pos=?");
			$stmt->bind_param('ssssi',$provinsi,$kota,$kecamatan,$kelurahan,$kode_pos);			
		$stmt->execute();
		$stmt->bind_result($idkota);
		$stmt->fetch();
		$id_kota = $idkota;
		$stmt->close();
		$stmt = $mysqli->prepare("INSERT INTO tbl_customeralamat(id_customer,nama_alamat,nama_penerima,alamat_penerima,id_kota,tel_rumah,tel_handphone) VALUES(?,?,?,?,?,?,?) ");
		$stmt->bind_param('ssssiss',
			$id_customer,
			$nama_alamat,
			$nama_penerima,
			$alamat_penerima,
			$id_kota,
			$tel_rumah,
			$tel_handphone
		);
		if($stmt->execute()){
			echo '		
				<div class="alert alert-success" role="alert" align="center">
					<b>Tambah alamat berhasil.</b>
				  </div>
			';					
		}else{
			echo '		
				<div class="alert alert-danger" role="alert" align="center">
					<b>Tambah alamat gagal.</b>
				  </div>
			';					
		}
		$stmt->close();
}
function alamatProvinsi(){
	global $mysqli;
		$stmt = $mysqli->prepare("SELECT DISTINCT provinsi FROM tbl_kota WHERE biaya > 0 AND code != '' AND keterangan != '' order by provinsi");		
		$stmt->execute();
		$stmt->bind_result($nama);
		echo"<option value=''>Pilih Provinsi</option>";
		while($stmt->fetch()){
			printf("
					  <option value='%s'>%s</option>
			",$nama,$nama);
		}
		$stmt->close();
}
function alamatEdit(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$id_alamat = $_GET['edit'];
	$edit = $mysqli->prepare("SELECT 
		tbl_customeralamat.nama_alamat,
		tbl_customeralamat.nama_penerima,
		tbl_customeralamat.alamat_penerima,
		tbl_kota.kode_pos,
		tbl_customeralamat.tel_rumah,
		tbl_customeralamat.tel_handphone,
		tbl_kota.provinsi,
		tbl_kota.kota,
		tbl_kota.kecamatan,
		tbl_kota.kelurahan
			FROM tbl_customeralamat,tbl_kota
				WHERE tbl_customeralamat.id_customer=? and tbl_customeralamat.id_alamat=? and tbl_kota.id_kota=tbl_customeralamat.id_kota");
	$edit->bind_param("ss", $id_customer,$id_alamat);
	$edit->execute();
	$edit->bind_result($nama_alamat,$nama_penerima,$alamat_penerima,$kode_pos,$tel_rumah,$tel_handphone,$provinsi,$kota,$kecamatan,$kelurahan);
	$edit->fetch();
	$edit->close();
	
	echo'
				<div class="row">
					<div class="col-xs-4">
						<label>Alamat Sebagai / Nama Alamat:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nama_alamat" class="input--wd input--wd--full" placeholder="Alamat Sebagai / Nama Alamat *" value="'.$nama_alamat.'" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Nama Penerima:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nama_penerima"class="input--wd input--wd--full" placeholder="Nama Penerima *" value="'.$nama_penerima.'" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Alamat Penerima:</label>
					</div>
					<div class="col-xs-8">
								<textarea class="textarea--wd textarea--wd--full" name="alamat_penerima" oninput="validasi_alamat()" id="alamat_penerima" placeholder="Alamat Penerima *"></textarea>
								<span id="warning_alamat" class="label label-danger" style="display:none;">Alamat tidak boleh mengandung simbol / ; * { } </span>
					</div>
				</div>
            <div id="alamat_manual">
                <div class="row">
					<div class="col-xs-4">
					</div>
					<div class="col-xs-4">
                <label>Provinsi:</label>
                <select class="form-control"  name="provinsi" id="provinsi" data-style="select--wd"  data-width="100%">
                  <option value="'.$provinsi.'">'.$provinsi.'</option>
                  <option value="">-</option>
				  ';
					alamatProvinsi();
				echo'
                </select>
              </div>
              <div class="col-xs-4">
                <label>Kota/Kabupaten:</label>
                <select class="form-control" name="kota" id="kota" data-style="select--wd"  data-width="100%">
                  <option value="'.$kota.'">'.$kota.'</option>
                </select>
              </div>
				</div>
				<div class="divider divider--xs"></div>
				<div class="row">
					<div class="col-xs-4">						
					</div>
					<div class="col-xs-4">
                <label>Kecamatan:</label>
                <select class="form-control" name="kecamatan" id="kecamatan" data-style="select--wd select--wd--full"  data-width="100%">
                  <option value="'.$kecamatan.'">'.$kecamatan.'</option>                  
                </select>
              </div>
					<div class="col-xs-4">
						<label>Kelurahan:</label>
						<select class="form-control"  id="kelurahan" name="kelurahan" data-style="select--wd"  data-width="100%">
							<option value="'.$kelurahan.'">'.$kelurahan.'</option>                  
						</select>
					</div>
				</div>
			</div>
			<div id="alamat_pos">
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-8 col-xs-12">
						<label>Kode Pos :</label>
					</div>
				</div>
                <div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-3 col-xs-6">
						<input type="text" name="kode_pos" id="kode_pos" class="input--wd input--wd--full" placeholder="Kode POS" value="'.$kode_pos.'" required>
					</div>
					<div class="col-md-3 col-xs-6" style="display:none;">
						<label></label>
						<button type="button" id="cekPos" name="cekPos" class="btn btn--wd">Cek Pos</button>						
					</div>
					<div class="col-md-1 col-xs-12">
						<div id="alamatLoading" style="display:none;">
							<img src="'.getLink().'/images/ajax-loader.gif" />
						</div>
					</div>
				</div>
				<div class="row" style="display:none;">
					<div class="col-md-4">
					</div>
					<div class="col-md-8 col-xs-12">
						<div class="checkbox-group">
							<input type="checkbox" id="tidak_tahu" name="tidak_tahu">
							<label for="tidak_tahu"> <span class="check"></span> <span class="box"></span>Tidak tahu kode pos saya.</label>
						</div>
					</div>
				</div>
			</div>
				<div class="divider divider--xs"></div>
                <div class="row">
					<div class="col-xs-4">
						<label>No. Telepon/Kantor (Penerima)</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="tel_rumah" class="input--wd input--wd--full" placeholder="No. Telepon/Kantor (Penerima) *" value="'.$tel_rumah.'" required>
					</div>
				</div>
                <div class="row">
					<div class="col-xs-4">
						<label>No. Handphone (Penerima)</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="tel_handphone" class="input--wd input--wd--full" placeholder="No. Handphone (Penerima) *" value="'.$tel_handphone.'">	
					</div>
				</div>
	';
	if(isset($_POST['btnEditAlamat'])){
		$nama_alamat = $_POST['nama_alamat'];
		$nama_penerima = $_POST['nama_penerima'];
		$alamat_penerima = $_POST['alamat_penerima'];
		$kota = $_POST['kota'];
		$provinsi = $_POST['provinsi'];
		$kecamatan = $_POST['kecamatan'];
		$kelurahan = $_POST['kelurahan'];
		$kode_pos = $_POST['kode_pos'];
		$tel_rumah = $_POST['tel_rumah'];
		$tel_handphone = $_POST['tel_handphone'];
			$stmt = $mysqli->prepare("SELECT id_kota FROM tbl_kota WHERE provinsi=? AND kota=? AND kecamatan=? AND kelurahan=? AND kode_pos=?");
			$stmt->bind_param('ssssi',$provinsi,$kota,$kecamatan,$kelurahan,$kode_pos);			
		$stmt->execute();
		$stmt->bind_result($idkota);
		$stmt->fetch();
		$id_kota = $idkota;
		$stmt->close();
		$stmt = $mysqli->prepare("UPDATE tbl_customeralamat SET 
			tbl_customeralamat.nama_alamat = ?,
			tbl_customeralamat.nama_penerima = ?,
			tbl_customeralamat.alamat_penerima = ?,
			tbl_customeralamat.id_kota = ?,
			tbl_customeralamat.tel_rumah = ?,
			tbl_customeralamat.tel_handphone = ? 
			WHERE id_customer=? and id_alamat=?
		");
		$stmt->bind_param('sssisssi',
			$nama_alamat,
			$nama_penerima,
			$alamat_penerima,
			$id_kota,
			$tel_rumah,
			$tel_handphone,
			$id_customer,
			$id_alamat
		);
		$stmt->execute();
		$stmt->close();	
		echo'<meta http-equiv="Refresh" content="0;url='.getLink().'/member/alamat">';
	}
}
function getAlamatSaya(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("SELECT 
		tbl_customeralamat.id_alamat,
		tbl_customeralamat.nama_alamat,
		tbl_customeralamat.nama_penerima,
		tbl_kota.kota,
		tbl_kota.biaya
			FROM tbl_customeralamat,tbl_kota
				WHERE tbl_customeralamat.id_customer=? and tbl_kota.id_kota=tbl_customeralamat.id_kota");
	$stmt->bind_param("s", $id_customer);
	$stmt->execute();
	$stmt->bind_result($id_alamat,$nama_alamat,$nama_penerima,$kota,$biaya);
	
	
	while($stmt->fetch()){
		printf("
		<tr>
                  <td><div class='th-title visible-xs'>Nama Alamat</div>%s</td>
                  <td><div class='th-title visible-xs'>Nama Penerima</div>%s</td>
                  <td><div class='th-title visible-xs'>Kota</div>%s</td>
                  <td><div class='th-title visible-xs'>Ongkir</div>Rp%s,-</td>
				  <td>
		",$nama_alamat,$nama_penerima,$kota,$biaya);
		if($nama_alamat == "Alamat Saya"){
			printf("		
						<a href='alamat/edit/$id_alamat'><button type='button' class='btn btn-default'>Edit</button></a> 
						<button type='button' class='btn btn-danger' disabled>Hapus</button></td>
					</tr>
			");
		}else{
			printf("		
						<a href='alamat/edit/$id_alamat'><button type='button' class='btn btn-default'>Edit</button></a> 
						<a href='alamat/hapus/$id_alamat'><button type='button' class='btn btn-danger'>Hapus</button></a></td>
					</tr>
			");
		}
	}
	$stmt->close();
	
}
function alamatKota($provinsi){
	global $mysqli;
		$stmt = $mysqli->prepare("SELECT DISTINCT kota FROM tbl_kota WHERE biaya > 0 AND provinsi=? order by kota");
		$stmt->bind_param('s',$provinsi);
		$stmt->execute();
		$stmt->bind_result($nama);
		echo"<option>Pilih Kota/Kabupaten</option>";
		while($stmt->fetch()){
			printf("
					  <option value='%s'>%s</option>
			",$nama,$nama);
		}
		$stmt->close();
}
function alamatKecamatan($kota){
	global $mysqli;
		$stmt = $mysqli->prepare("SELECT DISTINCT kecamatan FROM tbl_kota WHERE biaya > 0 AND code != '' AND keterangan != '' AND kota=? order by kecamatan");
		$stmt->bind_param('s',$kota);
		$stmt->execute();
		$stmt->bind_result($nama);
		echo"<option >Pilih Kecamatan</option>";
		while($stmt->fetch()){
			printf("
					  <option value='%s'>%s</option>
			",$nama,$nama);
		}
		$stmt->close();
}
function alamatKelurahan($kecamatan){
	global $mysqli;
		$stmt = $mysqli->prepare("SELECT DISTINCT kelurahan FROM tbl_kota WHERE biaya > 0 AND code != '' AND keterangan != '' AND kecamatan=? order by kelurahan");
		$stmt->bind_param('s',$kecamatan);
		$stmt->execute();
		$stmt->bind_result($nama);
		echo"<option >Pilih Kelurahan</option>";
		while($stmt->fetch()){
			printf("
					  <option value='%s'>%s</option>
			",$nama,$nama);
		}
		$stmt->close();
}
function alamatPos($data){
	global $mysqli;
		$data = explode("/",$data);
		$kelurahan = $data[0];
		$kecamatan = $data[1];
		$stmt = $mysqli->prepare("SELECT DISTINCT kode_pos FROM tbl_kota WHERE biaya > 0 AND code != '' AND keterangan != '' AND kecamatan=? AND kelurahan=? order by kode_pos");
		$stmt->bind_param('ss',$kecamatan,$kelurahan);
		$stmt->execute();
		$stmt->bind_result($nama);
		while($stmt->fetch()){
			echo $nama;
		}
		$stmt->close();
}
function alamatKodePos($kode_pos,$data){
	global $mysqli;
		$stmt = $mysqli->prepare("SELECT DISTINCT provinsi,kota,kecamatan,kelurahan FROM tbl_kota WHERE kode_pos=?");
		$stmt->bind_param('s',$kode_pos);
		$stmt->execute();
		$stmt->bind_result($provinsi,$kota,$kecamatan,$kelurahan);
		if($data == "kelurahan"){
			echo "<option value=''>Pilih ".$data."</option> ";
		}
		while($stmt->fetch()){
			if($data == "kota"){
				$nama = $kota;
			}else if($data == "kecamatan"){
				$nama = $kecamatan;
			}else if($data == "provinsi"){
				$nama = $provinsi;
			}else if($data == "kelurahan"){
				$nama = $kelurahan;
				printf("
					<option value='%s'>%s</option>
				",$nama,$nama);
			}
		}
		if($data != "kelurahan"){
			printf("
				<option value='%s'>%s</option>
			",$nama,$nama);
		}
		$stmt->close();
//	alamatProvinsi();
}

function getNoTransaksi(){
		global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("SELECT 
		tbl_order.no_transaksi
			FROM tbl_order, tbl_orderstatus
				WHERE tbl_order.id_customer='$id_customer' AND tbl_order.no_transaksi=tbl_orderstatus.no_transaksi AND tbl_orderstatus.status='Menunggu pembayaran' order by no_transaksi");
	while($row = $stmt->fetch_assoc()){
		$no_transaksi = $row['no_transaksi'];
		$stmt2 = $mysqli->query("select count(id) as jum from tbl_orderstatus where no_transaksi='$no_transaksi' ");
		$row = $stmt2->fetch_assoc();
		$jum = $row['jum'];
		if($jum == 1){
			printf("<option value='%s'> %s </option>",$no_transaksi,$no_transaksi);			
		}
		$stmt2->close();
	}
	$stmt->close();
}

function getPesananSaya(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("SELECT 
		no_transaksi,
		waktu,
		jumlah_bayar,
		jumlah_dibayar
			FROM tbl_order
				WHERE id_customer='$id_customer' order by waktu DESC");
	while($row = $stmt->fetch_assoc()){
		$no_transaksi = $row['no_transaksi'];
		$waktu=$row['waktu'];
		$jumlah_bayar=$row['jumlah_bayar'];
		$jumlah_dibayar=$row['jumlah_dibayar'];
		$orderstat = $mysqli->query("SELECT UPPER(status) as status FROM tbl_orderstatus WHERE no_transaksi LIKE '$no_transaksi' ORDER BY waktu DESC LIMIT 1");
		$row = $orderstat->fetch_array();
		$status = $row['status'];
		printf("
		<tr>
                  <td><div class='th-title visible-xs'>No Transaksi</div><a href='invoice/%s' target='_blank' style='color:green;' >%s</a></td>
                  <td><div class='th-title visible-xs'>Tanggal Pesanan</div>%s</td>
                  <td><div class='th-title visible-xs'>Total Pembayaran</div>Rp%s,-</td>
                  <td><div class='th-title visible-xs'>Total Dibayar</div>Rp%s,-</td>
				  <td><div class='th-title visible-xs' style='width: 10px;'>Status</div>%s</td>
				  <td><a href='pesanan/detail/$no_transaksi'><button type='button' class='btn btn-success'>Detail </button></a>
		",$no_transaksi,$no_transaksi,date("d F Y H:i:S", strtotime($waktu)),setHarga($jumlah_bayar),setHarga($jumlah_dibayar),$status);
		if($jumlah_dibayar > $jumlah_bayar){
				echo"
					<a href='pembayaran/refund/$no_transaksi'><button type='button' class='btn btn-warning'>Refund</button></a> 
				";
		}
		if($status == "DITERIMA"){
			$stmt2 = $mysqli->query("select waktu from tbl_orderstatus where no_transaksi=".$no_transaksi." AND status='diterima' ");
			$row = $stmt2->fetch_array();
			$waktu = $row['waktu'];
			$stmt2->free();
			$tgl_skrg = date('d F Y');
			$tgl_terkirim = date("d F Y", strtotime($waktu));
			$selisih = ((abs(strtotime ($tgl_skrg) - strtotime ($tgl_terkirim)))/(60*60*24));
			if($selisih < 2){
				echo"
					<a href='pesanan/return/$no_transaksi'><button type='button' class='btn btn-danger'>Return</button></a> 
				";
			}
		}
			echo"						
					  </td>
				</tr>
			";
		$orderstat->free();
	}
	$stmt->free();
	
}
function rekeningTambah(){
	global $mysqli;
	
	if(isset($_POST['btnTambahRekening'])){
		if(isset($_SESSION['id_customer'])){
			$id_customer = $_SESSION['id_customer'];		
		}else{
			$id_customer = getIpCustomer();		
		}
		$stmt = $mysqli->query("select * from tbl_bank WHERE id_customer='$id_customer'");
		if($stmt->num_rows == 0){			
			$nama_bank = $_POST['nama_bank'];
			$nomor_rekening = $_POST['nomor_rekening'];
			$atas_nama = $_POST['atas_nama'];
			$ok_ext = array('jpg','png','jpeg'); // allow only these types of files
			$destination = 'rekening/'; // where our files will be stored
			$file = $_FILES['file_foto'];
			$filename = explode(".", $file["name"]); 
			$file_name = $file['name']; // file original name
			$file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension
			$file_extension = $filename[count($filename)-1];
			$file_weight = $file['size'];
			$file_type = $file['type'];
			// If there is no error
			if( $file['error'] == 0 ){
				// check if the extension is accepted
				if( in_array(strtolower($file_extension), $ok_ext)){
					// check if the size is not beyond expected size
					// rename the file
					$fileNewName = $id_customer.'_'.$nomor_rekening.'.'.$file_extension ;
					// and move it to the destination folder
					if( move_uploaded_file($file['tmp_name'], $destination.$fileNewName) ){
						$foto_tabungan = 'rekening/'.$fileNewName;
						$stmt = $mysqli->prepare("INSERT INTO tbl_bank(id_customer,nama_bank,nomor_rekening,atas_nama,foto_tabungan) VALUES(?,?,?,?,?)"); 
						$stmt->bind_param("sssss",$id_customer,$nama_bank,$nomor_rekening,$atas_nama,$foto_tabungan);
						if($stmt->execute()){
							echo '		
							<div class="divider divider--xs"></div>
								<div class="alert alert-success" role="alert" align="center">
									<b>Terimakasih, permintaan anda sedang di proses... !!</b>
								</div>
							';
						}else{
							echo '		
							<div class="divider divider--xs"></div>
								<div class="alert alert-danger" role="alert" align="center">
									<b>Gagal melakukan permintaan, silahkan coba lagi nanti... !!</b>
								</div>
							';
						}
						$stmt->close();						
					}else{
						echo "can't upload file.";
					}
				}else{
					echo "File type is not supported.";
				}
			}
		}else{
			echo '		
			<div class="divider divider--xs"></div>
				<div class="alert alert-danger" role="alert" align="center">
					<b>Maaf, anda sudah memiliki akun rekening yang terdaftar... !!</b>
				</div>
			';
		}		
	}
}
function rekeningEdit(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$id_bank = $_GET['edit'];
	$stmt = $mysqli->prepare("SELECT 
		nama_bank,
		nomor_rekening,
		atas_nama
			FROM tbl_bank
				WHERE id_customer=? AND id_bank=?");
	$stmt->bind_param("ii", $id_customer,$id_bank);
	$stmt->execute();
	$stmt->bind_result($nama_bank,$nomor_rekening,$atas_nama);
	
	$stmt->fetch();
		printf('
				<div class="row">
					<div class="col-xs-4">
						<label>Nama Bank:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nama_bank" class="input--wd input--wd--full" placeholder="Alamat Sebagai / Nama Alamat *" value="%s" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>No. Rekening:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="nomor_rekening" class="input--wd input--wd--full" placeholder="No. Rekening" value="%s" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<label>Atas Nama Rekening:</label>
					</div>
					<div class="col-xs-8">
						<input type="text" name="atas_nama" class="input--wd input--wd--full" placeholder="Nama Penerima *" value="%s" required>
					</div>
				</div>
		',$nama_bank,$atas_nama,$nomor_rekening);
		echo'
				<div class="row">
					<div class="col-xs-4">
						<label>Foto Buku Tabungan: </label>
					</div>
					<div class="col-xs-8">
						<label class="control-label">Pilih File</label>
						<input id="file_foto"  name="file_foto" type="file" class="file" required>
					</div>
				</div>
		';
	$stmt->close();
	if(isset($_POST['btnEditRekening'])){
		$nama_bank = $_POST['nama_bank'];
		$nomor_rekening = $_POST['nomor_rekening'];
		$atas_nama = $_POST['atas_nama'];
		$ok_ext = array('jpg','png','jpeg'); // allow only these types of files
		$destination = 'rekening/'; // where our files will be stored
		$file = $_FILES['file_foto'];
		$filename = explode(".", $file["name"]); 
		$file_name = $file['name']; // file original name
		$file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension
		$file_extension = $filename[count($filename)-1];
		$file_weight = $file['size'];
		$file_type = $file['type'];
		// If there is no error
		if( $file['error'] == 0 ){
			// check if the extension is accepted
			if( in_array($file_extension, $ok_ext)){
				// check if the size is not beyond expected size
				// rename the file
				$fileNewName = $id_customer.'_'.$nomor_rekening.'.'.$file_extension ;
				// and move it to the destination folder
				if( move_uploaded_file($file['tmp_name'], $destination.$fileNewName) ){
					$foto_tabungan = 'rekening/'.$fileNewName;
					$stmt = $mysqli->query("select foto_tabungan from tbl_bank where id_customer='$id_customer' AND id_bank='$id_bank'");
					$data=$stmt->fetch_array();
					unlink($data['foto_tabungan']);
					$stmt->close();
					$stmt = $mysqli->prepare("UPDATE tbl_bank SET 
						nama_bank = ?,
						nomor_rekening = ?,
						foto_tabungan = ?,
						atas_nama = ?
						WHERE id_customer=? and id_bank=?
					");
					$stmt->bind_param('sssssi',$nama_bank,$nomor_rekening,$foto_tabungan,$atas_nama,$id_customer,$id_bank);
					if($stmt->execute()){
						echo '		
				<div class="divider divider--xs"></div>
							<div class="alert alert-success" role="alert" align="center">
								<b>Terimakasih, permintaan anda sedang di proses... !!</b>
							</div>
							<meta http-equiv="Refresh" content="2; URL='.getLink().'/member/rekening">
						';
					}
					$stmt->close();						
				}else{
					echo "can't upload file.";
				}
			}else{
				echo "File type is not supported.";
			}
		}
	}
}
function rekeningHapus(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$id_bank = $_GET['hapus'];
	$stmt = $mysqli->query("select foto_tabungan FROM tbl_bank WHERE id_customer='$id_customer' AND id_bank=$id_bank");
	$data = $stmt->fetch_array();
	unlink($data['foto_tabungan']);
	$stmt->close();
	$stmt = $mysqli->prepare("DELETE FROM tbl_bank WHERE id_customer=? AND id_bank=?");
	$stmt->bind_param('si',$id_customer,$id_bank);
	$stmt->execute();
	$stmt->close();
		?>
			<meta http-equiv="Refresh" content="0; URL=<?php echo getLink();?>/member/rekening">
		<?php
}

function getRekeningOreli(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("SELECT 
		id_bank,
		nama_bank,
		nomor_rekening,
		atas_nama
			FROM tbl_bank
				WHERE id_customer='oreli'");
	$stmt->execute();
	$stmt->bind_result($id_bank,$nama_bank,$nomor_rekening,$atas_nama);
	
	while($stmt->fetch()){
		printf("<option value='%s/%s'> %s - %s</option>",$nama_bank,$nomor_rekening,$nama_bank,$nomor_rekening);			
	}
	$stmt->close();
}
function getRekeningSaya(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("SELECT 
		id_bank,
		nama_bank,
		nomor_rekening,
		atas_nama,
		foto_tabungan,
		status
			FROM tbl_bank
				WHERE id_customer=?");
	$stmt->bind_param("s", $id_customer);
	$stmt->execute();
	$stmt->bind_result($id_bank,$nama_bank,$nomor_rekening,$atas_nama,$foto_tabungan,$status);
	while($stmt->fetch()){
		if($status == 0){
			$status = "PROSES VERIFIKASI";
		}else if($status == 1){
			$status = "AKTIF";
		}else{
			$status = "DITOLAK";
		}
		printf("
		<tr>
					<td><div class='th-title visible-xs'>Nama Bank</div>%s</td>
					<td><div class='th-title visible-xs'>Atas Nama</div>%s</td>
					<td><div class='th-title visible-xs'>Nomor Rekening</div>%s</td>
					<td><div class='th-title visible-xs'>Status</div>%s</td>
					<td>
						<a href='rekening/hapus/$id_bank'><button type='button' class='btn btn-danger'>Hapus Rekening</button></a>
					</td>
                
		</tr>
		",$nama_bank,$atas_nama,$nomor_rekening,$status);
	}
	$stmt->close();
	
}
function poinJumlah($jenis){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	if($jenis == "ALL"){
		$stmt = $mysqli->prepare("SELECT poin_akhir FROM tbl_poin WHERE id_customer=? AND (substr(status,1,2)='PS' OR substr(status,1,2)='PP') ORDER BY id_poin DESC LIMIT 1");
		$stmt->bind_param("s", $id_customer);		
	}else if($jenis == "pribadi"){
		$stmt = $mysqli->prepare("SELECT sum(poin) FROM tbl_poin WHERE id_customer=? AND substr(status,1,2)='PP' AND poin_aksi='+' ORDER BY id_poin DESC LIMIT 1");
		$stmt->bind_param("s", $id_customer);		
	}
	$stmt->execute();
	$stmt->bind_result($jum);
	$stmt->fetch();
	$stmt->close();
	echo $jum;
}
function getPoinJumlah($tahun,$bulan,$jenis_poin){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
if($jenis_poin == "sisa"){
		$jenis = "(substr(status,1,2)='PS' OR substr(status,1,2)='PP' OR substr(status,1,4)='Hold') AND poin_aksi='+'";
		$sql = "select sum(poin) as jum from tbl_poin where id_customer='$id_customer' AND YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan' AND $jenis ORDER BY id_poin DESC LIMIT 1";
		$stmt = $mysqli->query($sql);
		$data = $stmt->fetch_array();
		$poin_total = $data['jum'];

		$jenis = "poin_aksi='-'";
		$sql = "select sum(poin) as jum from tbl_poin where id_customer='$id_customer' AND YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan' AND $jenis ORDER BY id_poin DESC LIMIT 1";
		$stmt = $mysqli->query($sql);
		$stmt = $mysqli->query($sql);
		$data = $stmt->fetch_array();
		$poin_redeem = $data['jum'];
		$poin_akhir = 0;
		$poin_akhir = $poin_total-$poin_redeem;
		if($poin_akhir == NULL){
			$poin_akhir = 0;
		}
		return $poin_akhir;
	}else{
		if($jenis_poin == "pribadi"){
			$jenis = "(substr(status,1,2)='PP' OR substr(status,1,2)='TF' OR substr(status,1,4)='Hold') AND poin_aksi='+'";
			$sql = "select sum(poin) from tbl_poin where id_customer='$id_customer' AND YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan' AND $jenis ORDER BY id_poin DESC LIMIT 1";
		}else if($jenis_poin == "cabang"){
			$jenis = "substr(status,1,2)='PS' AND poin_aksi='+'";
			$sql = "select sum(poin) from tbl_poin where id_customer='$id_customer' AND YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan' AND $jenis ORDER BY id_poin DESC LIMIT 1";
		}else if($jenis_poin == "total"){
			$jenis = "(substr(status,1,2)='PS' OR substr(status,1,2)='PP' OR substr(status,1,4)='Hold') AND poin_aksi='+'";
			$sql = "select sum(poin) from tbl_poin where id_customer='$id_customer' AND YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan' AND $jenis ORDER BY id_poin DESC LIMIT 1";
		}else if($jenis_poin == "redeem"){
			$jenis = "poin_aksi='-'";
			$sql = "select sum(poin) from tbl_poin where id_customer='$id_customer' AND YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan' AND $jenis ORDER BY id_poin DESC LIMIT 1";
		}
		$stmt = $mysqli->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($poin_akhir);
		$stmt->fetch();
		$stmt->close();
		if($poin_akhir == NULL){
			$poin_akhir = 0;
		}
		return $poin_akhir;
	}}

function getPoinSaya(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("SELECT 
		waktu,
		poin_lama,
		poin,
		poin_aksi,
		poin_akhir,
		status
			FROM tbl_poin
				WHERE id_customer=?");
	$stmt->bind_param("s", $id_customer);
	$stmt->execute();
	$stmt->bind_result($waktu,$poin_lama,$poin,$poin_aksi,$poin_akhir,$status);
	while($stmt->fetch()){
	if($poin_lama == NULL){
		$poin_lama = 0;
	}
	$status = explode("-",$status);
	$status = $status[1];
		printf("
		<tr>
                  <td><div class='th-title visible-xs'>Waktu</div>%s</td>
				  <td><div class='th-title visible-xs'>Poin Lama</div>%s</td>
		",date("d F Y / H:i:S", strtotime($waktu)),$poin_lama);
		if($poin_aksi == "+"){
			printf("
					  <td style='color:green;'><div class='th-title visible-xs'>Mutasi</div><b>%s</b> %s</td>
			",$poin_aksi,$poin);			
		}else{
			printf("
					  <td style='color:red;'><div class='th-title visible-xs'>Mutasi</div><b>%s</b> %s</td>
			",$poin_aksi,$poin);						
		}
		printf("
                  <td><div class='th-title visible-xs'>TOTAL POIN</div>%s</td>
				  <td><div class='th-title visible-xs'>Status</div>%s</td>
		</tr>
		",$poin_akhir,$status);
	}
	$stmt->close();
	
}
function getPoinDetail($tahun,$bulan,$jenis){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	if($jenis == "cabang"){
		echo'
		 <thead>
			<tr>
			  <th>ID MEMBER</th>
			  <th>NO TRANSAKSI</th>
			  <th>TANGGAL</th>
			  <th>KODE PRODUK</th>
			  <th>KETERANGAN</th>
			  <th>QTY</th>
			  <th>JUMLAH POIN</th>				  
			</tr>
		  </thead>
		  <tbody >
		';				
	}else{
				echo'
		 <thead>
			<tr>
			  <th>NO TRANSAKSI</th>
			  <th>TANGGAL</th>
			  <th>KODE PRODUK</th>
			  <th>KETERANGAN</th>
			  <th>QTY</th>
			  <th>JUMLAH POIN</th>				  
			</tr>
		  </thead>
		  <tbody >
		';		

	}

	if($bulan == "ALL"){		
		$sql = "SELECT tbl_orderdetail.no_transaksi,
		tbl_order.waktu,
		tbl_orderdetail.kode_produk,
		tbl_orderdetail.keterangan,
		tbl_orderdetail.jumlah,
		tbl_produk.poin_downline 
			FROM tbl_orderdetail,tbl_orderstatus,tbl_order,tbl_produk WHERE 
				tbl_order.id_customer='$id_customer' AND 
				(tbl_orderstatus.no_transaksi = tbl_order.no_transaksi AND 
				tbl_orderstatus.status = 'Pesanan terkirim') AND 
				YEAR(tbl_order.waktu)='$tahun' 
				AND tbl_orderdetail.no_transaksi = tbl_order.no_transaksi 
				AND tbl_orderdetail.kode_produk = tbl_produk.kode_produk";		
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($no_transaksi,$tanggal,$kode_produk,$keterangan,$qty,$jumlah_poin);
			while($stmt->fetch()){
				printf("
				<tr>
					<td><div class='th-title visible-xs'>No Transaksi</div>%s</td>
					<td><div class='th-title visible-xs'>Tanggal</div>%s</td>
					<td><div class='th-title visible-xs'>Kode Produk</div>%s</td>
					<td><div class='th-title visible-xs'>Keterangan</div>%s</td>
					<td><div class='th-title visible-xs'>QTY</div>%s</td>
					<td><div class='th-title visible-xs'>Jumlah Poin</div>%s</td>
				</tr>
				",$no_transaksi,$tanggal,str_replace(".","",$kode_produk),$keterangan,$qty,($qty * $jumlah_poin));
			}
			$stmt->close();
	}else{
		if($jenis == "pribadi"){
			$jenis_poin = "(substr(tbl_poin.status,1,2)='PP' OR substr(tbl_poin.status,1,4)='Hold')";
			$sql = "SELECT tbl_orderdetail.no_transaksi,
			tbl_order.waktu,
			tbl_orderdetail.kode_produk,
			tbl_orderdetail.keterangan,
			tbl_orderdetail.jumlah,
			tbl_produk.poin_downline, 
			tbl_produk.poin_upline 
				FROM tbl_orderdetail,tbl_order,tbl_orderstatus,tbl_produk,tbl_poin WHERE 
					(tbl_order.id_customer = '$id_customer' AND 
					tbl_poin.id_customer = '$id_customer') AND 
					tbl_orderstatus.status = 'Pesanan terkirim' AND 
					tbl_order.no_transaksi = tbl_orderdetail.no_transaksi AND 
					tbl_produk.kode_produk = tbl_orderdetail.kode_produk AND 
					YEAR(tbl_order.waktu)='$tahun' AND 
					MONTH(tbl_order.waktu)='$bulan' AND
					$jenis_poin GROUP BY tbl_produk.kode_produk";
			$stmt = $mysqli->query($sql);
			while($data = $stmt->fetch_array()){
				$no_transaksi = $data['no_transaksi'];
				$tanggal = $data['waktu'];
				$kode_produk = $data['kode_produk'];
				$keterangan = $data['keterangan'];
				$qty = $data['jumlah'];
				$poin_downline = $data['poin_downline'];
				$poin_upline = $data['poin_upline'];
				if($_SESSION['tipe']==2){
					$jum = ($qty * ($poin_downline+$poin_upline));										
				}else{
					$jum = ($qty * $poin_downline);					
				}
				$getPro = $mysqli->query("select nama_produk from tbl_produk where kode_produk='$kode_produk'");
				$produk = $getPro->fetch_array();
				$produk = $produk['nama_produk'];
				printf("
				<tr>
					<td><div class='th-title visible-xs'>No Transaksi</div>%s</td>
					<td><div class='th-title visible-xs'>Tanggal</div>%s</td>
					<td><div class='th-title visible-xs'>Produk</div>%s</a></td>
					<td><div class='th-title visible-xs'>Keterangan</div>%s</td>
					<td><div class='th-title visible-xs'>QTY</div>%s</td>
					<td><div class='th-title visible-xs'>Jumlah Poin</div>%s</td>
				</tr>
				",$no_transaksi,$tanggal,$produk,$keterangan,$qty,$jum);
			}
			$stmt->close();
		}else if($jenis == "cabang"){
			$sql = "select status from tbl_poin where id_customer='$id_customer' AND (YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan') AND substr(status,1,2)='PS'";
//			$sql = "select status from tbl_poin where id_customer='$id_customer' AND (YEAR(waktu)='$tahun' AND MONTH(waktu)='$bulan') AND substr(status,1,2)='PS' GROUP BY replace(substring(status,-7),'-','')";
			$stmt = $mysqli->query($sql);
			while($row = $stmt->fetch_array()){
				$data = explode("-",$row['status']);
				$id_member= $data[2];
				$id= $data[3];
				$stmt2 = $mysqli->query("SELECT no_transaksi,waktu FROM tbl_order WHERE no_transaksi='$id'");
				while($data = $stmt2->fetch_array()){
					$no_transaksi=$data['no_transaksi'];
					$waktu=$data['waktu'];
					$sql2 =  "select kode_produk,jumlah,keterangan FROM tbl_orderdetail WHERE no_transaksi='$no_transaksi'";
					$stmt3 = $mysqli->query("select kode_produk,jumlah,keterangan FROM tbl_orderdetail WHERE no_transaksi='$no_transaksi'");
					while($row = $stmt3->fetch_array()){
						$kode_produk = $row['kode_produk'];
						$jumlah = $row['jumlah'];
						$keterangan = $row['keterangan'];
						$stmt4 = $mysqli->query("select poin_upline,poin_downline FROM tbl_produk WHERE kode_produk='$kode_produk'");
						$row = $stmt4->fetch_assoc();
						$poin_upline=$row['poin_upline'];
						$poin_downline=$row['poin_downline'];
						$stmt4->close();
						printf("
						<tr>
							<td><div class='th-title visible-xs'>Id Downline</div>%s</td>
							<td><div class='th-title visible-xs'>No Transaksi</div>%s</td>
							<td><div class='th-title visible-xs'>Tanggal</div>%s</td>
							<td><div class='th-title visible-xs'>Kode Produk</div>%s</td>
							<td><div class='th-title visible-xs'>Keterangan</div>%s</td>
							<td><div class='th-title visible-xs'>QTY</div>%s</td>
							<td><div class='th-title visible-xs'>Jumlah Poin</div>%s</td>
						</tr>
						",$id_member,$no_transaksi,$waktu,str_replace(".","",$kode_produk),$keterangan,$jumlah,($jumlah * $poin_upline));
					}
					$stmt3->close();
				}
				$stmt2->close();
			}
			$stmt->free();
			
		}
	}
		echo'
		  </tbody>
		';		
}
function getPoinPending(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$rupiah = getKonversiPoin();
	$stmt = $mysqli->query("SELECT 
		id_bank,
		jum_pencairan,
		tgl_pengajuan
			FROM tbl_poinpencairan
				WHERE id_customer=$id_customer AND status='1'");
	while($row = $stmt->fetch_assoc()){
		$id_bank = $row['id_bank'];
		$jum_pencairan = $row['jum_pencairan'];
		$rupiah = $rupiah * $jum_pencairan;
		$tgl_pengajuan = $row['tgl_pengajuan'];
		$stmt2 = $mysqli->query("SELECT
		nama_bank,
		nomor_rekening,
		atas_nama
			FROM tbl_bank
				WHERE id_bank=".$id_bank."");
		$row = $stmt2->fetch_assoc();
		$bank_tujuan = $row['nama_bank']." / ".$row['nomor_rekening']."/".$row['atas_nama'];
		printf("
		<tr>
                  <td><div class='th-title visible-xs'>BANK</div>%s</td>
				  <td><div class='th-title visible-xs'>PENCAIRAN</div>%s poin<br>(Rp%s)</td>
				  <td><div class='th-title visible-xs'>REKENING</div>%s</td>
		",date("d F Y", strtotime($tgl_pengajuan)),$jum_pencairan,$rupiah,$bank_tujuan);
		$stmt2->free();	
	}
	$stmt->free();
	
}
function downlineJumlah(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM tbl_customer WHERE referal=?");
	$stmt->bind_param("s", $id_customer);$stmt->execute();$stmt->bind_result($jum);$stmt->fetch();$stmt->close();
	echo $jum;
}
function getDownlineSaya(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$sql = "SELECT 
		id_customer,
		nama_lengkap,
		email,
		waktu 
		FROM tbl_customer WHERE referal='$id_customer'";
	$stmt = $mysqli->query($sql);
	$no=1;
	while($row = $stmt->fetch_array()){
		$id=$row['id_customer'];
		$nama_lengkap=$row['nama_lengkap'];
		$email=$row['email'];
		$waktu=$row['waktu'];
		$stmt1 = $mysqli->prepare("SELECT tel_handphone FROM tbl_customeralamat WHERE id_customer=? order by id_alamat asc limit 1");
		$stmt1->bind_param("s", $id);$stmt1->execute();$stmt1->bind_result($tel_handphone);
		$stmt1->store_result();
		$stmt1->fetch();
		if($stmt1->num_rows()==0 OR $tel_handphone == NULL){
			$tel_handphone = "-";
		}
		$stmt1->close();
		$stmt2 = $mysqli->prepare("SELECT COUNT(*) FROM tbl_order WHERE id_customer=?");
		$stmt2->bind_param("s", $id);$stmt2->execute();$stmt2->bind_result($jum);$stmt2->fetch();$stmt2->close();		
		echo"
		<tr>
                  <td><div class='th-title visible-xs'>Nomor</div>$no</td>
				  <td><div class='th-title visible-xs'>Waktu Pendaftaran</div>".date("d F Y", strtotime($waktu))."</td>
                  <td><div class='th-title visible-xs'>Nama Downline</div>$nama_lengkap</td>
                  <td><div class='th-title visible-xs'>No Handphone</div>$tel_handphone</td>
				  <td><div class='th-title visible-xs'>Emai</div>$email</td>
				  <td><div class='th-title visible-xs'>Jumlah Transaksi</div>$jum</td>
		</tr>
		";
		$no++;
	}
	$stmt->free();
	
}
function customerInsert(){
	global $mysqli;
	require_once('library/function.php');
	$nama_lengkap = ucfirst($_POST['nama_penerima']);
	$jk = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tahunLahir'].'/'.$_POST['bulanLahir'].'/'.$_POST['tglLahir'];
	$alamat_lengkap = $_POST['alamat_penerima'];
	$provinsi = $_POST['provinsi'];
	$kota = $_POST['kota'];
	$kecamatan = $_POST['kecamatan'];
	$kelurahan = $_POST['kelurahan'];
	$tel_rumah = $_POST['tel_rumah'];
	$tel_handphone = $_POST['tel_handphone'];
	$password = enkripPassword($_POST['txtPassword']);	
	$id_customer = strtoupper(substr($nama_lengkap,0,3)).substr(($_POST['tglLahir'].$_POST['bulanLahir']),0,3);
	$email = $_POST['email'];
	$waktu = date("Y-m-d h:i:s");
	$captcha = $_POST['recaptcha'];
	if(isset($_COOKIE['sponsor'])){
		$referal = $_COOKIE['sponsor'];
	}else{
		$referal = $_POST['kode_referal'];		
	}
//	$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
//	$secret_key = '6LdZWR8TAAAAAC4KGOv6xcdChXHi8W3ntOeY4tzA'; 
	
	if(empty($captcha)){
			echo '		
				<div class="alert alert-warning" role="alert" align="center">
					<b>Silahkan isi captcha terlebih dahulu.</b>
				  </div>
			';		
	}else{
//		$request_captcha = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secret_key).'&response='.$captcha;   
//		$recaptcha = file_get_contents($request_captcha);
//		$recaptcha = json_decode($recaptcha, true);
//		if ($recaptcha['success']) {
		$cek = $mysqli->query("select * from tbl_customeralamat where tel_handphone='$tel_handphone'");
		if($cek->num_rows ==0){
			$cek = $mysqli->query("select * from tbl_customer where email='$email'");
			if($cek->num_rows ==0){
				$cek = $mysqli->query("select * from tbl_customer where id_customer='$referal'");
				if($cek->num_rows ==0){
					$referal = "ABD250";
				}
				$cek = $mysqli->query("select * from tbl_customer where substr(id_customer,1,6)='$id_customer'");
				if($cek->num_rows > 0){
					$id_customer = $id_customer.''.$cek->num_rows;
				}
				$stmt = $mysqli->query("INSERT INTO tbl_customer VALUES(
					'".$id_customer."',	
					'".$nama_lengkap."',
					'".$jk."',
					'".$tempat_lahir."',
					'".$tgl_lahir."',
					'".$email."',
					'".$password."',
					'',
					'',
					'".$waktu."',
					'".$referal."',
					3,
					0
					)");
				if($stmt){
						$_POST['id_customer'] = $id_customer;
						$_POST['nama_alamat'] = "Alamat Saya";				
					sendSMS("register",$id_customer,$tel_handphone);
					$pesan = "
					<p style='text-align:justify;'>
						Selamat bergabung bersama Oreli, ".$nama_lengkap." 
						<br><br>
						Mulai sekarang, anda dapat membuat grup dengan mensponsori calon member lain untuk bergabung dan kembangkan bisnis anda dengan dengan mengajak calon member bergabung ke dalam grup anda dan kumpulkan poin sebanyak-banyaknya untuk mendapatkan bonus bulanan berupa uang tunai dan bonus tahunan berupa uang tunai, logam mulai bahkan Mobil!
						Kode member anda adalah <b>".$id_customer."</b>. 
						<br><br>
						Gunakan link http://www.oreli.co.id/".$id_customer." untuk mempromosikan dan mengajak calon member lain bergabung ke dalam grup anda. Sebarkanlah link tersebut, dan jangan pernah berhenti menyebarkan agar anda mendapatkan member dalam grup sebanyak-banyaknya. 
						<br><br>
						Sebagai member, anda mendapatkan fasilitas diskon 20% untuk setiap pembelian produk. Anda juga dapat menjadi agen dengan mendapatkan fasilitas diskon 30% dan menjadi toko offline resmi Oreli dengan mengajukan permohonan dan harus memenuhi syarat dan ketentuan yang berlaku.
						 Anda juga dapat memberikan  kode member kepada non member agar dapat menikmati diskon member dan anda akan mendapat poin sponsor atas pembelian non member tersebut. 
						Kumpulkan poin sebanyak-banyaknya pasti dapat hadiahnya! raihlah sukses bersama kami!
						<br><br>
						Salam Sukses.			
					</p>
					";
					$to       = $email;
					$subject  = 'Selamat Datang di oreli.co.id';
					$message  = $pesan;
					smtp_mail($to, $subject, $message, '', '', 0, 0, false);
					echo '		
						<div class="alert alert-success" role="alert" align="center">
							<b>Pendaftaran berhasil, silahkan cek email anda untuk melakukan login.</b>
						  </div>
					';
					alamatTambah();		
					if($referal != NULL){				
						$notif =$mysqli->query("SELECT nama_lengkap,email FROM tbl_customer WHERE id_customer='$referal'");
						$data = $notif->fetch_array();
						$nama = $data['nama_lengkap'];
						$email = $data['email'];
						$tgl_sekarang = date('l, d-m-Y');
						$pesan = "
						<p style='text-align:justify;'>
							Selamat, anda telah menjadi Upline dari $nama yang terdaftar pada tanggal $tgl_sekarang, 
							silahkan cek pada menu Downline di halaman member<br><br>
							Salam Sukses.			
						</p>
						";
						$to       = $email;
						$subject  = 'Selamat Downline Anda Bertambah di oreli.co.id';
						$message  = $pesan;
						smtp_mail($to, $subject, $message, '', '', 0, 0, false);
					}else{
					}
				}else{
					echo '		
						<div class="alert alert-danger" role="alert" align="center">
							<b>Pendaftaran gagal, silahkan coba beberapa saat lagi.</b>
						  </div>
					';
				}
			}else{
				echo '		
					<div class="alert alert-warning" role="alert" align="center">
						<b>Email sudah terdaftar.</b>
					  </div>
				';					
			}
		}else{
			echo '		
				<div class="alert alert-warning" role="alert" align="center">
					<b>Nomor handphone sudah terdaftar.</b>
				  </div>
			';					
		}
	}
}
function customerDelete(){
	if(isset($_GET['del_cus'])){
		global $mysqli;
		$id_customer = $_GET['del_cus'];
		$stmt = $mysqli->prepare("DELETE tbl_customer WHERE id_customer='?')");
		$stmt->bind_param('s',$id_customer); 
		$stmt->execute(); 
		$stmt->close();
	}
}
function produkInsert(){
	$stmt = $mysqli->prepare("INSERT INTO tbl_produk(id_kategori,id_sub,nama_produk,jenis_produk,harga,stok,deskripsi) VALUES (?, ?, ?, ?, ?,?, ?)");
	$stmt->bind_param('iisiiis', 
	$_POST['id_kategori'], 
	$_POST['id_sub'],
	$_POST['nama_produk'],
	$_POST['jenis_produk'],
	$_POST['harga'],
	$_POST['stok'],
	$_POST['deskripsi']);
	$stmt->execute(); 
	$stmt->close();
}
function produkDelete(){
	global $con;
	if(isset($_GET['del_pro'])){
		$kode_produk = $_GET['del_pro'];
		$del_pro = "DELETE tbl_produk WHERE kode_produk='$kode_produk')";
		$run_pro = mysqli_query($con,$del_pro);		
		$del_var = "DELETE tbl_produkstok WHERE kode_produk='$id_pro')";
		$run_var = mysqli_query($con,$del_var);		
	}
}
function kategoriInsert(){
	global $con;
	$nama_kategori = $_POST['nama_kategori'];
	$insert_kat = "INSERT INTO tbl_kategori values( ,'$nama_produk')";
	$run_kat = mysqli_query($con,$insert_kat);
}
function kategoriDelete(){
	global $con;
	if(isset($_GET['del_kat'])){
		$id_kategori = $_GET['del_kat'];
		$del_pro = "DELETE tbl_produk WHERE id_kategori='$id_kategori')";
		$run_pro = mysqli_query($con,$del_pro);
		$del_sub = "DELETE tbl_subkategori WHERE id_kategori='$id_kategori')";
		$run_sub = mysqli_query($con,$del_sub);		
		$del_kat = "DELETE tbl_kategori WHERE id_kategori='$id_kategori')";
		$run_kat = mysqli_query($con,$del_kat);		
	}
}
function subInsert(){
	global $con;
	$id_kategori = $_POST['id_kategori'];
	$nama_sub = $_POST['nama_sub'];
	$insert_sub = "INSERT INTO tbl_subkategori values( ,$id_kategori,'$nama_produk')";
	$run_sub = mysqli_query($con,$insert_sub);
}
function subDelete(){
	global $con;
	if(isset($_GET['del_sub'])){
		$id_sub = $_GET['del_sub'];
		$del_sub = "DELETE tbl_subkategori WHERE id_subKategori='$id_sub')";
		$run_sub = mysqli_query($con,$del_sub);		
	}
}
function variabelInsert(){
	global $con;
	$kode_produk = $_POST['kode_produk'];
	$ukuran = $_POST['ukuran'];
	$warna = $_POST['warna'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$insert_var = "INSERT INTO tbl_produkstok values( ,$kode_produk,'$ukuran','$warna',$harga,$stok,'$deskripsi')";
	$run_var = mysqli_query($con,$insert_var);
}
function variabelDelete(){
	global $con;
	if(isset($_GET['del_var'])){
		$id_var = $_GET['del_var'];
		$del_var = "DELETE tbl_produkstok WHERE id_produkstok='$id_var')";
		$run_var = mysqli_query($con,$del_var);		
	}
}
function verifikasiInsert(){
	global $con;
	$id_customer = $_POST['id_customer'];
	$tipe_verifikasi = $_POST['tipe_verifikasi'];
	$kode_verifikasi = $_POST['kode_verifikasi'];
	$dibuat = $_POST['dibuat'];
	$berakhir = $_POST['berakhir'];
	$status = "belum";
	$insert_ver = "INSERT INTO tbl_verifikasi values( ,$id_customer,'$tipe_verifikasi','$kode_verifikasi','$dibuat','$berakhir','$status')";
	$run_ver = mysqli_query($con,$insert_ver);
}
function verifikasiUpdate(){
	global $con;
	if(isset($_GET['up_ver'])){
		$kode_verifikasi = $_GET['up_ver'];
		$tipe_verifikasi = $_GET['tipe_verifikasi'];
		$status = "sudah";
		$update_ver = "UPDATE tbl_verifikasi SET tipe_verifikasi='$tipe_verifikasi',status='$status' WHERE kode_verifikasi='$kode_verifikasi'";
		$run_ver = mysqli_query($con,$update_ver);
		
	}
}
function verifikasiDelete(){
	global $con;
	if(isset($_GET['del_ver'])){
		$id_verifikasi = $_GET['del_ver'];
		$de_ver = "DELETE tbl_verifikasi WHERE id_verifikasi='$id_verifikasi'";
		$run_ver = mysqli_query($con,$del_ver);
	}
}

function runUkuran(){
	global $mysqli;
	if(isset($_GET['produk']) OR isset($_SESSION['produk_ukuran'])){
		if(isset($_SESSION['produk_ukuran'])){
			$nama_produk = $_SESSION['nama_produk'];
			$warna_produk = $_SESSION['produk_ukuran'];			
		}else{
			$url = explode('/',$_GET['produk']);
			$nama_produk = $url[0];
			$_SESSION['nama_produk'] = $nama_produk;
			$warna_produk = "default";
			if(count($url) == 2){
				$warna_produk = $url[1];			
			}
		}
		$get_kode = $mysqli->prepare("SELECT kode_produk FROM tbl_produk WHERE nama_produk=?");
		$param = str_replace('_',' ',$nama_produk);
		$get_kode->bind_param("s",$param);
		$get_kode->execute();
		$get_kode->bind_result($kode_produk);
		$get_kode->fetch();
		$get_kode->close();
		if(!isset($_POST['warna'])){
				$warna_produk = str_replace("_"," ",$warna_produk);
				$get_det_ukuran = $mysqli->prepare("SELECT ukuran,sum(stok) as stok  FROM tbl_produkstok WHERE kode_produk=? AND (SELECT warna FROM tbl_produkwarna WHERE tbl_produkwarna.id_produkwarna = tbl_produkstok.id_produkwarna)=? group by ukuran order by id_produkstok");
				$get_det_ukuran->bind_param("ss", $kode_produk,$warna_produk);
				$get_det_ukuran->execute();
				$get_det_ukuran->bind_result($ukur,$stok);
				$i=10;
				echo "<ul class='options-swatch options-swatch--size options-swatch--lg ukuran' >";
					while($get_det_ukuran->fetch()){						
						if($ukur == "ALLSIZE"){
							$ukuran = " ALL SIZE ";
						}else{
							$ukuran = $ukur;						
						}
						if($stok > 0){
						echo "
							<li style='width:auto;margin-right:5px;'>
								<input id='radio".$i."'  class='ukuran' type='radio' name='ukuran' value='$ukur' onClick='stok($stok)' checked>
								<label for='radio".$i."' >
									<span style='background-color:white;width:30px;font-size:12px;text-align:center'>
									$ukuran
									</span>
								</label>
							</li>
							";
						}else{
						echo "
							<li style='width:auto;margin-right:5px;'>
								<input id='radio".$i."'  class='ukuran' type='radio' name='ukuran' value='$ukur' disabled>
								<label for='radio".$i."' >
									<span style='background-color:gray;width:30px;font-size:12px;text-align:center'>
									$ukuran
									</span>
								</label>
							</li>
							";
						}
						$i++;
					}
				$get_det_ukuran->close();
		}
	}
}
 
function runWarna(){
	global $mysqli;
	if(isset($_GET['produk']) OR isset($_SESSION['produk_warna'])){
		if(isset($_SESSION['produk_warna'])){
			$url = explode('/',$_SESSION['produk_warna']);		
		}else{
			$url = explode('/',$_GET['produk']);		
		}
		$nama_produk = $url[0];
		$warna_produk = "default";
		if(count($url) == 2){
			$warna_produk = $url[1];			
		}
		echo '
		<label class="text-uppercase teks-bold" style="font-size:15px;">Color :</label>
		<label id="colorStat">'.str_replace("_"," ",$warna_produk).'</label>';
		$get_kode = $mysqli->prepare("SELECT kode_produk FROM tbl_produk WHERE nama_produk=?");
		$param = str_replace('_',' ',$nama_produk);
		$get_kode->bind_param("s",$param);
		$get_kode->execute();
		$get_kode->bind_result($kode_produk);
		$get_kode->fetch();
		$get_kode->close();
		$get_warna = $mysqli->query("SELECT id_produkwarna,sum(stok) as stok  FROM tbl_produkstok WHERE kode_produk='".$kode_produk."' GROUP BY id_produkwarna");
		$i=0;
		echo"<br>";
		echo "<ul id='smallGallery' class='options-swatch options-swatch--size options-swatch--lg ukuran' >";
		while($a = $get_warna->fetch_assoc()){
			$warna = getProdukWarna($a['id_produkwarna']);
			$stok = $a['stok'];
			$stmt = $mysqli->query("select kode_produk,id_image from tbl_produkimage where kode_produk='".$kode_produk."' AND warna='".$warna."'");
			$row = $stmt->fetch_assoc();
			$id_image = $row['id_image'];
			$src = getLink()."/images/products/".str_replace('.','',$kode_produk)."-".$warna."-".$id_image;
			$potongan = getLink()."/images/products/".str_replace('.','',$kode_produk)."-".$warna."-potongan";
			$ext = "jpg";
			if($stok >= 0){
			if($warna_produk == str_replace(" ","_",$warna)){
			?>
				<li style="width:4em;height:4em;">
					<input id="radio<?php echo str_replace(" ","_",$warna);?>"  type='radio' name='warna' value='<?php echo $warna; ?>' checked>
					<label for="radio<?php echo str_replace(" ","_",$warna);?>" >
						<a href='#' onClick=setProdukImage('<?php echo str_replace(".","",$kode_produk)."','".str_replace(" ","_",$warna)."','".$_SESSION['smallImage'];?>') data-image="<?php echo $src.'.'.$ext;?>" data-zoom-image="<?php echo $src.'.'.$ext;?>">
						<span id="span<?php echo str_replace(" ","_",$warna);?>" style="background: url('<?php echo $potongan.'.'.$ext;?>');background-size:cover;width:4em;height:4em;">
						</span>
						</a>
					</label>
				</li>
			<?php	
				}else{
			?>
				<li style="width:4em;height:4em;">
					<input id="radio<?php echo str_replace(" ","_",$warna);?>"  type='radio' name='warna' value='<?php echo $warna; ?>'>
					<label for="radio<?php echo str_replace(" ","_",$warna);?>" >
						<a href='#' onClick=setProdukImage('<?php echo str_replace(".","",$kode_produk)."','".str_replace(" ","_",$warna)."','".$_SESSION['smallImage'];?>') data-image="<?php echo $src.'.'.$ext;?>" data-zoom-image="<?php echo $src.'.'.$ext;?>">
						<span id="span<?php echo str_replace(" ","_",$warna);?>" style="background: url('<?php echo $potongan.'.'.$ext;?>');background-size:cover;width:4em;height:4em;">
						</span>
						</a>
					</label>
				</li>
			<?php	
				}
			}else{
			?>
				<li style="width:4em;height:4em;">
					<input id="radio<?php echo str_replace(" ","_",$warna);?>"  type='radio' name='warna' value='<?php echo $warna; ?>' disabled>
					<label for="radio<?php echo str_replace(" ","_",$warna);?>" >
						<span id="span<?php echo str_replace(" ","_",$warna);?>" style="background: url('<?php echo $potongan.'.'.$ext;?>');background-size:cover;width:4em;height:4em;">
						</span>
					</label>
				</li>
			<?php	
				}
			$i++;
		}
		echo "</ul>";
		$get_warna->close();
	}
}
function produkDetailDeskripsi(){
	global $mysqli;
	$url = explode('/',$_GET['produk']);
	$nama_produk = str_replace('_',' ',$url[0]);
	$warna_produk = "default";
	if(count($url) == 2){
		$warna_produk = $url[1];			
	}
	$stmt = $mysqli->prepare("select kode_produk,deskripsi,deskripsi2 from tbl_produk where nama_produk='$nama_produk'");
	$stmt->execute();
	$stmt->bind_result($kode_produk,$deskripsi,$deskripsi2);
	$stmt->fetch();
	$stmt->close();
	printf('
		<div class="row">
		<div class="col-md-5 col-xs-11 panel" style="text-align:justify;">
			<h5 class="text-uppercase teks-bold">Deskripsi :</h5>
            <div class="divider divider--xs"></div>
			%s
		</div>
		<div class="col-md-5 col-md-offset-1 col-xs-11 panel"">
			<h5 class="text-uppercase teks-bold">Material :</h5>
            <div class="divider divider--xs"></div>
            %s
		</div>
		</div>
	',$deskripsi,$deskripsi2);
}

function getProdukReview($kode_produk){
	global $mysqli;
	$stmt = $mysqli->query("SELECT * FROM tbl_produkreview WHERE id_produk = '$kode_produk' AND status='terima'");
	if($stmt->num_rows > 0){
		while($row = $stmt->fetch_array()){
			echo "
				<blockquote>
					<p class='text-uppercase'>$row[nickname]</p>
					<footer>
						$row[review]
					</footer>
				</blockquote>		
			";
		}
	}else{
			echo "<p>Belum ada review mengenai produk ini.</p>";		
	}
	$stmt->close();
}
function getProdukRating($kode_produk,$kategori){
	global $mysqli;
	$i=0;
	$jum_data=1;
	if($kategori == "all"){
		echo '
		<div class="rating product-info__rating pull-right" style="padding-bottom:0px;margin: 0 10px 0 0;font-size:1.2em; ">
				<font color="#FF9800">';
	}else{
		echo '
		<div class="rating product-info__rating" style="padding-bottom:0px;margin: 0 10px 0 0;font-size:1.2em; ">
				<font color="#FF9800">';
	}
	$stmt = $mysqli->query("SELECT COUNT(id_produk) as jum,SUM(quality) as  quality,SUM(price) as  price,SUM(value) as  value FROM tbl_produkreview WHERE id_produk='$kode_produk'"); 
	if($stmt->num_rows > 1){
			
		$row = $stmt->fetch_assoc();
		$jum_data = $row['jum'];
		$jum_quality = $row['quality'];
		$jum_price = $row['price'];
		$jum_value = $row['value'];	
		$stmt->close();
			$jum_quality = $jum_quality/$jum_data;
			$jum_price = $jum_quality/$jum_data;
			$jum_value = $jum_value/$jum_data;
		if($kategori == "quality"){
			$jum = $jum_quality;
		}else if($kategori == "price"){
			$jum = $jum_price;
		}else if($kategori == "value"){
			$jum = $jum_value;
		}else if($kategori == "all"){
			$jum = ($jum_value+$jum_price+$jum_quality)/3;
		}
		while($i<$jum){
			echo'<span class="icon-star-fill">';		
			$i++;
		}
	}
	$j = 6-$i;
	while($j>1){
		echo'<span class="icon-star">';		
		$j--;
	}
	echo'</font></div>';	 
}

function getSizingGuide(){
	global $mysqli;
	$url = explode('/',$_GET['produk']);
	$nama_produk = str_replace('_',' ',$url[0]);
	$stmt = $mysqli->prepare("select kode_produk from tbl_produk where nama_produk='$nama_produk'");
	$stmt->execute();
	$stmt->bind_result($kode_produk);
	$stmt->fetch();
	$stmt->close();
	if(getProdukGender($kode_produk) == "men"){
		include_once('SizeGuideMan.php'); 			
	}else if(getProdukGender($kode_produk) == "women"){
		include_once('SizeGuideWoman.php'); 			
	}
}
function produkDetail(){
	global $mysqli;
	if(isset($_SESSION['produk_warna'])){
		$url = explode('/',$_SESSION['produk_warna']);		
	}else{
		$url = explode('/',$_GET['produk']);		
	}
	$nama_produk = str_replace('_',' ',$url[0]);
	$warna_produk = "default";
	if(count($url) == 2){
		$warna_produk = str_replace("_"," ",$url[1]);			
	}
	$stmt = $mysqli->prepare("select tbl_produk.kode_produk,tbl_produk.harga,tbl_produk.harga_diskon,tbl_produk.berlaku,tbl_produk.sampai,tbl_produk.poin_downline,tbl_produk.poin_upline from tbl_produk where tbl_produk.nama_produk='$nama_produk'");
	$stmt->execute();
	$stmt->bind_result($kode_produk,$harga,$harga_diskon,$berlaku,$sampai,$poin_downline,$poin_upline);
	$stmt->fetch();
	$stmt->close();
	$_SESSION['produk_kode'] = $kode_produk;
	$stmt = $mysqli->prepare("select sum(stok) as jumstok,sum(stok) as stok ,ukuran,id_produkwarna from tbl_produkstok where kode_produk='$kode_produk'");
	$stmt->execute();
	$stmt->bind_result($jumstok,$max,$ukuran,$warna);
	$stmt->fetch();
	$stmt->close();
	$harga_tambah = getProdukHargaTambahan($kode_produk,$warna_produk);
	$stmt2 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk' ORDER BY id_image ASC");		
	$jum_image = $stmt2->num_rows;
	$i=0;
	echo '
		<input type="hidden" name="kode_produk" id="kode_produk" value='.$kode_produk.' />
		<div class="col-sm-1 col-md-2 hidden-xs" >
            <div class="" id="smallImage" style="padding : 0px;width:100px;">
              <ul id="smallGallery" style="padding:10px;list-style: none;">
    ';
	$image_main = "";
	if($stmt2->num_rows > 0){
		while($row = $stmt2->fetch_array()){
			$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'];
			$ext = "jpg";
			$_SESSION['warna['.$i.']'] =str_replace(" ","_",$row['warna']);
			$_SESSION['id_image['.$i.']'] ="-".$row['id_image'];
			if($image_main == "" AND $row['warna'] == $warna_produk){
				$image_main = $src.".".$ext;
			}
			if($row['warna'] == $warna_produk){
				echo '
					<li style="display:block;margin-bottom: 10px;" id="'.str_replace(" ","_",$row['warna'])."-".$row["id_image"].'" name="'.$i.'"><a href="#" data-image="'.$src.".".$ext.'" data-zoom-image="'.$src.".".$ext.'"><img src="'.$src.".".$ext.'" alt="" width="100%" /></a></li>
				';				
			}else{
				echo '
					<li style="display:none;margin-bottom: 10px;" id="'.str_replace(" ","_",$row['warna'])."-".$row["id_image"].'" name="'.$i.'"><a href="#" data-image="'.$src.".".$ext.'" data-zoom-image="'.$src.".".$ext.'"><img src="'.$src.".".$ext.'" alt="" width="100%" /></a></li>
				';				
			}
			$i++;
		}
	}
	$_SESSION['smallImage'] = $i;
	$stmt2->close();
	echo'
              </ul>
            </div>
        </div>
		<div class="col-sm-4 col-md-6 hidden-xs" >
            <div class="product-main-image">
              <div class="product-main-image__item">
				<img id="main_image" class="product-zoom" src="'.$image_main.'" data-zoom-image="'.$image_main.'"/></div>
            </div>
          </div>
          <div class="product-info col-sm-8 col-md-4 teks-bold">';

	if($jumstok != 0){
		$status = "TERSEDIA";
        echo '
		<div class="product-info__sku tek">SKU: '.str_replace('.','',$kode_produk).' &nbsp;&nbsp;<span class="label label-success">'.$status.'</span>
		</div>';
	}else{
		$status = "TIDAK TERSEDIA";
        echo '<div class="product-info__sku">SKU: '.str_replace('.','',$kode_produk).' &nbsp;&nbsp;<span class="label label-danger">'.$status.'</span>
		</div>';
	}
echo'
          </div>
          <div class="product-info col-sm-8 col-md-4 teks-bold">
			<div class="product-info__title text-uppercase teks-bold" style="margin: 10px 0 -20px 0;">
              <h4 class="visible-xs" style="font-family: Menu Font;text-align:left;">'.$nama_produk.'</h4>
              <h3 class="hidden-xs" style="font-family: Menu Font;">'.$nama_produk.'</h3>
            </div>
          </div>
          <div class="product-info col-sm-8 col-md-4 teks-bold">
			';
	$tgl_sekarang = strtotime(date('Y-m-d'));
	$tgl_berlaku = strtotime($berlaku);
	$tgl_sampai = strtotime($sampai);
	if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
		$_SESSION['produk_harga'] = $harga_diskon;
		$hrg_produk = $harga+$harga_tambah;
		echo'
					<div class="price-box product-info__price" style="margin-top: -5px;font-size:18px;">
						<span class="price-box__old" style="color: #EA1B2A;font-weight:normal;">Rp'.setHarga($hrg_produk).'</span>
						<span class="price-box__new" id="produkHarga" style="font-weight:normal;">'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> 
						'.getProdukRating($kode_produk,"all").'
					</div>
		';
	}else{
		$_SESSION['produk_harga'] = $harga;
		$hrg_produk = $harga+$harga_tambah;
		echo'
					<div class="price-box product-info__price" style="margin-top: -5px;font-size:18px;">
						<span class="price-box__old" style="color: #EA1B2A;font-weight:normal;">Rp'.setHarga($hrg_produk).'</span>
						<span class="price-box__new" id="produkHarga" style="font-weight:normal;">'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> 
						'.getProdukRating($kode_produk,"all").'
					</div>
		';		
	}
echo'				
			<ul id="singleGallery" class="visible-xs">
';
	if(count($url) == 2){
		$image_mobile = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk' AND warna='$warna_produk' ORDER BY id_image ASC");
	}else{
		$image_mobile = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk' ORDER BY id_image ASC");		
	}
	$j=0;
	while($data = $image_mobile->fetch_array()){
		$src = getLink()."/images/products/".$data['kode'].'-'.$data['warna'].'-'.$data['id_image'];
		$ext = "jpg";
		echo '<li ><img id="mobile_image'.$j.'" src="'.$src.'.'.$ext.'" alt=""/></li>	';
		$j++;
	}
//		echo '<li><img id="mobile_image'.$j.'" src="'.$src.'.'.$ext.'" alt=""/></li>	';
	$image_mobile->close();
echo'       </ul>
';
echo'
            <div class="product-info__description">
				<div class="row">
					<div class="col-md-5 col-xs-5">
						<img src="'.getLink().'/images/poinPribadi.png" width=30px; /><span id="produkPP"> '.$poin_downline.' </span>poin 
					</div>
					<div class="col-md-5 col-xs-5">
						<img src="'.getLink().'/images/poinSponsor.png" width=30px;/><span id="produkPS"> '.$poin_upline.' </span>poin
					</div>
				</div>
			</div>
            <div class="product-info__description">
				<div class="row">
					<div class="col-xs-12" >
						<div class="col-xs-10" style="margin-top:15px;padding:5px 0px 0px 0px;">
							<div id="warnaProduk">
		';
							runWarna();
		echo'
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="col-xs-12" style="border:1px solid #e5e5e5; margin-top:15px;padding:5px 0px 0px 0px;border-radius:3px;">
				<div class="col-xs-12" >
					<label class="text-uppercase teks-bold" style="font-size:15px;">Pilih Ukuran:</label>
					<div id="ukuran">
';
					runUkuran();
echo'
					</div>
				</div>
            </div>
            <div class="divider divider--sm"></div>
            <label class="text-uppercase teks-bold" style="font-size:15px;">Quantity:</label>
            <div class="outer">
              <div class="input-group-qty pull-left"> <span class="pull-left"> </span>
                <input type="text" name="qty" id="qty" class="input-number input--wd input-qty pull-left" value="1" min="1" max="'.$max.'">
                <span class="pull-left btn-number-container">
                <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>
                <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus" data-field="quant[1]"> &#8211; </button>
                </span> </div>
              <div class="pull-left">
		';
		if(isset($_SESSION['lang'])){
			$lang = $_SESSION['lang'];
			if($lang == "en"){
				?>
					<a href="#"><img style="width:120px;" name="btn-to-cart" id="btn-to-cart" onmouseout="socialHoverOut('btn-to-cart','<?php echo getLink()."/images/buy.png"; ?>')" onmouseover=socialHover('btn-to-cart','<?php echo getLink()."/images/buy-hover.png"; ?>') src="<?php echo getLink()."/images/buy.png"; ?>"></img></a>
				<?php 
			}else if($lang == "id"){
				?>
					<a href="#"><img style="width:120px;" name="btn-to-cart" id="btn-to-cart" onmouseout="socialHoverOut('btn-to-cart','<?php echo getLink()."/images/beli.png"; ?>')" onmouseover=socialHover('btn-to-cart','<?php echo getLink()."/images/beli-hover.png"; ?>') src="<?php echo getLink()."/images/beli.png"; ?>"></img></a>
				<?php 
			}
		}else{
			?>
				<a href="#"><img style="width:120px;" name="btn-to-cart" id="btn-to-cart" onmouseout="socialHoverOut('btn-to-cart','<?php echo getLink()."/images/beli.png"; ?>')" onmouseover=socialHover('btn-to-cart','<?php echo getLink()."/images/beli-hover.png"; ?>') src="<?php echo getLink()."/images/beli.png"; ?>"></img></a>
			<?php 
		}
		echo' </div>
            </div>
            <div class="divider divider--xs"></div>
            <ul class="product-links product-links--inline">
				<li><a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist"><span class="icon icon-favorite" ></span>Add to wishlist</a>
            </ul>
          </div>
		  
	';
	
}
function getProdukKategori(){
	global $mysqli;
	if(isset($_GET['slug'])){		
		$url = explode('-',$_GET['slug']);
		$kategori = str_replace('_',' ',$url[0]);
		$sql = "select keterangan from tbl_kategori where nama_kategori='".$kategori."'";
		$stmt3 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
		$stmt3->execute();
		$stmt3->bind_result($deskripsi);
		$stmt3->store_result();
		$nums = $stmt3->num_rows();
		$stmt3->fetch();
		$stmt3->close();
	}else{
		
	}
		$kategori = "LIST PRODUCT";
		$deskripsi = "Daftar produk yang ada di website kami untuk pria dan wanita";
		printf('
			<h2 class="category-outer__text__title text-uppercase">%s</h2>
			<p>%s</p>
		',$kategori,$deskripsi);				
}

function produkFilteRprice($produk_gender,$produk_slug){
	global $mysqli;
	
	if($produk_gender == "ALL" AND $produk_slug == "ALL"){
		$sql = "SELECT count(kode_produk) as jum FROM tbl_produk WHERE publish=1";
	}else if($produk_gender != "ALL" AND $produk_slug == "ALL"){
		$slug = str_replace('_',' ',$produk_gender);
		if($slug == "men"){
			$gen = 1;
		}else if($slug == "women"){
			$gen = 2;
		}
		$sql = "SELECT count(kode_produk) as jum FROM tbl_produk WHERE publish=1 AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3)";
	}else if($produk_gender != "ALL" AND $produk_slug != "ALL"){
		$gender = str_replace("_"," ",$produk_gender);
		$slug = str_replace('_',' ',$produk_slug);
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}
			$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori = 'jenis_produk'");	
			$i = 1;
			while($row = $stmt->fetch_assoc()){
				if($slug == $row['nama_kategori']){
					break;
				}
				$i++;
			}
			$stmt->close();
			$sql = "SELECT count(kode_produk) as jum FROM tbl_produk WHERE publish=1 AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3) AND replace(substr(tbl_produk.kode_produk,5,2),'.','')=$i";
	}
	$stmt = $mysqli->query($sql." AND harga < 100000");
	$row = $stmt->fetch_assoc();	$jum1 = $row['jum'];	$stmt->close();
	$stmt = $mysqli->query($sql." AND harga BETWEEN 100000 AND 200000");
	$row = $stmt->fetch_assoc();	$jum2 = $row['jum'];	$stmt->close();
	$stmt = $mysqli->query($sql." AND harga BETWEEN 200000 AND 300000");
	$row = $stmt->fetch_assoc();	$jum3 = $row['jum'];	$stmt->close();
	$stmt = $mysqli->query($sql." AND harga BETWEEN 300000 AND 400000");
	$row = $stmt->fetch_assoc();	$jum4 = $row['jum'];	$stmt->close();
	$stmt = $mysqli->query($sql." AND harga > 400000");
	$row = $stmt->fetch_assoc();	$jum5 = $row['jum'];	$stmt->close();
	echo'
			<li class="checkbox-group">
				<input type="checkbox" id="cboPrice1" onChange="filter_price(this.value)" name="cboPrice" value="1">
				<label for="cboPrice1"> <span class="check"></span> <span class="box"></span> 0 - 100.000  ('.$jum1.') </label>
			</li>
			<li class="checkbox-group">
				<input type="checkbox" id="cboPrice2" onChange="filter_price(this.value)" name="cboPrice" value="2">
				<label for="cboPrice2"> <span class="check"></span> <span class="box"></span> 100.000 - 200.000  ('.$jum2.') </label>
			</li>
			<li class="checkbox-group">
				<input type="checkbox" id="cboPrice3" onChange="filter_price(this.value)" name="cboPrice" value="3">
				<label for="cboPrice3"> <span class="check"></span> <span class="box"></span> 200.000 - 300.000  ('.$jum3.') </label>
			</li>
			<li class="checkbox-group">
				<input type="checkbox" id="cboPrice4" onChange="filter_price(this.value)" name="cboPrice" value="4">
				<label for="cboPrice4"> <span class="check"></span> <span class="box"></span> 300.000 - 400.000  ('.$jum4.') </label>
			</li>
			<li class="checkbox-group">
				<input type="checkbox" id="cboPrice5" onChange="filter_price(this.value)" name="cboPrice" value="5">
				<label for="cboPrice5"> <span class="check"></span> <span class="box"></span> > 400.000  ('.$jum5.') </label>
			</li>
		';
}
function produkFilterColor($produk_gender,$produk_slug){
	global $mysqli;
	if($produk_gender == "ALL" AND $produk_slug == "ALL"){
		$sql = "select kode_produk from tbl_produkstok WHERE";
	}else if($produk_gender != "ALL" AND $produk_slug == "ALL"){
		$slug = str_replace('_',' ',$produk_gender);
		if($slug == "men"){
			$gen = 1;
		}else if($slug == "women"){
			$gen = 2;
		}
		$sql = "select kode_produk from tbl_produkstok WHERE (replace(substr(kode_produk,3,2),'.','')=$gen OR replace(substr(kode_produk,3,2),'.','')=3) AND";
	}else if($produk_gender != "ALL" AND $produk_slug != "ALL"){
		$gender = str_replace("_"," ",$produk_gender);
		$slug = str_replace('_',' ',$produk_slug);
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}
			$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori = 'jenis_produk'");	
			$i = 1;
			while($row = $stmt->fetch_assoc()){
				if($slug == $row['nama_kategori']){
					break;
				}
				$i++;
			}
			$stmt->close();
			$sql = "select kode_produk from tbl_produkstok WHERE (replace(substr(kode_produk,3,2),'.','')=$gen OR replace(substr(kode_produk,3,2),'.','')=3) AND replace(substr(kode_produk,5,2),'.','')=$i AND";
	}
	
	$i=0;
	$warna = array("Red","Orange","Yellow","Green","Blue","Purple","Grey","Brown","Black","White");
	while($i < count($warna)){		
		echo'
			<li class="checkbox-group">
				<input type="checkbox" id="cboColor'.$i.'" onChange="filter_color('.$i.',this.value)" name="cboColor" value="'.$warna[$i].'">
				<label for="cboColor'.$i.'"> <span class="check"></span> <span class="box"></span> '.$warna[$i].'</label>
			</li>
		';
		$i++;
	}
}
function produkFilterSize($produk_gender,$produk_slug){
	global $mysqli;
	if($produk_gender == "ALL" AND $produk_slug == "ALL"){
		$sql = "select kode_produk from tbl_produkstok WHERE";
	}else if($produk_gender != "ALL" AND $produk_slug == "ALL"){
		$slug = str_replace('_',' ',$produk_gender);
		if($slug == "men"){
			$gen = 1;
		}else if($slug == "women"){
			$gen = 2;
		}
		$sql = "select kode_produk from tbl_produkstok WHERE (replace(substr(kode_produk,3,2),'.','')=$gen OR replace(substr(kode_produk,3,2),'.','')=3) AND";
	}else if($produk_gender != "ALL" AND $produk_slug != "ALL"){
		$gender = str_replace("_"," ",$produk_gender);
		$slug = str_replace('_',' ',$produk_slug);
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}
			$stmt = $mysqli->query("select nama_kategori from tbl_kategori where kategori = 'jenis_produk'");	
			$i = 1;
			while($row = $stmt->fetch_assoc()){
				if($slug == $row['nama_kategori']){
					break;
				}
				$i++;
			}
			$stmt->close();
			$sql = "select kode_produk from tbl_produkstok WHERE (replace(substr(kode_produk,3,2),'.','')=$gen OR replace(substr(kode_produk,3,2),'.','')=3) AND replace(substr(kode_produk,5,2),'.','')=$i AND";
	}
		
	$start = 0;
	$end = 5;
	$i=0;
	$stmt = $mysqli->query("select ukuran from tbl_produkstok group by ukuran LIMIT $start ,$end");
	$jum_row = $stmt->num_rows;
	$stmt->close();
	for($x=0;$x<=$jum_row;$x++){
		$stmt = $mysqli->query("select ukuran from tbl_produkstok group by ukuran LIMIT $start ,$end");
		echo "<div>";
		while($row = $stmt->fetch_assoc()){		
			$ukuran = $row['ukuran'];
			$stmt2 = $mysqli->query($sql." ukuran='$ukuran'");
			$jumlah = $stmt2->num_rows;
			$stmt2->close();
			echo'
				<li class="checkbox-group" style="margin-right:40px;">
					<input type="checkbox" id="cboSize'.$i.'" onChange="filter_size('.$i.',this.value)" name="cboSize" value="'.$ukuran.'">
					<label for="cboSize'.$i.'"> <span class="check"></span> <span class="box"></span> '.$ukuran.' </label>
				</li>
			';
			$i++;
		}
		echo "</div>";
		$stmt->close();
		$start = $start+$end;
	}
}
function produkFilterList(){
	if(!isset($_SESSION['filter_produk'])){
		echo "Filer masih kosong";
	}
	if(isset($_SESSION['filter_price'])){
	echo'<li>
			<a href="#" class="icon icon-clear"></a> Price: <strong>$0.00 - $10,000.00</strong>
		</li>';
	}
	if(isset($_SESSION['filter_color'])){
	echo'<li>
			<a href="#" class="icon icon-clear"></a> Color: <strong>DARKBLUE</strong>
		</li>';
	}
	if(isset($_SESSION['filter_size'])){
	echo'<li>
			<a href="#" class="icon icon-clear"></a> Size: <strong>ALLSIZE</strong>
		</li>';
	}
}
function produkCari($produk,$sort_order,$sort_by,$sort_limit,$start_page){
	global $mysqli;
	$produk = explode(" ",$produk);
	$cari="";
	if(isset($_SESSION['id_customer'])){
		$tipe = "AGEN";
		$diskon = getDiskonAgen();		
	}else{
		$tipe = "MEMBER";
		$diskon = getDiskonMember();				
	}
	$by = $sort_by;
	if($sort_order == "Nama Produk"){
		$order = "nama_produk";		
	}else if($sort_order == "Harga Kecil ke Besar"){
		$order = "harga";		
		$by = "ASC";
	}else if($sort_order == "Harga Besar ke Kecil"){
		$order = "harga";		
		$by = "DESC";
	}else{
		$order = "kode_produk";				
	}
	$limit = $sort_limit;
	$page = ($start_page - 1) * $limit;		
	if(isset($_SESSION['filter_price'])){
		$filter_price = $_SESSION['filter_price'];
	}else{
		$filter_price = "(tbl_produk.harga > 0)";		
	}
	if(isset($_SESSION['filter_color'])){
		$filter_color = $_SESSION['filter_color'];
	}else{
		$filter_color = "(tbl_produkwarna.warna != '-')";		
	}
	if(isset($_SESSION['filter_size'])){
		$filter_size = $_SESSION['filter_size'];
	}else{
		$filter_size = "(tbl_produkstok.ukuran != '-')";		
	}
	if(count($produk) == 1){
		$cari = "(lower(tbl_produk.nama_produk) LIKE '%".$produk[0]."' OR lower(tbl_produk.nama_produk) LIKE '".$produk[0]."%' OR lower(tbl_produk.nama_produk) LIKE '%".$produk[0]."%')";
	}else{	
		$cari = "(lower(tbl_produk.nama_produk) LIKE '%".$produk[0]."' OR lower(tbl_produk.nama_produk) LIKE '".$produk[0]."%' OR lower(tbl_produk.nama_produk) LIKE '%".$produk[0]."%')";
		for($i=1;$i<count($produk);$i++){
			$cari = $cari." AND (lower(tbl_produk.nama_produk) LIKE '%".$produk[$i]."' OR lower(tbl_produk.nama_produk) LIKE '".$produk[$i]."%' OR lower(tbl_produk.nama_produk) LIKE '%".$produk[$i]."%')";
		}
	}
		$stmt = $mysqli->query("SELECT 
			tbl_produk.kode_produk,
			tbl_produk.nama_produk,
			tbl_produk.harga,
			tbl_produk.harga_diskon,
			tbl_produk.berlaku,
			tbl_produk.sampai,
			tbl_produk.deskripsi 
				FROM tbl_produk,tbl_produkstok,tbl_produkwarna 
					WHERE ".$cari." AND tbl_produk.publish=1 AND tbl_produk.kode_produk=tbl_produkstok.kode_produk AND ".$filter_price." AND ".$filter_color." AND ".$filter_size." GROUP BY tbl_produk.kode_produk ORDER BY tbl_produk.".$order." ".$by." LIMIT ".$page.",".$limit." ");
	if($stmt->num_rows == 0){
		echo "<div style='width:100%;text-align:center;'><h4>Tidak ada produk yang cocok.</4></div>";
	}else{
		while($row = $stmt->fetch_assoc()){			
			$kode_produk = $row['kode_produk'];
			$nama_produk = $row['nama_produk'];
			$harga = $row['harga'];
			$harga_diskon = $row['harga_diskon'];
			$berlaku = $row['berlaku'];
			$sampai = $row['sampai'];
			$deskripsi = $row['deskripsi'];
			
			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok  from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."'  GROUP BY id_produkwarna";
			$stmt5 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt5->execute();
			$stmt5->bind_result($id_produkstok,$ukuran,$warna,$stok);
			$stmt5->store_result();
			$nums = $stmt5->num_rows();
			while($stmt5->fetch()){
				$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),getProdukWarna($warna));
				if($nums > 1 ){
					$variabel=$nums;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$kode = getProdukGender($kode_produk);
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel > 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
						';
						$tgl_sekarang = strtotime(date('Y-m-d'));
						$tgl_berlaku = strtotime($berlaku);
						$tgl_sampai = strtotime($sampai);
						if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
							$hrg_produk = $harga_diskon+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
						}else{
							$hrg_produk = $harga+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
						}
					echo'<div class="product-preview__info__description">
										  <p>'.$deskripsi.'.</p>
								</div>
								<div class="product-preview__info__link">
								<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
									<span class="icon icon-favorite"></span> &nbsp
									<span class="product-preview__info__link__text">Add to wishlist</span>
								</a>
								</div>
							  </div>
							</div>
						  </div>
						';
					$stmt3->close();      
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$kode = getProdukGender($kode_produk);
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel > 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
						';
						$tgl_sekarang = strtotime(date('Y-m-d'));
						$tgl_berlaku = strtotime($berlaku);
						$tgl_sampai = strtotime($sampai);
						if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
							$hrg_produk = $harga_diskon+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
						}else{
							$hrg_produk = $harga+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
						}
					echo'<div class="product-preview__info__description">
										  <p>'.$deskripsi.'.</p>
								</div>
								<div class="product-preview__info__link">
								<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
									<span class="icon icon-favorite"></span> &nbsp
									<span class="product-preview__info__link__text">Add to wishlist</span>
								</a>
								</div>
							  </div>
							</div>
						  </div>
						';
					$stmt3->close();      
				}
			}
		}
//		$stmt2->close();
	}
	$stmt->close();
}

function produkList($produk_gender,$produk_slug,$produk_style,$sort_order,$sort_by,$sort_limit,$start_page){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$tipe = "AGEN";
		$diskon = getDiskonAgen();		
	}else{
		$tipe = "MEMBER";
		$diskon = getDiskonMember();				
	}
	$by = $sort_by;
	if($sort_order == "Nama Produk"){
		$order = "nama_produk";		
	}else if($sort_order == "Harga Kecil ke Besar"){
		$order = "harga";		
		$by = "ASC";
	}else if($sort_order == "Harga Besar ke Kecil"){
		$order = "harga";		
		$by = "DESC";
	}else{
		$order = "kode_produk";				
	}
	$limit = $sort_limit;
	$page = ($start_page - 1) * $limit;		
	if(isset($_SESSION['filter_price'])){
		$filter_price = $_SESSION['filter_price'];
	}else{
		$filter_price = "(tbl_produk.harga > 0)";		
	}
	if(isset($_SESSION['filter_color'])){
		$filter_color = $_SESSION['filter_color'];
	}else{
		$filter_color = "(tbl_produkwarna.warna != '-')";		
	}
	if(isset($_SESSION['filter_size'])){
		$filter_size = $_SESSION['filter_size'];
	}else{
		$filter_size = "(tbl_produkstok.ukuran != '-')";		
	}
	if($produk_gender == "ALL"){
		$stmt2 = $mysqli->query("SELECT 
			tbl_produk.kode_produk,
			tbl_produk.nama_produk,
			tbl_produk.harga,
			tbl_produk.harga_diskon,
			tbl_produk.berlaku,
			tbl_produk.sampai,
			tbl_produk.deskripsi 
				FROM tbl_produk,tbl_produkstok,tbl_produkwarna 
					WHERE tbl_produk.publish=1 AND tbl_produk.kode_produk=tbl_produkstok.kode_produk AND ".$filter_price." AND ".$filter_color." AND ".$filter_size." GROUP BY tbl_produk.kode_produk ORDER BY tbl_produk.".$order." ".$by." LIMIT ".$page.",".$limit." ");
		while($row = $stmt2->fetch_assoc()){			
			$kode_produk = $row['kode_produk'];
			$nama_produk = $row['nama_produk'];
			$harga = $row['harga'];
			$harga_diskon = $row['harga_diskon'];
			$berlaku = $row['berlaku'];
			$sampai = $row['sampai'];
			$deskripsi = $row['deskripsi'];
			
			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok  from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."'  GROUP BY id_produkwarna";
			$stmt5 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt5->execute();
			$stmt5->bind_result($id_produkstok,$ukuran,$warna,$stok);
			$stmt5->store_result();
			$nums = $stmt5->num_rows();
			while($stmt5->fetch()){
				$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),getProdukWarna($warna));
				if($nums > 1 ){
					$variabel=$nums;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$kode = getProdukGender($kode_produk);
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel > 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
						';
						$tgl_sekarang = strtotime(date('Y-m-d'));
						$tgl_berlaku = strtotime($berlaku);
						$tgl_sampai = strtotime($sampai);
						if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
							$hrg_produk = $harga_diskon+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
						}else{
							$hrg_produk = $harga+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
						}
					echo'<div class="product-preview__info__description">
										  <p>'.$deskripsi.'.</p>
								</div>
								<div class="product-preview__info__link">
								<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
									<span class="icon icon-favorite"></span> &nbsp
									<span class="product-preview__info__link__text">Add to wishlist</span>
								</a>
								</div>
							  </div>
							</div>
						  </div>
						';
					$stmt3->close();      
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$kode = getProdukGender($kode_produk);
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel > 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
						';
						$tgl_sekarang = strtotime(date('Y-m-d'));
						$tgl_berlaku = strtotime($berlaku);
						$tgl_sampai = strtotime($sampai);
						if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
							$hrg_produk = $harga_diskon+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
						}else{
							$hrg_produk = $harga+$harga_tambah;
							echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
						}
					echo'<div class="product-preview__info__description">
										  <p>'.$deskripsi.'.</p>
								</div>
								<div class="product-preview__info__link">
								<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
									<span class="icon icon-favorite"></span> &nbsp
									<span class="product-preview__info__link__text">Add to wishlist</span>
								</a>
								</div>
							  </div>
							</div>
						  </div>
						';
					$stmt3->close();      
				}
			}
		}
		$stmt2->close();
	}else if($produk_gender != "ALL" AND $produk_slug == "ALL"){
		$slug = str_replace('_',' ',$produk_gender);
		if($slug == "men"){
			$gen = 1;
		}else if($slug == "women"){
			$gen = 2;
		}
		$stmt2 = $mysqli->query("SELECT 
			tbl_produk.kode_produk,
			tbl_produk.nama_produk,
			tbl_produk.harga,
			tbl_produk.harga_diskon,
			tbl_produk.berlaku,
			tbl_produk.sampai,
			tbl_produk.deskripsi 
				FROM tbl_produk,tbl_produkstok,tbl_produkwarna 
					WHERE tbl_produk.publish=1 AND tbl_produk.kode_produk=tbl_produkstok.kode_produk AND ".$filter_price." AND ".$filter_color." AND ".$filter_size." AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3) GROUP BY tbl_produk.kode_produk ORDER BY tbl_produk.".$order." ".$by." LIMIT ".$page.",".$limit." ");		
		while($row = $stmt2->fetch_assoc()){			
			$kode_produk = $row['kode_produk'];
			$nama_produk = $row['nama_produk'];
			$harga = $row['harga'];
			$harga_diskon = $row['harga_diskon'];
			$berlaku = $row['berlaku'];
			$sampai = $row['sampai'];
			$deskripsi = $row['deskripsi'];
			
			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."'  GROUP BY id_produkwarna";
			$stmt5 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt5->execute();
			$stmt5->bind_result($id_produkstok,$ukuran,$warna,$stok);
			$stmt5->store_result();
			$nums = $stmt5->num_rows();
			while($stmt5->fetch()){
				$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),getProdukWarna($warna));
				if($nums > 1 ){
					$variabel=$nums;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$kode = getProdukGender($kode_produk);
					if($kode == $slug OR $kode == "unisex"){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}
								   
							echo'        <div class="product-preview__info__description">
														  <p>'.$deskripsi.'.</p>
												</div>
												<div class="product-preview__info__link "">
													<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
													<span class="icon icon-favorite"></span> &nbsp
													<span class="product-preview__info__link__text">Add to wishlist</span>
												</a>
												</div>
											  </div>
											</div>
										  </div>
										';
					}
					$stmt3->close();      
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$kode = getProdukGender($kode_produk);
					if($kode == $slug OR $kode == "unisex"){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}
								   
							echo'        <div class="product-preview__info__description">
														  <p>'.$deskripsi.'.</p>
												</div>
												<div class="product-preview__info__link "">
													<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
													<span class="icon icon-favorite"></span> &nbsp
													<span class="product-preview__info__link__text">Add to wishlist</span>
												</a>
												</div>
											  </div>
											</div>
										  </div>
										';
					}
					$stmt3->close();      
				}
			}
			$stmt5->close();
		}
		$stmt2->close();
	}else if($produk_gender != "ALL" AND $produk_slug != "ALL" AND $produk_style == "ALL"){
		$gender = str_replace("_"," ",$produk_gender);
		$slug = str_replace('_',' ',$produk_slug);
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}
		$stmt2 = $mysqli->query("SELECT 
			tbl_produk.kode_produk,
			tbl_produk.nama_produk,
			tbl_produk.harga,
			tbl_produk.harga_diskon,
			tbl_produk.berlaku,
			tbl_produk.sampai,
			tbl_produk.deskripsi 
				FROM tbl_produk,tbl_produkstok,tbl_produkwarna 
					WHERE tbl_produk.publish=1 AND tbl_produk.kode_produk=tbl_produkstok.kode_produk AND ".$filter_price." AND ".$filter_color." AND ".$filter_size." AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3) GROUP BY tbl_produk.kode_produk ORDER BY tbl_produk.".$order." ".$by." LIMIT ".$page.",".$limit." ");		
		while($row = $stmt2->fetch_assoc()){			
			$kode_produk = $row['kode_produk'];
			$nama_produk = $row['nama_produk'];
			$harga = $row['harga'];
			$berlaku = $row['berlaku'];
			$sampai = $row['sampai'];
			$harga_diskon = $row['harga_diskon'];
			$deskripsi = $row['deskripsi'];
			
			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."' GROUP BY id_produkwarna";
			$stmt5 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt5->execute();
			$stmt5->bind_result($id_produkstok,$ukuran,$warna,$stok);
			$stmt5->store_result();
			$nums = $stmt5->num_rows();
			while($stmt5->fetch()){
				$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),getProdukWarna($warna));
				if($nums > 1 ){
					$variabel=$nums;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$stmt3->close();
					$kode = getProdukGender($kode_produk);
					$jenis = getProdukJenis($kode_produk);
					if($jenis == $slug AND ($kode == $gender or $kode == "unisex") ){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image" ><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'"  data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}						   
							echo'        <div class="product-preview__info__description">
											  <p>'.$deskripsi.'.</p>
									</div>
									<div class="product-preview__info__link " >
										<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
										<span class="icon icon-favorite"></span> &nbsp
										<span class="product-preview__info__link__text">Add to wishlist</span>
									</a>
									</div>
								  </div>
								</div>
							  </div>
							';
					}
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$stmt3->close();
					$kode = getProdukGender($kode_produk);
					$jenis = getProdukJenis($kode_produk);
					if($jenis == $slug AND ($kode == $gender or $kode == "unisex") ){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image" ><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'"  data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">									  
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}						   
							echo'        <div class="product-preview__info__description">
											  <p>'.$deskripsi.'.</p>
									</div>
									<div class="product-preview__info__link " >
										<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
										<span class="icon icon-favorite"></span> &nbsp
										<span class="product-preview__info__link__text">Add to wishlist</span>
									</a>
									</div>
								  </div>
								</div>
							  </div>
							';
					}
				}
			}
			$stmt5->close();
		}
		$stmt2->close();
	}else if($produk_style != "ALL"){
		$gender = str_replace("_"," ",$produk_gender);
		$slug = str_replace('_',' ',$produk_slug);
		$produk_style = str_replace('_',' ',$produk_style);
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}
		
		$stmt2 = $mysqli->query("SELECT 
			tbl_produk.kode_produk,
			tbl_produk.nama_produk,
			tbl_produk.harga,
			tbl_produk.harga_diskon,
			tbl_produk.berlaku,
			tbl_produk.sampai,
			tbl_produk.deskripsi 
				FROM tbl_produk,tbl_produkstok,tbl_produkwarna 
					WHERE tbl_produk.publish=1 AND tbl_produk.kode_produk=tbl_produkstok.kode_produk AND ".$filter_price." AND ".$filter_color." AND ".$filter_size." AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3) GROUP BY tbl_produk.kode_produk ORDER BY tbl_produk.".$order." ".$by." LIMIT ".$page.",".$limit." ");		
		while($row = $stmt2->fetch_assoc()){			
			$kode_produk = $row['kode_produk'];
			$nama_produk = $row['nama_produk'];
			$harga = $row['harga'];
			$berlaku = $row['berlaku'];
			$sampai = $row['sampai'];
			$harga_diskon = $row['harga_diskon'];
			$deskripsi = $row['deskripsi'];
			
			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok  from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."'  GROUP BY id_produkwarna";
			$stmt5 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt5->execute();
			$stmt5->bind_result($id_produkstok,$ukuran,$warna,$stok);
			$stmt5->store_result();
			$nums = $stmt5->num_rows();
			while($stmt5->fetch()){
				if($nums > 1 ){
					$variabel=$nums;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$stmt3->close();
					$kode = getProdukGender($kode_produk);
					$jenis = getProdukJenis($kode_produk);
					$style = getProdukStyle($kode_produk);
					if($style == $produk_style AND $jenis == $slug AND ($kode == $gender or $kode == "unisex") ){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image" ><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'"  data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}						   
							echo'        <div class="product-preview__info__description">
											  <p>'.$deskripsi.'.</p>
									</div>
									<div class="product-preview__info__link " >
										<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
										<span class="icon icon-favorite"></span> &nbsp
										<span class="product-preview__info__link__text">Add to wishlist</span>
									</a>
									</div>
								  </div>
								</div>
							  </div>
							';
					}
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$stmt3->close();
					$kode = getProdukGender($kode_produk);
					$jenis = getProdukJenis($kode_produk);
					$style = getProdukStyle($kode_produk);
					if($style == $produk_style AND $jenis == $slug AND ($kode == $gender or $kode == "unisex") ){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image" ><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'"  data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">									  
									  <h2 style="font-size:0.95em;"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}						   
							echo'        <div class="product-preview__info__description">
											  <p>'.$deskripsi.'.</p>
									</div>
									<div class="product-preview__info__link " >
										<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
										<span class="icon icon-favorite"></span> &nbsp
										<span class="product-preview__info__link__text">Add to wishlist</span>
									</a>
									</div>
								  </div>
								</div>
							  </div>
							';
					}
				}
			}
			$stmt5->close();
		}
		$stmt2->close();
	}
}
function newProduk(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$tipe = "AGEN";
		$diskon = getDiskonAgen();		
	}else{
		$tipe = "MEMBER";
		$diskon = getDiskonMember();				
	}
	$stmt = $mysqli->query("SELECT replace(kode_produk,'.',' ') as kode_produk,replace(substr(kode_produk,0,2),'.','') as urut,nama_produk,harga,harga_diskon,berlaku,sampai,deskripsi FROM tbl_produk WHERE publish=1 ORDER BY waktu DESC LIMIT 12");
	while($row = $stmt->fetch_array()){
		$kode_produk = $row['kode_produk'];
		$nama_produk = $row['nama_produk'];
		$harga = $row['harga'];
		$harga_diskon = $row['harga_diskon'];
		$berlaku = $row['berlaku'];
		$sampai = $row['sampai'];
		$deskripsi = $row['deskripsi'];

			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."'  GROUP BY id_produkwarna";
			$stmt2 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt2->execute();
			$stmt2->bind_result($id_produkstok,$ukuran,$warna,$stok);
			$stmt2->store_result();
			$nums = $stmt2->num_rows();
			while($stmt2->fetch()){
				$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),getProdukWarna($warna));
				if($nums >1 ){
					$variabel=1;
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					echo '
					  <div class="product-preview-wrapper">
						<div class="product-preview">
						  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
						  <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
					';        
					$stmt3->close();
					if($stok == 0){
						echo '<div class="product-preview__outstock">STOK HABIS</div> ';
					}
					echo'      </div>
						  <div class="product-preview__info text-center">
							<div class="product-preview__info__btns">
					';
						if($stok != 0){
							if($variabel >= 1){
								echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
							}else{
								echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
							}
						}else{
							echo '<button class="btn btn--round ajax-to-cart" style="background-color:grey;" disabled><span class="icon-ecommerce"></span></button>'; 																
						}
						
					echo'
							</div>	
								<div class="product-preview__info__title">
								  <h2><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
								</div>
					';
					$tgl_sekarang = strtotime(date('Y-m-d'));
					$tgl_berlaku = strtotime($berlaku);
					$tgl_sampai = strtotime($sampai);
					if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
						$hrg_produk = $harga_diskon+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
					}else{
						$hrg_produk = $harga+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
					}
						   
					echo'   <div class="product-preview__info__description">
								  <p>'.$deskripsi.'.</p>
							</div>
							<div class="product-preview__info__link ">
							<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
								<span class="icon icon-favorite"></span> &nbsp
								<span class="product-preview__info__link__text">Add to wishlist</span>
							</a>
							</div>
						  </div>
						</div>
					  </div>
					';
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					echo '
					  <div class="product-preview-wrapper">
						<div class="product-preview">
						  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
						  <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
					';        
					$stmt3->close();
					if($stok == 0){
						echo '<div class="product-preview__outstock">STOK HABIS</div> ';
					}
					echo'      </div>
						  <div class="product-preview__info text-center">
							<div class="product-preview__info__btns">
					';
						if($stok != 0){
							if($variabel >= 1){
								echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
							}else{
								echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
							}
						}else{
							echo '<button class="btn btn--round ajax-to-cart" style="background-color:grey;" disabled><span class="icon-ecommerce"></span></button>'; 																
						}
						
					echo'
							</div>	
								<div class="product-preview__info__title">
								  <h2><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
								</div>
					';
					$tgl_sekarang = strtotime(date('Y-m-d'));
					$tgl_berlaku = strtotime($berlaku);
					$tgl_sampai = strtotime($sampai);
					if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
						$hrg_produk = $harga_diskon+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
					}else{
						$hrg_produk = $harga+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
					}
					echo'   <div class="product-preview__info__description">
								  <p>'.$deskripsi.'.</p>
							</div>
							<div class="product-preview__info__link ">
							<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
								<span class="icon icon-favorite"></span> &nbsp
								<span class="product-preview__info__link__text">Add to wishlist</span>
							</a>
							</div>
						  </div>
						</div>
					  </div>
					';
				}
			}			
			$stmt2->close();
	}
	$stmt->close();
}
function rekomendasiProduk(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$tipe = "AGEN";
		$diskon = getDiskonAgen();		
	}else{
		$tipe = "MEMBER";
		$diskon = getDiskonMember();				
	}
	$url = explode('/',$_GET['produk']);
	$nama_produk = str_replace('_',' ',$url[0]);
	$stmt = $mysqli->prepare("select kode_produk from tbl_produk where nama_produk='$nama_produk'");
	$stmt->execute();
	$stmt->bind_result($kode_produk);
	$stmt->fetch();
	$stmt->close();
	$produk_gender = getProdukGender($kode_produk);
	$produk_slug = getProdukJenis($kode_produk);
	$gender = str_replace("_"," ",$produk_gender);
	$slug = str_replace('_',' ',$produk_slug);
	$stmt = $mysqli->query("SELECT replace(kode_produk,'.',' ') as kode_produk,replace(substr(kode_produk,0,2),'.','') as urut,nama_produk,harga,harga_diskon,berlaku,sampai,deskripsi FROM tbl_produk WHERE publish=1 ORDER BY waktu DESC LIMIT 12");
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}
		$stmt2 = $mysqli->query("SELECT 
			tbl_produk.kode_produk,
			tbl_produk.nama_produk,
			tbl_produk.harga,
			tbl_produk.harga_diskon,
			tbl_produk.berlaku,
			tbl_produk.sampai,
			tbl_produk.deskripsi 
				FROM tbl_produk,tbl_produkstok,tbl_produkwarna 
					WHERE tbl_produk.publish=1 AND tbl_produk.kode_produk=tbl_produkstok.kode_produk AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3) GROUP BY tbl_produk.kode_produk ORDER BY tbl_produk.waktu ");		
		while($row = $stmt2->fetch_assoc()){			
			$kode_produk = $row['kode_produk'];
			$nama_produk = $row['nama_produk'];
			$harga = $row['harga'];
			$berlaku = $row['berlaku'];
			$sampai = $row['sampai'];
			$harga_diskon = $row['harga_diskon'];
			$deskripsi = $row['deskripsi'];
			
			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok  from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."'  GROUP BY id_produkwarna";
			$stmt5 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt5->execute();
			$stmt5->bind_result($id_produkstok,$ukuran,$warna,$stok);
			$stmt5->store_result();
			$nums = $stmt5->num_rows();
			while($stmt5->fetch()){
				$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),getProdukWarna($warna));
				if($nums > 1 ){
					$variabel=$nums;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$stmt3->close();
					$kode = getProdukGender($kode_produk);
					$jenis = getProdukJenis($kode_produk);
					if($jenis == $slug AND ($kode == $gender or $kode == "unisex") ){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image" ><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'"  data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">
									  <h2><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}
							echo'        <div class="product-preview__info__description">
											  <p>'.$deskripsi.'.</p>
									</div>
									<div class="product-preview__info__link " >
										<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
										<span class="icon icon-favorite"></span> &nbsp
										<span class="product-preview__info__link__text">Add to wishlist</span>
									</a>
									</div>
								  </div>
								</div>
							  </div>
							';
					}
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					$stmt3->close();
					$kode = getProdukGender($kode_produk);
					$jenis = getProdukJenis($kode_produk);
					if($jenis == $slug AND ($kode == $gender or $kode == "unisex") ){
						echo '
							  <div class="product-preview-wrapper">
								<div class="product-preview">
								  <div class="product-preview__image" ><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'"  data-lazy="'.$src.'"  alt=""/></a>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
							';        
							if($stok == 0){
								echo '<div class="product-preview__outstock">STOK HABIS</div> ';
							}
							echo'      </div>
								  <div class="product-preview__info text-center">
									<div class="product-preview__info__btns">
							';
									if($stok != 0){
										if($variabel >= 1){
											echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
										}else{
											echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.str_replace(' ','_',getProdukWarna($warna)).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
										}
									}
								
							echo'
									</div>	
									<div class="product-preview__info__title">									  
									  <h2><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
									</div>
							';
							$tgl_sekarang = strtotime(date('Y-m-d'));
							$tgl_berlaku = strtotime($berlaku);
							$tgl_sampai = strtotime($sampai);
							if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
								$hrg_produk = $harga_diskon+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
							}else{
								$hrg_produk = $harga+$harga_tambah;
								echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
							}
							echo'        <div class="product-preview__info__description">
											  <p>'.$deskripsi.'.</p>
									</div>
									<div class="product-preview__info__link " >
										<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
										<span class="icon icon-favorite"></span> &nbsp
										<span class="product-preview__info__link__text">Add to wishlist</span>
									</a>
									</div>
								  </div>
								</div>
							  </div>
							';
					}
				}
			}
			$stmt5->close();
		}
		$stmt2->close();
}

function favoriteProduk(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$tipe = "AGEN";
		$diskon = getDiskonAgen();		
	}else{
		$tipe = "MEMBER";
		$diskon = getDiskonMember();				
	}
	$stmt = $mysqli->prepare("SELECT kode_produk,nama_produk,harga,harga_diskon,berlaku,sampai,deskripsi FROM tbl_produk WHERE favorite=1 AND publish=1 ORDER BY harga asc");
	$stmt->execute();
	$stmt->bind_result($kode_produk,$nama_produk,$harga,$harga_diskon,$berlaku,$sampai,$deskripsi);
	$stmt->store_result();
	$numrows = $stmt->num_rows;
	if($numrows > 0){
		while($stmt->fetch()){
		
			$sql = "select id_produkstok,ukuran,id_produkwarna,sum(stok) as stok  from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."' GROUP BY id_produkwarna";
			$stmt2 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
			$stmt2->execute();
			$stmt2->bind_result($id_produkstok,$ukuran,$warna,$stok );
			$stmt2->store_result();
			$nums = $stmt2->num_rows();
			while($stmt2->fetch()){
				if($nums >1 ){
					$variabel=1;
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."' AND warna='".getProdukWarna($warna)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					echo '
					  <div class="product-preview-wrapper">
						<div class="product-preview">
						  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
						  <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
					';        
					$stmt3->close();
					if($stok == 0){
						echo '<div class="product-preview__outstock">STOK HABIS</div> ';
					}
					echo'      </div>
						  <div class="product-preview__info text-center">
							<div class="product-preview__info__btns">
					';
						if($stok != 0){
							if($variabel >= 1){
								echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
							}else{
								echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.getProdukWarna($warna).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
							}
						}else{
							echo '<button class="btn btn--round ajax-to-cart" style="background-color:grey;" disabled><span class="icon-ecommerce"></span></button>'; 																
						}
						
					echo'
							</div>	
								<div class="product-preview__info__title">
								  <h2><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
								</div>
					';
					$tgl_sekarang = strtotime(date('Y-m-d'));
					$tgl_berlaku = strtotime($berlaku);
					$tgl_sampai = strtotime($sampai);
					if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
						$hrg_produk = $harga_diskon+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
					}else{
						$hrg_produk = $harga+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
					}
						   
					echo'   <div class="product-preview__info__description">
								  <p>'.$deskripsi.'.</p>
							</div>
							<div class="product-preview__info__link ">
							<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
								<span class="icon icon-favorite"></span> &nbsp
								<span class="product-preview__info__link__text">Add to wishlist</span>
							</a>
							</div>
						  </div>
						</div>
					  </div>
					';
				}else{
					$variabel=0;
					$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."'");
					if($stmt3->num_rows > 0){
						$row = $stmt3->fetch_assoc();
						$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
					}else{
						$src = getLink()."/images/products/standard.jpg";	
					}
					echo '
					  <div class="product-preview-wrapper">
						<div class="product-preview">
						  <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
						  <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
								  <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span style="margin-top: -10px;font-size: 0.9em;">'.$tipe.'</span>
								  <span  style="margin-top: 2px;font-size: 1.5em;">-'.$diskon.'%</span></div>
					';        
					$stmt3->close();
					if($stok == 0){
						echo '<div class="product-preview__outstock">STOK HABIS</div> ';
					}
					echo'      </div>
						  <div class="product-preview__info text-center">
							<div class="product-preview__info__btns">
					';
						if($stok != 0){
							if($variabel >= 1){
								echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
							}else{
								echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.getProdukWarna($warna).'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
							}
						}else{
							echo '<button class="btn btn--round ajax-to-cart" style="background-color:grey;" disabled><span class="icon-ecommerce"></span></button>'; 																
						}
						
					echo'
							</div>	
								<div class="product-preview__info__title">
								  <h2><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
								</div>
					';
					$tgl_sekarang = strtotime(date('Y-m-d'));
					$tgl_berlaku = strtotime($berlaku);
					$tgl_sampai = strtotime($sampai);
					if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
						$hrg_produk = $harga_diskon+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';			
					}else{
						$hrg_produk = $harga+$harga_tambah;
						echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($hrg_produk-($hrg_produk*20/100)).'</span> <span class="price-box__old">Rp'.setHarga($hrg_produk).'</span></div>';
					}
						   
					echo'   <div class="product-preview__info__description">
								  <p>'.$deskripsi.'.</p>
							</div>
							<div class="product-preview__info__link ">
							<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
								<span class="icon icon-favorite"></span> &nbsp
								<span class="product-preview__info__link__text">Add to wishlist</span>
							</a>
							</div>
						  </div>
						</div>
					  </div>
					';
				}
			}			
			$stmt2->close();
		}
	}else{
		echo '		
				<center>Maaf, untuk saat</center>
			';
	}
	$stmt->close();
}

function bestProduk(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$tipe = "AGEN";
		$diskon = getDiskonAgen();		
	}else{
		$tipe = "MEMBER";
		$diskon = getDiskonMember();				
	}
	$best = $mysqli->prepare("SELECT 
		tbl_orderdetail.kode_produk, 
		COUNT(tbl_orderdetail.kode_produk) AS urut, 
		replace(tbl_produk.kode_produk,'.','') AS kode,
		tbl_produk.kode_produk,
		tbl_produk.nama_produk,
		tbl_produk.harga,
		tbl_produk.harga_diskon,
		tbl_produk.berlaku,
		tbl_produk.sampai,
		tbl_produk.deskripsi 
			FROM tbl_orderdetail,tbl_produk WHERE tbl_orderdetail.kode_produk = tbl_produk.kode_produk AND tbl_produk.publish=1 GROUP BY kode ORDER BY urut DESC LIMIT 4");
	$best->execute();
	$best->bind_result($kode_produk,$urut,$kode,$kode_produk,$nama_produk,$harga,$harga_diskon,$berlaku,$sampai,$deskripsi);
	$best->store_result();
	$numrows = $best->num_rows;
	if($numrows > 0){
		while($best->fetch()){
		
		$sql = "select id_produkstok,ukuran,warna,sum(stok) as stok   from tbl_produkstok where kode_produk='".str_replace(' ','.',$kode_produk)."' ";
		$stmt2 = $mysqli->prepare($sql) or trigger_error($mysqli->error." [$sql]");
		$stmt2->execute();
		$stmt2->bind_result($id_produkstok,$ukuran,$warna,$stok );
		$stmt2->store_result();
		$stmt2->fetch();
		$nums = $stmt2->num_rows();
		if($nums >1 ){
			$variabel=1;
		}else{
			$variabel=0;
		}
		$stmt2->close();
			$stmt3 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='".str_replace(' ','.',$kode_produk)."'");
			if($stmt3->num_rows > 0){
				$row = $stmt3->fetch_assoc();
				$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
			}else{
				$src = getLink()."/images/products/standard.jpg";	
			}
		echo '
		  <div class="product-preview-wrapper">
            <div class="product-preview">
              <div class="product-preview__image"><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" ><img src="'.$src.'" data-lazy="'.$src.'"  alt=""/></a>
              <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
              <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span>'.$tipe.'<br>
                -'.$diskon.'%</span></div>
        ';        
		$stmt3->close();     
		if($stok == 0){
			echo '<div class="product-preview__outstock">STOK HABIS</div> ';
		}
        echo'      </div>
              <div class="product-preview__info text-center">
                <div class="product-preview__info__btns">
		';
				if($stok != 0){
					if($variabel >= 1){
						echo '<a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'" class="btn btn--round" style="padding: 15px 10px;"><span class="icon-ecommerce"></span></a>'; 											
					}else{
						echo '<button value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="btn btn--round ajax-to-cart"><span class="icon-ecommerce"></span></button>'; 											
					}
				}
			
		echo'
				</div>	
						<div class="product-preview__info__title">
						  <h2><a href="'.getLink().'/produk/'.str_replace(' ','_',$nama_produk).'/'.str_replace(' ','_',$row['warna']).'">'.$nama_produk.'</a></h2>
						</div>
        ';
		$tgl_sekarang = strtotime(date('Y-m-d'));
		$tgl_berlaku = strtotime($berlaku);
		$tgl_sampai = strtotime($sampai);
		if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){		
			echo '<div class="price-box"><span class="price-box__new">Rp'.setHarga($harga_diskon).'</span> <span class="price-box__old">Rp'.setHarga($harga).'</span></div>';			
		}else{
			echo '<div class="price-box">Rp'.setHarga($harga).'</div>';
		}
               
        echo'        <div class="product-preview__info__description">
						  <p>'.$deskripsi.'.</p>
						</div>
					<div class="product-preview__info__link ">
					<a href="#" value="'.$kode_produk.'/'.$ukuran.'/'.$warna.'" class="ajax-to-wishlist">
						<span class="icon icon-favorite"></span> &nbsp
						<span class="product-preview__info__link__text">Add to wishlist</span>
					</a>
						</div>
					  </div>
					</div>
				  </div>
				';
		}
	}else{
		echo '		
			<div class="panel panel-default col-md-4 col-md-offset-4">
			  <div class="panel-body" align="center">
				BELUM ADA PRODUK TERJUAL
			  </div>
			</div>		
		';
	}
	$best->close();
}
function pesananTracking(){
	if(isset($_GET['detail']) OR isset($_GET['return']) ){
		global $mysqli;
		if(isset($_GET['detail'])){
			$no_transaksi = $_GET['detail'];			
		}else{
			$no_transaksi = $_GET['return'];			
		}
		if(isset($_SESSION['id_customer'])){
			$id_customer = $_SESSION['id_customer'];		
		}else{
			$id_customer = getIpCustomer();		
		}
	$cek = $mysqli->prepare("select kode_unik from tbl_order where no_transaksi=?");
		$cek->bind_param('s',$no_transaksi);
		$cek->execute();
		$cek->bind_result($kode);
		$cek->fetch();
		$cek->close();
		if($kode != NULL){
			$stmt = $mysqli->query("SELECT waktu,UPPER(status) as status FROM tbl_orderstatus WHERE no_transaksi='$no_transaksi'");
			while($row = $stmt->fetch_assoc()){
				$waktu = $row['waktu'];
				if($row['status'] == "MENUNGGU PEMBAYARAN"){
					echo'
						<tr>
						  <th class="text-left"> '.$waktu.' </th>
						  <th class="text-right"> Menungu Pembayaran </th>
						</tr>
					';
				}else if($row['status'] == "PESANAN DIBATALKAN"){
					echo'
						<tr>
						  <th class="text-left"> '.$waktu.' </th>
						  <th class="text-right"> Pesanan Dibatalkan </th>
						</tr>
					';
				}else if($row['status'] == "PEMBAYARAN DITERIMA"){
					echo'
						<tr>
						  <th class="text-left"> '.$waktu.' </th>
						  <th class="text-right"> Pembayaran Diterima </th>
						</tr>
					';
				}else if($row['status'] == "PESANAN DIPROSES"){
					echo'
						<tr>
						  <th class="text-left"> '.$waktu.' </th>
						  <th class="text-right"> Pesanan Diproses </th>
						</tr>
					';
				}else if($row['status'] == "PESANAN TERKIRIM"){
					echo'
						<tr>
						  <th class="text-left"> '.$waktu.' </th>
						  <th class="text-right"> Pesanan Terkirim </th>
						</tr>
					';
					$stmt2 = $mysqli->query("SELECT * FROM tbl_orderkode WHERE no_transaksi='$no_transaksi'");
					$row = $stmt2->fetch_assoc();
					$resi = $row['resi'];
					echo '
						<tr>
							<td class="text-left"><h3>RESI :</h3></td>
							<td class="text-right"><h3><a href="http://cekresi.com/?noresi=$resi">'.$resi.'</a></h3></td>
						</tr>
					';
				}
			}
			$stmt->free();
			}else{
			
		}
	}
}

function pesananTujuan(){
	if(isset($_GET['detail']) OR isset($_GET['return']) ){
		global $mysqli;
		if(isset($_GET['detail'])){
			$no_transaksi = $_GET['detail'];			
		}else{
			$no_transaksi = $_GET['return'];			
		}
		$stmt = $mysqli->prepare("select
			tbl_customeralamat.nama_penerima,
			tbl_customeralamat.alamat_penerima,
			tbl_kota.kode_pos,
			tbl_customeralamat.tel_rumah,
			tbl_customeralamat.tel_handphone,
			tbl_kota.provinsi,
			tbl_kota.kota,
			tbl_kota.kecamatan,
			tbl_kota.kelurahan
				FROM tbl_customeralamat,tbl_kota,tbl_order
					WHERE tbl_order.no_transaksi=? AND tbl_order.id_customer = tbl_customeralamat.id_customer AND tbl_order.id_alamat = tbl_customeralamat.id_alamat AND tbl_customeralamat.id_kota = tbl_kota.id_kota
		");
		$stmt->bind_param('i',$no_transaksi);
		$stmt->execute();
		$stmt->bind_result($nama_penerima,$alamat_penerima,$kode_pos,$tel_rumah,$tel_handphone,$provinsi,$kota,$kecamatan,$kelurahan);
		while($stmt->fetch()){
				printf('
					<tr>
					  <th class="text-left">Nama Penerima: </th>
					  <td class="text-left">%s</td>
					</tr>
					<tr>
					  <th class="text-left"> Alamat :</th>
					  <td class="text-left">%s</td>
					<tr>
					  <th class="text-left"> Provinsi / Kota / Kecamatan / Kelurahan:</th>
					  <td class="text-left">%s /%s / %s / %s</td>
					</tr>
					<tr>
					  <th class="text-left"> Kode Pos :</th>
					  <td class="text-left">%s</td>
					</tr>
					<tr>
					  <th class="text-left"> Telepon Rumah / Handphone :</th>
					  <td class="text-left">%s / %s</td>
					</tr>
				',$nama_penerima,$alamat_penerima,$provinsi,$kota,$kecamatan,$kelurahan,$kode_pos,$tel_rumah,$tel_handphone);
		}
	$stmt->close();
	}
}
function login($url){
	global $mysqli;
	$username = $_POST['txtUsername'];
	$password = enkripPassword($_POST['txtPassword']);
	$ip_address = getIpCustomer();
	$browser = $_SERVER['HTTP_USER_AGENT'];
	$waktu = date("Y-m-d H:i:S");
	$time = time();                 
	$check = isset($_POST['rememberMe'])?$_POST['rememberMe']:'';
 
	$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
	$secret_key = '6LdZWR8TAAAAAC4KGOv6xcdChXHi8W3ntOeY4tzA'; 
	if(empty($username)){
			echo '		
				<div class="alert alert-warning" role="alert" align="center">
					<b>Username tidak boleh kosong.</b>
				  </div>
			';		
	}else if(empty($password)){
			echo '		
				<div class="alert alert-warning" role="alert" align="center">
					<b>Password tidak boleh kosong.</b>
				  </div>
			';		
/*	}else if(empty($captcha)){
			echo '		
				<div class="alert alert-warning" role="alert" align="center">
					<b>Silahkan isi captcha terlebih dahulu.</b>
				  </div>
			';		
*/	}else{
		$request_captcha = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secret_key).'&response='.$captcha;   
		$recaptcha = file_get_contents($request_captcha);
//		$recaptcha = json_decode($recaptcha, true);
//		if ($recaptcha['success']) {
		if (true){
			$stmt = $mysqli->prepare("SELECT email,nama_lengkap,tipe,status,waktu FROM tbl_customer where id_customer =? AND password=?");
			$stmt->bind_param("ss", $username,$password);
			$stmt->execute();
			$stmt->bind_result($email,$nama_lengkap,$tipe,$status,$waktu_daftar);	
			$stmt->store_result();
			$numrows = $stmt->num_rows;
			if($numrows > 0){
				$stmt->fetch();
				if($check) {        
					setcookie("cookielogin[user]",$username, $time + 3600);        
					setcookie("cookielogin[pass]",$_POST['txtPassword'], $time + 3600);    
				}
				$_SESSION['id_customer'] = strtoupper($username);
				$_SESSION['nama_lengkap'] = $nama_lengkap;
				$_SESSION['waktu_daftar'] = $waktu_daftar;
				$_SESSION['tipe'] = $tipe;
				$_SESSION['email'] = $email;
				$_SESSION['status'] = $status;
				$stmt = $mysqli->prepare("INSERT INTO tbl_customerlog(id_customer,waktu,browser,ip) values(?,?,?,?)");
				$stmt->bind_param("ssss",$username,$waktu,$browser,$ip_address);
				$stmt->execute();
				$stmt->close();
				if($url=="checkout"){
					$id_temp = getIpCustomer();
					$sql = "UPDATE tbl_ordertemp SET id_customer='$username' WHERE id_customer='$id_temp'";
					$stmt=$mysqli->query($sql);
					if($stmt){
						echo'<meta http-equiv="Refresh" content="0;url='.$url.'">';						
					}
				}else{
				echo'<meta http-equiv="Refresh" content="0;url='.$url.'">';						
				}
			}else{
				$stmt = $mysqli->prepare("SELECT id_customer FROM tbl_customer where id_customer =?");
				$stmt->bind_param("s", $username);
				$stmt->execute();
				$stmt->bind_result($id);	
				$stmt->store_result();
				$numrows = $stmt->num_rows;
				if($numrows > 0){			
					echo '		
						<div class="alert alert-danger" role="alert" align="center">
							<b>Password anda salah.</b>
						  </div>
					';
				}else{
					echo '		
						<div class="alert alert-danger" role="alert" align="center">
							<b>Akun dengan username tersebut tidak terdaftar.</b>
						  </div>
					';					
				}
			}
		}else{
			echo '		
				<div class="alert alert-danger" role="alert" align="center">
					<b>Captcha yang dimasukan salah !!</b>
				  </div>
			';
		}
	}
}
function logout(){
	session_start();
	session_destroy();
	?>
		<meta http-equiv="refresh" content="0; URL=home">
	<?php
}
function randomPassword(){
	// function untuk membuat password random 6 digit karakter
	$digit = 6;
	$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = "";
	while ($i <= $digit-1)
	{
		$num = rand() % 32;
		$tmp = substr($karakter,$num,1);
		$pass = $pass.$tmp;
		$i++;
	}
	return $pass;
}
function getURL($url) {
	$curlHandle = curl_init(); // init curl
	curl_setopt($curlHandle, CURLOPT_URL, $url); // set the url to fetch
	$headers = array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.8) Gecko/20061025 Firefox/1.5.0.8");
	curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curlHandle, CURLOPT_HEADER, 0);
	curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
	curl_setopt($curlHandle, CURLOPT_POST, 0);
	$content = curl_exec($curlHandle);
	curl_close($curlHandle);
}
function sendSMS($tipe,$data,$telepon){
	$message = '';
	$data = explode("/",$data);
	if($tipe == "checkout"){
		$message = 'Selamat pesanan anda dengan nomor transaksi '.$data[0].' sudah kami terima, silahkan lakukan pembayaran sesuai nominal yang tertera.';
	}
	if($tipe == "register"){
		$message = 'Selamat anda telah bergabung menjadi member dengan username '.$data[0].' , silahkan sponsori teman-teman anda untuk bergabung dengan menggunakan url berikut https://oreli.co.id/'.$data[0].' .';
	}
	if($tipe == "verifikasi"){
		$message = 'Kode token anda adalah '.$data[0];
	}
	$mobile = $telepon;
	$username = 'oreli';
	$auth = md5($username."orelites".$mobile);
	$url = "http://send.smsmasking.co.id:8080/web2sms/api/sendSMS.aspx?username=".$username."&mobile=".$mobile."&message=".$message."&auth=".$auth."";
	$go = '<script>
			myWindow = window.open("http://send.smsmasking.co.id:8080/web2sms/api/sendSMS.aspx?username='.$username.'&mobile='.$mobile.'&message='.$message.'&auth='.$auth.'", "_blank", "toolbar=no,scrollbars=no,resizable=no,top=100%,left=100%,width=1,height=1")
			setTimeout(function () { myWindow.close();}, 150);
	</script>';
//	echo $go;
	$url = str_replace(" ","%20",$url);
	file_get_contents($url);
//	getURL($url);
}
function emailSubscriber(){
	global $mysqli;
	$sukses=0;
	//untuk member
	$stmt = $mysqli->query("select nama_lengkap,email from tbl_customer");
	while($data = $stmt->fetch_array()){
		$to       = $data['email'];
		$subject  = 'Hallo '.$data['nama_lengkap'] ;
		$message  = '<p>Hallo ini Newsletter kami</p>';
		$send = smtp_mail($to, $subject, $message, '', '', 0, 0, false);
		if(!$send){
			$sukses++;
		}	
	}
	$stmt->close();
	echo '
		<div class="alert alert-success" role="alert" align="center">
			<b>'.$sukses.' email berhasil dikirim ... !!</b>
		</div>
	';	
}

function editPassword(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$password = enkripPassword($_POST['pass']);
	$passwordBaru = enkripPassword($_POST['newPass']);
	$stmt = $mysqli->query("SELECT * FROM tbl_customer WHERE id_customer='$id_customer' AND password='$password'");
	if($stmt->num_rows > 0){
		$update = $mysqli->query("UPDATE tbl_customer SET password='$passwordBaru' WHERE id_customer='$id_customer' AND password='$password'");
		if($update){
			echo '
				<div class="alert alert-success" role="alert" align="center">
					<b>Terimakasih, password anda telah diganti...</b>
				  </div>
			';
		}else{
			echo '
				<div class="alert alert-danger" role="alert" align="center">
					<b>Gagal mengubah password...!!</b><br>
				  </div>
			';
		}
	}else{
			echo '
				<div class="alert alert-warning" role="alert" align="center">
					<b>Password lama anda salah...!!</b><br>
				  </div>
			';
	}
}

function lupaPassword(){
	global $mysqli;
	require_once('library/function.php');
	$alamatEmail =$_POST['email'];
	$stmt = $mysqli->query("SELECT * FROM tbl_customer where email = '$alamatEmail'");
	if($stmt->num_rows != 0){
		// membuat password baru secara random -> memanggil function randomPassword
		$newPassword = randomPassword();
		$newPasswordEnkrip = enkripPassword($newPassword);	
		// mengenkripsi password
			// pengiriman email update password baru ke database (jika update password baru ke database sukses)
			$to       = $alamatEmail;
			$subject  = 'Lupa Password oreli.co.id';
			$message  = '<p>Password baru anda adalah <b>'.$newPassword.'</b>, silahkan buka link berikut untuk konfirmasi <a href="https://oreli.co.id/forgot-password/'.$alamatEmail.'/'.$newPassword.'"> https://oreli.co.id/forgot-password/'.$alamatEmail.'#'.$newPassword.'" </a>.</p>';
			$status = smtp_mail($to, $subject, $message, '', '', 0, 0, false);		
			if(!$status){
				echo '
					<div class="alert alert-success" role="alert" align="center">
						<b>Terimakasih, password baru telah dikirim ke email '.$alamatEmail.'... !!</b>
					  </div>
				';
			}else{
				echo '
					<div class="alert alert-danger" role="alert" align="center">
						<b>Gagal mengirim email...!!</b><br>
					  </div>
				';
			}
	}else{
		echo '
			<div class="alert alert-danger" role="alert" align="center">
				<b>Email dengan alamat '.$alamatEmail.' tidak terdaftar... </b>
			</div>
		';					
	}
	$stmt->close();
}

function resetPassword(){
	global $mysqli;
	$data  = explode("/",$_GET['reset']);
	$alamatEmail =$data[0];
	$newPassword =$data[1];
	$newPasswordEnkrip = enkripPassword($newPassword);
	$stmt = $mysqli->query("SELECT * FROM tbl_customer where email = '$alamatEmail'");
	if($stmt->num_rows != 0){
		$query = "UPDATE tbl_customer SET password='$newPasswordEnkrip' WHERE email='$alamatEmail'";
		$hasil = $mysqli->query($query);
		if($hasil){
			echo '
				<div class="alert alert-success" role="alert" align="center">
					<b>Terimakasih, password berhasil di update... !!</b>
				  </div>
			';
		}else{
				echo '
					<div class="alert alert-danger" role="alert" align="center">
						<b>Gagal mengupdate password... !!</b>
					  </div>
				';			
		}
	}else{
		echo '
			<div class="alert alert-danger" role="alert" align="center">
				<b>Email dengan alamat '.$alamatEmail.' tidak terdaftar... </b>
			</div>
		';					
	}
	$stmt->close();
}
function rekeningList(){
global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("SELECT 
		id_bank,
		nama_bank,
		nomor_rekening,
		atas_nama
			FROM tbl_bank
				WHERE id_customer=?");
	$stmt->bind_param("s", $id_customer);
	$stmt->execute();
	$stmt->bind_result($id_bank,$nama_bank,$nomor_rekening,$atas_nama);
	
	while($stmt->fetch()){
		printf("
		<option value='%s'> %s - %s - %s</option>
		",$id_bank,$nama_bank,$atas_nama,$nomor_rekening);
	}
	$stmt->close();	
}
function poinPencairan(){
	global $mysqli;
	if(isset($_POST['btnCairkan'])){
		if(isset($_SESSION['id_customer'])){
			$id_customer = $_SESSION['id_customer'];		
		}else{
			$id_customer = getIpCustomer();		
		}
		$jum_pencairan  = $_POST['jumlahPoin'];
		$id_bank = $_POST['rekeningTujuan'];
		$tanggal = date('Y/m/d');
		$stmt = $mysqli->query("select file_ktp,npwp from tbl_customer where id_customer='$_SESSION[id_customer]'");
		$data = $stmt->fetch_array();
		if($data['npwp'] == NULL){
			$stmt = $mysqli->query("insert into tbl_customer where id_customer='$_SESSION[id_customer]'");
			echo '		
				<div class="alert alert-success" role="alert" align="center">
					<b>NPWP berhasil disimpan... !!</b>
				</div>
			';
		}
		if($data['file_ktp'] == NULL){
			$ok_ext = array('jpg','png','jpeg'); // allow only these types of files
			$destination = 'ktp/'; // where our files will be stored
			$file = $_FILES['file_ktp'];
			$filename = explode(".", $file["name"]); 
			$file_name = $file['name']; // file original name
			$file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension
			$file_extension = $filename[count($filename)-1];
			$file_weight = $file['size'];
			$file_type = $file['type'];
			// If there is no error
			if( $file['error'] == 0 )
			{
				// check if the extension is accepted
				if( in_array($file_extension, $ok_ext)){
					// check if the size is not beyond expected size
					// rename the file
					$fileNewName = $id_customer.'.'.$file_extension ;
					// and move it to the destination folder
					if( move_uploaded_file($file['tmp_name'], $destination.$fileNewName) ){
						$file_ktp = 'ktp/'.$fileNewName;
						$stmt = $mysqli->query("UPDATE tbl_customer SET file_ktp='$file_ktp' WHERE id_customer='$_SESSION[id_customer]'");
						if($stmt){
						$stmt = $mysqli->prepare("INSERT INTO tbl_poinpencairan(id_customer,jum_pencairan,id_bank,tgl_pengajuan) VALUES(?,?,?,?)");
						$stmt->bind_param('siis',$id_customer,$jum_pencairan,$id_bank,$tanggal);
							if($stmt->execute()){
								echo '		
									<div class="alert alert-success" role="alert" align="center">
										<b>Terimakasih, permintaan anda sedang di proses... !!</b>
									  </div>
									<meta http-equiv="Refresh" content="1; URL='.getLink().'/member/poin">
							';
							}
						$stmt->close();						
						}
					}else{
						echo "can't upload file.";
					}
				}else{
					echo "File type is not supported.";
				}
			}
		}else{
			$stmt = $mysqli->prepare("INSERT INTO tbl_poinpencairan(id_customer,jum_pencairan,id_bank,tgl_pengajuan) VALUES(?,?,?,?)");
			$stmt->bind_param('siis',$id_customer,$jum_pencairan,$id_bank,$tanggal);
				if($stmt->execute()){
					echo '		
						<div class="alert alert-success" role="alert" align="center">
							<b>Terimakasih, permintaan anda sedang di proses... !!</b>
						  </div>
						<meta http-equiv="Refresh" content="1; URL='.getLink().'/member/poin">
					';
				}
			$stmt->close();		
		}
		$stmt = $mysqli->query("SELECT email FROM tbl_customer WHERE id_customer='$id_customer'");
		$data = $stmt->fetch_array();
		$to       = $data['email'];
		$pesan = "Yth. ".$_SESSION['nama_lengkap']."/".$_SESSION['id_customer']."
		Kami telah menerima permintaan pencairan poin sebesar $jum_pencairan.poin. Permintaan anda akan segera kami proses.";
		$subject  = 'Selamat Datang di oreli.co.id';
		$message  = $pesan;
		smtp_mail($to, $subject, $message, '', '', 0, 0, false);

	}
}
function poinTransfer(){
	global $mysqli;
	if(isset($_POST['btnTransfeRpoin'])){
		if(isset($_SESSION['id_customer'])){
			$id_customer = $_SESSION['id_customer'];		
		}else{
			$id_customer = getIpCustomer();		
		}
		$id__tujuan  = $_POST['jumlahPoin'];
		$jum_transfer  = $_POST['id_tujuan'];
		$tanggal = date('Y/m/d H:i:S');
		$stmt = $mysqli->prepare("INSERT INTO tbl_pointransfer(id_customer,id_tujuan,waktu,jumlah) VALUES(?,?,?,?)");
		$stmt->bind_param('sssi',$id_customer,$id__tujuan,$tanggal,$jum_transfer);
		if($stmt->execute()){
			echo '		
				<div class="alert alert-success" role="alert" align="center">
					<b>Terimakasih, permintaan anda sedang di proses... !!</b>
				  </div>
				<meta http-equiv="Refresh" content="1; URL='.getLink().'/member/poin">
		';
		}
		$stmt->close();
	}
}
function setPoin($id_customer,$aksi,$jumlah,$keterangan){
	global $mysqli;
		$stmt = $mysqli->prepare("select poin_akhir from tbl_poin where id_customer=? order by id_poin desc");
		$stmt->bind_param("s",$id_customer);
		$stmt->execute();
		$stmt->bind_result($poin_lama);
		$stmt->store_result();
		if($stmt->num_rows == 0){
			$poin_akhir = 0;
		}
		$stmt->fetch(); $stmt->close();
		$waktu = date('Y-m-d H:i:S');
		if($aksi == "-"){
			$poin_akhir = $poin_lama - $jumlah;			
		}else{
			$poin_akhir = $poin_lama + $jumlah;						
		}
		$stmt = $mysqli->prepare("INSERT INTO tbl_poin(id_customer,waktu,poin_lama,poin,poin_aksi,poin_akhir,status) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param('ssiisis',$id_customer,$waktu,$poin_lama,$jumlah,$aksi,$poin_akhir,$keterangan);
		$stmt->execute();
		$stmt->close();
}
function pesananReturnList(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$no_transaksi = $_GET['return'];
	$stmt = $mysqli->prepare("SELECT 
		tbl_produk.nama_produk,
		tbl_produk.kode_produk,
		tbl_orderdetail.keterangan, 
		tbl_orderdetail.jumlah 
			FROM tbl_orderdetail,tbl_produk,tbl_order
				WHERE tbl_order.id_customer=? AND tbl_order.no_transaksi=? AND tbl_orderdetail.no_transaksi=? AND tbl_produk.kode_produk=tbl_orderdetail.kode_produk");
	$stmt->bind_param('sss',$id_customer,$no_transaksi,$no_transaksi);
	$stmt->execute();
	$stmt->bind_result($nama_produk,$kode_produk,$keterangan,$jumlah);
	$stmt->store_result();
	$jumlahItem = $stmt->num_rows();
	echo'
		<input type="hidden" name="jumlahItem" value="'.$jumlahItem.'">
		<table class="table shopping-cart-table table-striped order-history">
              <thead>
                <tr>
                  <th width="20%"  style="text-align: center;">Kode Produk</th>
                  <th width="40%" >&nbsp Nama Produk</th>
                  <th width="20%">Qty</th>
                  <th width="20%">Jumlah di kembalikan</th>
                </tr>
              </thead>
              <tbody>
    ';
	$id=0;
	while($stmt->fetch()){
		printf('
				<tr>
                  <td style="text-align: center;">%s</td>
                  <td>%s %s</td>
					<td>%s</td>
					<td> 
					<input type="hidden" name="kodeproduk[%s]" value="%s" >
					<div class="input-group-qty"> <span class="pull-left"> </span>
						<input type="text" name="returnJumlah[%s]" class="input-number input--wd input-qty pull-left" value="0" min="0" max="%s" required>
						<span class="pull-left btn-number-container">
						<button type="button" class="btn btn-number btn-number--plus" data-type="plus"> + </button>
						<button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus"> – </button>
						</span> </div>
					</td>
                </tr>
		',getProdukKodeTampil($kode_produk) ,$nama_produk,$keterangan,$jumlah,$id,$kode_produk,$id,$jumlah);
		
		$id++;
	}
	$stmt->close();
	echo'
				<tr>
					<td colspan="2">
						<b>Keterangan Return : </b>
						<textarea class="text" name="keterangan" width="100%" rows="2" cols="75" placeholder="Alasan produk di kembalikan *"></textarea>
					</td>
					<td>
						<button class="btn btn--wd" name="btnReturnproduk" style="background-color:green">RETURN produk</button>
					</td>
				</tr>
			  </tbody>
			  </table>
	';
	if(isset($_POST['btnReturnproduk'])){
		$jumlahItem = $_POST['jumlahItem'];
		$i = 0;
		$berhasil=0;
		while($i < $jumlahItem){
			$kode_produk = $_POST['kodeproduk']; 
			$returnJumlah = $_POST['returnJumlah']; 
			$keterangan = $_POST['keterangan'];
			if($returnJumlah[$i] != 0){
				$stmt = $mysqli->prepare("insert into tbl_return(no_transaksi,kode_produk,jumlah,keterangan) values(?,?,?,?) ");
				$stmt->bind_param('ssis',$no_transaksi,$kode_produk[$i],$returnJumlah[$i],$keterangan);
				$stmt->execute();
				$stmt->close();
				$berhasil++;
			}
			$i++;
		}
		if($berhasil == $jumlahItem){
			echo '<br><br>
				<div class="alert alert-success" role="alert" align="center">
					<b>Terimakasih, permintaan anda sedang di proses... !!</b>
				  </div>
				<meta http-equiv="Refresh" content="3; URL=pesanan">
			';
		}else{
			echo '<br><br>
				<div class="alert alert-danger" role="alert" align="center">
					<b>Maaf, permintaan anda gagal di proses silahkan coba beberapa saat lagi... !!</b>
				  </div>
			';
		}
	}
}
function viewInvoice($no_transaksi){
	global $mysqli;
	echo '
		<div class="col-md-8 table-responsive" id="print-invoice">
		<div style="border : 2px solid green; padding:5px; width:700px;">
';
//	$no_transaksi = $_GET['invoice'];
$stmt = $mysqli->prepare("select
			tbl_customeralamat.nama_penerima,
			tbl_customeralamat.alamat_penerima,
			tbl_kota.kode_pos,
			tbl_customeralamat.tel_rumah,
			tbl_customeralamat.tel_handphone,
			tbl_kota.provinsi,
			tbl_kota.kota,
			tbl_kota.kecamatan,
			tbl_kota.kelurahan
				FROM tbl_customeralamat,tbl_kota,tbl_order
					WHERE tbl_order.no_transaksi=? AND tbl_order.id_customer = tbl_customeralamat.id_customer AND tbl_order.id_alamat = tbl_customeralamat.id_alamat AND tbl_customeralamat.id_kota = tbl_kota.id_kota
		");
		$stmt->bind_param('i',$no_transaksi);
		$stmt->execute();
		$stmt->bind_result($nama_penerima,$alamat_penerima,$kode_pos,$tel_rumah,$tel_handphone,$provinsi,$kota,$kecamatan,$kelurahan);
		$stmt->fetch();
		$stmt->close();
	echo"
	<table border='0' style='vertical-align: top; margin:5px;'>
				<tr>
					<th width='150px'></th>
					<th width='15px'></th>
					<th width='250px'></th>
				</tr>
				<tr>
					<th>Nomor Invoice</th>
					<td>:</td>
					<td>$no_transaksi</td>
				</tr>
				<tr>
					<th>Kepada</th>
					<td>:</td>
					<td>$nama_penerima</td>
				</tr>
				<tr>
					<th valign='top' >Alamat:</th>
					<td valign='top' >:</td>
					<td>$alamat_penerima <br>
                    Kelurahan $kelurahan, Kecamatan $kecamatan,
					$kota, Kode Pos $kode_pos</td>
				</tr>
				<tr>
					<th>Telepon</th>
					<td>:</td>
					<td>$tel_rumah / $tel_handphone</td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp </td>
				</tr>
				</table>
				Terima kasih telah berbelanja di ORELI. Rincian Pesanan Anda sebagai berikut:
				<br>
				<br>
			<div width='100%'>
		";
					pesananDetailList($no_transaksi);
		$stmt = $mysqli->query("select * from tbl_bank where id_customer='oreli'");
		$akun = $stmt->fetch_assoc();
		echo"
				<br>
				Silahkan lakukan pembayaran sesuai Total yang  harus dibayar, ke rekening Oreli berikut:
				<table border='0' style='vertical-align: top; margin:5px;'>
				<tr>
					<th width='150px'></th>
					<th width='15px'></th>
					<th width='250px'></th>
				</tr>
				<tr>
					<th>Nama Bank</th>
					<td>:</td>
					<td>$akun[nama_bank]</td>
				</tr>
				<tr>
					<th>Pemilik Rekening</th>
					<td>:</td>
					<td>$akun[atas_nama]</td>
				</tr>
				<tr>
					<th>Nomor Rekening</th>
					<td>:</td>
					<td>$akun[nomor_rekening]</td>
				</tr>
				<tr>
					<td colspan='3'>atau</td>
				</tr>
		";
		$akun = $stmt->fetch_assoc();
		echo"
				<tr>
					<th>Nama Bank</th>
					<td>:</td>
					<td>$akun[nama_bank]</td>
				</tr>
				<tr>
					<th>Pemilik Rekening</th>
					<td>:</td>
					<td>$akun[atas_nama]</td>
				</tr>
				<tr>
					<th>Nomor Rekening</th>
					<td>:</td>
					<td>$akun[nomor_rekening]</td>
				</tr>
		</table>
	"; $stmt->close();
	echo '
					<div style="padding : 5px; border : 1px solid red;padding:10px;" valign="top">
					<strong>PERHATIAN</strong>
					<table>
					<tr>
						<th  valign="top">1.</th>
						<td>Pembayaran dilakukan paling lambat 1x24 jam setelah Invoice ini diterima. Lewat dari itu, order ini akan dihapus dari sistem kami.</td>
					</tr>
					<tr>
						<th valign="top">2.</th>
						<td>Anda tidak perlu melakukan konfirmasi pembayaran  jika jumlah yang ditransfer sudah sesuai dengan Total yang harus dibayar berdasarkan Invoice.</td>
					</tr>
					<tr>
						<th valign="top">3.</th>
						<td>Jika jumlah yang anda transfer tidak sama dengan total yang harus dibayar berdasarkan Invoice, anda harus melakukan konfirmasi manual di <a href="konfirmasi-pembayaran">konfirmasi pembayaran</a>.</td>
					</tr>
					</table>
				</div>
';
}
function  getOrderInvoice(){
	global $mysqli;
	$tahun = date('y');
	$invoice = $tahun.'000100';
	$stmt = $mysqli->query("select count(no_transaksi) as urut from tbl_order");
	$row = $stmt->fetch_array();
	$urut = $row['urut']+1;
	$stmt->close();
	return $invoice+$urut;
}
function setOrderBaru(){
	global $mysqli;
	require_once('library/function.php');
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$tgl_sekarang = strtotime(date('Y-m-d'));
	$alamatEmail = $_SESSION['email'];
	$nama_penerima = $_SESSION['nama_penerima'];
	$alamat_penerima = $_SESSION['alamat_penerima'];
	$provinsi = $_SESSION['provinsi'];
	$kota = $_SESSION['kota'];
	$kecamatan = $_SESSION['kecamatan'];
	$kelurahan = $_SESSION['kelurahan'];
	$kode_pos = $_SESSION['kode_pos'];
	$tel_rumah = $_SESSION['tel_rumah'];
	$tel_handphone = $_SESSION['tel_handphone'];
	$catatan = $_POST['catatanPengiriman'];		
	$metode_pengiriman = $_POST['metodePengiriman'];
	$metode_pembayaran = $_POST['metodePembayaran'];
	$no_transaksi = getOrderInvoice();
	$waktu = date("Y-m-d H:i:S");
	$kode_unik = $_SESSION['kode_unik'];
	$diskon_produk = getCheckoutDiskon();
	$diskon_kirim = getSubsidiOngkir();
	$asuransi = getAsuransi();
	$jumlah_bayar = getCheckoutTotal();
	$biaya_kirim = getCheckoutOngkir();
	$belanja = "";
	$biaya_pesanan=0;
		if(!isset($_SESSION['id_customer']) OR $_POST['tambahAlamat'] == "tambah"){
			$nama_alamat = $_POST['nama_alamat'];
			$stmt = $mysqli->prepare("SELECT id_kota FROM tbl_kota WHERE provinsi=? AND kota=? AND kecamatan=? AND kelurahan=? ");
			$stmt->bind_param('ssss',$provinsi,$kota,$kecamatan,$kelurahan);
			$stmt->execute();	$stmt->bind_result($idkota);	$stmt->fetch();	$id_kota = $idkota;	$stmt->close();
			
			$stmt = $mysqli->prepare("INSERT INTO tbl_customeralamat(id_customer,nama_alamat,nama_penerima,alamat_penerima,id_kota,tel_rumah,tel_handphone) VALUES(?,?,?,?,?,?,?) ");
			$stmt->bind_param('ssssiss',$id_customer,$nama_alamat,$nama_penerima,$alamat_penerima,$id_kota,$tel_rumah,$tel_handphone);
			$stmt->execute();		$stmt->close();
			if($nama_alamat=="Alamat Tamu"){
				$stmt = $mysqli->prepare("INSERT INTO tbl_emailguest(no_transaksi,email) VALUES(?,?) ");
				$stmt->bind_param('ss',$no_transaksi,$alamatEmail);
				$stmt->execute();		$stmt->close();
			}
		}
		$sql1 = "select id_alamat from tbl_customeralamat where id_customer='$id_customer' AND nama_penerima='$nama_penerima' AND alamat_penerima='$alamat_penerima'";
			$stmt = $mysqli->prepare("select id_alamat from tbl_customeralamat where id_customer=? AND nama_penerima=? AND alamat_penerima=?");
			$stmt->bind_param('sss',$id_customer,$nama_penerima,$alamat_penerima);
			$stmt->execute();	$stmt->bind_result($id_alamat);	$stmt->fetch();		$stmt->close();
			
		$stmt = $mysqli->prepare("INSERT INTO tbl_order(no_transaksi,id_customer,id_alamat,waktu,
			kode_unik,diskon_produk,diskon_kirim,asuransi,jumlah_bayar,metode_pembayaran,catatan,biaya_kirim)
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('isisiiiiissi',$no_transaksi,$id_customer,$id_alamat,$waktu,$kode_unik,$diskon_produk,$diskon_kirim,$asuransi,$jumlah_bayar,$metode_pembayaran,$catatan,$biaya_kirim);
		if($stmt->execute()){
		$stmt->close();
			$stmt = $mysqli->query("INSERT INTO tbl_orderkode(no_transaksi) VALUES('$no_transaksi')");
			if($stmt){
			}{
			}
			if(isset($_SESSION['id_customer'])){
				$sql = "select tbl_ordertemp.kode_produk,tbl_ordertemp.keterangan,tbl_ordertemp.qty 
						from tbl_ordertemp
							WHERE tbl_ordertemp.id_customer='".$id_customer."' ";			
			}else{
				$sql = "select tbl_ordertemp.kode_produk,tbl_ordertemp.keterangan,tbl_ordertemp.qty 
						from tbl_ordertemp 
							WHERE tbl_ordertemp.id_customer='".$id_customer."'";
			}
			$stmt = $mysqli->query($sql);
			if($stmt){
				while($row = $stmt->fetch_assoc()){
					$kode_produk = $row['kode_produk'];
					$stmt2 = $mysqli->prepare("select harga,harga_diskon,berlaku,sampai from tbl_produk where kode_produk=?");
					$stmt2->bind_param('s',$kode_produk);
					$stmt2->execute();
					$stmt2->bind_result($harga,$harga_diskon,$berlaku,$sampai);		
					$stmt2->fetch();		
					$stmt2->close();		
					$tgl_berlaku = strtotime($berlaku);		
					$tgl_sampai = strtotime($sampai);
					if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){
						$harga = $harga_diskon;
					}else{
						$harga = $harga;
					}
					$jumlah = $row['qty'];
					$ket = explode(",",$row['keterangan']);
					$warna = $ket[1];
					$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),$warna);
					$keterangan = $row['keterangan'];
					$harga = $harga+$harga_tambah;
					$pindah = $mysqli->prepare("INSERT INTO tbl_orderdetail(no_transaksi,kode_produk,harga,jumlah,keterangan) VALUES(?,?,?,?,?)"); 
					$pindah->bind_param("isiis",$no_transaksi,$kode_produk,$harga,$jumlah,$keterangan);
					$pindah->execute();
					$pindah->close();
					$stmt3 = $mysqli->query("select nama_produk from tbl_produk where kode_produk='$kode_produk'");
					$row = $stmt3->fetch_array();
					$biaya_pesanan = $biaya_pesanan+$harga;
					$belanja = $belanja.'
					<tr>    
						<td>
							<a href="#" style="color: #000 ; text-decoration: none"><strong>'.$row['nama_produk'].'</strong></a><br>
							<small>('.$keterangan.')</small>
							<br/><small>SKU: '.str_replace(".","",$kode_produk).'</small>
						</td>
						<td style="text-align: center">
							'.$jumlah.'
						</td>
						<td style="text-align: right">
							Rp '.setHarga($harga).'
						</td>
					</tr>
					';
					$stmt3->close();
				}
				$stmt->close();
				if(isset($_SESSION['id_customer'])){
					$username = $_SESSION['id_customer'];
					$nama_lengkap=$_SESSION['nama_lengkap'];
					$tipe=$_SESSION['tipe'];
					$status=$_SESSION['status'];
					$_SESSION['id_customer'] = $username;
					$_SESSION['nama_lengkap'] = $nama_lengkap;
					$_SESSION['tipe'] = $tipe;
					$_SESSION['status'] = $status;		
				}
	$channel = explode('-',$metode_pembayaran);
	if($channel[0] == "DOKU"){
		$basket = "";
			$sql = "select tbl_ordertemp.kode_produk,tbl_ordertemp.keterangan,tbl_ordertemp.qty 
						from tbl_ordertemp 
							WHERE tbl_ordertemp.id_customer='".$id_customer."'";
			$stmt = $mysqli->query($sql);
			if($stmt){
				while($row = $stmt->fetch_assoc()){
					$kode_produk = $row['kode_produk'];
					$qty = $row['qty'];
					$keterangan = $row['keterangan'];
					$stmt2 = $mysqli->prepare("select harga,harga_diskon,berlaku,sampai,nama_produk from tbl_produk where kode_produk=?");
					$stmt2->bind_param('s',$kode_produk);
					$stmt2->execute();
					$stmt2->bind_result($harga,$harga_diskon,$berlaku,$sampai,$nama_produk);		
					$stmt2->fetch();		
					$stmt2->close();		
					$tgl_berlaku = strtotime($berlaku);		
					$tgl_sampai = strtotime($sampai);
					if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){
						$harga = $harga_diskon;
					}else{
						$harga = $harga;
					}
					$keterangan = explode(',',$keterangan);
					$warna = $keterangan[1];
					$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),$warna);
					$harga = $harga+$harga_tambah;
					$item = $nama_produk." ".$keterangan[1]." ".$keterangan[0]." ";
					if(isset($_SESSION['tipe'])){
						if($_SESSION['tipe']==2){
							$diskon = getDiskonAgen()*$harga/100;
						}else if($_SESSION['tipe']==3){
							$diskon = getDiskonMember()*$harga/100;
						}
					}else{
						$diskon = 0;
					}
					$basket = $basket.$item.",".($harga-$diskon).".00,".$qty.",".(($harga-$diskon)*$qty).".00;";
				}
				$basket = $basket."Biaya Kirim,".($biaya_kirim).".00,1,".($biaya_kirim).".00;";
				$stmt->close();
			}else{
			$stmt->close();
				echo '<br><br>
					<div class="alert alert-danger" role="alert" align="center">
						<b>Error Code : 4432 <br> Maaf, permintaan anda gagal di proses silahkan coba beberapa saat lagi... !!</b>
					</div>
				';
			}
		$amount = ($jumlah_bayar+$kode_unik).".00";
		$mallid = "1233";
		$SHAREDKEY = "J5riAM57u8Ps";
		$words = sha1($amount.$mallid.$SHAREDKEY.$no_transaksi);		
		$requestdatetime = date("YmdHis");
		$str = 'qazwsx'.rand(1000,9999);
		$sessionid = str_shuffle($str);
		clearCart();
		echo'
		<form action="https://pay.doku.com/Suite/Receive" id="MerchatPaymentPage" name="MerchatPaymentPage" method="post" >
			<input name="BASKET" type="hidden" id="BASKET" value="'.$basket.'"/>
			<input name="MALLID" type="hidden" id="MALLID" value="'.$mallid.'"/>
			<input name="SHAREDKEY " type="hidden" id="SHAREDKEY " value="'.$SHAREDKEY.'"/>
			<input name="SHAREKEY " type="hidden" id="SHAREKEY " value="'.$SHAREDKEY.'"/>
			<input name="CHAINMERCHANT" type="hidden" id="CHAINMERCHANT" value="NA"/>
			<input name="CURRENCY" type="hidden" id="CURRENCY" value="360"/>
			<input name="PURCHASECURRENCY" type="hidden" id="PURCHASECURRENCY" value="360"/>
			<input name="AMOUNT" type="hidden" id="AMOUNT" value="'.$amount.'"/>
			<input name="PURCHASEAMOUNT" type="hidden" id="PURCHASEAMOUNT" value="'.$jumlah_bayar.'.00" />
			<input name="TRANSIDMERCHANT" type="hidden" id="TRANSIDMERCHANT" value="'.$no_transaksi.'" />
			<input name="WORDS" type="hidden" id="WORDS" value="'.$words.'"/>
			<input name="REQUESTDATETIME" type="hidden" id="REQUESTDATETIME" value="'.$requestdatetime.'"/>
			<input name="SESSIONID" type="hidden" id="SESSIONID" value="'.$sessionid.'" />
			<input name="PAYMENTCHANNEL" type="hidden" id="PAYMENTCHANNEL" value="'.$channel[1].'"/>
			<input name="EMAIL" type="hidden" id="EMAIL" value="'.$alamatEmail.'" />
			<input name="NAME" type="hidden" id="NAME" value="'.$nama_penerima.'" />
			<input name="ADDRESS" type="hidden" id="ADDRESS" value="'.$alamat_penerima.'" />
			<input name="COUNTRY" type="hidden" id="COUNTRY" value="360" value/>
			<input name="STATE" type="hidden" id="STATE" value="'.$kecamatan.'" />
			<input name="CITY" type="hidden" id="CITY" value="'.$kota.'" />
			<input name="PROVINCE" type="hidden" id="PROVINCE" value="'.$provinsi.'" />
			<input name="ZIPCODE" type="hidden" id="ZIPCODE" value="'.$kode_pos.'" />
			<input name="HOMEPHONE" type="hidden" id="HOMEPHONE" value="'.$tel_rumah.'"/>
			<input name="MOBILEPHONE" type="hidden" id="MOBILEPHONE" value="'.$tel_handphone.'"  />
			<input name="WORKPHONE" type="hidden" id="WORKPHONE" value="'.$tel_rumah.'" />
			<section class="content top-null">
			  <div class="container">
				<div class="row">
				<div class="col-md-10 col-md-offset-1 col-xs-12 aside-column">
					<section class="content">               
					<div class="card card--padding">
						<center><h5 class="text-uppercase">Mohon tunggu, transaksi anda sedang di proses.</h5>
                          <button class="btn btn--wd" style="display:none;" type="submit" name="btnDoku" id="btnDoku">Lanjutkan Pembayaran</button></center>
						<div class="card__row-line"  style="text-align: justify;">
						</div>
					</div>
					</section>
				  </div>
				</div>
			  </div>
			</section>
		</form>
		';
		$stmt = $mysqli->query("INSERT INTO doku(transidmerchant,trxstatus) VALUES('$no_transaksi','Requested')");
	}
		if(isset($_SESSION['kupon_diskon'])){
			$stmt = $mysqli->query("UPDATE tbl_kupon SET kuota_tersedia=(kuota_tersedia-1) WHERE id_kupon='".$_SESSION['kupon_diskon']."'");			
		}

					$stmt = $mysqli->query("INSERT INTO tbl_orderstatus(no_transaksi,waktu) VALUES('".$no_transaksi."','".$waktu."') ");			
					if($stmt){
						$to       = $alamatEmail;
						$subject  = 'Pembelian oreli.co.id';
						if($metode_pembayaran== "DOKU"){
							$message  = '
								<p>Selamat, transaksi anda dengan nomor <b>'.$no_transaksi.'</b> telah kami terima, untuk melihat informasi detail pesanan silahkan lakukan pembayaran dan buka invioce anda di url berikut <a href="http://www.oreli.co.id/invoice/guest/'.md5(($no_transaksi*$kode_unik)).'"> lihat invoice saya</a>.</p><br><br>
								';
						}else{
		$stmtakun = $mysqli->query("select * from tbl_bank where id_customer='oreli'");
		$akun = $stmtakun->fetch_assoc();
		$akun_bank="
				<br>
				<h5>
				Silahkan lakukan pembayaran sesuai Total yang  harus dibayar, ke rekening Oreli berikut:</h5>
				<table border='0' style='vertical-align: top; margin:5px;'>
				<tr>
					<th width='150px'></th>
					<th width='15px'></th>
					<th width='250px'></th>
				</tr>
				<tr>
					<th>Nama Bank</th>
					<td>:</td>
					<td>$akun[nama_bank]</td>
				</tr>
				<tr>
					<th>Pemilik Rekening</th>
					<td>:</td>
					<td>$akun[atas_nama]</td>
				</tr>
				<tr>
					<th>Nomor Rekening</th>
					<td>:</td>
					<td>$akun[nomor_rekening]</td>
				</tr>
				<tr>
					<td colspan='3'>atau</td>
				</tr>
		";
		$akun = $stmtakun->fetch_assoc();
		$akun_bank = $akun_bank."
				<tr>
					<th>Nama Bank</th>
					<td>:</td>
					<td>$akun[nama_bank]</td>
				</tr>
				<tr>
					<th>Pemilik Rekening</th>
					<td>:</td>
					<td>$akun[atas_nama]</td>
				</tr>
				<tr>
					<th>Nomor Rekening</th>
					<td>:</td>
					<td>$akun[nomor_rekening]</td>
				</tr>
		</table>
	"; $stmtakun->close();
							$message  = '<html><head><meta http-equiv="Content-type" content="text/html; charset=utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=Edge">    <base target="_blank">    <style class="icloud-message-base-styles">        @font-face {          font-family: "SFNSText";          src: local(".SFNSText-Light"),               url("/fonts/SFNSText-Light.woff") format("woff");          font-weight: 300;        }        @font-face {          font-family: "SFNSText";          src: local(".SFNSText-Medium"),               url("/fonts/SFNSText-Medium.woff") format("woff");          font-weight: 500;        }        body {          background-color: #ffffff;          padding: 13px 20px 0px 20px;          font: 15px "SFNSText","Helvetica Neue", Helvetica, sans-serif;          font-weight: 300;          line-height: 1.4;          margin: 0px;          overflow: hidden;          word-wrap: break-word;        }        blockquote[type=cite].quoted-plain-text{        line-height:1.5;        padding-bottom: 0px;        white-space: normal;        }        blockquote[type=cite] {          border-left: 2px solid #003399;          margin:0;          padding: 0 12px 0 12px;          font-size: 15px;          color: #003399;        }        blockquote[type=cite] blockquote[type=cite] {          border-left: 2px solid #006600;          margin:0;          padding: 0 12px 0 12px;          font-size: 15px;          color: #006600        }        blockquote[type=cite] blockquote[type=cite] blockquote[type=cite] {          border-left : 2px solid #660000;          margin:0;          padding: 0 12px 0 12px;          font-size: 15px;          color: #660000        }        pre {          white-space: pre-wrap;          white-space: -moz-pre-wrap;          white-space: -pre-wrap;          white-space: -o-pre-wrap;          word-wrap: break-word;          white-space: pre-wrap !important;          word-wrap: normal !important;          font-size: 15px;        }        .pre-e204f232-9bf0-47b8-954c-08db2865ab39-orientation-2{          transform:scaleX(-1);          -webkit-transform:scaleX(-1);          -ms-transform:scaleX(-1);        }        .pre-e204f232-9bf0-47b8-954c-08db2865ab39-orientation-3{          transform:rotate(180deg);          -webkit-transform:rotate(180deg);          -ms-transform:rotate(180deg);        }        .pre-e204f232-9bf0-47b8-954c-08db2865ab39-orientation-4{          transform:rotate(180deg) scaleX(-1);          -webkit-transform:rotate(180deg) scaleX(-1);          -ms-transform:rotate(180deg) scaleX(-1);        }        .pre-e204f232-9bf0-47b8-954c-08db2865ab39-orientation-5{          transform:rotate(270deg) scaleX(-1);          -webkit-transform:rotate(270deg) scaleX(-1);          -ms-transform:rotate(270deg) scaleX(-1);        }        .pre-e204f232-9bf0-47b8-954c-08db2865ab39-orientation-6{          transform:rotate(90deg);          -webkit-transform:rotate(90deg);          -ms-transform:rotate(90deg);        }        .pre-e204f232-9bf0-47b8-954c-08db2865ab39-orientation-7{          transform:rotate(90deg) scaleX(-1);          -webkit-transform:rotate(90deg) scaleX(-1);          -ms-transform:rotate(90deg) scaleX(-1);        }        .pre-e204f232-9bf0-47b8-954c-08db2865ab39-orientation-8{          transform:rotate(270deg);          -webkit-transform:rotate(270deg);          -ms-transform:rotate(270deg);        }        .x-apple-maildropbanner {          margin-top:-13px;        }    </style><style type="text/css" class="existing-message-styles">
        html {
            width: 100%;
        }
        body {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            margin: 0;
            padding: 0;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
            table-layout: fixed;
            margin: 0 auto;
        }
        table table table {
            table-layout: auto;
        }
        img {
            display: block !important;
            overflow: hidden !important;
        }
        table td {
            border-collapse: collapse;
        }
</style><style class="icloud-message-dynamic-styles"> img._auto-scale, img._stretch {max-width: 668px !important;width: auto !important; height: auto !important; } span.body-text-content {white-space:pre-wrap;} iframe.attachment-pdf {width: 663px; height:479px;}._stretch {max-width: 668px  ; } body._mail-body-bg {width:708px !important; } ._mail-body {width:668px; }</style></head><body><div id="center">
<div id="main">
<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="center">
			<table class="table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
				<tbody>
					<tr>
						<td height="36">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 24px ; font-weight: bold ; line-height: 24px" align="left">Konfirmasi Pesanan '.$no_transaksi.'</td>
					</tr>
					<tr>
						<td height="24">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px" align="left">Hi,<strong> '.$nama_penerima.'</strong></td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px" align="left">
						<p>Terima kasih telah berbelanja di <a href="http://oreli.co.id"><mark style="background-color: #ffeda4">Oreli</mark>.co.id</a>!</p>
						<p>Kami ingin mengkonfirmasi bahwa pesanan Anda sudah kami terima, silahkan lakukan pembayaran agar pesanan&nbsp;anda segera diproses.</p><br>
						<p>Untuk melihat invoice silahkan klik link berikut <a href="http://www.oreli.co.id/invoice/guest/'.md5(($no_transaksi*$kode_unik)).'"> lihat invoice saya</a></p>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="center">
			<table class="table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
				<tbody>
					<tr>
						<td colspan="3" height="26">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3" style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; background-color: #eee ; padding-top: 8px ; padding-bottom: 8px ; padding-left: 12px" align="left">Berikut detail pemesanan Anda:</td>
					</tr>
					<tr>
						<td colspan="3" height="12">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px ; font-weight: bold" align="left">No Pesanan</td>
						<td colspan="2" style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px ; font-weight: bold" align="left">: '.$no_transaksi.'</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px ; font-weight: bold" align="left">Tanggal Pemesanan</td>
						<td colspan="2" style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px" align="left">: '.date('Y-m-d H:i').'</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px ; font-weight: bold" align="left">Status Pembayaran</td>
						<td colspan="2" style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px" align="left">: Menunggu Pembayaran</td>
					</tr>
					<tr>
						<td colspan="3" height="24">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"></td></tr><tr>
    <td colspan="3" style="border-collapse: collapse" height="12"></td>
</tr>
<tr>
    <td style="text-align: left ; padding: 8px ; background-color: #eee">
        Nama produk
    </td>
    <td style="text-align: center ; padding: 8px ; background-color: #eee">
        Jumlah
    </td>
    <td style="text-align: right ; padding: 8px ; background-color: #eee">
        Harga
    </td>
</tr>
<tr>
    <td colspan="3" style="border-collapse: collapse" height="12"></td>
</tr>
'.$belanja.'<tr>
    <td colspan="3" style="border-collapse: collapse" height="12"></td>
</tr>
<tr>
    <td colspan="3" style="border-top: 1px solid #ddd">&nbsp;</td>
</tr>
<tr>
    <td colspan="2" style="text-align: right"><em>Total pesanan &nbsp; </em></td>
    <td style="text-align: right">Rp '.setHarga($biaya_pesanan).'</td>
</tr>
<tr>
    <td colspan="2" style="text-align: right"><em>Biaya pengiriman &nbsp; </em></td>
    <td style="text-align: right">Rp '.setHarga($biaya_kirim).'</td>
</tr>
<tr>
    <td colspan="2" style="text-align: right"><em>Diskon produk &nbsp; </em></td>
    <td style="text-align: right">(-)Rp '.setHarga($diskon_produk).'</td>
</tr>
<tr>
    <td colspan="2" style="text-align: right"><em>Diskon pengiriman &nbsp; </em></td>
    <td style="text-align: right">(-)Rp '.setHarga($diskon_kirim).'</td>
</tr>
<tr>
    <td colspan="2" style="text-align: right"><em>Asuransi &nbsp; </em></td>
    <td style="text-align: right">(-)Rp '.setHarga($asuransi).'</td>
</tr>
<tr>
    <td colspan="2" style="text-align: right"><em>Diskon Hari Ini &nbsp; </em></td>
    <td style="text-align: right">(-)Rp '.setHarga($kode_unik).'</td>
</tr>
<tr>
    <td colspan="2" style="text-align: right"><strong><em>Total pembayaran &nbsp; </em></strong></td>
    <td style="text-align: right">Rp '.setHarga($jumlah_bayar).'</td>
</tr>
						</tbody></table><table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
						</table>
						</td>
					</tr>
					<tr>
						<td colspan="3" height="24">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3" height="24">&nbsp;</td>
					</tr>
				</tbody>
			</table>
<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="center">
			<table class="table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
				<tbody>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; border-bottom: 1px solid #ddd" align="left">
						<p>Pesanan Anda akan segera kami proses.</p>

						<p>Anda akan menerima email mengenai info pengiriman pesanan Anda.</p>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
'.$akun_bank.'
<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="center">
			<table class="table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
				<tbody>
					<tr>
						<td height="36">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 18px ; line-height: 24px ; font-weight: bold" align="left">Jika Anda membutuhkan bantuan</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px" align="left">Silakan hubungi Customer Service kami melalui email di <a href="mailto:cs@oreli.co.id" onclick="return false;">cs@<mark style="background-color: #ffeda4">oreli</mark>.co.id</a>&nbsp;atau hubungi 0811-2016-515 (Whatsapp), @orelishop (LINE).</td>
					</tr>
					<tr>
						<td height="12">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; font-weight: bold" align="left">Jam operasional :</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px" align="left">Senin - Jumat, 09.00 - 20.00 WIB</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px" align="left">Sabtu - Minggu, 09.00 - 18.00 WIB</td>
					</tr>
					<tr>
						<td height="12">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; font-weight: bold" align="left">Harap tidak membalas email ini.</td>
					</tr>
					<tr>
						<td height="24">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="center">
			<table class="table600" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
				<tbody>
					<tr>
						<td style="border-top: 1px solid #ddd" height="12">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; text-align: left ; padding: 8px">
						<p style="text-align: center"><font color="#333333"><a href="https://www.facebook.com/orelishop" style="display: inline-block"><img src="https://gallery.mailchimp.com/278d022e49699f1c6d92fcbd3/images/02263593-6b12-4b4d-bfd9-bd945cc0f0b6.png" width="32"></a> <a href="https://twitter.com/orelishop" style="display: inline-block"><img src="https://gallery.mailchimp.com/278d022e49699f1c6d92fcbd3/images/097793db-8f19-4e99-a219-9c2ad4ce11fb.png" width="32"></a> <a href="https://instagram.com/orelishop/" style="display: inline-block"><img src="https://gallery.mailchimp.com/278d022e49699f1c6d92fcbd3/images/b18f1d43-d9be-41f8-83fa-0a6d1c6cc973.png" width="32"></a> <a href="https://www.linkedin.com/company/orelishop" style="display: inline-block"><img src="https://gallery.mailchimp.com/278d022e49699f1c6d92fcbd3/images/045c24de-0ed2-486e-b404-c71675a729dc.png" width="32"></a></font></p>
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 1px solid #ddd" height="12">&nbsp;</td>
					</tr>
					<tr>
						<td height="12">&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align: center">
						<p style="font-family: &quot;helvetica&quot; , sans-serif ; font-size: 12px ; color: #888 ; text-align: center ; line-height: 18px"><font face="Arial, sans-serif" color="#333333"> 
						PT. TOKO RITEL INDONESIA. Jalan Raya Limo No. 189,Depok.</font></p>
						</td>
					</tr>
					<tr>
						<td height="12">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table></div></div></body></html>';
						}
						smtp_mail($to, $subject, $message, '', '', 0, 0, false);		
						//untuk admin
						smtp_mail("kurimen8@gmail.com", "Pemesanna Baru", "Ada pesanan baru dengan nomor transaksi : <b>$no_transaksi</b>", '', '', 0, 0, false);		
						sendSMS("checkout",$no_transaksi,$tel_handphone);
						clearCart();
						if($channel[0] != "DOKU"){
							include_once 'checkoutSukses.php';									
						}else{
							echo'
							<script>
								window.onload = function(){
									var button = document.getElementById("btnDoku");
									button.form.submit();
								}
							</script>
							';
							echo '<meta http-equiv="Refresh" content="5; URL=home">';
						}
					}else{
					$stmt->close();
						echo '<br><br>
							<div class="alert alert-danger" role="alert" align="center">
								<b>Error Code : 4438 <br> Maaf, permintaan anda gagal di proses silahkan coba beberapa saat lagi... !!</b>
							</div>
						';
					}
			}else{
			$stmt->close();
				echo '<br><br>
					<div class="alert alert-danger" role="alert" align="center">
						<b>Error Code : 4432 <br> Maaf, permintaan anda gagal di proses silahkan coba beberapa saat lagi... !!</b>
					</div>
				';
			}
		}else{
			printf('<br><br>
				<div class="alert alert-danger" role="alert" align="center">
					<b><b>Error Code : 4440 <br> Maaf, permintaan anda gagal di proses silahkan coba beberapa saat lagi... !!</b>
				</div>
			');
			echo mysqli_error($mysqli);
		$stmt->close();
		}
}

function pesananDetailList($invoice){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	if(isset($_GET['detail'])){
		$no_transaksi = $_GET['detail'];
	}else if(isset($_GET['invoice'])){
		$no_transaksi = $invoice;		
	}
	$stmt = $mysqli->prepare("SELECT 
		tbl_produk.nama_produk,
		tbl_orderdetail.harga,
		tbl_produk.kode_produk,
		tbl_orderdetail.keterangan, 
		tbl_orderdetail.jumlah 
			FROM tbl_orderdetail,tbl_produk,tbl_order
				WHERE tbl_order.id_customer=? AND tbl_order.no_transaksi=? AND tbl_orderdetail.no_transaksi=? AND tbl_produk.kode_produk=tbl_orderdetail.kode_produk");
	$stmt->bind_param('sss',$id_customer,$no_transaksi,$no_transaksi);
	$stmt->execute();
	$stmt->bind_result($nama_produk,$harga,$kode_produk,$keterangan,$jumlah);
	$total = 0;
	$keterangan = explode(",",$row['keterangan']);
	$ukuran = $keterangan[0];
	$warna = $keterangan[1];
	$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),$warna);
	if(isset($_GET['detail'])){
	echo'
		<table class="table shopping-cart-table table-striped text-center order-history">
              <thead>
                <tr>
                  <th>Kode Produk</th>
                  <th>Nama Produk</th>
                  <th>Jumlah</th>
                  <th>Harga (Rp)</th>
                  <th>Total (Rp)</th>
				  
                </tr>
              </thead>
              <tbody>
			';
	}else if(isset($_GET['invoice'])){
		echo '<table border="0" class="table table-striped" width="100%">
              <thead>
                <tr>
                  <th><center>Kode Produk</center></th>
                  <th width=30%><center>Nama Produk</center></th>
                  <th><center>Jumlah</center></th>
                  <th><center>Harga (Rp)</center></th>
                  <th><center>Total (Rp)</center></th>
				  
                </tr>
              </thead>
              <tbody>
			';
	}
	while($stmt->fetch()){
		$subtotal = $jumlah * ($harga+$harga_tambah);
			printf('
			     <tr>
                  <td style="text-align: center;">%s</td>
                  <td style="text-align: left;">%s %s</td>
                  <td style="text-align: center;">%s</td>
                  <td style="text-align: center;">%s</td>
                  <td style="text-align: right;"> %s &nbsp</td>
                </tr>
			',getProdukKodeTampil($kode_produk) ,$nama_produk, $keterangan, $jumlah, setHarga($harga),setHarga($subtotal));
			$total = $total+$subtotal;
	}
	echo '
	</tbody>
			  </table>
			  </div>
	';
	hitungPesanan($invoice,$total);
	$stmt->close();
}
function hitungPesanan($invoice,$total){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	if(isset($_GET['detail'])){
		$no_transaksi = $_GET['detail'];
	}else if(isset($_GET['invoice'])){
		$no_transaksi = $invoice;		
	}
	$stmt = $mysqli->prepare("select 
		tbl_order.biaya_kirim,
		tbl_order.kode_unik,
		tbl_order.asuransi,
		tbl_order.jumlah_bayar
			from tbl_kota,tbl_customeralamat,tbl_order 
				WHERE tbl_order.id_customer=? AND tbl_order.no_transaksi=? AND tbl_order.id_alamat=tbl_customeralamat.id_alamat AND tbl_customeralamat.id_alamat=tbl_kota.id_kota");
	$stmt->bind_param('ss',$id_customer,$no_transaksi);
	$stmt->execute();	
	$stmt->bind_result($ongkos_kirim,$kode_unik,$asuransi,$total_pembayaran);
	$stmt->fetch();
	$stmt->close();
	if(isset($_SESSION['tipe'])){
		if($_SESSION['tipe']==2){
			$diskon = getDiskonAgen()*$total/100;
		}else if($_SESSION['tipe']==3){
			$diskon = getDiskonMember()*$total/100;
		}
	}else{
		$diskon = 0;
	}
	if($ongkos_kirim >= getSubsidiOngkir()){
		$ongkos_kirim = $ongkos_kirim-getSubsidiOngkir();		
	}else{
		$ongkos_kirim;
	}
	if(isset($_GET['detail'])){
		echo '<table class="table shopping-cart-table text-center order-history">';
	}else if(isset($_GET['invoice'])){
		echo '<table border="0" width="100%">';
		echo "<hr>";
	}
	printf('	
              <tbody>
				<tr>
                  <td colspan="2" style="text-align: right;"> <b>TOTAL PESANAN</b> </td>
                  <td style="text-align: right;"> Total Harga</td>
                  <td style="text-align: center;"> Rp</td>
                  <td style="text-align: right;"> %s &nbsp</td>
               </tr>
                <tr>
                  <td  colspan="2"></td>
                  <td style="text-align: right;"> Biaya Pengiriman </td>
                  <td style="text-align: center;"> Rp</td>
                  <td style="text-align: right;"> %s &nbsp</td>
                </tr>
				<tr>
                  <td  colspan="2"></td>
                  <td style="text-align: right;"> Diskon produk</td>
                  <td style="text-align: center;"> Rp(-)</td>
                  <td style="text-align: right;"> %s &nbsp</td>
                </tr>
				<tr>
                  <td  colspan="2"></td>
                  <td style="text-align: right;"> Asuransi </td>
                  <td style="text-align: center;"> Rp(-)</td>
                  <td style="text-align: right;"> %s &nbsp</td>
                </tr>
				<tr>
                  <td  colspan="2"></td>
                  <td style="text-align: right;"> Diskon Hari Ini </td>
                  <td class="text-right"></td>
                  <td style="text-align: right;"> %s &nbsp</td>
                </tr>
                <tr>
                  <td  colspan="2"></td>
                  <td style="text-align: right;"><b>Total Pembayaran</b></td>
                  <td style="text-align: center;"> <b>Rp</b></td>
                  <td style="text-align: right;"><b> %s &nbsp</b></td>
                </tr>			  </tbody>
            </table>
	',setHarga($total),setHarga($ongkos_kirim),setHarga($diskon),setHarga($asuransi),$kode_unik,setHarga($total_pembayaran));

}
function pesananRefund(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$no_transaksi = $_GET['refund'];
	$stmt = $mysqli->query("select jumlah_bayar, jumlah_dibayar FROM tbl_order WHERE no_transaksi=".$no_transaksi." AND id_customer=".$id_customer." ");
	$row = $stmt->fetch_array();
	$refund = $row['jumlah_dibayar'] - $row['jumlah_bayar'];
	echo '
		<div class="row">
			<div class="col-xs-3">
				<label><b>No Transaksi :</b></label>
			</div>
			<div class="col-xs-8">
				<label id="noTransaksi" name="noTransaksi" ></label>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<label><b>Total Pembayaran :</b></label>
			</div>
			<div class="col-xs-8">
				<label id="jumlahBayar" name="jumlahBayar" >Rp'.setHarga($row['jumlah_bayar']).'</label>
				<input type="hidden" id="jumlahBayar" name="jumlahBayar" value="'.$row['jumlah_bayar'].'" />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<label><b>Yang di bayar :</b></label>
			</div>
			<div class="col-xs-8">
				<label id="jumlahDiBayar" name="jumlahDiBayar" >Rp'.setHarga($row['jumlah_dibayar']).'</label>
				<input type="hidden" id="jumlahDiBayar" name="jumlahDiBayar" value="'.$row['jumlah_dibayar'].'" />
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-3">
				<label><b>Total Refund:</b></label>
			</div>
			<div class="col-xs-8">
				<label id="jumlahRefund" name="jumlahRefund" value="'.$refund.'"><b>Rp'.setHarga($refund).'<b></label>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<label><b><br>Rekening Tujuan :</b></label>
			</div>
			<div class="col-xs-8">
				<select class="selectpicker" name="rekeningTujuan" id="rekeningTujuan" data-style="select--wd"  data-width="100%">
';
						rekeningList();
	echo'					
				</select>
			</div>
		</div>
	';
	$stmt->free();
	if(isset($_POST['btnRefund'])){
		if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
		$no_transaksi = $_GET['refund'];
		$id_bank = $_POST['rekeningTujuan'];
		$jumlahBayar = $_POST['jumlahBayar'];
		$jumlahDiBayar = $_POST['jumlahDiBayar'];
		$jumlahRefund = $jumlahDiBayar- $jumlahBayar;
		$stmt = $mysqli->prepare("INSERT INTO `tbl_refund`(id_customer,no_transaksi,id_bank,jumlah_refund) VALUES (?,?,?,?)");
		$stmt->bind_param('siii',$id_customer,$no_transaksi,$id_bank,$jumlahRefund);
		if($stmt->execute()){
			echo '		
				<div class="alert alert-success" role="alert" align="center">
					<b>Terimakasih, permintaan anda sedang di proses... !!</b>
				  </div>
				<meta http-equiv="Refresh" content="1; URL='.getLink().'pesanan">
			';
		}else{
			echo $sql;
			echo "gagal";
		}
		$stmt->close();
	}
}

function getCart(){
	global $mysqli;
	
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("select kode_produk,keterangan,qty from tbl_ordertemp where id_customer='".$id_customer."' ");
	echo '
	<div class="header__cart pull-left"><span class="header__cart__indicator hidden-xs" style="font-size:18px;">Rp'.setHarga(getCartPrice()).'</span>
          <div class="dropdown pull-right">
		  <a href="" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown">
			<img class="hidden-xs" src="'.getLink().'/images/troli.png" />
			<img class="visible-xs" style="margin:12% 0 0 -50%;width:80%;" src="'.getLink().'/images/troli.png" />
			<span class="badge badge--menu hidden-xs">'.getCartJum().'</span>
			<span class="badge badge--menu visible-xs" style="margin:10% 40% 0 0;">'.getCartJum().'</span>
		  </a>
            <div class="dropdown-menu animated fadeIn shopping-cart" role="menu">
              <div class="shopping-cart__settings"><a href="'.getLink().'/cart">Lihat Detail</a></div>
              <div class="shopping-cart__top text-uppercase">Belanja Anda( '.getCartJum().' )</div>
			  <ul>
    ';
	while($row = $stmt->fetch_assoc()){
		$kode_produk = $row['kode_produk'];
		$pecah = explode(',',$row['keterangan']);
		$ukuran = $pecah[0];
		$warna = $pecah[1];
		$qty = $row['qty'];
		
		$stmt2 = $mysqli->prepare("select nama_produk,harga,harga_diskon,berlaku,sampai from tbl_produk where kode_produk=?");
		$stmt2->bind_param('s',$kode_produk);
		$stmt2->execute();
		$stmt2->bind_result($nama_produk,$harga,$harga_diskon,$berlaku,$sampai);
		$stmt2->fetch();
		$stmt2->close();
		$tgl_sekarang = strtotime(date('Y-m-d'));
		$tgl_berlaku = strtotime($berlaku);
		$tgl_sampai = strtotime($sampai);
		if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){
			$harga = $harga_diskon;
		}else{
			$harga = $harga;
		}
		$stmt2 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk' AND warna='$warna'");
		if($stmt2->num_rows > 0){
			$row = $stmt2->fetch_assoc();
				$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
		}else{
			$src = getLink()."/images/products/standard.jpg";	
		}
		$stmt2->close();
		$sku = str_replace(".","+",$kode_produk);
		printf("      
					<li class='shopping-cart__item'>
					  <div class='shopping-cart__item__image pull-left'><img src='%s' alt=''/></div>
					  <div class='shopping-cart__item__info'>
						<div class='shopping-cart__item__info__title'>
						  <h2 class='text-uppercase'><a href='".getLink()."/produk/".str_replace(' ','_',$nama_produk)."-".str_replace(' ','_',$row['warna'])."'>%s</a></h2>
						</div>
						<div class='shopping-cart__item__info__option'>Color: %s</div>
						<div class='shopping-cart__item__info__option'>Size: %s</div>
						<div class='shopping-cart__item__info__price'>Rp%s</div>
						<div class='shopping-cart__item__info__qty'>Qty: %s</div>
						<div class='shopping-cart__item__info__delete'>
							<a onClick=delCart('%s/%s/%s') id='delete_cart' class='icon icon-clear'></a>
						</div>
					  </div>
					</li>
				  
		",$src,$nama_produk,$warna,$ukuran,setHarga($harga),$qty,$kode_produk,$ukuran,str_replace(" ","_",$warna));
	}
	echo'       </ul>
				<div class="shopping-cart__bottom">
                <div class="pull-left">Subtotal : <span class="shopping-cart__total"> '.setHarga(getCartPrice()).'</span></div>
                <div class="pull-right">
    ';
		if(getCartPrice() > 0){
			if(isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 3){
				if(getOrderJum() >= 0 OR getCartJum() >= 1){
					echo '<a href="'.getLink().'/checkout"><button class="btn btn--wd text-uppercase">Bayar</button></a>';							
				}else{
					echo '<button class="btn btn--wd text-uppercase disabled">Bayar</button>';						
				}
			}else if(isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 2){
				if(getCartPrice() > 20000000){
					echo '<a href="'.getLink().'/checkout"><button class="btn btn--wd text-uppercase">Bayar</button></a>';							
				}else{
					echo '<button class="btn btn--wd text-uppercase disabled">Bayar</button>';						
				}
			}else{
				echo '<a href="'.getLink().'/checkout"><button class="btn btn--wd text-uppercase">Bayar</button></a>';							
			}
		}else{
			echo '<button class="btn btn--wd text-uppercase disabled">Bayar</button>';						
		}
		echo'            </div>
              </div>
            </div>
          </div>
        </div>
	';
	$stmt->close();
}
function getCartJum(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("select kode_produk,sum(qty) as qty_jum from tbl_ordertemp where id_customer='".$id_customer."' ");
//	$total_item = $stmt->num_rows;
//	return $total_item;
	$row = $stmt->fetch_array();
	return $row['qty_jum'];
	$stmt->close();
}

function getKodeUnik(){
	$kode_unik = rand(100,999);
	$_SESSION['kode_unik'] = $kode_unik;
	return $kode_unik;
}
function getCheckoutTotal(){
	$harga_produk = getCartPrice();
	$diskon_produk = getCheckoutDiskon();
	$biaya_pengiriman = getCheckoutOngkir();
	$subsidi_ongkir = getSubsidiOngkir();
	if(isset($_SESSION['asuransi'])){
		$asuransi = getAsuransi();		
	}else{
		$asuransi = 0;				
	}
	$kode_unik = $_SESSION['kode_unik'];
	$harga_total = 0;
	$ongkir = 0;
	if($biaya_pengiriman > $subsidi_ongkir){
		$ongkir = $biaya_pengiriman - $subsidi_ongkir;
	}
	if(isset($_SESSION['tipe']) AND $_SESSION['tipe']==2){
		$harga_total = $harga_produk - $diskon_produk + $ongkir - $kode_unik;
	}else{
		$harga_total = $harga_produk - $diskon_produk + $ongkir - $kode_unik + $asuransi;
	}
	return $harga_total;
}
function getCheckoutOngkir(){
	if(isset($_SESSION['biaya_pengiriman'])){
		return $_SESSION['biaya_pengiriman']*$_SESSION['total_berat'];
	}else{
		return 0;
	}
	
}

function getCheckoutDiskon(){
	global $mysqli;
	$diskon = 0;
	$total_harga = getCartPrice();
	if(isset($_SESSION['id_customer'])){
		if($_SESSION['tipe']  == 3){			
			$jumlah_potongan = getDiskonMember();
			$diskon = $diskon+($total_harga * $jumlah_potongan / 100);
		}else if($_SESSION['tipe']  == 2){
			$jumlah_potongan = getDiskonAgen();
			$diskon = $diskon+($total_harga * $jumlah_potongan / 100);			
		}
	}else{
		$jumlah_potongan = getDiskonNonMember();
		$diskon = $diskon+($total_harga * $jumlah_potongan / 100);			
	}
	if(isset($_SESSION['kupon_diskon'])){
		$kupon_diskon = explode('-',$_SESSION['diskon']);
		$tipe = $kupon_diskon[0];
		$jumlah_potongan = $kupon_diskon[1];
		if($tipe == '%'){
			$jumlah_potongan = ($total_harga * $jumlah_potongan / 100);
			$diskon = $diskon+$jumlah_potongan;
		}else if($tipe == 'Rp'){
			$diskon = $diskon+$jumlah_potongan;
		}
	}
	return $diskon;
}
function getCartPrice(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("select kode_produk,qty,keterangan from tbl_ordertemp where id_customer='".$id_customer."' ");
	$total_harga = 0;
	while($row = $stmt->fetch_assoc()){
		$kode_produk = $row['kode_produk'];
		$keterangan = explode(",",$row['keterangan']);
		$ukuran = $keterangan[0];
		$warna = $keterangan[1];
		$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),$warna);
		$qty = $row['qty'];
		$stmt2 = $mysqli->prepare("select harga,harga_diskon,berlaku,sampai from tbl_produk where kode_produk=?");
		$stmt2->bind_param('s',$kode_produk);
		$stmt2->execute();
		$stmt2->bind_result($harga,$harga_diskon,$berlaku,$sampai);
		$stmt2->fetch();
		$stmt2->close();
		$tgl_sekarang = strtotime(date('Y-m-d'));
		$tgl_berlaku = strtotime($berlaku);
		$tgl_sampai = strtotime($sampai);
		if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){
			$harga = $harga_diskon;
		}
		$total_harga = $total_harga + (($harga+$harga_tambah) * $qty);
	}
	$stmt->close();
		return $total_harga;		
}
function getCartPriceFinal(){
	$total_harga = getCartPrice();
	if(isset($_SESSION['diskon'])){
		$kupon_diskon = explode('-',$_SESSION['diskon']);
		$tipe = $kupon_diskon[0];
		$jumlah_potongan = $kupon_diskon[1];
		if($tipe == '%'){
			$total_harga = $total_harga-($total_harga * $jumlah_potongan / 100);
		}else if($tipe == 'Rp'){
			$total_harga = $total_harga-$jumlah_potongan;
		}
	}
	if(isset($_SESSION['estimasi_ongkir'])){
		$total_harga = $total_harga+$_SESSION['estimasi_ongkir'];
	}
		return $total_harga;		
}
function getCartList($preview){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->query("select kode_produk,keterangan,qty from tbl_ordertemp where id_customer='".$id_customer."' ");
	$index =0;
	$jumlah_item = $stmt->num_rows;
	$total_berat =0;
	while($row = $stmt->fetch_assoc()){
		$kode_produk = $row['kode_produk'];
		$pecah = explode(',',$row['keterangan']);
		$ukuran = $pecah[0];
		$warna = $pecah[1];
		$harga_tambah = getProdukHargaTambahan(str_replace(' ','.',$kode_produk),$warna);
		$qty = $row['qty'];
		$stmt2 = $mysqli->prepare("select stok from tbl_produkstok where kode_produk=?");
		$stmt2->bind_param('s',$kode_produk);
		$stmt2->execute();
		$stmt2->bind_result($stok);
		$stmt2->fetch();
		$stmt2->close();
	
		$stmt2 = $mysqli->prepare("select nama_produk,harga,harga_diskon,berlaku,sampai,berat from tbl_produk where kode_produk=?");
		$stmt2->bind_param('s',$kode_produk);
		$stmt2->execute();
		$stmt2->bind_result($nama_produk,$harga,$harga_diskon,$berlaku,$sampai,$berat);
		$stmt2->fetch();
		$stmt2->close();
		$tgl_sekarang = strtotime(date('Y-m-d'));
		$tgl_berlaku = strtotime($berlaku);
		$tgl_sampai = strtotime($sampai);
		if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){
			$harga = $harga_diskon;
		}else{
			$harga = $harga;
		}
		$harga = $harga+$harga_tambah;
		$stmt2 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk' AND warna='$warna'");
		if($stmt2->num_rows > 0){
			$row = $stmt2->fetch_assoc();
			$src = "images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
		}else{
			$src = "images/products/standard.jpg";	
		}
		$stmt2->close();
		$sku = str_replace(".","+",$kode_produk);
		printf("
              <tr>
				<input type='hidden' name='jumlah_item' id='jumlah_item' value='".$jumlah_item."' ></input>
				<input type='hidden' class='kode_produk' name='kode_produk[".$index."]' id='kode_produk[".$index."]' value='".str_replace('.',' ',$kode_produk)."' ></input>
					<input type='hidden' class='nama_produk' name='nama_produk[".$index."]' id='nama_produk[".$index."]' value='".$nama_produk."' ></input>
						<input type='hidden' class='keterangan' name='keterangan[".$index."]' id='keterangan[".$index."]' value='".$ukuran.",".$warna."' ></input>
        ");
		if($preview != "preview"){
		printf("
                <td><div class='th-title visible-xs'>Hapus :</div>
                  <a class='icon-clear shopping-cart-table__delete' onClick=delCart('%s/%s/%s') id='delete_cart'></a></td>
        ",$kode_produk,$ukuran,str_replace(" ","_",$warna));
		}			
		printf("
                <td class='no-title'><div class='shopping-cart-table__product-image'><img src='%s' alt=''/></div></td>
                <td><div class='th-title visible-xs'>Nama Produk:</div>
                  <h6 class='shopping-cart-table__product-name text-left text-uppercase'><a href='produk/".str_replace(' ','_',$nama_produk)."-".str_replace(' ','_',$warna)."'>%s</a></h6>
					<h6 class='text-left'>Ukuran : %s</h6>
					<h6 class='text-left'>Warna  : %s</h6>
				</td>
                <td><div class='th-title visible-xs'>Harga:</div>
                  <div class='shopping-cart-table__product-price'>Rp%s</div></td>
                <td><div class='th-title visible-xs'>Jumlah:</div>
        ",$src,$nama_produk,$ukuran,$warna,setHarga($harga));
		$total_berat = $total_berat+($berat*$qty);
		if($preview == "preview"){
		printf("
                  <div class='shopping-cart-table__product-qty'>%s</div></td>
        ",$qty);
		}else{			
		printf("
				<div class='input-group-qty'> <span class='pull-left'> </span>
                 <input type='text' name='qty[".$index."]' id='qty[".$index."]' class='input-number input--wd input-qty pull-left qty' value='%s' min='1' max='%s'>
                    <span class='pull-left btn-number-container'>
                    <button type='button' class='btn btn-number btn-number--plus' data-type='plus'> + </button>
                    <button type='button' class='btn btn-number btn-number--minus' data-type='minus'> – </button>
                  </span> </div>			
        ",$qty,$stok);
		}
		printf("  </td>
					<td><div class='th-title visible-xs'>Subtotal:</div>
                  <div class='shopping-cart-table__product-price'>Rp%s</div></td>
              </tr>             

		",setHarga($harga*$qty));
		$index++;
	}
	$b = round(($total_berat/1000));
	if($b == 0){
		$_SESSION['total_berat'] = 1;		
	}else{
		$_SESSION['total_berat'] = $b;		
	}
	echo "<input type='hidden' name='total_berat' id='total_berat' value='".$total_berat."' ></input>";
	$stmt->close();
}
function getWishlist(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}

	$stmt = $mysqli->query("select kode_produk,keterangan from tbl_produkwishlist where id_customer='".$id_customer."' ");
	$index =0;
	$jumlah_item = $stmt->num_rows;
	while($row = $stmt->fetch_assoc()){
		$kode_produk = $row['kode_produk'];
		$pecah = explode(',',$row['keterangan']);
		$ukuran = $pecah[0];
		$id_warna = $pecah[1];
		$stmt2 = $mysqli->prepare("select warna from tbl_produkwarna where id_produkwarna=?");
		$stmt2->bind_param('i',$id_warna);
		$stmt2->execute();
		$stmt2->bind_result($warna);
		$stmt2->fetch();
		$stmt2->close();
		$stmt2 = $mysqli->prepare("select stok from tbl_produkstok where kode_produk=?");
		$stmt2->bind_param('s',$kode_produk);
		$stmt2->execute();
		$stmt2->bind_result($stok);
		$stmt2->fetch();
		$stmt2->close();
	
		$stmt2 = $mysqli->prepare("select nama_produk,harga,harga_diskon,berlaku,sampai,berat from tbl_produk where kode_produk=?");
		$stmt2->bind_param('s',$kode_produk);
		$stmt2->execute();
		$stmt2->bind_result($nama_produk,$harga,$harga_diskon,$berlaku,$sampai,$berat);
		$stmt2->fetch();
		$stmt2->close();
		$tgl_sekarang = strtotime(date('Y-m-d'));
		$tgl_berlaku = strtotime($berlaku);
		$tgl_sampai = strtotime($sampai);
		if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_sampai){
			$harga = $harga_diskon;
		}else{
			$harga = $harga;
		}
		$stmt2 = $mysqli->query("select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk' AND warna='$warna'");
		if($stmt2->num_rows > 0){
			$row = $stmt2->fetch_assoc();
			$src = "images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'].'.jpg';
		}else{
			$src = "images/products/standard.jpg";	
		}
		$stmt2->close();
		if($stok > 0){
			$status = '<span class="label label-success">TERSEDIA</span>';
		}else{
			$status = '<span class="label label-danger">TIDAK TERSEDIA</span>';			
		}
		printf('
		<tr class="text-center">
			<td class="no-title image-col text-left"><div class="shopping-cart-table__product-image"><img src="'.getLink()."/".$src.'" alt=""/></div></td>
			<td class="text-left"><div class="th-title visible-xs">Product Name:</div>
                  <h6 class="shopping-cart-table__product-name text-left text-uppercase"><a href="produk/'.str_replace(' ','_',$nama_produk).'-'.$warna.'">%s</a></h6>
					<h6 class="text-left">Ukuran : %s</h6>
					<h6 class="text-left">Warna  : %s</h6>
            <td><div class="th-title visible-xs">Unit Price:</div>
				<div class="shopping-cart-table__product-price">Rp%s</div></td>
            <td><div class="th-title visible-xs">Stock</div>
				<div class="shopping-cart-table__product-price">%s</div></td>
			</td>
            <td><div class="th-title visible-xs">Remove:</div>
				<a class="icon-clear" href="#" onClick=deleteWishlist("'.str_replace(".","-",$kode_produk).'/'.$ukuran.','.$id_warna.'") ></a>
			</td>
        </tr>
		',$nama_produk,$ukuran,$warna,setHarga($harga),$status);
		$index++;
	}
	$stmt->close();
	
}
function clearCart(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$stmt = $mysqli->prepare("delete from tbl_ordertemp where id_customer=?");
	$stmt->bind_param("s",$id_customer);
	if($stmt->execute()){
/*		echo '		
				<div class="alert alert-success" role="alert" align="center">
					<b>Keranjang telah dikosongkan.</b>
				  </div>
		';
*/	}else{
/*		echo '		
				<div class="alert alert-danger" role="alert" align="center">
					<b>Keranjang gagal dikosongkan.</b>
				  </div>
		';
*/	}
	$stmt->close();
}
function updateCart(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$jumlah_item = $_POST['jumlah_item'];
	$kode_produk = str_replace(' ','.',$_POST['kode_produk']);
	$nama_produk = $_POST['nama_produk'];
	$keterangan = $_POST['keterangan'];
	$qty = $_POST['qty'];
	$index =0;
	while($index < $jumlah_item){		
		$a = $qty[$index];
		$b = $id_customer;
		$c = $kode_produk[$index];
		$d = $keterangan[$index];
		$stmt = $mysqli->prepare("update tbl_ordertemp set qty=? where id_customer=? AND kode_produk=? AND keterangan=?");
		$stmt->bind_param("isss",$a,$b,$c,$d);
		$stmt->execute();
		$index++;
		$stmt->close();
	}
}

function setKuponDiskon(){
	global $mysqli;
	if(isset($_POST['btnKupon'])){
		$id_kupon = $_POST['kode_kupon'];
		$_SESSION['kupon_diskon'] = $id_kupon;
		if(isset($_SESSION['id_customer'])){
			$id_customer = $_SESSION['id_customer'];		
		}else{
			$id_customer = getIpCustomer();		
		}
	
		$id_kupon = $_SESSION['kupon_diskon'];
		$stmt = $mysqli->prepare("select max_pemakaian,tipe_kupon,jumlah_potongan,min_belanja,kuota_tersedia,tgl_berlaku,tgl_berakhir FROM tbl_kupon where id_kupon=? AND (id_customer=? OR id_customer='all')");
		$stmt->bind_param("ss",$id_kupon,$id_customer);
		$stmt->execute();
		$stmt->bind_result($max_pemakaian,$tipe_kupon,$jumlah_potongan,$min_belanja,$kuota_tersedia,$tgl_berlaku,$tgl_berakhir);
		$stmt->fetch();
		$stmt->close();
		$tgl_sekarang = strtotime(date("Y-m-d H:i:s"));
		$berlaku = strtotime($tgl_berlaku);
		$berakhir = strtotime($tgl_berakhir);
		if($berlaku < $tgl_sekarang AND $tgl_sekarang < $berakhir){
			if($kuota_tersedia > 0){
				if(getCartPrice() >= $min_belanja){
					if($kuota_tersedia!=0){
						if($tipe_kupon == '%'){
							$_SESSION['diskon'] = "-".$jumlah_potongan."% ";
						}else if($tipe_kupon == 'Rp'){
							$_SESSION['diskon'] = "Rp-".$jumlah_potongan;
						}else{
							return "0";
						}
					}else{
						echo '		
							<div class="alert alert-danger" role="alert" align="center">
								<b>Sudah mencapai maksimal pemakaian kupon.</b>
							</div>
						';
					}
				}else{
					echo '		
						<div class="alert alert-warning" role="alert" align="center">
							<b>Total belanjaan anda kurang, minimal pembelian '.setHarga($min_belanja).'.</b>
						</div>
					';
				}
			}else{
				echo '		
					<div class="alert alert-danger" role="alert" align="center">
						<b>Kuota kupon sudah habis.</b>
					</div>
				';
			}
		}else{
			echo '		
				<div class="alert alert-danger" role="alert" align="center">
					<b>Kupan tidak bisa dipakai, hanya berlaku '.$tgl_berlaku.' s/d '.$tgl_berakhir.'.</b>
				</div>
			';
		}
	}	
}


function getAsuransi(){	
	if(isset($_SESSION['asuransi'])){
		return $_SESSION['asuransi'];
	}else{
		return 0;
	}
}
function getEstimasiOngkir(){
	if(isset($_SESSION['estimasi_ongkir'])){
		return setHarga($_SESSION['estimasi_ongkir']);
	}
}
function getKuponDiskon(){
	global $mysqli;
	if(isset($_SESSION['kupon_diskon'])){
		if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
		}else{
			$id_customer = getIpCustomer();		
		}
	
		$id_kupon = $_SESSION['kupon_diskon'];
		$stmt = $mysqli->prepare("select max_pemakaian,tipe_kupon,jumlah_potongan,min_belanja,kuota_tersedia,tgl_berlaku,tgl_berakhir FROM tbl_kupon where id_kupon=? AND (id_customer=? OR id_customer='all')");
		$stmt->bind_param("ss",$id_kupon,$id_customer);
		$stmt->execute();
		$stmt->bind_result($max_pemakaian,$tipe_kupon,$jumlah_potongan,$min_belanja,$kuota_tersedia,$tgl_berlaku,$tgl_berakhir);
		$stmt->fetch();
		$stmt->close();
		$tgl_sekarang = strtotime(date("Y-m-d"));
		$tgl_berlaku = strtotime($tgl_berlaku);
		$tgl_berakhir = strtotime($tgl_berakhir);
		if($tgl_berlaku < $tgl_sekarang AND $tgl_sekarang < $tgl_berakhir){
			if($kuota_tersedia > 0){
				if(getCartPrice() >= $min_belanja){
					if($max_pemakaian-$kuota_tersedia!=0){
						if($tipe_kupon == '%'){
							return ($jumlah_potongan." %");
						}else if($tipe_kupon == 'Rp'){
							return ("Rp".setharga($jumlah_potongan));
						}else{
							return "0";
						}
					}else{
						echo "Kupon sudah tidak bisa dipakai.";
					}
				}else{
					echo "Total belanjaan anda kurang, minimal pembelian ".setHarga($min_belanja).".";
				}
			}else{
				echo "Kupon sudah tidak bisa dipakai.";
			}
		}else{
			echo "Kupon sudah tidak berlaku.";
		}
	}
}

function returnBarang(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$no_transaksi = $_POST['no_transaksi'];
	$kode_produk = str_replace("/",".",$_POST['kode_produk']);
	$jumlah = $_POST['jumlah'];
	$keterangan = $_POST['keterangan'];
	$stmt = $mysqli->prepare("insert into tbl_return(no_transaksi,kode_produk,jumlah,keterangan,status) VALUES(?,?,?,?,0)");
	$stmt->bind_param("ssis",$no_transaksi,$kode_produk,$jumlah,$keterangan);
	if($stmt->execute()){
		echo '		
			<div class="alert alert-success" role="alert" align="center">
				<b>Permintaan berhasil, silahkan tunggu konfirmasi dari kami dan kirim barang yang akan ditukar ke alamat oreli.</b>
			</div>
		';
	}else{
		echo '		
			<div class="alert alert-danger" role="alert" align="center">
				<b>Gagal memasukan data, silahkan periksa data kembali.</b>
			</div>
		';
	}
	$stmt->close();
}
function konfirmasiPembayaran(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$no_transaksi = $_POST['no_transaksi'];
	$atas_nama = $_POST['atas_nama'];
	$metode_pembayaran = $_POST['pembayaran'];
	$jumlah_transfer = $_POST['jumlah_transfer'];
	$rekening_tujuan = explode('/',$_POST['rekening_tujuan']);
	$nama_bank = $rekening_tujuan[0];
	$no_rek = $rekening_tujuan[1];
	$waktu = date('Y:m:d H:i:S');
	$tgl_transfer = $_POST['tgl_transfer'];
	$jam_transfer = $_POST['jam_transfer'];
	$waktu = date('Y:m:d H:i:S');
	$waktu_transfer = $tgl_transfer." ".$jam_transfer;
	$stmt = $mysqli->query("select * from tbl_order where no_transaksi='$no_transaksi'");
	if($stmt->num_rows > 0){
		$stmt = $mysqli->prepare('select id_bank from tbl_bank where nama_bank=? AND nomor_rekening=? AND id_customer="oreli"');
		$stmt->bind_param("ss",$nama_bank,$no_rek);
		$stmt->execute();
		$stmt->bind_result($id_bank);
		$stmt->fetch();
		$stmt->close();
		$stmt = $mysqli->prepare('insert into tbl_orderkonfirmasi(waktu,waktu_transfer,no_transaksi,atas_nama,no_rekening,ke,jumlah_transfer) values(?,?,?,?,?,?,?)');
		$stmt->bind_param("ssisssi",$waktu,$waktu_transfer,$no_transaksi,$atas_nama,$no_rekening,$id_bank,$jumlah_transfer);
		if($stmt->execute()){
			echo '		
					<div class="alert alert-success" role="alert" align="center">
						<b>Konfirmasi berhasil, sedang dalam proses pengecekan oleh kami.</b>
					  </div>
			';
		}else{
			echo '		
					<div class="alert alert-danger" role="alert" align="center">
						<b>Gagal memasukan data konfirmasi, silahkan periksa data kembali.</b>
					  </div>
			';
		}
		$stmt->close();
	}else{
		echo '		
			<div class="alert alert-danger" role="alert" align="center">
				<b>Maaf, nomor transaksi tersebut tidak terdaftar.</b>
		  </div>
		';				
	}
}
function showPagination($produk_gender,$produk_slug,$produk_style,$limit){
	global $mysqli;
	if($produk_gender != "ALL" AND $produk_slug == "ALL"){
		$gender = str_replace("_"," ",$produk_gender);
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}		
		$sql = "SELECT COUNT(*) AS total FROM tbl_produk WHERE tbl_produk.publish=1  AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3)";
	}else if($produk_gender != "ALL" AND $produk_slug != "ALL"){
		$gender = str_replace("_"," ",$produk_gender);
		$slug = str_replace('_',' ',$produk_slug);
		if($gender == "men"){
			$gen = 1;
		}else if($gender == "women"){
			$gen = 2;
		}		
		$sql = "SELECT COUNT(*) AS total FROM tbl_produk WHERE tbl_produk.publish=1  AND (replace(substr(tbl_produk.kode_produk,3,2),'.','')=$gen OR replace(substr(tbl_produk.kode_produk,3,2),'.','')=3)";
	}else if($produk_gender == "ALL" AND $produk_slug == "ALL"){
		$sql = 'SELECT COUNT(*) AS total FROM tbl_produk WHERE tbl_produk.publish=1';		
	}
    $countTotalRow = $mysqli->query($sql);
    $queryResult = $countTotalRow->fetch_assoc();
    $totalRow = $queryResult['total'];
 
    $totalPage = ceil($totalRow / $limit);
 
	if(isset($_SESSION['start_page'])){
		$p = $_SESSION['start_page'];
	}else{
		$p=1;
	}
   $page = 1;
	if($p == 1){
		echo'    <li class="disabled">
		  <span aria-hidden="true">&laquo;</span>
		  <li>
		';
	}else{
		echo"    <li>
			  <a href='#' onClick=goPage('1') aria-label='Previous'>
				<span aria-hidden='true'>&laquo;</span>
			  </a>
			</li>
		";
	}
    while ($page <= $totalPage){
			if($p == $page){
				echo"    <li class='active'><a href='#' onClick=goPage('".$page."')>".$page."</a></li>";
			}else{
				echo"    <li><a href='#' onClick=goPage('".$page."')>".$page."</a></li>";
			}
			$page++;
    }
	if($page == $p+1){	
	echo'    <li class="disabled">
			<span aria-hidden="true">&raquo;</span>
		</li>';
	}else{
		$p = $page-1;
	echo"    <li>
				<a href='#' onClick=goPage('".$totalPage."') aria-label='Next'>
			<span aria-hidden='true'>&raquo;</span>
		  </a>
		</li>";
	}
}

function undangMember(){
	global $mysqli;
	require_once('library/function.php');
	if(isset($_SESSION['id_customer'])){
		$nama = $_SESSION['nama_lengkap'];		
	}else{
		$nama = "Admin";		
	}
	$nama_lengkap = $_POST['nama_lengkap'];
	$alamatEmail = $_POST['email'];
	$pesan = $_POST['pesan_anda'];
	
	$to       = $alamatEmail;
	$subject  = 'Undangan Bergabung di oreli.co.id untuk '.$nama_lengkap;
	$message  = $pesan;
	$kirim = smtp_mail($to, $subject, $message, '', '', 0, 0, false);		
	if(!$kirim){
		echo '<br><br>
			<div class="alert alert-success" role="alert" align="center">
				<b>Undangan berhasil dikirim...</b>
			</div>
		';
	}else{
		echo '<br><br>
			<div class="alert alert-danger" role="alert" align="center">
				<b>Undangan gagal dikirim...</b>
			</div>
		';
	}
	
}

function produkReview(){
	global $mysqli;
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];		
	}else{
		$id_customer = getIpCustomer();		
	}
	$quality = $_POST['ratingQuality'];
	$price = $_POST['ratingPrice'];
	$value = $_POST['ratingValue'];
	$nickname = $_POST['nickname'];
	$review = $_POST['review'];
	$waktu = date("Y-m-d H:i:S");
	$url = explode('/',$_GET['produk']);
	$nama_produk = str_replace('_',' ',$url[0]);	
	$stmt = $mysqli->prepare("select kode_produk from tbl_produk where nama_produk='$nama_produk'");
	$stmt->execute();	$stmt->bind_result($kode_produk);	$stmt->fetch();	$stmt->close();
	$stmt = $mysqli->prepare("INSERT into tbl_produkreview(nickname,id_produk,quality,price,value,waktu,review) VALUES(?,?,?,?,?,?,?) ");
	$stmt->bind_param("ssiiiss",$nickname,$kode_produk,$quality,$price,$value,$waktu,$review);
	if($stmt->execute()){
		echo '		
			<div class="alert alert-success" role="alert" align="center">
				<b>Review telah ditambahkan, Terimakasih atas review yang anda berikan.</b>
		  </div>
		';		
	}else{
		echo '		
			<div class="alert alert-danger" role="alert" align="center">
				<b>Maaf, review anda tidak dapat disimpan.</b>
		  </div>
		';		
	}
	$stmt->close();
}

?>