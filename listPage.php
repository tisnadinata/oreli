<?php
include_once('functions/functions.php');
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
$page = 1;
if (isset($_GET['p']) && !empty($_GET['p'])){
    $page = (int)$_GET['p'];	
}
 
// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 2 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 4;
if (isset($_GET['pP']) && !empty($_GET['pP'])){
    $dataPerPage = (int)$_GET['pP'];
}
// ambil data
$dataTable = getTableData($page, $dataPerPage);
 
?>
	<br>
	<div style='width:auto;height:550px;'>
    <?php
    foreach ($dataTable as $i => $row) 
    {
        $no = ($i + 1) + (($page - 1) * $dataPerPage);
			if($row['tw_gambar'] == NULL){
				$image = "image/default.png";
			}else{
				$image = "admin/".$row['tw_gambar'];
			}
			echo '
			<div class="item">
				<table border="0" width="100%" height="100%" >
					<tr align="center">
						<td colspan="3" style="border-bottom:1px solid #ccc;">'.$row['produk_nama'].'</td>
					</tr>
					<tr align="center">
						<td colspan="3" style="border-bottom:1px solid #ccc;"><img style="z-index:99;" class="mode" height="120px" width="120px" src="'.$image.'"></td>
					</tr>
					<tr align="center" style="border-bottom:1px solid #ccc;">
						<td width="5%"><strong>Rp. </strong></td>
						<td align="center">'.$row['produk_harga'].'</td>
						<td width="40%" align="right"><strong>/'.$row['produk_satuan'].'&nbsp </strong></td>
					</tr>
					<tr >
					';
					echo'<td align="center" colspan="3"><a href="?add='.$row['produk_id'].'"><button class="button">Tambah Ke Keranjang</button></a></td>';
					echo '</tr>
				</table>
			</div>
			';
    }
	echo"</div>";
// menampilkan tombol paginasi
showPagination($dataPerPage); 
    ?>