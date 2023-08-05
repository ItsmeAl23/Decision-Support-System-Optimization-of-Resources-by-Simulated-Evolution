<?php
$id = $_GET['id'];
$query  = getRecord("alternatif","*","WHERE id='$id'");
$row    = fetch($query);
?>

<h1 class="judul-content">Form Edit Data Alternatif</h1>
<form action="" method="POST">
    <table >
        <tr>
            <th><label for="kode">Kode</label></th>
            <td>: <input class="input-text" type="text" name="kode" id="kode" value="<?= $row["kode"]  ?>" autocomplete="off" required></td>
        </tr>
        <tr>
            <th><label for="nama">Nama</label></th>
            <td>: <input class="input-text" type="text" name="nama" id="nama" value="<?= $row["nama"]  ?>" autocomplete="off" required></td>
        </tr>
        <tr>
            <th><label for="penghasilan">Jumlah Penghasilan per Bulan</label></th>
            <td>: <input class="input-text" type="text" name="penghasilan" id="penghasilan" value="<?= $row["penghasilan"]  ?>" autocomplete="off" required></td>
        </tr>
        <tr>
            <th><label for="sekolah">Jumlah Anak Usia Sekolah</label></th>
            <td>: <input class="input-text" type="text" name="sekolah" id="sekolah" value="<?= $row["sekolah"]  ?>" autocomplete="off" required></td>
        </tr>
        <tr>
            <th><label for="lansia">Jumlah Lansia</label></th>
            <td>: <input class="input-text" type="text" name="lansia" id="lansia" value="<?= $row["lansia"]  ?>" autocomplete="off" required></td>
        </tr>
        <tr>
            <th>
                <label for="disabilitas">Terdapat Ibu Hamil</label>
            </th>
            <td>
                <select class="label-pilihan" name="hamil" id="hamil" required>
                    <option value="">--Pilih--</option>
                    <?php
                        $hamil = $row['hamil'];
                        if($hamil=="Ya"){$select_1 ="selected"; }else{ $select_1 = "";}
                        if($hamil=="Tidak"){$select_2 ="selected"; }else{ $select_2 = "";}
                    ?>
                    <option value="Ya"<?= $select_1;  ?>>Ya</option>
                    <option value="Tidak"<?= $select_2;  ?>>Tidak</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>
                <label for="disabilitas">Terdapat Penyandang Disabilitas</label>
            </th>
            <td>
				<select class="label-pilihan" name="disabilitas" id="disabilitas" required>
					<option value="">--Pilih--</option>
					<?php
						$disabilitas = $row['disabilitas'];
						if($disabilitas=="Ya"){$select_1 ="selected"; }else{ $select_1 = "";}
						if($disabilitas=="Tidak"){$select_2 ="selected"; }else{ $select_2 = "";}
					?>
					<option value="Ya"<?= $select_1;  ?>>Ya</option>
					<option value="Tidak"<?= $select_2;  ?>>Tidak</option>
				</select>
            </td>
        </tr>
        <tr>
            <th>
                <label for="dtks">Terdaftar dalam DTKS</label>
            </th>
            <td>
				<select class="label-pilihan" name="dtks" id="dtks" required>
					<option value="">--Pilih--</option>
					<?php
						$dtks = $row['dtks'];
						if($dtks=="Ya"){$select_1 ="selected"; }else{ $select_1 = "";}
						if($dtks=="Tidak"){$select_2 ="selected"; }else{ $select_2 = "";}
					 ?>
					<option value="Ya"<?= $select_1;  ?>>Ya</option>
					<option value="Tidak"<?= $select_2;  ?>>Tidak</option>
				</select>
            </td>
        </tr>
    </table>
	<br>
    <div class="btn-bawah">
		<button class="batal-btn" type="button" onclick="window.location.href='./?page=alternatif'" >Batal</button>
        <button class="proses-btn" type="submit" name="simpan">Edit Data</button>
    </div>
</form>

<?php 

if (isset($_POST['simpan'])) {
	$kode  = htmlspecialchars($_POST['kode']);
	$nama  = htmlspecialchars($_POST['nama']);
	$penghasilan  = htmlspecialchars($_POST['penghasilan']);
	$sekolah     = htmlspecialchars($_POST['sekolah']);
	$lansia  = htmlspecialchars($_POST['lansia']);
    $hamil  = htmlspecialchars($_POST['hamil']);
	$disabilitas   = htmlspecialchars($_POST['disabilitas']);
	$dtks       = htmlspecialchars($_POST['dtks']);

	$table  = "alternatif";
	$where  = "id='$id'";
	$value  = "kode='$kode',nama='$nama',penghasilan='$penghasilan',sekolah='$sekolah',lansia='$lansia',hamil='$hamil',disabilitas='$disabilitas',dtks='$dtks'";
	$simpan = update($table,$value,$where);
	if($simpan){
		//echo "Data Sukses Disimpan !";
		echo "<script>
              Swal.fire({
                  title: 'Data alternatif berhasil diedit',
                  width: '40%',
                  icon: 'success',
                  iconColor: 'rgb(27, 199, 133)',
                  showConfirmButton: false,
                  allowEnterKey: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
              });

              setTimeout(function(){
                  window.location.href='./?page=alternatif';
              }, 1500);
        </script>";
	}else{
		echo "Data Gagal Disimpan !";
	}
}
?>
<style>
    td{
        border: none;
    }
    .input-text{
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .label-pilihan{
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .btn-bawah{
        display: flex;
        width: 25%;
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
    .batal-btn{
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
    .batal-btn:last-child{
        margin-right: 0;
    }
    .batal-btn:hover{
        background-color: #da190b;
    }
</style>