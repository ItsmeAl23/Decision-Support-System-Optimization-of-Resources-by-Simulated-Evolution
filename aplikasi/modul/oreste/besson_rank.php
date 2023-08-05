<?php 
    $tabel  = "konversi";
    $field  = "*";
    $where  = "";
    $query = getRecord($tabel,$field,$where);
    $kode = [];
    $nama = [];
    $c1 = [];
    $c2 = [];
    $c3 = [];
    $c4 = [];
    $c5 = [];
    $c6 = [];
    while ($row = fetch($query)){
        $kode[] = $row['kode'];
        $nama[] = $row['nama'];
        $c1[] = intval($row['c1']);
        $c2[] = intval($row['c2']);
        $c3[] = intval($row['c3']);
        $c4[] = intval($row['c4']);
        $c5[] = intval($row['c5']);
        $c6[] = intval($row['c6']);
    }
?>
<div class="content">
    <h1 class="judul-content">Menghitung Besson Rank</h1>
    <br>
    <button class="proses-btn" onclick="goToBottom()">Pergi ke Bawah</button>
<script>
    function goToBottom() {
    var element = document.getElementById("bottom");
    element.scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" });
  }
</script>
    <h3 class="sub-judul-content">Nilai Besson Rank C1</h3>
    <table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Kode Alternatif</th>
            <th>Nama Alternatif</th>
            <th>Nilai Alternatif</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $ind = 0;
        $i = 0;
        $ind_b = 1;
        $besson_rank_c1 = besson_rank($c1);
        
        while ($i < count($nama)) {
        ?>
        <tr>
            <td><?= $kode[$ind]; ?></td>
            <td align="center"><?= $nama[$ind];  ?></td>
            <td align="center"><?= $c1[$ind];  ?></td>
            <td align="center"><?= $besson_rank_c1[$ind_b]; ?></td>
        </tr>
        <?php 
            $i++;
            $ind++;
            $ind_b++;
            }
        ?>
    </tbody>
    </table>
    <br>
    <h3 class="sub-judul-content">Nilai Besson Rank C2</h3>
    <table border="1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Nilai Alternatif</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ind = 0;
                $i = 0;
                $ind_b = 1;
                $besson_rank_c2 = besson_rank($c2);
                while ($i < count($nama)) {
            ?>
            <tr>
                <td><?= $kode[$ind]; ?></td>
                <td align="center"><?= $nama[$ind];  ?></td>
                <td align="center"><?= $c2[$ind];  ?></td>
                <td align="center"><?= $besson_rank_c2[$ind_b]; ?></td>
            </tr>
            <?php 
                $i++;
                $ind++;
                $ind_b++;
                }
            ?>
        </tbody>
    </table> 
    <br>
    <h3 class="sub-judul-content">Nilai Besson Rank C3</h3>
    <table border="1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Nilai Alternatif</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ind = 0;
                $i = 0;
                $ind_b = 1;
                $besson_rank_c3 = besson_rank($c3);
                while ($i < count($nama)) {
            ?>
            <tr>
                <td><?= $kode[$ind]; ?></td>
                <td align="center"><?= $nama[$ind];  ?></td>
                <td align="center"><?= $c3[$ind];  ?></td>
                <td align="center"><?= $besson_rank_c3[$ind_b]; ?></td>
            </tr>
            <?php 
                $i++;
                $ind++;
                $ind_b++;
                }
            ?>
        </tbody>
    </table>
    <br>
    <h3 class="sub-judul-content">Nilai Besson Rank C4</h3>
    <table border="1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Nilai Alternatif</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ind = 0;
                $i = 0;
                $ind_b = 1;
                $besson_rank_c4 = besson_rank($c4);
                while ($i < count($nama)) {
            ?>
            <tr>
                <td><?= $kode[$ind]; ?></td>
                <td align="center"><?= $nama[$ind];  ?></td>
                <td align="center"><?= $c4[$ind];  ?></td>
                <td align="center"><?= $besson_rank_c4[$ind_b]; ?></td>
            </tr>
            <?php 
                $i++;
                $ind++;
                $ind_b++;
                }
            ?>
        </tbody>
    </table>
    <br>
    <h3 class="sub-judul-content">Nilai Besson Rank C5</h3>
    <table border="1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Nilai Alternatif</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ind = 0;
                $i = 0;
                $ind_b = 1;
                $besson_rank_c5 = besson_rank($c5);
                while ($i < count($nama)) {
            ?>
            <tr>
                <td><?= $kode[$ind]; ?></td>
                <td align="center"><?= $nama[$ind];  ?></td>
                <td align="center"><?= $c5[$ind];  ?></td>
                <td align="center"><?= $besson_rank_c5[$ind_b]; ?></td>
            </tr>
            <?php 
                $i++;
                $ind++;
                $ind_b++;
                }
            ?>
        </tbody>
    </table> 
    <br> 
    <h3 class="sub-judul-content">Nilai Besson Rank C6</h3>
    <table border="1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Nilai Alternatif</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ind = 0;
                $i = 0;
                $ind_b = 1;
                $besson_rank_c6 = besson_rank($c6);
                while ($i < count($nama)) {
            ?>
            <tr>
                <td><?= $kode[$ind]; ?></td>
                <td align="center"><?= $nama[$ind];  ?></td>
                <td align="center"><?= $c6[$ind];  ?></td>
                <td align="center"><?= $besson_rank_c6[$ind_b]; ?></td>
            </tr>
            <?php 
                $i++;
                $ind++;
                $ind_b++;
                }
            ?>
        </tbody>
    </table> 
    <br> 
    <div class="btn-bawah">
        <a class="kembali-btn" href="./?page=oreste&act=konversi">Kembali</a>
        <form action="" method="POST">
            <button class="proses-btn" type="submit" name="simpan">Lanjutkan</button>
        </form>
    </div>
