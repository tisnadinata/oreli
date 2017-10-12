<?php
	include("header.php"); 
	include_once("functions/functions.php");	
	if(isset($_SESSION['id_customer'])){
?>
<html>
<body onload="viewPoinDetail('2016','ALL','')">
<script>
function viewPoinDetail(tahun,bulan,jenis){
        var dataString = 'detailPoin='+tahun+"/"+bulan+"/"+jenis;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/ajax.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#tabel-point-detail").html(html);
            }
        });
}
$(document).ready(function() {
    $("#tahunPoin").change(function() {
        var tahun =$(this).val();
        var dataString = 'tahunPoin='+tahun;
        $.ajax({
            type: "POST",
            url: "<?php echo getLink();?>/ajax.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#tabel-point").html(html);
            }
        });
		viewPoinDetail(tahun,"ALL",'');
    });
});

</script>
<div id="loader-wrapper" class="loader-off">
<div id="loader"></div>
</div>
<div class="wrapper"> 
  <div id="pageContent" class="page-content">
    <section class="content top-null">
      <div class="container">
        <div class="row">
          <div class="col-md-3 aside-column">
		    <?php include("menu_member.php"); ?>
          </div>
          <div class="col-md-9 aside-column">
            <section class="content"> 
              
            <div class="card card--padding">
          <div class="card__row-line">
		   <?php 
		   if(isset($_GET['cair'])){
		?>
			<h4 class="text-uppercase h-pad-sm">PENCAIRAN POIN</h4>  
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
            <form action="" method="post" class="contact-form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xs-3">
						<label><b>Jumlah Poin Saat Ini :</b></label>
					</div>
					<div class="col-xs-8">
						<label id="poin" name="poin" value='<?php poinJumlah("ALL"); ?>'><b><?php poinJumlah("ALL"); ?> poin.<b></label>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3">
						<label><b>Nilai Pencairan Poin :</b></label>
					</div>
					<div class="col-xs-8">
						<label><b>Rp. <?php echo getKonversiPoin(); ?> / 1 poin.<b></label>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-3">
						<label><b><br>Jumlah poin :</b></label>
					</div>
					<div class="col-xs-3">
						<div class="input-group-qty"> <span class="pull-left"> </span>
						<input type="text" name="jumlahPoin" class="input-number input--wd input-qty pull-left" value="1" min="1" max="<?php poinJumlah("ALL"); ?>" required>
						<span class="pull-left btn-number-container">
						<button type="button" class="btn btn-number btn-number--plus" data-type="plus"> + </button>
						<button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus"> – </button>
						</span> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3">
						<label><b><br>Rekening Tujuan :</b></label>
					</div>
					<div class="col-xs-8">
						<select class="selectpicker" name="rekeningTujuan" id="rekeningTujuan" data-style="select--wd"  data-width="100%">
							<?php
								rekeningList();
							?>
						</select>
					</div>
				</div>
				<?php
					$stmt = $mysqli->query("select file_ktp,npwp from tbl_customer where id_customer='$_SESSION[id_customer]'");
					$data = $stmt->fetch_array();
					if($data['file_ktp'] == NULL){
				?>		
					<div class="divider divider--xs"></div>
					<div class="row">
						<div class="col-xs-3">
							<label><b>Scan/Foto KTP:</b></label>
						</div>
						<div class="col-xs-8">
							<label class="control-label">Select File</label>
							<input id="file_ktp"  name="file_ktp" type="file" class="file" required>
						</div>
					</div>
					<div class="divider divider--xs"></div>
					<span class="label label-warning"><b>* Silahkan upload scan/foto ktp anda untuk mencairkan poin.</b></span>
				<?php
					}
				?>
				<?php
					if($data['npwp'] == NULL){
				?>		
					<div class="divider divider--xs"></div>
					<div class="row">
						<div class="col-xs-3">
							<label><b>Nomor NPWP:</b></label>
						</div>
						<div class="col-xs-8 col-md-4">
							<input type="text" name="npwp" class="input--wd input--wd--full" placeholder="NPWP Aktif">
						</div>
					</div>
					<div class="divider divider--xs"></div>
				<?php
					}
				?>
				<div class="divider divider--xs"></div>
				<span class="label label-info"><b>* Poin hanya bisa dicairkan pada tanggal 1 - 10 setiap bulan nya.</b></span>
				<?php
					$tgl = date('d');
					if($tgl > 10){
						echo '<button type="submit" name="btnCairkan" class="btn btn--wd text-uppercase wave col-md-offset-9" disabled>Cairkan Poin</button>';
					}else{
						echo '<button type="submit" name="btnCairkan" class="btn btn--wd text-uppercase wave col-md-offset-9">Cairkan Poin</button>';
						poinPencairan();
					}
				?>
			</form>
		<?php
		   }else if(isset($_GET['transfer']) AND $_SESSION['tipe'] == 2){
		?>
			<h4 class="text-uppercase h-pad-sm">TRANSFER POIN</h4>  
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
            <form action="" method="post" class="contact-form">
				<div class="row">
					<div class="col-xs-5 col-md-3">
						<label><b>Poin Saat Ini :</b></label>
					</div>
					<div class="col-xs-7 col-md-9">
						<label id="poin" name="poin" value='<?php poinJumlah("ALL"); ?>'><b><?php poinJumlah("ALL"); ?> poin.<b></label>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-md-3">
						<label><b>ID Tujuan </b></label>
					</div>
					<div class="col-xs-8 col-md-4">
						<input type="text" name="id_tujuan" class="input--wd input--wd--full" placeholder="ID Customer yang dituju">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-md-3">
						<label><b><br>Jumlah :</b></label>
					</div>
					<div class="col-xs-8">
						<div class="input-group-qty"> <span class="pull-left"> </span>
						<input type="text" name="jumlahPoin" class="input-number input--wd input-qty pull-left" value="1" min="1" max="<?php poinJumlah("ALL"); ?>" required>
						<span class="pull-left btn-number-container">
						<button type="button" class="btn btn-number btn-number--plus" data-type="plus"> + </button>
						<button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus"> – </button>
						</span> </div>
					</div>
				</div>
				<div class="divider divider--xs"></div>
				<?php
					echo '<button type="submit" name="btnTransferPoin" class="btn btn--wd text-uppercase wave col-md-offset-9" >Transfer Poin</button>';
					poinTransfer();
				?>
			</form>
		<?php
		   }else if(isset($_GET['bonus'])){
		?>
			<h4 class="text-uppercase h-pad-sm">BONUS POIN</h4>  
            <div class="hr"></div>
			<div class="divider divider--xs"></div>
			<div class="table-responsive">
				<table class="table">
				<thead >
					<tr>
						<th style="text-align:center;"class="text-uppercase teks-bold" style="width:30%">Bonus Poin</th>
						<th style="text-align:center;"class="text-uppercase teks-bold" style="width:30%">Total Poin</th>
						<th style="text-align:center;"class="text-uppercase teks-bold" style="width:40%">Reward</th>
					</tr>
				</thead>
				<tbody style="text-align:center;">
					<tr>
						<td>Platinum</td>
						<td>>= 1.000.000</td>
						<td>Mobil + uang tunai</td>
					</tr>
					<tr>
						<td>Diamond</td>
						<td>>= 500.000</td>
						<td>Liburan Luar Negeri/Umroh+Uang Tunai</td>
					</tr>
					<tr>
						<td>Gold</td>
						<td>>= 100.000</td>
						<td>Sepeda Motor+uang tunai</td>
					</tr>
					<tr>
						<td>Silver</td>
						<td>>= 50.000</td>
						<td>Laptop+Uang Tunai</td>
					</tr>
					<tr>
						<td>Bronze</td>
						<td>>= 10.000</td>
						<td>Handphone+uang tunai</td>
					</tr>
				</tbody>
				</table>
				<h5>Perhitungan reward adalah berdasarkan total poin minimal yang harus dicapai seorang member/agen oreli. Kelebihan poin akan diperhitungkan sebagai reward uang tunai.</h5>
		<?php
		   }else{
		?>
            <h4 class="text-uppercase h-pad-sm">POIN SAYA</h4>  
            <div class="hr"></div>
			<div class ="col-md-12">
				<div class="col-md-7 col-xs-12">
				<br>
					<b>Poin per <?php echo date("d F Y"); ?> : </b> <?php poinJumlah("ALL"); ?> poin.
				<span class="label label-info"><b>* Poin hanya bisa dicairkan pada tanggal 1 - 10 .</b></span>
				</div>
				<div class="col-md-5  col-xs-12"><br>
					<div class="row">
						<div class="col-md-12">
						<div class="btn-group  pull-right ">
						  <button type="button" class="btn btn--wd wave dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Aksi Poin <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
					<?php
						$tgl = date('d');
						if($tgl > 10){
							echo '<li class="disabled"><a href="'.getLink().'/member/poin/pencairan">Cairkan Poin</a></li>';
						}else{
							echo '<li ><a href="'.getLink().'/member/poin/pencairan">Cairkan Poin</a></li>';
						}
						if($_SESSION['tipe'] == 2){
								echo '<li ><a href="'.getLink().'/member/poin/transfer">Transfer Poin</a></li>';
						}
						echo '
							<li role="separator" class="divider"></li>
							<li><a href="'.getLink().'/member/poin/bonus">Bonus Poin Tahunan</a></li>
						';
					?>
						  </ul>
						</div>
						</div>
					</div>
				</div>
			</div>
				<div class ="col-md-12">
					<div class="divider divider--xs"></div>
					<div class="hr"></div>
					<div class="divider divider--xs"></div>
					<table>
						<tr>
							<th>Member ID &nbsp </th>
							<td>: <?php echo $_SESSION['id_customer'];?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<td>: <?php echo $_SESSION['nama_lengkap'];?></td>
						</tr>
						<tr>
							<th>&nbsp </th>
							<th>&nbsp </th>
						</tr>
						<tr>
							<th>Tahun</th>
							<td> 
							<select class="form-control" name="tahunPoin" id="tahunPoin" data-style="select--wd"  data-width="100%">
							<?php
								$waktu_daftar = explode("-",$_SESSION['waktu_daftar']);
								$now=date('Y');
								for($thn=$now;$thn>=$waktu_daftar[0];$thn--){
									echo "<option value='$thn'>$thn</option>";
								}
							?>
							</select>
							</td>
						</tr>
					</table>
					<div class="divider divider--xs"></div>
					<div class="divider divider--xs"></div>
					<div class="table-responsive" id="tabel-point">
						<table class="table table-bordered text-center">
						  <thead>
							<tr>
								<th style="vertical-align: inherit;" rowspan="2">Jenis<br>Poin</th>
								<th colspan="12">Bulan Ke -</th>
								<th style="vertical-align: inherit;" rowspan="2">Total<br>Poin</th>
							</tr>
							<tr>
							<?php
								for($bulan=1; $bulan<=12; $bulan++){
									echo "<th>$bulan</th>";						
								}
							?>
							</tr>
						  </thead>
						  <tbody>
							<tr>
								<th>Pribadi</th>
								<?php
									$tahun = date('Y');
									$total_poin = 0;
									for($bulan=1; $bulan<=12; $bulan++){
										$jum = getPoinJumlah($tahun,$bulan,"pribadi");
										echo "<td><a href='#' onClick=viewPoinDetail($tahun,$bulan,'pribadi') >".$jum."</td>";						
										$total_poin = $total_poin + $jum;
									}
									echo"<td>$total_poin</td>";
								?>
							</tr>
							<tr>
								<th>Sponsor</th>
								<?php
									$tahun = date('Y');
									$total_poin = 0;
									for($bulan=1; $bulan<=12; $bulan++){
										$jum = getPoinJumlah($tahun,$bulan,"cabang");
										echo "<td><a href='#' onClick=viewPoinDetail($tahun,$bulan,'cabang') >".$jum."</td>";						
										$total_poin = $total_poin + $jum;
									}
									echo"<td>$total_poin</td>";
								?>
							</tr>
							<tr>
								<th>Total</th>
								<?php
									$tahun = date('Y');
									$total_poin = 0;
									for($bulan=1; $bulan<=12; $bulan++){
										$jum = getPoinJumlah($tahun,$bulan,"total");
										echo "<td>".$jum."</td>";						
										$total_poin = $total_poin + $jum;
									}
									echo"<td>$total_poin</td>";
								?>
							</tr>
							<tr>
								<th>Redeem</th>
								<?php
									$tahun = date('Y');
									$total_poin = 0;
									for($bulan=1; $bulan<=12; $bulan++){
										$jum = getPoinJumlah($tahun,$bulan,"redeem");
										echo "<td style='color:red;'>".$jum."</td>";						
										$total_poin = $total_poin + $jum;
									}
									echo"<td style='color:red;'>$total_poin</td>";
								?>
							</tr>
							<tr>
								<th>Sisa</th>
								<?php
									$tahun = date('Y');
									$total_poin = 0;
									for($bulan=1; $bulan<=12; $bulan++){
										$jum = getPoinJumlah($tahun,$bulan,"sisa");
										echo "<td style='color:green;'>".$jum."</td>";						
										$total_poin = $total_poin + $jum;
									}
									echo"<td style='color:green;'>$total_poin</td>";
								?>
							</tr>
						  </tbody>
						</table>
					</div>
				</div><br><br>
				<div class="hr"></div>
				<div class="row">
					<div class ="col-md-12">
						<div class=" col-md-5">
						<br>
							<b>Detail Riwayat Poin :</b>
						</div>
						<div class=" col-md-12">
						<div class ="table-responsive">
							<table class="table table-striped text-center" id="tabel-point-detail">
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
								  </tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		   <?php
		   }
		?>
			</div>
        </div>
            </section>
          </div>
        </div>
      </div>
    </section>
    <!-- End Content section --> 
  </div>
  
</div>
<?php include("footer.php"); 

	}else{
		echo'<meta http-equiv="Refresh" content="0;url='.getLink().'">';
	}
?>
</body>
</html>