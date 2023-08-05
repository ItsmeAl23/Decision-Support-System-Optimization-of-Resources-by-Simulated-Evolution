<div class="content">
    <h1 class="judul-content">Menghitung Distance Score Setiap Pasangan Alternatif</h1>
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
        $tabel  = "normalisasi";
        $field  = "*";
        $where  = "";
        $query = getRecord($tabel,$field,$where);
        $i = 0;
        $c = [];
        function distance_score($nilaiC = []){

        $distance_score = [];

        $n2[] = 0.5 * pow(1, 3);
        $n2[] = 0.5 * pow(2, 3);
        $n2[] = 0.5 * pow(3, 3);
        $n2[] = 0.5 * pow(4, 3);
        $n2[] = 0.5 * pow(5, 3);
        $n2[] = 0.5 * pow(6, 3);

        $i = 0;
        while ($i < 6) {
            $distance_score[] = round(pow(((0.5 * pow($nilaiC[$i], 3)) + $n2[$i]), 1/3), 4) ;
            $i++;
        }
        return $distance_score;
    }
    $kode = [];
    $nama = [];
        while ($row = fetch($query)) {
            $kode[] = $row["kode"];
            $nama[] = $row["nama"];
        }
        $ind = 0;
        while ($i < count($kode)) {
            $where2  = "WHERE kode = '$kode[$i]'";
            $query2 = getRecord($tabel,$field,$where2);
            while ($row = fetch($query2)) {
                $c[$ind][] = floatval($row["c1"]);
                $c[$ind][] = floatval($row["c2"]);
                $c[$ind][] = floatval($row["c3"]);
                $c[$ind][] = floatval($row["c4"]);
                $c[$ind][] = floatval($row["c5"]);
                $c[$ind][] = floatval($row["c6"]);
                $ind++;
            }
            $i++;
        }
?>

<?php 
    $ac = [];
    $i = 0;
    while ($i < count($kode)) {
        $ac[] = distance_score($c[$i]);
        $i++;
    }
?>
<br>
<?php $i = 0;
    while ($i < count($kode)) { ?>
        <br>
        <div class="dis-score">
            <div class="dis-score-alt">Distance Score Alternatif <?= $no; ?></div>
            <div class="isi-dis-score-alt">
                <?php 
                    $ind = 0;
                    $no2 = 1;
                    while ($ind < 6) { ?>
                        <br>
                            D( a<?= $no; ?> c<?= $no2;  ?>) = ( [ 1/2 * <?= $c[$i][$ind] ?><sup>&nbsp;3</sup>&nbsp;] + [ 1/2 * <?= $no2;  ?><sup>&nbsp;3</sup>&nbsp;] )<sup>&nbsp;0.3333</sup> = <?= $ac[$i][$ind] ?>
                        <br>
                        <?php $ind++; $no2++;
                    } ?>
            </div>
        </div>
        <br>
        <?php $no++;
        $i++;
    } ?>
    <div class="btn-bawah">
        <a class="kembali-btn" href="./?page=oreste&act=normalisasi">Kembali</a>
        <form action="" method="POST">
            <button class="proses-btn" type="submit" name="simpan">Lanjutkan</button>
        </form>
    </div>
</div>

<?php 
if (isset($_POST['simpan'])) {
    //cek apakah data sudah ada dalam database 

    $tbl = "distance_score";
    $f = "*";
    $w = "";


    $sql = getRecord($tbl,$f,$w);
    $hitung = count_rows($sql);

    if ($hitung == 0) {
        $index = 0;
        $i2 = 1;
        while ($index < count($kode)) {

            $nc = [];
            $i = 0;
            
            while ($i < 6) {
                $nc[] = $ac[$index][$i]; 
                $i++;
            }

            $table = "distance_score";
            $field = "(id,kode,nama,c1,c2,c3,c4,c5,c6)";
            $value = "('$i2','$kode[$index]','$nama[$index]','$nc[0]','$nc[1]','$nc[2]','$nc[3]','$nc[4]','$nc[5]')";
            $simpan = insert($table,$field,$value);
            $index++;
            $i2++;
        }
         echo "<script> document.location.href = './?page=oreste&act=t_distance_score'</script>";
    }


    else if($hitung > 0){
        $table = "distance_score";
        $field = "*";
        $where = "";
        $kode_l = [];
        $i = 0;
        $sql = getRecord($table,$field,$where);
        while ($row = fetch($sql)) {
            $kode_l[] = $row['kode'];
        }

        while ($i < count($kode_l)) {
            $table = "distance_score";
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

<style type="text/css">
    sup {
        font-size: 12px;
    }
    .dis-score{
        border: 1px solid #9a909d;
        margin: 20px;
        border-radius: 20px;
    }
    .dis-score-alt{
        font-size: 24px;
        text-align: center;
        background-color: #4CAF50;
        padding: 15px;
        border-top-left-radius: 17px;
        border-top-right-radius: 17px;
    }
    .isi-dis-score-alt{
        padding-bottom: 20px;
        padding-left: 75px;
        font-size: 18px;
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
