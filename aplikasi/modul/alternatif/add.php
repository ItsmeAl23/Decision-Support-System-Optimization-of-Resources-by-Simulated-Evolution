<?php 
    $kode = AutoNumber();
?>

<h1 class="judul-content">Form Tambah Data Alternatif</h1>

<form action="" method="POST">
    <table >
        <tr>
            <th><label for="kode">Kode</label></th>
            <td>: <input class="input-text" type="text" name="kode" autocomplete="off" value="<?= $kode; ?>" required></td>
        </tr>
        <tr>
            <th><label for="nama">Nama</label></th>
            <td>: <input class="input-text" type="text" id="nama" name="nama" autocomplete="off" required></td>
        </tr>
        <tr>
            <th><label for="penghasilan">Jumlah Penghasilan per Bulan</label></th>
            <td>: <input class="input-text" type="text" id="penghasilan" name="penghasilan" onkeypress="return inputAngka(event)" autocomplete="off" required></td>
        </tr>
        <tr>
            <th><label for="sekolah">Jumlah Anak Usia Sekolah</label></th>
            <td>: <input class="input-text" type="text" id="sekolah" name="sekolah" onkeypress="return inputAngka(event)" autocomplete="off" required></td>
        </tr>
        <tr>
            <th><label for="lansia">Jumlah Lansia</label></th>
            <td>: <input class="input-text" type="text" id="lansia" name="lansia" onkeypress="return inputAngka(event)" autocomplete="off" required></td>
        </tr>
        <tr>
            <th>
                <label for="hamil">Terdapat Ibu Hamil</label>
            </th>
            <td>
                <select class="label-pilihan" name="hamil" id="hamil" required>
                    <option value="">--- Pilihan ---</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>
                <label for="disabilitas">Terdapat Penyandang Disabilitas</label>
            </th>
            <td>
                <select class="label-pilihan" name="disabilitas" id="disabilitas" required>
                    <option value="">--- Pilihan ---</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>
                <label for="dtks">Terdaftar dalam DTKS</label>
            </th>
            <td>
                <select class="label-pilihan" name="dtks" id="dtks" required>
                    <option value="">--- Pilihan ---</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </td>
        </tr>
    </table>
    <br>
    <div class="btn-bawah">
        <a class="kembali-btn" href="./?page=alternatif">Kembali</a>
        <button class="proses-btn" type="submit" name="simpan">Tambah Data</button>
    </div>

<script>
    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>

<?php
function AutoNumber(){
    $query = getRecord("alternatif", "MAX(RIGHT(kode,5)) AS kode","");
    $row   = fetch($query);
    $nomor = (int) $row['kode'] + 1;
    $p     = strlen($nomor);
    $nol_plus = "";
    for($i = 1; $i <= 5 - $p; $i++){
        $nol_plus .= "0";
    }
    $kode = "A".$nol_plus.$nomor;
    return $kode;
}


if (isset($_POST['simpan'])) {
    $kode  = htmlspecialchars($_POST['kode']);
    $nama  = htmlspecialchars($_POST['nama']);
    $penghasilan     = htmlspecialchars($_POST['penghasilan']);
    $sekolah  = htmlspecialchars($_POST['sekolah']);
    $lansia   = htmlspecialchars($_POST['lansia']);
    $hamil       = htmlspecialchars($_POST['hamil']);
    $disabilitas       = htmlspecialchars($_POST['disabilitas']);
    $dtks       = htmlspecialchars($_POST['dtks']);

    // cek apakah kode sudah dipakai 
    $dataSudahAda = false;
    $select = "SELECT * FROM alternatif WHERE kode = '$kode' ";
    $result = mysqli_query($conn, $select);
    if ($result && mysqli_num_rows($result) > 0) {
        $dataSudahAda = true;
    }

    // Jika kode sudah ada
    if ($dataSudahAda) {
        echo "
                <script>
                Swal.fire({
                    width: '40%',
                    position: 'center',
                    icon: 'error',
                    iconColor: 'rgb(255, 0, 0)',
                    title: 'Data Sudah Ada',
                    text: 'Data dengan kode $kode sudah ada !',
                    showConfirmButton: false,
                    allowEnterKey: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showCloseButton: true,
                });
            </script>
        
            ";
    }
    // Jika kode belum ada
    else {
        
        //cek apakah data sudah ada
        $dataSudahAda2 = false;
        $select2 = "SELECT * FROM alternatif WHERE nama = '$nama' AND penghasilan = '$penghasilan' AND sekolah = '$sekolah' AND lansia = '$lansia' AND hamil = '$hamil' AND disabilitas = '$disabilitas' AND dtks = '$dtks' ";
        $result2 = mysqli_query($conn, $select2);
        if ($result2 && mysqli_num_rows($result2) > 0) {
            $dataSudahAda2 = true;
        }

        //Jika data sudah ada
        if ($dataSudahAda2) {
        echo "
                <script>
                Swal.fire({
                    width: '40%',
                    position: 'center',
                    icon: 'error',
                    iconColor: 'rgb(255, 0, 0)',
                    title: 'Data Sudah Ada',
                    text: 'Data dengan dengan keterangan yang di input sudah ada !',
                    showConfirmButton: false,
                    allowEnterKey: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showCloseButton: true,
                });
            </script>
        
            ";
        }

        //Jika data belum ada
        else{
            $table  = "alternatif";
            $field  = "(id,kode,nama,penghasilan,sekolah,lansia,hamil,disabilitas,dtks)";
            $value  = "('','$kode','$nama','$penghasilan','$sekolah','$lansia','$hamil','$disabilitas','$dtks')";
            $simpan = insert($table,$field,$value);
            if($simpan){
            
            echo "<script>
              Swal.fire({
                  title: 'Data alternatif berhasil ditambahkan',
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