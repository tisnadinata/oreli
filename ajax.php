<?php
session_start();
include_once 'functions/functions.php';
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];
	}else{
		$id_customer = getIpCustomer();
	}
	
if(isset($_POST['generateReferal'])){
	$kode = $_POST['generateReferal'];
	$status = true;
	$tambah = 0;
	$sql = "select count(*) as jum from tbl_customer where substr(id_customer,1,6) = '$kode'";
	$stmt = $mysqli->query($sql);
	$data = $stmt->fetch_array();
	$kode = $kode.$data['jum'];
	echo $kode;
}
if(isset($_POST['deleteFromCart'])){
	$deleteFromCart = str_replace(' ','.',$_POST['deleteFromCart']);
	$deleteFromCart = explode('/',$deleteFromCart);
	$kode_produk = $deleteFromCart[0];
	$ukuran = $deleteFromCart[1];
	$warna = $deleteFromCart[2];
	$keterangan = $ukuran.",".str_replace("_"," ",$warna);
	$stmt = $mysqli->prepare("delete from tbl_ordertemp where id_customer=? AND kode_produk=? AND keterangan=? ");
	$stmt->bind_param('sss',$id_customer,$kode_produk,$keterangan);
	if($stmt->execute()){
		echo "berhasil";
	}else{
		echo "gagal";
	}
	$stmt->close();
}
if(isset($_POST['toCart'])){
		if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];
		}else{
			$id_customer = getIpCustomer();
		}
		$toCart = explode('/',$_POST['toCart']);		
		$kode_produk = $toCart[0];
		$ukuran = $toCart[1];
		$warna = $toCart[2];
		$qty = $toCart[3];
		$keterangan = $ukuran.",".$warna;
		$stmt = $mysqli->prepare("select kode_produk from tbl_ordertemp where id_customer=? AND kode_produk=? AND keterangan=? ");
		$stmt->bind_param('sss',$id_customer,$kode_produk,$keterangan);
		$stmt->execute();
		$stmt->store_result();
		$numrows = $stmt->num_rows();
		if($numrows > 0){
			$sql = "UPDATE tbl_ordertemp SET qty=(qty+".$qty.") WHERE id_customer='".$id_customer."' AND kode_produk='".$kode_produk."' AND keterangan='".$keterangan."' ";
		}else{
			$sql = "insert into tbl_ordertemp(id_customer,kode_produk,keterangan,qty) values('".$id_customer."','".$kode_produk."','".$keterangan."',".$qty.")";
		}
		$mysqli->query($sql);
		$stmt->close();
}
	
if(isset($_POST['addtocart'])){
	$addtocart = str_replace(' ','.',$_POST['addtocart']);
	$addtocart = explode('/',$addtocart);
	$kode_produk = $addtocart[0];
	$ukuran = $addtocart[1];
	$warna = str_replace("_"," ",$addtocart[2]);
	$keterangan = $ukuran.",".$warna;
	$stmt = $mysqli->prepare("select kode_produk from tbl_ordertemp where id_customer=? AND kode_produk=? ");
	$stmt->bind_param('ss',$id_customer,$kode_produk);
	$stmt->execute();
	$stmt->store_result();
	$numrows = $stmt->num_rows();
	if($numrows > 0){
		$sql = "UPDATE tbl_ordertemp SET qty=(qty+1) WHERE id_customer='".$id_customer."' AND kode_produk='".$kode_produk."' AND keterangan='".$keterangan."' ";
	}else{
		$sql = "insert into tbl_ordertemp(id_customer,kode_produk,keterangan,qty) values('".$id_customer."','".$kode_produk."','".$keterangan."',1)";
	}
	if($mysqli->query($sql)){
		echo "berhasil";
	}else{
		echo "gagal";
	}
	$stmt->close();
}

if(isset($_POST['deleteWishlist'])){
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];
	}else{
		$id_customer = getIpCustomer();
	}
	$deleteWishlist = explode("/",$_POST['deleteWishlist']);
	$kode = str_replace("-",".",$deleteWishlist[0]);
	$keterangan = $deleteWishlist[1];
	$sql = "delete from tbl_produkwishlist where id_customer='".$id_customer."' AND kode_produk='".$kode."' AND keterangan='".$keterangan."'";
	$stmt= $mysqli->prepare($sql);
	if($stmt->execute()){
		getWishlist();
	}else{
		echo "gagal";		
	}
	$stmt->close();
}

