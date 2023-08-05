
<div class="content">
	<h1 class="judul-content">Konversi Data</h1>
    <br>
    <button class="proses-btn" onclick="goToBottom()">Pergi ke Bawah</button>
<script>
    function goToBottom() {
    var element = document.getElementById("bottom");
    element.scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" });
  }
</script>
    <table class="tabel-alternatif" cellspacing="0">
        <thead>
            <tr>
                <th class="no">No.</th>
                <th class="kode">Kode</th>
                <th class="nama">Nama</th>
                <th class="penghasilan">Jumlah Penghasilan per Bulan</th>
                <th class="aus">Jumlah Anak Usia Sekolah</th>
                <th class="lansia">Jumlah Lansia</th>
                <th class="hamil">Terdapat Ibu Hamil</th>
                <th class="pd">Terdapat Penyandang Disabilitas</th>
                <th class="td-dtks">Terdaftar Dalam DTKS</th>
            </tr>
        </thead>
        <tbody>
            <?php 
				$no = 1;
				$tabel  = "alternatif";
				$field  = "*";
				$where  = "";
				$ind = 0;
				$kode   = [];
				$nama   = [];
				$n_sekolah = [];
				$n_lansia = [];
				$n_hamil = [];
				$n_disabilitas = [];
				$n_dtks = [];

				$query = getRecord($tabel,$field,$where);
				while ($row = fetch($query)) {
			?>
			<tr>
				<td align="center"><?= $no;  ?></td>
			 	<?php 
					if (isset($row['kode'])) {
						$kode[] = $row['kode'];
					}
					if (isset($row['nama'])) {
						$nama[] = $row['nama'];
					}
					if ( $row['penghasilan'] <= 400000 ) {
						$n_penghasilan[] = 4;
					}
					elseif ( $row['penghasilan'] > 400000 && $row['penghasilan'] <= 700000 ) {
						$n_penghasilan[] = 3;
					}
					elseif ( $row['penghasilan'] > 700000 && $row['penghasilan'] <= 1000000 ) {
						$n_penghasilan[] = 2;
					}
					elseif ( $row['penghasilan'] > 1000000 ) {
						$n_penghasilan[] = 1;
					}
					if ( $row['sekolah'] == 0 ) {
				 		$n_sekolah[] = 1;
				 	}
				 	elseif ( $row['sekolah'] == 1 ) {
				 		$n_sekolah[] = 2;
				 	}
				 	elseif ( $row['sekolah'] == 2 ) {
				 		$n_sekolah[] = 3;
				 	}
				 	elseif ( $row['sekolah'] == 3 ) {
				 		$n_sekolah[] = 4;
				 	}
				 	elseif ( $row['sekolah'] > 3 ) {
				 		$n_sekolah[] = 5;
				 	}
				 	if ( $row['lansia'] == 0 ) {
				 		$n_lansia[] = 1;
				 	}
				 	elseif ( $row['lansia'] == 1 ) {
				 		$n_lansia[] = 2;
				 	}
				 	elseif ( $row['lansia'] >= 2 ) {
				 		$n_lansia[] = 3;
				 	}
				 	if ( $row['hamil'] == 'Ya' ) {
				 		$n_hamil[] = 1;
				 	}
			 		elseif ( $row['hamil'] == 'Tidak' ) {
				 		$n_hamil[] = 0;
				 	}
					if ( $row['disabilitas'] == 'Ya' ) {
				 		$n_disabilitas[] = 1;
				 	}
			 		elseif ( $row['disabilitas'] == 'Tidak' ) {
				 		$n_disabilitas[] = 0;
				 	}
					if ( $row['dtks'] == 'Ya' ) {
				 		$n_dtks[] = 1;
				 	}
			 		elseif ( $row['dtks'] == 'Tidak' ) {
				 		$n_dtks[] = 0;
				 	}
				 	if ( $n_dtks[$ind] == 0 ) {
				 		$n_penghasilan[$ind] = 0;
				 		$n_sekolah[$ind] = 0;
				 		$n_lansia[$ind] = 0;
				 		$n_hamil[$ind] = 0;
				 		$n_disabilitas[$ind] = 0;
				 	}
				?>
				<td align="center"><?= $kode[$ind]; ?></td>
				<td align="center"><?= $nama[$ind]; ?></td>
				<td align="center"><?= $n_penghasilan[$ind];  ?></td>
				<td align="center"><?= $n_sekolah[$ind];  ?></td>
				<td align="center"><?= $n_lansia[$ind];  ?></td>
				<td align="center"><?= $n_hamil[$ind];  ?></td>
				<td align="center"><?= $n_disabilitas[$ind];  ?></td>
				<td align="center"><?= $n_dtks[$ind];  ?></td>
			</tr>
			<?php
				$no++;
				$ind++;
			}
			?>
		</tbody>
	</table>
	<br>
	<div class="btn-bawah">
		<a class="kembali-btn" href="./?page=oreste">Kembali</a>
		<form action="" method="POST">
			<button class="proses-btn" type="submit" name="simpan">Lanjutkan</button>
		</form>
    </div>
<?php 

if (isset($_POST['simpan'])) {
	//cek apakah data sudah ada dalam database 

	$tbl = "konversi";
	$f = "*";
	$w = "";


	$sql = getRecord($tbl,$f,$w);
	$hitung = count_rows($sql);

	if ($hitung == 0) {
		$i = 0;
		$i2 = 1;
		while ($i < count($kode)) {
			$table = "konversi";
			$field = "(id,kode,nama,c1,c2,c3,c4,c5,c6)";
			$value = "('$i2','$kode[$i]','$nama[$i]','$n_penghasilan[$i]','$n_sekolah[$i]','$n_lansia[$i]','$n_hamil[$i]','$n_disabilitas[$i]','$n_dtks[$i]')";
			$simpan = insert($table,$field,$value);
			$i++;
			$i2++;
		}
		echo " <script>
 					window.location.href='./?page=oreste&act=besson_rank'
				 </script>"; 
	}


	else if($hitung > 0){
		$table = "konversi";
		$field = "*";
		$where = "";
		$kode_l = [];
		$i = 0;
		$sql = getRecord($table,$field,$where);
		while ($row = fetch($sql)) {
			$kode_l[] = $row['kode'];
		}

		while ($i < count($kode_l)) {
			$table = "konversi";
			$where = "kode = '$kode_l[$i]'";
			$delete = delete($table,$where);
			$i++;
		}

		echo "<script>
                const Toast = Swal.mixin({
				  toast: true,
				  position: 'top-end',
				  showConfirmButton: false,
				  timer: 3000,
				  timerProgressBar: true,
				  didOpen: (toast) => {
				    toast.addEventListener('mouseenter', Swal.stopTimer)
				    toast.addEventListener('mouseleave', Swal.resumeTimer)
				  }
				})

				Toast.fire({

				  icon: 'info',
				  title: 'Data berhasil diupdate',
				  text: 'Silahkan ulangi lagi'
				})
                </script>";
	}
}
?>

<?php
?>
<style>
	.btn-bawah{
		float: right;
        display: flex;
        width: 25%;
        margin-bottom: 20px;
    }
    .proses-btn{
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        margin: 5px 20px;
    }
    .proses-btn:last-child{
        margin-right: 0;
    }
    .proses-btn:hover{
        background-color: #3e8e41;
    }
    .kembali-btn{
        background-color: #f44336;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        margin: 5px 20px;
    }
    .kembali-btn:last-child{
        margin-right: 0;
    }
    .kembali-btn:hover{
        background-color: #da190b;
    }
</style>
<div id="bottom"></div>