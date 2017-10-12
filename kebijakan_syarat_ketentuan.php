
<?php 
	if(count($kebijakan) > 1){
		if($kebijakan[1] != ''){
			$sub = $kebijakan[1];
		}else{
			$sub = 'all';		
		}
	}else{
		$sub = 'all';		
	}
?>
<h4 class="text-uppercase h-pad-sm">Syarat dan Ketentuan</h4> 
	<div class="hr"></div>
	<div class="divider divider--xs"></div>
	<div class="container"  style="text-align: justify;"> 
		<blockquote>
			<p>Ketentuan Umum</p>
			<footer>
				Perjanjian antara anggota (member dan agen) dengan PT.Toko Ritel Indonesia (kemudian disebut “ORELI”), suatu perusahaan Toko Online yang didirikan berdasarkan hukum di Indonesia , dilakukan atas kesepakatan dan persetujuan bersama untuk melaksanakan dan memenuhi ketentuan-ketentuan tersebut di bawah ini.
			</footer>
		</blockquote>
		<div class="tab-content tab-content--wd">
			<div role="tabpanel" class="tab-pane active">
			<?php 
				if($sub == "member" OR $sub=="all"){					
			?>
				<p>Syarat  Member</p>
				<ol>
					<li>
						Calon member harus sudah berusia minimal 17 (tujuh belas) tahun dan telah memiliki Kartu Tanda Penduduk (KTP) pada saat mendaftar.</footer>
					</li>
					<li>
						Member diperkenankan hanya perorangan, tidak boleh atas nama suatu badan hukum atau perkumpulan.
					</li>
					<li>
						Pendaftaran tidak dikenakan biaya administrasi. 
					</li>
					<li>
						Calon Member dapat disponsori oleh seseorang Member yang telah terdaftar dengan mencantumkan kode member sponsor.
					</li>
					<li>
						Seorang calon Member yang telah melengkapi data menjadi Member Baru, dan menyatakan setuju, berarti Member tersebut telah sepakat untuk mematuhi ketentuan yang terdapat dalam perjanjian berikut perubahan yang akan dilakukan oleh ORELI.
					</li>
					<li>
						Pendaftar dianggap sah sebagai Member setelah pendaftaran tersebut disetujui oleh ORELI.
					</li>
				</ol>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Cara  Mendaftar</p>
				<ol>
					<li>
						Masuk ke halaman ‘Daftar Member” pada www.oreli.co.id dan mengisi data yang diperlukan sebagai member dengan lengkap.
					</li>
					<li>
						Upload  KTP Anda (dalam bentuk foto, scan atau fotokopi) pada fitur yang sudah disediakan dalam format image, pastikan file KTP Anda dapat dibaca dengan jelas
					</li>
					<li>
						Bagi Anda yang belum mengirimkan berkas KTP dalam bentuk format image, Anda dapat mengirimkan ke tim Customer Service kami melalui email di customer@oreli.co.id atau dengan meminta bantuan sponsor anda. 
					</li>
					<li>
						Pada saat mendaftar, anda diminta mengisi Sponsor Anda dengan mengisi Kode Member sponsor atau dapat dikosongkan apabila Anda tidak memiliki sponsor. 
					</li>
					<li>
						Setelah Anda selesai mengisi data pribadi, silakan klik ’Daftar dan setuju” dengan syarat dan ketentuan keanggotaan ORELI, selanjutnya kami akan mengirimkan email konfirmasi pendaftaran ke akun email Anda.
					</li>
					<li>
						Konfirmasikan pendaftaran member baru Anda dengan cara klik pada link yang kami kirimkan ke akun email Anda.
					</li>
					<li>
						Member baru melakukan pembelanjaan pertama minimal 2 jenis barang ke dalam keranjang belanja dalam jangka waktu 1x24 Jam sejak mendaftar. Jika melewati waktu yang ditentukan, maka keanggotaan otomatis akan dihapus dari sistem ORELI. 
					</li>
					<li>
						Kelengkapan member (starter kit) yang tersedia akan dikirimkan bersamaan dengan order pertama. Jika Kelengkapan tidak tersedia, akan dikirimkan pada pengiriman selanjutnya. 
					</li>
					<li>
						Pembayaran order pertama member dilakukan melalui melalui transfer ke rekening ORELI atau melalui Sarana lainnya yang disediakan dan ditetapkan ORELI. 
					</li>
				</ol>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Cara Menjadi Agen </p>
				<ol>
					<li>
						Untuk menjadi agen seseorang harus mendaftar menjadi member terlebih dahulu kemudian mengirimkan email kepada customer@oreli.co.id perihal permohonan menjadi agen. 
					</li>
					<li>
						ORELI akan memproses permintaan menjadi agen dan akan mengirimkan email balasan persetujuan permohonan menjadi agen atau penolakan menjadi agen. 
					</li>
					<li>
						Setelah permohonan disetujui, agen akan melakukan pembelanjaan total minimal Rp20.000.000,- (Dua Puluh Juta Rupiah) sebelum diskon.
					</li>
					<li>
						Pembelian selanjutnya adalah minimal Rp20.000.000,- (Dua Puluh Juta Rupiah) sebelum diskon. Apabila produk yang dipesan tidak tersedia, pembelian dapat kurang dari jumlah tersebut. 
					</li>
					<li>
						Agen merupakan representasi toko offline ORELI yang jumlahnya akan dibatasi berdasarkan wilayah kecamatan tempat agen berdomisili. Penentuan jumah maksimum agen dalam satu kecamatan adalah berdasarkan luas wilayah dan kepadatan penduduk di kecamatan tersebut.  
					</li>
				</ol>
			<?php 
				}
				if($sub=="all"){					
			?>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Panduan Keanggotaan</p>
				<ol>
					<li>
						Yang disebut sebagai Anggota ORELI adalah Member dan Agen. 
					</li>
					<li>
						Untuk mengembangkan grup sekaligus bisnisnya, setiap anggota ORELI berhak mensponsori member baru dan akan terus mencari member baru untuk pengembangan grupnya. 
					</li>
					<li>
						Setiap member dapat menyebarkan kode member atau link sponsor melalui internet atau sarana apapun untuk mensponsori calon member bergabung dengan grupnya atau memfasilitasi siapapun mendapatkan diskon dengan menggunakan kode member miliknya. 
					</li>
					<li>
						etiap Member baru berhak untuk memilih sponsor siapa saja tanpa ada paksaan.
					</li>
					<li>
						Setiap member tidak dapat memindahkan garis sponsornya kepada member atau agen lainnya. 
					</li>
					<li>
						Setiap member hanya memiliki garis sponsor dengan member atau agen yang mensponsorinya secara langsung.  
					</li>
					<li>
						Seorang Member hanya diperbolehkan mendaftar sekali. Jika terdapat lebih dari satu permohonan menjadi member dari seorang calon member maka permohonan lainnyaakandihapus oleh system ORELI.
					</li>
					<li>
						Seorang member yang memilih menjadi agen akan lepas dari garis sponsor member/agen yang membawanya. 
					</li>
					<li>
						Seorang member atau agen sponsor harus membantu member yang dibawahnya jika ada kesulitan yang berkaitan dengan penggunaan www.oreli.co.id  dan permasalahan lainnya yang dihadapi berkaitan dengan ORELI. 
					</li>
					<li>
						Agen diharuskan memiliki tempat usaha atau sarana lainnya untuk memajang koleksi oreli. Agen dapat menggunakan logo dan karakter ORELI dan Estee pada tempat usahanya setelah mendapat ijin tertulis resmi dari Manajemen ORELI. 
					</li>
					<li>
						Seluruh anggotaORELI diwajibkan untuk mengetahui dan memahami kebijakan yang telah ditentukan oleh ORELI, dan dalam menjalankan usahanya para anggota harus berpegang teguh pada panduan dan kebijakan ORELI.
					</li>
					<li>
						Member dan agen tidak memiliki hubungan pekerjaan dengan ORELI dan tidak dibenarkan menggunakan jabatan dalam perusahaan ORELI. 
					</li>
					<li>
						Anggota wajib bertanggung jawab penuh dalam melaksanakan keseluruhan kewajibannya berdasarkan Perjanjian.
					</li>
					<li>
						Anggota akan berusaha dengan sebaik-baiknya dalam menjelaskan sistem dan memasarkan produk ORELI. Perusahaan tidak bertanggung jawab atas keterangan baik lisan maupun tertulis yang diberikan oleh anggota kepada pelanggan ataupun Member yang akan disponsori, yang bertentangan dengan ketentuan yang ada.
					</li>
					<li>
						Dalam menjual produk ORELI, anggota harus berpedoman pada daftar harga yang telah ditetapkan oleh ORELI.
					</li>
					<li>
						Anggota adalah pihak yang berdiri sendiri, bertanggung jawab penuh atas seluruh kegiatan usahanya dan merupakan mitra kerja Perusahaan.
					</li>
					<li>
						Member hanya diperbolehkan membeli produk yang dijual ORELI melalui www.oreli.co.id atau agen di wilayahnya.
					</li>
					<li>
						Apabila dipandang perlu, Perusahaan berhak untuk setiap saat merubah sebagian ataupun keseluruhan Perjanjian keanggotaan tanpa perlu mendapatkan persetujuan terlebih dahulu dari Member. Pemberitahuan perubahan perjanjian akan disampaikan kepada anggota melalui email atau sarana lainnya. 
					</li>
					<li>
						Seluruh ketentuan-ketentuan sebagaimana termasuk dalam Perjanjian ini merupakan kesepakatan mutlak diantara kedua belah pihak.
					</li>
					<li>
						Penggunaan Merk dagang dan atau Logo ORELI atau Merk dagang dan logo Estee harus mendapat ijin tertulis resmi dari Manajemen ORELI.
					</li>
					<li>
						Setiap anggota yang terbukti melanggar kebijakan perusahaan akandinonaktifkan sebagai anggota ORELI dan kehilangan hak-haknya sebagai anggota ORELI.
					</li>
					<li>
						Setiap anggota dilarang untuk melakukan tindakan dan perbuatan untuk kepentingan pribadi dengan cara apapun yang menyebabkan kerugian bagi perusahaan dan atau anggota yang lain.
					</li>
					<li>
						Apabila di kemudian hari anggota berhalangan tetap (meninggal dunia) maka hak-hak anggota yang terkait dengan perjanjian ini bisa diwakilkan/dilimpahkan kepada ahli warisnya dan diatur sesuai dengan peraturan yang berlaku.
					</li>
				</ol>
			<?php 
				}
				if($sub == "belanja" OR $sub=="all"){					
			?>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Pembelian Online</p>
				<ol>
					<li>
						Produk ORELI dapat dipesan melalui www.oreli.co.id
					</li>
					<li>
						Harga yang tercantum pada website  adalah harga banderol yang berlaku umum, member membayar dengan Harga Member yaitu diskon 20% dari banderol. Agen mendapat diskon 30%. 
					</li>
					<li>
						Agen atau Member akan mendapatkan bonus poin dari setiap pembelanjaan online sesuai dengan poin yang tercantum pada masing masing produk
					</li>
					<li>
						Poin yang tercantum pada produk terdiri dari poin pribadi dan poin sponsor. Poin pembelian pribadi merupakan poin yang diperoleh atas nama member atau agen sendiri, sedangkan poin sponsor adalah poin yang diperoleh atas nama sponsor member. 
					</li>
					<li>
						Order yang sudah dibayar tidak dapat dibatalkan.
					</li>
				</ol>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Ketersediaan Barang</p>
				<ol>
					<li>
						ORELI memastikan bahwa semua gambar, deskripsi, ketersediaan dan harga dari produk yang ditampilkan di www.oreli.co.id atau katalog adalah sesuai keadaan sebenarnya. Jika terdapat kesalahan dalam harga atau ketersediaan barang-barang yang Anda pesan, segera kami akan memberitahu Anda melalui telepon/email atau sarana lainnya dan memberi Anda pilihan untuk konfirmasi ulang pesanan Anda. 
					</li>
				</ol>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Pembelian melalui Agen</p>
				<ol>
					<li>
						Agen harus melayani pesanan pembelian dari member yang disponsorinya maupun member yang disponsori pihak lain. 
					</li>
					<li>
						Ketersediaan Barang adalah tanggung jawab agen sendiri. 
					</li>
					<li>
						Member yang membeli barang melalui agen akan mendapatkan poin pribadi dan Agen harus mentransfer poin pribadi agen kepada member tersebut. 
					</li>
					<li>
						Agen akan mendapatkan poin sponsor atas pembelian member dalam grupnya yang langsung kepada agen tersebut. 
					</li>
					<li>
						Transaksi antara member dan agen adalah kesepakatan kedua pihak tersebut dan tanggung jawab ORELI terbatas pada pemindahan poin pribadi berdasarkan permintaan pemindahan poin oleh agen. 
					</li>
					<li>
						Permintaan pemindahan poin tersedia pada menu ‘transfer poin” pada www.oreli.co.id dan mengisi data secara lengkap. 
				</ol>
			<?php 
				}
				if($sub == "bonus" OR $sub=="all"){					
			?>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Bonus</p>
				<ol>
					<li>
						Bonus diberikan atas poin yang diakumulasi oleh member atau agen berupa jumlah poin pribadi ditambah jumlah poin sponsor selama 1 (satu) bulan disebut bonus bulanan dan 1 (satu) tahun disebut bonus tahunan.
					</li>
					<li>
						Bonus bulanan diberikan berupa uang tunai dengan jumlah per 1 (satu) poin bernilai Rp1000,- (seribu rupiah). 
					</li>
					<li>
						Penarikan poin bulanan dilakukan oleh member atau agen dengan mengisi menu redeem (penarikan) poin pada www.oreli.co.id. 
					</li>
					<li>
						Bonus bulanan pada suatu bulan tidak dapat ditarik  jika member atau agen pada suatu bulan tersebut tidak ada pembelian. Bonus bulanan yang tertunda tersebut baru dapat ditarik setelah pada bulan berikutnya member atau agen tersebut melakukan pembelian. 
					</li>
					<li>
						Permintaan penarikan bonus bulanan dapat dilakukan oleh member atau agen pada tanggal 1 (satu) sampai dengan tanggal 10(sepuluh) bulan berikutnya. Jika sampai dengan batas waktu yang ditentukan bonus bulanan tidak ditarik maka penarikan baru dapat dilakukan pada periode penarikan selanjutnya. 
					</li>
					<li>
						Bonus tahunan diberikan berdasarkan jumlah tertentu akumulasi poin pribadi ditambah jumlah poin sponsor selama 1 (satu) tahun yang nilainya ditetapkan oleh perusahaan. 
					</li>
					<li>
						Bonus bulanan berupa uang tunai akan ditransfer ke rekening member atau agen yang dicantumkan pada saat mendaftar paling lama 7 (tujuh) hari kerja sejak batas waktu penarikan poin berakhir.  Biaya yang timbul sehubungan dengan proses transfer menjadi tanggungan anggota.
					</li>
					<li>
						Bonus yang diterima member atau agen merupakan objek pajak penghasilan berdasarkan peraturan perpajakan yang berlaku dan akan dilakukan pemotongan pajak penghasilan berdasarkan ketentuan yang berlaku.
					</li>
					<li>
						Bonus bulanan dan tahunan tidak hangus sepanjang anggota tidak terbukti melanggar kebijakan perusahaan dan tidak melakukan tindakan dan perbuatan untuk kepentingan pribadi dengan cara apapun yang menyebabkan kerugian bagi perusahaan dan atau anggota yang lain.
				</ol>
			<?php 
				}
				if($sub == "pembayaran" OR $sub=="all"){					
			?>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Pembayaran</p>
				<ol>
					<li>
						Pembayaran pesanan dilakukan melalui transfer ke rekening PT ORELI di Bank yang ditentukan atau menggunakan sarana lainnya yang disediakan dan ditetapkan oleh ORELI.
					</li>
					<li>
						Biaya yang timbul sehubungan dengan pembayaran atas pesanan merupakan tanggungan pemesan. ORELI tidak dibebankan atas biaya yang diminta pihak ketiga sehubungan dengan pembayaran. 
					</li>
					<li>
						Pembayaran harus sesuai dengan jumlah berdasarkan tagihan (Invoice). Jika jumlah yang ditransfer sudah sesuai dengan invoice, Anda tidak perlu melakukan konfirmasi pembayaran.
					</li>
					<li>
						Jika jumlah pembayaran anda tidak sesuai dengan Invoice, maka anda harus melakukan konfirmasi pembayaran manual di www.oreli.co.id. Jika tidak melakukan konfirmasi manual, maka pesanan anda diproses menunggu konfirmasi manual. 
					</li>
				</ol>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Pengiriman Pesanan</p>
				<ol>
					<li>
						Pesanan yang sudah dibayar dan divalidasi oleh ORELI yang diterima sampai dengan pukul 12.00 akan dikirimkan pada hari yang sama. Lewat dari waktu tersebut, pesanan akan dikirim hari berikutnya. Pesanan pada hari libur nasional dan hari minggu akan dikirim pada hari kerja berikutnya.
					</li>
					<li>
						Pengiriman barang menggunakan jasa ekpedisi swasta atau PT Pos Indonesia. Lama barang sampai alamat tujuan tergantung ekpedisi yang digunakan.
					</li>
					<li>
						Atas persetujuan pemesan, pemesan dapat membeli layanan asuransi yang disediakan jasa ekspedisi dengan menambahkan jumlah tertentu yang diminta oleh jasa ekspedisi dan akan ditambahkan ke dalam tagihan (Invoice). 
					</li>
					<li>
						Setelah pesanan diserahkan kepada penyedia jasa ekspedisi dan dibuktikan dengan resi atau tanda terima pengiriman maka ORELI dibebaskan dari segala tanggung jawab kepemilikan dan resiko pengirimandari produk-produk yang dipesan.
					</li>
					<li>
						Pengiriman pesanan dari agen akan diasuransikan oleh ORELI dan biaya asuransi ditanggung ORELI. 
					</li>
					<li>
						Kebijakan bebas ongkos kirim berlaku untuk daerah tertentu di wilayah Indonesia yang ditentukan manajemen ORELI. Diluar itu, akan dikenakan tambahan ongkos kirim.   
					</li>
				</ol>
			<?php 
				}
				if($sub == "refund-return" OR $sub=="all"){					
			?>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Penukaran Pesanan</p>
				<ol>
					<li>
						Barang yang sudah dibeli tidak dapat ditukar kecuali jika ukuran tidak sesuai. Pemesan boleh menukar sesuai ukuran yang diinginkannya melalui menu tukar ukuran di www.oreli.co.id
					</li>
					<li>
						Ongkos pengiriman sampai dengan dikirmkannya kembali ke alamat pemesan menjadi tanggungan pemesan. Ongkos kirim dari alamat ORELI ke alamat pemesan dilakukan dengan memotong poin member atau agen sebesar ongkos kirim. Jika pemesan bukan member atau agen maka pemesan diharuskan mentransfer pembayaran ongkos kirim dan melakukan konfirmasi pembayaran manual. Pemotongan poin dilakukan untuk bonus bulanan, bonus tahunan tidak berpengaruh. 
					</li>
					<li>
						Pengiriman barang dikirim ke alamat:
						PT ORELI
						Greenwoods Townhouse I Blok J3, Jalan WR Supratman, Kelurahan Rengas, Kecamatan Ciputat Timur, Tangerang Selatan 
					</li>
				</ol>
				<div class="hr"></div><div class="divider divider--xs"></div>
				<p>Pengembalian uang (Refund)</p>
				<ol>
					<li>
						Jika pemesan melakukan pembayaran melebihi dari jumlah yang ditentukan berdasarkan tagihan (Invoie), ORELI akan mengembalikan kelebihan pembayaran tersebut. 
					</li>
					<li>
						Dalam hal barang yang dipesan cacat produksi atau tidak sesuai dengan deskripsi dalam www.oreli.co.id, pemesan dapat mengembalikan barang yang dipesan. Ongkos kirim ke alamat ORELI menjadi tanggungan ORELI dan jika pemesan adalah member atau agen maka poin akan ditambahkan sebesar ongkos kirim. ORELI akan menghubungi pemesan untuk mengembalikan pembayaran atau pemesan mengganti pesanan dengan barang lainnya yang tersedia.  
					</li>
					<li>
						Dalam hal barang yang dipesan tidak tersedia pada saat dikirim, ORELI akan menghubungi pemesan untuk mengembalikan pembayaran atau pemesan mengganti pesanan dengan barang lainnya yang tersedia.  
					</li>
					<li>
						Pengiriman barang dikirim ke alamat:
						PT ORELI
						Greenwoods Townhouse I Blok J3, Jalan WR Supratman, Kelurahan Rengas, Kecamatan Ciputat Timur, Tangerang Selatan
					</li>
				</ol>
			<?php 
				}
			?>
			</div>
		</div>
	</div>