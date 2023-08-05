<div class="content">
<div id="area">
    <div class="bungkus-kop" style="display: flex; justify-content: center;">
        <div class="kop" style="text-align: center; position: absolute;">
            <h3>KELURAHAN ULAK KARANG SELATAN</h3>
            <h4>Jl. S. Parman, Ulak Karang Sel., Kec. Padang Utara, Kota Padang, Sumatera Barat</h4>
        </div>
        <img src="assets/img/padang.png" alt="Padang" width="50px" height="50px" style="padding-top: 45px; padding-bottom: 5px; padding-left: 650px;">
    </div>
    <hr>
    <br>
    <p class="text-laporan">Laporan hasil perankingan dari alternatif - alternatif untuk program bantuan keluarga harapan</p>
    <br>
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
        $where  = "ORDER BY nilai ASC,kode ASC";
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
        <button class="cetak-btn" type="submit" class="cetak" onclick="return printArea('area')">Cetak</button>
    </div>
</div>

<script>
    function printArea(area) {
    var printPage = document.getElementById(area).innerHTML;
    var oriPage = document.body.innerHTML;
    document.body.innerHTML = printPage;
    window.print();
    document.body.innerHTML = oriPage;
}
</script>

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
    .text-laporan{
        padding: 0 15px;
        font-size: 16px;
    }
</style>