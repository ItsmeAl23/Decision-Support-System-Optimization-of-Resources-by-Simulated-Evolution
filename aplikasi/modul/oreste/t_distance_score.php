<div class="content">
                <h1 class="judul-content">Tabel Distance Score</h1>
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
                        $tabel  = "distance_score";
                        $field  = "*";
                        $where  = "";
                        $query = getRecord($tabel,$field,$where);
                        while ($row = fetch($query)) {
                        ?>
                        <tr>
                            <td align="center"><?= $no;  ?></td>
                            <td align="center"><?= $row['kode'];  ?></td>
                            <td align="center"><?= $row['nama'];  ?></td>
                            <td align="center"><?= $row['c1'];  ?></td>
                            <td align="center"><?= $row['c2'];  ?></td>
                            <td align="center"><?= $row['c3'];  ?></td>
                            <td align="center"><?= $row['c4'];  ?></td>
                            <td align="center"><?= $row['c5'];  ?></td>
                            <td align="center"><?= $row['c6'];  ?></td>
                        </tr>
                        <?php 
                                $no++;
                                }
                             ?>
                    </tbody>
                </table>
                <br>
                <div class="btn-bawah">
                    <a class="kembali-btn" href="./?page=oreste&act=distance_score">Kembali</a>
                    <button class="proses-btn" type="button" onclick="window.location.href='./?page=oreste&act=n_preferensi'">Lanjutkan</button>
                </div>
</div>

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
</style>
<div id="bottom"></div>