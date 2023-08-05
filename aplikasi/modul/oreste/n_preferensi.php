<div class="content">
<h1 class="judul-content">Menghitung Nilai Preferensi</h1>
<br>
<br>
<button class="proses-btn" onclick="goToBottom()">Pergi ke Bawah</button>
<script>
    function goToBottom() {
    var element = document.getElementById("bottom");
    element.scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" });
  }
</script>

<?php 
    $no = 1;
    $tabel  = "kriteria";
    $field  = "*";
    $where  = "";
    $query = getRecord($tabel,$field,$where);

    $kriteria = [];
    $vi = [];

    while ($row = fetch($query)) {
        $kriteria[] = floatval($row["bobot"]);
    }

    $tabel  = "distance_score";
    $field  = "*";
    $where  = "";
    $ind = 1;
    $i = 0;
    $query = getRecord($tabel,$field,$where);
    while ($row = fetch($query)) {
        $i2 = 0;
        $nds = [];
        while ($i2 < 1) {
            $nds[] = $row['c1'];
            $nds[] = $row['c2'];
            $nds[] = $row['c3'];
            $nds[] = $row['c4'];
            $nds[] = $row['c5'];
            $nds[] = $row['c6'];
            $i2++;
        }
            

        $vi[] = round(($nds[0] * $kriteria[0]) + ($nds[1] * $kriteria[1]) + ($nds[2] * $kriteria[2]) + ($nds[3] * $kriteria[3]) + ($nds[4] * $kriteria[4]) + ($nds[5] * $kriteria[5]), 4);  ?>
        <br>
        <div class="n-preferensi">
            V<?= $ind; ?> = ( <?= $nds[0]  ?> * <?= $kriteria[0] ?> ) + ( <?= $nds[1]  ?> * <?= $kriteria[1] ?> ) + ( <?= $nds[2]  ?> * <?= $kriteria[2] ?> ) + ( <?= $nds[3]  ?> * <?= $kriteria[3] ?> ) + ( <?= $nds[4]  ?> * <?= $kriteria[4] ?> ) + ( <?= $nds[5]  ?> * <?= $kriteria[5] ?> ) = <?= $vi[$i] ?>
        </div>
        <br>    

<?php 
    $ind++; $i++;}

    $tabel  = "distance_score";
    $field  = "*";
    $where  = "";
    $query = getRecord($tabel,$field,$where);
    $kode = [];
    while ($row = fetch($query)) {
        $kode[] = $row['kode'];
        $nama[] = $row['nama'];
    }


 ?>

<br>
    <div class="btn-bawah">
        <a class="kembali-btn" href="./?page=oreste&act=t_distance_score">Kembali</a>
        <form action="" method="POST">
            <button class="proses-btn" type="submit" name="simpan">Lanjutkan</button>
        </form>
    </div>
<br>


<?php 
if (isset($_POST['simpan'])) {
    //cek apakah data sudah ada dalam database 

    $tbl = "n_preferensi";
    $f = "*";
    $w = "";


    $sql = getRecord($tbl,$f,$w);
    $hitung = count_rows($sql);

    if ($hitung == 0) {
        $index = 0;
        $i2 = 1;
        while ($index < count($kode)) {
            $table = "n_preferensi";
            $field = "(id,kode,nama,nilai)";
            $value = "('$i2','$kode[$index]','$nama[$index]','$vi[$index]')";
            $simpan = insert($table,$field,$value);
            $index++;
            $i2++;
        }
         echo "<script> document.location.href = './?page=oreste&act=ranking'</script>";
    }


    else if($hitung > 0){
        $table = "n_preferensi";
        $field = "*";
        $where = "";
        $kode_l = [];
        $i = 0;
        $sql = getRecord($table,$field,$where);
        while ($row = fetch($sql)) {
            $kode_l[] = $row['kode'];
        }

        while ($i < count($kode_l)) {
            $table = "n_preferensi";
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
</div>

<style>
    .n-preferensi{
        border: 2px solid #4CAF50;
        margin-left: 20px;
        margin-right: 20px;
        font-size: 20px;
        padding: 15px;
        border-radius: 17px;
    }
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
</style>

<div id="bottom"></div>