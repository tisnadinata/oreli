  <div id="pageContent" class="page-content">
 	<!-- Breadcrumb section -->
		<section class="breadcrumbs  hidden-xs">
		  <div class="container">
			<ol class="breadcrumb breadcrumb--wd pull-left">
			  <li><a href="#">Home</a></li>
			  <li class="active">Pembelian Sukses</li>
			</ol>
		  </div>
		</section>
   <section class="content top-null">
      <div class="container">
        <div class="row">
		<div class="col-md-10 col-md-offset-1 col-xs-12 aside-column">
            <section class="content">               
			<div class="card card--padding">
             <h2 class="text-uppercase" style="text-align:center;">TRANSAKSI BERHASIL DIBUAT</h2>
             <h4 class="text-uppercase" style="text-align:center;">silahkan cek email anda untuk informasi transaksi</h4>
			<hr>
				<div class="card__row-line"  style="text-align: justify;">
<?php
		$stmt = $mysqli->query("select * from tbl_bank where id_customer='oreli'");
		$akun = $stmt->fetch_assoc();
		echo"
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
?>
	<br>
					<div style="padding : 5; border : 1px solid red;" valign="top">
					<h5 class="text-uppercase">PERHATIAN</h5>
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
				</div>
			  </div>
            </section>
        </div>
      </div>
    </section>
    <!-- End Content section --> 
  </div>
  
</div>