</div>

<?php 
function besson_rank($n_konversi = []){
        
            // merubah array menjadi indeks ke 1
        $new_c = [];
        foreach ($n_konversi as $key => $value) {
            $new_c[$key + 1] = $value;
        }

        //mengurutkan data dari yang terbesar
        $n_konversi_l = []; // untuk menyimpan urutan array sebelum di rsort
        foreach ($n_konversi as $n) {
            $n_konversi_l[] = $n;
        }
        rsort($n_konversi);

        //cari nilai yang sama pada field
        $similiar_value = [];
        $similiar_value = array_count_values($n_konversi);

        //mencari ranking nilai pada field
        $ranking = [];
        foreach ($n_konversi as $key => $alternatif) {
            foreach ($similiar_value as $index => $value) {
                // mengurutkan nilai yg sama
                if ($alternatif === $index) {
                    $rank_index = $key + 1;
                    
                    $ranking[$rank_index] = $index;
                }
            }
        }

        // langkah 1 menghitung rata - rata rank untuk besson rank
        $count_similar_value = [];
        $x = 0;
        foreach ($similiar_value as $key => $counter) {
            foreach ($ranking as $rank => $value) {

                // jika kondisi tidak terpenuhi maka perulangan dilewati
                if ($value !== $key) {
                    $x = 0;
                    continue;
                }

                // mencari nilai rata - rata dari langkah 1
                if ($value == $key) {
                    $x = $rank + $x;
                    $count_similar_value[$key] = $x;
                }
            }
        }

        // langkah 2 untuk mencari rata - rata besson rank
        $total_mean = [];
        foreach ($count_similar_value as $key => $value) {
            $total_mean[$key] = round($value / $similiar_value[$key], 2);
        }

        // nilai besson rank adalah mean dari langkah sebelumnya
        $besson_rank = [];
        foreach ($new_c as $rank => $value) {
            foreach ($total_mean as $key => $mean) {
                if ($value === $key) {
                    $besson_rank[$rank] = $mean;

                }
            }
        }

        return $besson_rank;
}

?>

<?php 
if (isset($_POST['simpan'])) {
    //cek apakah data sudah ada dalam database 

    $tbl = "normalisasi";
    $f = "*";
    $w = "";


    $sql = getRecord($tbl,$f,$w);
    $hitung = count_rows($sql);

    if ($hitung == 0) {
        $i = 0;
        $i2 =1;
        while ($i < count($nama)) {
            $table = "normalisasi";
            $field = "(id,kode,nama,c1,c2,c3,c4,c5,c6)";
            $value = "('$i2','$kode[$i]','$nama[$i]','$besson_rank_c1[$i2]','$besson_rank_c2[$i2]','$besson_rank_c3[$i2]','$besson_rank_c4[$i2]','$besson_rank_c5[$i2]','$besson_rank_c6[$i2]')";
            $simpan = insert($table,$field,$value);
            $i++;
            $i2++;
        }
         echo "<script> document.location.href = './?page=oreste&act=normalisasi'</script>";
    }


    else if($hitung > 0){
        $table = "normalisasi";
        $field = "*";
        $where = "";
        $kode_l = [];
        $i = 0;
        $sql = getRecord($table,$field,$where);
        while ($row = fetch($sql)) {
            $kode_l[] = $row['kode'];
        }

        while ($i < count($kode_l)) {
            $table = "normalisasi";
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

<style>
    .btn-bawah{
        float: right;
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
    .sub-judul-content{
        text-align: center;
    }
</style>
<div id="bottom"></div>