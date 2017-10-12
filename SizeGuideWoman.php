<?php
	include_once 'functions/functions.php';
	function headerTop(){
		echo '
		    <thead>
              <tr>
                <th colspan="5" align="center" style="vertical-align: inherit;">Size Cart <?php echo $nama_produk; ?></th>
              </tr>
              <tr>
                <th align="center" style="vertical-align: inherit;">Nomor</th>
                <th align="center" style="vertical-align: inherit;">Lingkar Dada</th>
                <th align="center" style="vertical-align: inherit;">Lingkar Bawah</th>
                <th align="center" style="vertical-align: inherit;">Panjang Body</th>
              </tr>
            </thead>
            <tbody>
			';
	}
	function headerBot(){
		echo '
		    <thead>
              <tr>
                <th colspan="5" align="center" style="vertical-align: inherit;">Size Cart <?php echo $nama_produk; ?></th>
              </tr>
              <tr>
                <th align="center" style="vertical-align: inherit;">Nomor</th>
                <th align="center" style="vertical-align: inherit;">Lingkar Pinggang </th>
                <th align="center" style="vertical-align: inherit;">Lingkar Pinggul</th>
                <th align="center" style="vertical-align: inherit;">Inseam</th>
              </tr>
            </thead>
            <tbody>
			';
	}
	$produk = explode("/",$_GET['produk']);
	$nama_produk = str_replace("_"," ",$produk[0]);
	$warna_produk = str_replace("_"," ",$produk[1]);
	$stmt = $mysqli->query("select kode_produk from tbl_produk where nama_produk='$nama_produk'");
	$data = $stmt->fetch_array();
	$data = getProdukKode($data['kode_produk']);
	$kode_produk = '';
	
	for($i=1;$i<7;$i++){
		$kode_produk = $kode_produk.$data[$i];
	}
?>
		<table class="table table-bordered" width="100%" border="0">
		<?php
			if($kode_produk=="233011"){
				headerTop();
		?>			
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>S</b></td>
                <td align="center" style="vertical-align: inherit;">86 CM</td>
                <td align="center" style="vertical-align: inherit;">88 CM</td>
                <td align="center" style="vertical-align: inherit;">69 CM</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">90 CM</td>
                <td align="center" style="vertical-align: inherit;">92 CM</td>
                <td align="center" style="vertical-align: inherit;">71 CM</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">94 CM</td>
                <td align="center" style="vertical-align: inherit;">96 CM</td>
                <td align="center" style="vertical-align: inherit;">73 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">98 CM</td>
                <td align="center" style="vertical-align: inherit;">100 CM</td>
                <td align="center" style="vertical-align: inherit;">75 CM</td>
              </tr>
		<?php
			}else if($kode_produk=="253012"){
				headerTop();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>S</b></td>
                <td align="center" style="vertical-align: inherit;">92 CM</td>
                <td align="center" style="vertical-align: inherit;">116 CM</td>
                <td align="center" style="vertical-align: inherit;">86 CM</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">96 CM</td>
                <td align="center" style="vertical-align: inherit;">120 CM</td>
                <td align="center" style="vertical-align: inherit;">88 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">100 CM</td>
                <td align="center" style="vertical-align: inherit;">124 CM</td>
                <td align="center" style="vertical-align: inherit;">90 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">104 CM</td>
                <td align="center" style="vertical-align: inherit;">128 CM</td>
                <td align="center" style="vertical-align: inherit;">92 CM</td>
              </tr>
		<?php
			}else if($kode_produk=="223002"){
				headerTop();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>S</b></td>
                <td align="center" style="vertical-align: inherit;">88 CM</td>
                <td align="center" style="vertical-align: inherit;">88 CM</td>
                <td align="center" style="vertical-align: inherit;">65 CM</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">92 CM</td>
                <td align="center" style="vertical-align: inherit;">92 CM</td>
                <td align="center" style="vertical-align: inherit;">67 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">96</td>
                <td align="center" style="vertical-align: inherit;">96</td>
                <td align="center" style="vertical-align: inherit;">69</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">100 CM</td>
                <td align="center" style="vertical-align: inherit;">100 CM</td>
                <td align="center" style="vertical-align: inherit;">71 CM</td>
              </tr>
		<?php
			}else if($kode_produk=="241312"){
				headerTop();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>S</b></td>
                <td align="center" style="vertical-align: inherit;">88 CM</td>
                <td align="center" style="vertical-align: inherit;">76 CM</td>
                <td align="center" style="vertical-align: inherit;">59 CM</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">92 CM</td>
                <td align="center" style="vertical-align: inherit;">80 CM</td>
                <td align="center" style="vertical-align: inherit;">60 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">97 CM</td>
                <td align="center" style="vertical-align: inherit;">85 CM</td>
                <td align="center" style="vertical-align: inherit;">61 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">102 CM</td>
                <td align="center" style="vertical-align: inherit;">90 CM</td>
                <td align="center" style="vertical-align: inherit;">61,5 CM</td>
              </tr>
		<?php
			}else if($kode_produk=="211122"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>S</b></td>
                <td align="center" style="vertical-align: inherit;">29 I/2"</td>
                <td align="center" style="vertical-align: inherit;">35,5"</td>
                <td align="center" style="vertical-align: inherit;">17"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">31"</td>
                <td align="center" style="vertical-align: inherit;">37"</td>
                <td align="center" style="vertical-align: inherit;">17"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">32,5"</td>
                <td align="center" style="vertical-align: inherit;">37,5"</td>
                <td align="center" style="vertical-align: inherit;">17,5"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">34,5"</td>
                <td align="center" style="vertical-align: inherit;">40,5"</td>
                <td align="center" style="vertical-align: inherit;">17,5"</td>
              </tr>
		<?php
			}else if($kode_produk=="211421"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>S</b></td>
                <td align="center" style="vertical-align: inherit;">27"</td>
                <td align="center" style="vertical-align: inherit;">30,5"</td>
                <td align="center" style="vertical-align: inherit;">28,5"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">28,5"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
                <td align="center" style="vertical-align: inherit;">28,5"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">30"</td>
                <td align="center" style="vertical-align: inherit;">33,5"</td>
                <td align="center" style="vertical-align: inherit;">28,5"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">31,5"</td>
                <td align="center" style="vertical-align: inherit;">35,5"</td>
                <td align="center" style="vertical-align: inherit;">28,5"</td>
              </tr>
		<?php
			}else if($kode_produk=="211121"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>28</b></td>
                <td align="center" style="vertical-align: inherit;">25"</td>
                <td align="center" style="vertical-align: inherit;">31"</td>
                <td align="center" style="vertical-align: inherit;">28"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>29</b></td>
                <td align="center" style="vertical-align: inherit;">26"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
                <td align="center" style="vertical-align: inherit;">28"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>30</b></td>
                <td align="center" style="vertical-align: inherit;">27"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
                <td align="center" style="vertical-align: inherit;">28"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>31</b></td>
                <td align="center" style="vertical-align: inherit;">28"</td>
                <td align="center" style="vertical-align: inherit;">34"</td>
                <td align="center" style="vertical-align: inherit;">28,1/2"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>32</b></td>
                <td align="center" style="vertical-align: inherit;">29"</td>
                <td align="center" style="vertical-align: inherit;">35"</td>
                <td align="center" style="vertical-align: inherit;">28,1/2"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>34</b></td>
                <td align="center" style="vertical-align: inherit;">30"</td>
                <td align="center" style="vertical-align: inherit;">36"</td>
                <td align="center" style="vertical-align: inherit;">28,1/2"</td>
              </tr>
		<?php
			}
		?>
            </tbody>
         </table>