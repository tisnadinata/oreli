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
			if($kode_produk=="133012"){
			headerTop();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">100 CM</td>
                <td align="center" style="vertical-align: inherit;">104 CM</td>
                <td align="center" style="vertical-align: inherit;">71,5 CM</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">107 CM</td>
                <td align="center" style="vertical-align: inherit;">108 CM</td>
                <td align="center" style="vertical-align: inherit;">73 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">111 CM</td>
                <td align="center" style="vertical-align: inherit;">115 CM</td>
                <td align="center" style="vertical-align: inherit;">75,5 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XXL</b></td>
                <td align="center" style="vertical-align: inherit;">116 CM</td>
                <td align="center" style="vertical-align: inherit;">118 CM</td>
                <td align="center" style="vertical-align: inherit;">76,5 CM</td>
              </tr>
		<?php
			}else if($kode_produk=="133011"){
			headerTop();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>M</b></td>
                <td align="center" style="vertical-align: inherit;">106 CM</td>
                <td align="center" style="vertical-align: inherit;">107 CM</td>
                <td align="center" style="vertical-align: inherit;">74 CM</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>L</b></td>
                <td align="center" style="vertical-align: inherit;">109 CM</td>
                <td align="center" style="vertical-align: inherit;">111 CM</td>
                <td align="center" style="vertical-align: inherit;">75,5 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">114 CM</td>
                <td align="center" style="vertical-align: inherit;">118 CM</td>
                <td align="center" style="vertical-align: inherit;">78,5 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XXL</b></td>
                <td align="center" style="vertical-align: inherit;">119 CM</td>
                <td align="center" style="vertical-align: inherit;">122 CM</td>
                <td align="center" style="vertical-align: inherit;">79 CM</td>
              </tr>
		<?php
			}else if($kode_produk=="123002"){
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
                <td align="center" style="vertical-align: inherit;">96 CM</td>
                <td align="center" style="vertical-align: inherit;">96 CM</td>
                <td align="center" style="vertical-align: inherit;">69 CM</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>XL</b></td>
                <td align="center" style="vertical-align: inherit;">100 CM</td>
                <td align="center" style="vertical-align: inherit;">100 CM</td>
                <td align="center" style="vertical-align: inherit;">71 CM</td>
              </tr>
		<?php
			}else if($kode_produk=="111332"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>28</b></td>
                <td align="center" style="vertical-align: inherit;">27,5"</td>
                <td align="center" style="vertical-align: inherit;">36,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>29</b></td>
                <td align="center" style="vertical-align: inherit;">29,5"</td>
                <td align="center" style="vertical-align: inherit;">38,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>30</b></td>
                <td align="center" style="vertical-align: inherit;">30,5"</td>
                <td align="center" style="vertical-align: inherit;">38,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>31</b></td>
                <td align="center" style="vertical-align: inherit;">31"</td>
                <td align="center" style="vertical-align: inherit;">38,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>32</b></td>
                <td align="center" style="vertical-align: inherit;">32"</td>
                <td align="center" style="vertical-align: inherit;">40"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>34</b></td>
                <td align="center" style="vertical-align: inherit;">34"</td>
                <td align="center" style="vertical-align: inherit;">41"</td>
                <td align="center" style="vertical-align: inherit;">11,25"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>36</b></td>
                <td align="center" style="vertical-align: inherit;">37"</td>
                <td align="center" style="vertical-align: inherit;">45"</td>
                <td align="center" style="vertical-align: inherit;">11,25"</td>
              </tr>
		<?php
			}else if($kode_produk=="111333"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>28</b></td>
                <td align="center" style="vertical-align: inherit;">27,5"</td>
                <td align="center" style="vertical-align: inherit;">36,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>29</b></td>
                <td align="center" style="vertical-align: inherit;">29,5"</td>
                <td align="center" style="vertical-align: inherit;">38,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>30</b></td>
                <td align="center" style="vertical-align: inherit;">30,5"</td>
                <td align="center" style="vertical-align: inherit;">38,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>31</b></td>
                <td align="center" style="vertical-align: inherit;">31"</td>
                <td align="center" style="vertical-align: inherit;">38,5"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>32</b></td>
                <td align="center" style="vertical-align: inherit;">32"</td>
                <td align="center" style="vertical-align: inherit;">40"</td>
                <td align="center" style="vertical-align: inherit;">11"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>34</b></td>
                <td align="center" style="vertical-align: inherit;">34"</td>
                <td align="center" style="vertical-align: inherit;">41"</td>
                <td align="center" style="vertical-align: inherit;">11,25"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>36</b></td>
                <td align="center" style="vertical-align: inherit;">37"</td>
                <td align="center" style="vertical-align: inherit;">45"</td>
                <td align="center" style="vertical-align: inherit;">11,25"</td>
              </tr>
		<?php
			}else if($kode_produk=="112211"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>28</b></td>
                <td align="center" style="vertical-align: inherit;">29"</td>
                <td align="center" style="vertical-align: inherit;">36,5"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>29</b></td>
                <td align="center" style="vertical-align: inherit;">30"</td>
                <td align="center" style="vertical-align: inherit;">37,5"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>30</b></td>
                <td align="center" style="vertical-align: inherit;">31"</td>
                <td align="center" style="vertical-align: inherit;">38,5"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>31</b></td>
                <td align="center" style="vertical-align: inherit;">32"</td>
                <td align="center" style="vertical-align: inherit;">39,5"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>32</b></td>
                <td align="center" style="vertical-align: inherit;">33"</td>
                <td align="center" style="vertical-align: inherit;">40,5"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>34</b></td>
                <td align="center" style="vertical-align: inherit;">35"</td>
                <td align="center" style="vertical-align: inherit;">42,5"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>36</b></td>
                <td align="center" style="vertical-align: inherit;">37"</td>
                <td align="center" style="vertical-align: inherit;">44,5"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
		<?php
			}else if($kode_produk=="111321"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>28</b></td>
                <td align="center" style="vertical-align: inherit;">31,5"</td>
                <td align="center" style="vertical-align: inherit;">38"</td>
                <td align="center" style="vertical-align: inherit;">32,5"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>29</b></td>
                <td align="center" style="vertical-align: inherit;">32,5"</td>
                <td align="center" style="vertical-align: inherit;">40"</td>
                <td align="center" style="vertical-align: inherit;">32,5"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>30</b></td>
                <td align="center" style="vertical-align: inherit;">33,5"</td>
                <td align="center" style="vertical-align: inherit;">42"</td>
                <td align="center" style="vertical-align: inherit;">32,5"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>31</b></td>
                <td align="center" style="vertical-align: inherit;">34,5"</td>
                <td align="center" style="vertical-align: inherit;">43"</td>
                <td align="center" style="vertical-align: inherit;">32,5"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>32</b></td>
                <td align="center" style="vertical-align: inherit;">35,5"</td>
                <td align="center" style="vertical-align: inherit;">44,5"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>34</b></td>
                <td align="center" style="vertical-align: inherit;">37,5"</td>
                <td align="center" style="vertical-align: inherit;">47"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>36</b></td>
                <td align="center" style="vertical-align: inherit;">39"</td>
                <td align="center" style="vertical-align: inherit;">48,5"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
		<?php
			}else if($kode_produk=="111331"){
				headerBot();
		?>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>28</b></td>
                <td align="center" style="vertical-align: inherit;">33,5"</td>
                <td align="center" style="vertical-align: inherit;">40"</td>
                <td align="center" style="vertical-align: inherit;">31,5"</td>
              </tr>
              <tr class="grey_bg">
                <td align="center" style="vertical-align: inherit;"><b>29</b></td>
                <td align="center" style="vertical-align: inherit;">34"</td>
                <td align="center" style="vertical-align: inherit;">41"</td>
                <td align="center" style="vertical-align: inherit;">31,5"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>30</b></td>
                <td align="center" style="vertical-align: inherit;">34,5"</td>
                <td align="center" style="vertical-align: inherit;">42"</td>
                <td align="center" style="vertical-align: inherit;">32"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>31</b></td>
                <td align="center" style="vertical-align: inherit;">36"</td>
                <td align="center" style="vertical-align: inherit;">43"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>32</b></td>
                <td align="center" style="vertical-align: inherit;">37"</td>
                <td align="center" style="vertical-align: inherit;">44"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>34</b></td>
                <td align="center" style="vertical-align: inherit;">39"</td>
                <td align="center" style="vertical-align: inherit;">45,5"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
              <tr>
                <td align="center" style="vertical-align: inherit;"><b>36</b></td>
                <td align="center" style="vertical-align: inherit;">41"</td>
                <td align="center" style="vertical-align: inherit;">47"</td>
                <td align="center" style="vertical-align: inherit;">33"</td>
              </tr>
		<?php
			}
		?>
            </tbody>
         </table>