if(isset($_POST['btnEstimasi'])){
	global $mysqli;
	
	$provinsi = $_POST['provinsi'];
	$kota = $_POST['kota'];
	$kecamatan = $_POST['kecamatan'];
	$kelurahan = $_POST['kelurahan'];
	
	$stmt=$mysqli->prepare("select biaya from tbl_kota where lower(provinsi)=? AND lower(kota)=? AND lower(kecamatan)=? AND lower(kelurahan)=? ");
	$stmt->bind_param("ssss",$provinsi,$kota,$kecamatan,$kelurahan);
	$stmt->execute();
	$stmt->bind_result($biaya);
	$stmt->fetch();
	$stmt->close();
	
	echo setHarga(($biaya*$_SESSION['total_berat']));
}
if(isset($_POST['return_produk'])){
	global $mysqli;
	
	$return_produk = $_POST['return_produk'];
	
	$sql = "select UPPER(tbl_produk.nama_produk),tbl_produk.kode_produk from tbl_produk,tbl_orderdetail where tbl_produk.kode_produk = tbl_orderdetail.kode_produk AND tbl_orderdetail.no_transaksi ='$return_produk'";
		echo $sql;
	$stmt=$mysqli->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($nama_produk,$kode_produk);
	while($stmt->fetch()){
		echo "<option value='".str_replace('.','/',$kode_produk)."'>$nama_produk</option>";
	}
	$stmt->close();	
}

if(isset($_POST['addtowishlist'])){
	$addtowishlist = str_replace(' ','.',$_POST['addtowishlist']);
	$addtowishlist = explode('/',$addtowishlist);
	$kode_produk = $addtowishlist[0];
	$ukuran = $addtowishlist[1];
	$warna = $addtowishlist[2];
	$keterangan = $ukuran.",".$warna;
	$stmt = $mysqli->prepare("select kode_produk from tbl_produkwishlist where id_customer='$id_customer' AND kode_produk='$kode_produk' AND keterangan='".$keterangan."' ");
	$stmt->execute();
	$stmt->store_result();
	$numrows = $stmt->num_rows();
	if($numrows > 0){
		$sql = "select * from tbl_produkwishlist";
	}else{
		$sql = "insert into tbl_produkwishlist(id_customer,kode_produk,keterangan) values('".$id_customer."','".$kode_produk."','".$keterangan."')";
	}
	if($mysqli->query($sql)){
		echo "berhasil".$sql;
	}else{
		echo "gagal".$sql;
	}
	$stmt->close();
}

if(isset($_POST['subscribe'])){
	$email = $_POST['subscribe'];
	$sql = "insert into tbl_subscriber(email) values('".$email."')";
	$mysqli->query($sql);
	$stmt->close();
}

if(isset($_POST['lang'])){
	$_SESSION['lang'] = $_POST['lang'];
}

