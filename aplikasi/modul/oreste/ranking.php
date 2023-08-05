<div class="content">
<div id="area">
                <h1 class="judul-content">Ranking Hasil Perhitungan</h1>

<br>
<button class="proses-btn" onclick="goToBottom()">Pergi ke Bawah</button>

<script>
    function goToBottom() {
    var element = document.getElementById("bottom");
    element.scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" });
  }
</script>

<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Ranking</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        $no = 1;
        $tabel  = "n_preferensi";
        $field  = "kode, nama, nilai";
        $where  = "ORDER BY nilai ASC, kode ASC";
        $query = getRecord($tabel,$field,$where);
        while ($row = fetch($query)) {
        ?>
        <tr>
            <td align="center"><?= $no;  ?></td>
            <td align="center"><?= $row['kode']; ?></td>
            <td align="center"><?= $row['nama']; ?></td>
            <td align="center"><?= $row['nilai']; ?></td>
        </tr>
        <?php 
                $no++;
                }
             ?>
    </tbody>
</table>
</div>
<br>
    <div class="btn-bawah">
        <a class="kembali-btn" href="./?page=oreste&act=n_preferensi">Kembali</a>
        <button class="cetak-btn" type="submit" class="cetak" onclick="window.location.href='./?page=laporan'">Laporan</button>
    </div>
</div>
<br>



<style>
    .btn-bawah{
        float: right;
        display: flex;
        width: 25%;
    }
    .cetak-btn{
        background-color: #0d72aa;
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
    .cetak-btn:last-child{
        margin-right: 0;
    }
    .cetak-btn:hover{
        background-color: #06528e;
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

    /* Gaya tombol untuk ke halaman paling bawah */
        #/*scrollToBottom {
            position: fixed;
            right: 20px;
            bottom: 20px;
            padding: 10px;
            background-color: #000;
            color: #fff;
            cursor: pointer;
            z-index: 1;
            display: none;
        }*/

</style>

<div id="bottom"></div>