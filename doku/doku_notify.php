<?php
$mysqli = new mysqli("localhost","orelicoi_oreli","_o^a+iJaX(3V","orelicoi_betaoreli");
function sendSMS($tipe,$data,$telepon){
	if($tipe == "checkout"){
		$message = 'Selamat pesanan anda dengan nomor transaksi '.$data[0].' sudah kami terima, silahkan lakukan pembayaran sesuai nominal yang tertera.';
	}
	if($tipe == "register"){
		$message = 'Selamat anda telah bergabung menjadi member dengan username '.$data[0].' , silahkan sponsori teman-teman anda untuk bergabung dengan menggunakan url berikut https://oreli.co.id/'.$data[0].' .';
	}
	$data = explode("/",$data);
	$mobile = $telepon;
	$username = 'oreli';
	$auth = md5($username."orelites".$mobile);
	$url = "http://send.smsmasking.co.id:8080/web2sms/api/sendSMS.aspx?username='.$username.'&mobile='.$mobile.'&message='.$message.'&auth='.$auth.'";
/*	$go = '<script>
			myWindow = window.open($url, "_blank", "toolbar=no,scrollbars=no,resizable=no,top=1,left=1,width=1,height=1")
			setTimeout(function () { myWindow.close();}, 250);
	</script>';
	echo $go;
*/
	getURL($url);
}

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}        
//$ip_range = "103.10.129.";
//if ( $_SERVER['REMOTE_ADDR'] != '182.253.5.91' && (substr($_SERVER['REMOTE_ADDR'],0,strlen($ip_range)) !== $ip_range) )
{


        if($_POST['TRANSIDMERCHANT']) {
        $order_number = $_POST['TRANSIDMERCHANT'];
        
	} 
else { $order_number = 0; }
    $totalamount = $_POST['AMOUNT'];
    $words    = $_POST['WORDS'];
    $statustype = $_POST['STATUSTYPE'];
    $response_code = $_POST['RESPONSECODE'];
    $approvalcode   = $_POST['APPROVALCODE'];
    $status         = $_POST['RESULTMSG'];
    $paymentchannel = $_POST['PAYMENTCHANNEL'];
    $paymentcode = $_POST['PAYMENTCODE'];
    $session_id = $_POST['SESSIONID'];
    $bank_issuer = $_POST['BANK'];
    $cardnumber = $_POST['MCN'];
    $payment_date_time = $_POST['PAYMENTDATETIME'];
    $verifyid = $_POST['VERIFYID'];
    $verifyscore = $_POST['VERIFYSCORE'];
    $verifystatus = $_POST['VERIFYSTATUS'];

// Basic SQL

	$sql = "select transidmerchant,totalamount from doku where transidmerchant='".$order_number."'and trxstatus='Requested'";
	$stmt = $mysqli->query($sql);
	$checkout = $stmt->fetch_array();
	// echo "sql : ".$sql;
	$hasil=$checkout['transidmerchant'];
	$amount=$checkout['totalamount'];



// Custom Field

	if (!$hasil) {
	  echo 'Stop1';
	  echo $order_number;
	} else {
		if ($status=="SUCCESS") {
                   $sql = "UPDATE doku SET totalamount='$totalamount', trxstatus='Success', words='$words', statustype='$statustype', response_code='$response_code', approvalcode='$approvalcode',
		         trxstatus='$status', payment_channel='$paymentchannel', paymentcode='$paymentcode', session_id='$session_id', bank_issuer='$bank_issuer', creditcard='$cardnumber',
			 payment_date_time='$payment_date_time', verifyid='$verifyid', verifyscore='$verifyscore', verifystatus='$verifystatus' where transidmerchant='$order_number'";
        // echo "sql : ".$sql;
		$result = $mysqli->query($sql) or die ("Stop2");		  
			if($result){
				$stmt = $mysqli->query("UPDATE tbl_orderstatus SET status='Pembayaran diterima' WHERE no_transaksi='$order_number'") or die ("Stop2-2");
//				notifEmail();
			}
		} else { 
 		  $sql = "UPDATE doku set trxstatus='Failed' where transidmerchant='".$order_number."'";
		  $result = $mysqli->query($sql) or die ("Stop3");
			if($result){				
				$stmt = $mysqli->query("UPDATE tbl_orderstatus SET status='Pesanan dibatalkan' WHERE no_transaksi='$order_number'") or die ("Stop3-2");
			}
		}
		echo 'Continue';
	}
	$result->close();
}
function notifEmail(){
	global $mysqli;
	$biaya_pesanan = 0;
	$belanja = '';
	$sql = "select email from tbl_emailguest where no_transaksi='$_POST[TRANSIDMERCHANT]'";
	$stmt = $mysqli->query($sql);			
	if($stmt->num_rows > 0){
		$row = $stmt->fetch_array();
		$alamatEmail = $row['email'];
		$to       = $alamatEmail;
		$subject  = 'Pembelian oreli.co.id';
		$stmt2 = $mysqli->query("select * from tbl_order where no_transaksi='$_POST[TRANSIDMERCHANT]'");
		$row = $stmt2->fetch_array();
		$id_customer =$row['id_customer'];
		$kode_unik =$row['kode_unik'];
		$diskon_produk=$row['diskon_produk'];
		$diskon_kirim=$row['diskon_kirim'];
		$asuransi=$row['asuransi'];
		$jumlah_bayar=$row['jumlah_bayar'];
		$biaya_kirim=$row['biaya_kirim'];
		$stmt2->close();
		$stmt2 = $mysqli->query("select * from tbl_orderdetail where no_transaksi='$_POST[TRANSIDMERCHANT]'");
		while($row = $stmt2->fetch_array){
			$kode_produk = $row['kode_produk'];
			$keterangan = $row['keterangan'];
			$jumlah = $row['jumlah'];
			$stmt3 = $mysqli->query("select harga,nama_produk from tbl_produk where kode_produk='$kode_produk'");
			$data = $stmt3->fetch_array();
			$harga = $jumlah*$data['harga'];
			$biaya_pesanan = $biaya_pesanan+$harga;
			$belanja = $belanja.'
			<tr>    
				<td>
					<a href="#" style="color: #000 ; text-decoration: none"><strong>'.$data['nama_produk'].'</strong></a><br>
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
		$stmt2->close();
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
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 24px ; font-weight: bold ; line-height: 24px" align="left">Konfirmasi Pesanan '.$_POST['TRANSIDMERCHANT'].'</td>
					</tr>
					<tr>
						<td height="24">&nbsp;</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px" align="left">Hi,</strong></td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px" align="left">
						<p>Terima kasih telah berbelanja di <a href="http://oreli.co.id"><mark style="background-color: #ffeda4">Oreli</mark>.co.id</a>!</p>
						<p>Kami ingin mengkonfirmasi bahwa pembayaran Anda sudah kami terima, pesanan&nbsp;anda segera diproses.</p>
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
						<td colspan="2" style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px ; font-weight: bold" align="left">: '.$_POST['TRANSIDMERCHANT'].'</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px ; font-weight: bold" align="left">Tanggal Pemesanan</td>
						<td colspan="2" style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px" align="left">: '.date('Y-m-d H:i').'</td>
					</tr>
					<tr>
						<td style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px ; font-weight: bold" align="left">Status Pembayaran</td>
						<td colspan="2" style="font-family: &quot;arial&quot; , sans-serif ; color: #3b3b3b ; font-size: 14px ; line-height: 24px ; padding-left: 12px" align="left">: Pembayaran Diterima</td>
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
						PT. TOKO RETAIL INDONESIA. Jalan Raya Limo No. 189,Depok.</font></p>
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
		smtp_mail($to, $subject, $message, '', '', 0, 0, false);		
	}
}
?>