if(isset($_POST['warna'])){
		$pecah = explode('/',$_POST['warna']);
		$warna = $pecah[0];
		$nama_produk = $pecah[1];
		$get_kode = $mysqli->prepare("SELECT kode_produk FROM tbl_produk WHERE nama_produk=?");
		$get_kode->bind_param("s", str_replace('_',' ',$nama_produk));
		$get_kode->execute();
		$get_kode->bind_result($kode_produk);
		$get_kode->fetch();
		$get_kode->close();
		$sql = "SELECT DISTINCT ukuran FROM tbl_produkstok WHERE kode_produk='$kode_produk' AND warna='$warna'";
		$get_det_ukuran = $mysqli->query($sql);
		$i=10;
		echo "<ul class='options-swatch options-swatch--size options-swatch--lg ukuran' >";
		while($row = $get_det_ukuran->fetch_assoc()){
			$ukur = $row['ukuran'];
			if($row['ukuran'] == "ALLSIZE"){
				$ukuran = "ALL SIZE";
			}
			echo "<li style='width:auto;'>
			<input id='radio".$i."'  class='ukuran' type='radio' name='ukuran' value='$ukur/$nama_produk'>
			<label for='radio".$i."' >
				<span style='background-color:white;width:auto;'>
				&nbsp $ukuran &nbsp
				</span>
			</label>
			</li>
		";	$i++;
		}
		echo "</ul>";
		$get_det_ukuran->close();
}
if(isset($_POST['warnaCek'])){
	if(isset($_SESSION['warnaCek'])){
		echo $_SESSION['warnaCek'];
	}else{
		echo "-";
	}
}
if(isset($_POST['informasiPengiriman'])){
	$id_alamat = $_POST['informasiPengiriman'];
		$id_customer = $_SESSION['id_customer'];
		$stmt = $mysqli->prepare("SELECT 
			tbl_customeralamat.nama_alamat,
			tbl_customer.email,
			tbl_customeralamat.nama_penerima,
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
					WHERE tbl_customeralamat.id_customer=? and tbl_customeralamat.id_customer = tbl_customer.id_customer and tbl_customeralamat.id_alamat=? and tbl_kota.id_kota=tbl_customeralamat.id_kota");
		$stmt->bind_param("ss", $id_customer,$id_alamat);
		$stmt->execute();
		$stmt->bind_result($nama_alamat,$email,$nama_penerima,$alamat_penerima,$kode_pos,$tel_rumah,$tel_handphone,$provinsi,$kota,$kecamatan,$kelurahan,$biaya);
		echo '
			<table class="table">
              <thead>
                <tr>
                  <th width="20%">Nama Penerima</th>
                  <th width="40%">Alamat Pengiriman</th>
                  <th width="20%">Kode Pos</th>
				  <th width="20%">Telepon/Handphone</th>				  
                </tr>
              </thead>
              <tbody>
		';
		$stmt->fetch();
			printf("
			<tr>
					  <td><div class='th-title visible-xs'>Penerima</div>%s</td>
					  <td><div class='th-title visible-xs'>Alamat</div>%s <br> %s, %s, %s</td>
					  <td><div class='th-title visible-xs'>Kode Pos</div>%s</td>
					  <td><div class='th-title visible-xs'>Telepon/Handphone</div>%s / %s</td>
			",$nama_penerima,$alamat_penerima, $provinsi,$kota, $kecamatan, $kode_pos,$tel_rumah,$tel_handphone);		
		echo '
              </tbody>
            </table>
		';
		?>
								<div class="row">
							<div class="col-xs-10 col-xs-offset-1">
							<div class="col-xs-4">
								<label>Catatan Pengiriman:</label>
							</div>
							<div class="col-xs-8">
								<textarea class="textarea--wd textarea--wd--full" name="catatanPengiriman" id="catatanPengiriman" placeholder="Catatan untuk pengiriman"></textarea>
							</div>
							<?php
									echo'<button data-toggle="collapse" href="#collapseThree" aria-controls="collapseThree" data-parent="#checkout3" class="btn btn--wd  col-md-offset-1" name="btnGoStep3" id="btnGoStep3">LANJUT</button>';									
							?>
							</div>							
						</div>
		<?php
		$_SESSION['id_alamat'] = $id_alamat;
		$_SESSION['nama_penerima'] = $nama_penerima;
		$_SESSION['alamat_penerima'] = $alamat_penerima;
		$_SESSION['provinsi'] = $provinsi;
		$_SESSION['kota'] = $kota;
		$_SESSION['kecamatan'] = $kecamatan;
		$_SESSION['kelurahan'] = $kelurahan;
		$_SESSION['kode_pos'] = $kode_pos;
		$_SESSION['email'] = $email;
		$_SESSION['tel_rumah'] = $tel_rumah;
		$_SESSION['tel_handphone'] = $tel_handphone;
		$_SESSION['biaya_pengiriman'] = $biaya;
		$stmt->close();
}


if(isset($_POST['btnGoStep3'])){
	if(isset($_SESSION['id_customer'])){
		$id_customer = $_SESSION['id_customer'];
		$stmt = $mysqli->query("select email from tbl_customer where id_customer='$id_customer'");
		$row = $stmt->fetch_array();
		$_SESSION['email'] = $row['email'];
	}else{
		$_SESSION['email'] = $_POST['email'];
	}
	$_SESSION['nama_penerima'] = $_POST['nama_penerima'];
	$_SESSION['alamat_penerima'] = $_POST['alamat_penerima'];
	$_SESSION['provinsi'] = $_POST['provinsi'];
	$_SESSION['kota'] = $_POST['kota'];
	$_SESSION['kecamatan'] = $_POST['kecamatan'];
	$_SESSION['kelurahan'] = $_POST['kelurahan'];
	$_SESSION['kode_pos'] = $_POST['kode_pos'];
	$_SESSION['tel_rumah'] = $_POST['tel_rumah'];
	$_SESSION['tel_handphone'] = $_POST['tel_handphone'];
	$sql = "select biaya from tbl_kota where provinsi='".$_SESSION['provinsi']."' AND kota='".$_SESSION['kota']."' AND kecamatan='".$_SESSION['kecamatan']."' AND kelurahan='".$_SESSION['kelurahan']."'";
	$stmt= $mysqli->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($biaya);
	$stmt->fetch();
	$stmt->close();
	$_SESSION['biaya_pengiriman'] = $biaya;
	echo $sql;	
} 

if(isset($_POST['setSmall'])){
	$i=0;
	$j=0;
	$hasil[0]='';
	$jum = ($_POST["jum"]-1);
	echo "@";
	while($i <= $jum ){
		if($_SESSION['warna['.$i.']'] == $_POST['setSmall']){
			$hasil[$j] = $_SESSION['warna['.$i.']'].$_SESSION['id_image['.$i.']'];
			$j++;
		}
		echo $_SESSION['warna['.$i.']'].$_SESSION['id_image['.$i.']'];
		echo "@";
		$i++;
	}
	echo "/@";
	$k=0;
	while($k<$j){
		echo $hasil[$k];		
		echo "@";
		$k++;
	}
}
if(isset($_POST['setSmallGallery'])){
	$nama_produk = str_replace('_',' ',$_POST['image_produk']);
	$warna = $_POST['image_warna'];
	$_SESSION['produk_warna'] = $nama_produk."-".$warna;
	$stmt = $mysqli->prepare("select kode_produk from tbl_produk where nama_produk='$nama_produk'");
	$stmt->execute();
	$stmt->bind_result($kode_produk);
	$stmt->fetch();
	$stmt->close();
	$sql = "select replace(kode_produk,'.','') as kode,warna,id_image from tbl_produkimage where kode_produk='$kode_produk' AND warna='$warna'";
	$stmt2 = $mysqli->query($sql);
	$i=0;
	if($stmt2->num_rows > 0){
		$j=1;
		while($row = $stmt2->fetch_array()){
			$src = getLink()."/images/products/".$row['kode'].'-'.$row['warna'].'-'.$row['id_image'];
			$ext = "jpg";
			$url = $src.".".$ext;
			echo '
				<li class="slick-slide slick-active" data-slick-index="'.$i.'" aria-hidden="false" style="width: 95%px;margin-bottom:10px;">
				<img onClick=setProdukImage2("'.$url.'") src="'.$url.'" alt="" /></li>
			';
			$j++;
			$i++;
		}
	}else{
		$src = getLink()."/images/products/standard";
		$ext = "jpg";
			$url = $src.".".$ext;
		echo '
				<li class="slick-slide slick-active" data-slick-index="'.$i.'" aria-hidden="false" style="width: 82px;">
				<img onClick=setProdukImage2("'.$url.'") src="'.$url.'" alt="" /></li>
		';		
	}
	$_SESSION['warnaCek'] = $_POST['id'];
	$stmt2->close();
}
if(isset($_POST['asuransi'])){
	if($_POST['asuransi'] == 1){
		$harga_barang = getCartPrice();
		$asuransi = (($harga_barang/100*0.2) + 5000);
		$_SESSION['asuransi'] = $asuransi;
		echo setHarga(getAsuransi());
	}else{
		unset($_SESSION['asuransi']);		
		echo 0;
	}
}
if(isset($_POST['ongkir'])){
	if($_POST['ongkir'] == "tambah"){
		echo "(isi alamat dahulu dan klik continue)";
	}else{
		echo setHarga(getCheckoutOngkir());
	}
}
if(isset($_POST['total'])){
	if($_POST['total'] == "tambah"){
		echo "(isi alamat dahulu dan klik continue)";
	}else{
		echo setHarga(getCheckoutTotal());
	}
}

if(isset($_POST['sort_order'])){
	$sort_order = $_POST['sort_order'];
	$_SESSION['sort_order'] = $sort_order;
	produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$sort_order,$_SESSION['sort_by'],$_SESSION['sort_limit'],$_SESSION['start_page']);
}
if(isset($_POST['sort_by'])){
	$sort_by = $_POST['sort_by'];
	$_SESSION['sort_by'] = $sort_by;
	produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_order'],$sort_by,$_SESSION['sort_limit'],$_SESSION['start_page']);
}
if(isset($_POST['sort_limit'])){
	$sort_limit = $_POST['sort_limit'];
	$_SESSION['sort_limit'] = $sort_limit;
	produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_order'],$_SESSION['sort_by'],$sort_limit,$_SESSION['start_page']);
}
if(isset($_POST['start_page'])){
	$start_page = $_POST['start_page'];
	$_SESSION['start_page'] = $start_page;
	produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_order'],$_SESSION['sort_by'],$_SESSION['sort_limit'],$start_page);
}
if(isset($_POST['produk_pagination'])){
	$limit = $_SESSION['sort_limit'];
	showPagination($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_limit']);	
}
if(isset($_POST['filter_price'])){
	$filter_price = $_POST['filter_price'];
	$cbo = $_POST['cbo'];
	if(!isset($_SESSION['filter_price'])){
		$_SESSION['filter_price'] = null;
	}
	if($filter_price =="checked" ){
		if($_SESSION['filter_price'] == null){
			$condition = "(";
		}else{
			$condition = "OR ";			
		}
		$_SESSION['filter_price'] = str_replace(")"," ",$_SESSION['filter_price']);
		if($cbo == "cboPrice1"){
			$_SESSION['filter_price'] = $_SESSION['filter_price'].$condition."tbl_produk.harga <= 100000";			
		}else if($cbo == "cboPrice2"){
			$_SESSION['filter_price'] = $_SESSION['filter_price'].$condition."tbl_produk.harga BETWEEN 100000 and 200000";			
		}else if($cbo == "cboPrice3"){
			$_SESSION['filter_price'] = $_SESSION['filter_price'].$condition."tbl_produk.harga BETWEEN 200000 and 300000";			
		}else if($cbo == "cboPrice4"){
			$_SESSION['filter_price'] = $_SESSION['filter_price'].$condition."tbl_produk.harga BETWEEN 300000 and 400000";			
		}else if($cbo == "cboPrice5"){
			$_SESSION['filter_price'] = $_SESSION['filter_price'].$condition."tbl_produk.harga > 400000";			
		}
		$_SESSION['filter_price'] = $_SESSION['filter_price'].")";
	}else if($filter_price =="unchecked" ){
		if($cbo == "cboPrice1"){
			$del_filter = "tbl_produk.harga < 100000";			
		}else if($cbo == "cboPrice2"){
			$del_filter = "tbl_produk.harga BETWEEN 100000 and 200000";			
		}else if($cbo == "cboPrice3"){
			$del_filter = "tbl_produk.harga BETWEEN 200000 and 300000";			
		}else if($cbo == "cboPrice4"){
			$del_filter = "tbl_produk.harga BETWEEN 300000 and 400000";			
		}else if($cbo == "cboPrice5"){
			$del_filter = "tbl_produk.harga > 400000";			
		}
		$_SESSION['filter_price'] = str_replace("(".$del_filter." OR ","(",$_SESSION['filter_price']);
		$_SESSION['filter_price'] = str_replace("(".$del_filter.")","()",$_SESSION['filter_price']);
		$_SESSION['filter_price'] = str_replace(" OR ".$del_filter.")",")",$_SESSION['filter_price']);		
		$_SESSION['filter_price'] = str_replace(" OR ".$del_filter." OR "," OR ",$_SESSION['filter_price']);		
		if($_SESSION['filter_price'] == "()"){
			unset($_SESSION['filter_price']);
		}
	}
	produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_order'],$_SESSION['sort_by'],$_SESSION['sort_limit'],$_SESSION['start_page']);
}

if(isset($_POST['filter_color'])){
	$filter_color = $_POST['filter_color'];
	$warna = $_POST['cboWarna'];
	if(!isset($_SESSION['filter_color'])){
		$_SESSION['filter_color'] = null;
	}
	if($filter_color =="checked" ){
		if($_SESSION['filter_color'] == null){
			$condition = "(";
		}else{
			$condition = " OR ";			
		}
		$_SESSION['filter_color'] = str_replace(")","",$_SESSION['filter_color']);
		$_SESSION['filter_color'] = $_SESSION['filter_color'].$condition."tbl_produkwarna.warna='$warna' AND tbl_produkstok.id_produkwarna = tbl_produkwarna.id_produkwarna";			
		$_SESSION['filter_color'] = $_SESSION['filter_color'].")";
	}else if($filter_color =="unchecked" ){
		$del_warna = "tbl_produkwarna.warna='$warna' AND tbl_produkstok.id_produkwarna = tbl_produkwarna.id_produkwarna";
		$_SESSION['filter_color'] = str_replace("(".$del_warna." OR ","(",$_SESSION['filter_color']);
		$_SESSION['filter_color'] = str_replace("(".$del_warna.")","()",$_SESSION['filter_color']);
		$_SESSION['filter_color'] = str_replace(" OR ".$del_warna.")",")",$_SESSION['filter_color']);		
		$_SESSION['filter_color'] = str_replace(" OR ".$del_warna." OR "," OR ",$_SESSION['filter_color']);		
		if($_SESSION['filter_color'] == "()"){
			unset($_SESSION['filter_color']);
		}
	}
	produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_order'],$_SESSION['sort_by'],$_SESSION['sort_limit'],$_SESSION['start_page']);
}

if(isset($_POST['filter_size'])){
	$filter_size = $_POST['filter_size'];
	$size = $_POST['cboSize'];
	if(!isset($_SESSION['filter_size'])){
		$_SESSION['filter_size'] = null;
	}
	if($filter_size =="checked" ){
		if($_SESSION['filter_size'] == null){
			$condition = "(";
		}else{
			$condition = " OR ";			
		}
		$_SESSION['filter_size'] = str_replace(")","",$_SESSION['filter_size']);
		$_SESSION['filter_size'] = $_SESSION['filter_size'].$condition."tbl_produkstok.ukuran='$size'";			
		$_SESSION['filter_size'] = $_SESSION['filter_size'].")";
	}else if($filter_size =="unchecked" ){
		$del_size = "tbl_produkstok.ukuran='$size'";
		$_SESSION['filter_size'] = str_replace("(".$del_size." OR ","(",$_SESSION['filter_size']);
		$_SESSION['filter_size'] = str_replace("(".$del_size.")","()",$_SESSION['filter_size']);
		$_SESSION['filter_size'] = str_replace(" OR ".$del_size.")",")",$_SESSION['filter_size']);		
		$_SESSION['filter_size'] = str_replace(" OR ".$del_size." OR "," OR ",$_SESSION['filter_size']);		
		if($_SESSION['filter_size'] == "()"){
			unset($_SESSION['filter_size']);
		}
	}
	produkList($_SESSION['gender'],$_SESSION['slug'],$_SESSION['jenis'],$_SESSION['sort_order'],$_SESSION['sort_by'],$_SESSION['sort_limit'],$_SESSION['start_page']);
}
if(isset($_POST['filter_refresh'])){
	$filter_refresh = $_POST['filter_refresh'];
	if($filter_refresh == "price"){
		produkFilterPrice($_SESSION['gender'],$_SESSION['slug']);
	}else if($filter_refresh == "color"){
		produkFilterColor($_SESSION['gender'],$_SESSION['slug']);
	}else if($filter_refresh == "size"){
		produkFilterSize($_SESSION['gender'],$_SESSION['slug']);
	}
}

if(isset($_POST['warna_refresh'])){
	runWarna();
}
if(isset($_POST['ukuran_refresh'])){
	$_SESSION['produk_ukuran'] = $_POST['ukuran_refresh'];
	runUkuran();
}
if(isset($_POST['harga_refresh'])){
	$warna_produk = str_replace('_',' ',$_POST['harga_refresh']);
	$kode_produk = $_SESSION['produk_kode'];
	$harga = $_SESSION['produk_harga'];
	$harga_tambah = getProdukHargaTambahan($kode_produk,$warna_produk);
	$poin_tambah = getProdukPoinTambahan($kode_produk,$warna_produk);
	echo "Rp".setHarga($harga+$harga_tambah)."/".$poin_tambah;

}

if(isset($_POST['detailPoin'])){
	$detailPoin = explode("/",$_POST['detailPoin']);
	$tahun = $detailPoin[0];
	$bulan = $detailPoin[1];
	$jenis = $detailPoin[2];
	getPoinDetail($tahun,$bulan,$jenis);
}

if(isset($_POST['tahunPoin'])){
	$tahun = $_POST['tahunPoin'];
	echo'
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th style="vertical-align: inherit;" rowspan="2">Jenis<br>Poin</th>
					<th colspan="12">Bulan Ke -</th>
					<th style="vertical-align: inherit;" rowspan="2">Total<br>Poin</th>
				</tr>
				<tr>
	';
					for($bulan=1; $bulan<=12; $bulan++){
						echo "<th>$bulan</th>";						
					}
	echo'
				</tr>
			</thead>
			<tbody>
				<tr>
				<th>Pribadi</th>
	';
					$total_poin = 0;
					for($bulan=1; $bulan<=12; $bulan++){
						$jum = getPoinJumlah($tahun,$bulan,"pribadi");
						echo "<td><a href='#' onClick=viewPoinDetail($tahun,$bulan,'pribadi') >".$jum."</td>";						
						$total_poin = $total_poin + $jum;
					}
					echo"<td>$total_poin</td>";
	echo'
				</tr>
				<tr>
				<th>Cabang</th>
	';
					$total_poin = 0;
					for($bulan=1; $bulan<=12; $bulan++){
						$jum = getPoinJumlah($tahun,$bulan,"cabang");
						echo "<td><a href='#' onClick=viewPoinDetail($tahun,$bulan,'cabang') >".$jum."</td>";						
						$total_poin = $total_poin + $jum;
					}
					echo"<td>$total_poin</td>";
	echo'
				</tr>
				<tr>
					<th>Total</th>
	';
						$total_poin = 0;
						for($bulan=1; $bulan<=12; $bulan++){
							$jum = getPoinJumlah($tahun,$bulan,"total");
							echo "<td>".$jum."</td>";						
							$total_poin = $total_poin + $jum;
						}
						echo"<td>$total_poin</td>";
	echo'
				</tr>
				<tr>
					<th>Redeem</th>
	';
						$total_poin = 0;
						for($bulan=1; $bulan<=12; $bulan++){
							$jum = getPoinJumlah($tahun,$bulan,"redeem");
							echo "<td style='color:red;'>".$jum."</td>";						
							$total_poin = $total_poin + $jum;
						}
						echo"<td style='color:red;'>$total_poin</td>";
	echo'
				</tr>
				<tr>
					<th>Sisa</th>
	';
						$total_poin = 0;
						for($bulan=1; $bulan<=12; $bulan++){
							$jum = getPoinJumlah($tahun,$bulan,"sisa");
							echo "<td style='color:red;'>".$jum."</td>";						
							$total_poin = $total_poin + $jum;
						}
						echo"<td style='color:red;'>$total_poin</td>";
	echo'
				</tr>
			</tbody>
		</table>
	';
}


?>