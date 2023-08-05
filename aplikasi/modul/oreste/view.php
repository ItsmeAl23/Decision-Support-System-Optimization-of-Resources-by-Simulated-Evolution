<div class="content">
                <h1 class="judul-content">Oreste</h1>
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
                        $query = getRecord($tabel,$field,$where);
                        while ($row = fetch($query)) {
                        ?>
                        <tr>
                            <td align="center"><?= $no;  ?></td>
                            <td align="center"><?= $row['kode'];  ?></td>
                            <td align="center"><?= $row['nama'];  ?></td>
                            <td>Rp. <?= number_format($row['penghasilan'],0,',','.');  ?></td>
                            <td align="center"><?= $row['sekolah'];  ?></td>
                            <td align="center"><?= $row['lansia'];  ?></td>
                            <td align="center"><?= $row['hamil'];  ?></td>
                            <td align="center"><?= $row['disabilitas'];  ?></td>
                            <td align="center"><?= $row['dtks'];  ?></td>
                        </tr>
                        <?php 
                                $no++;
                                }
                             ?>
                    </tbody>
                </table>
            <div class="btn">
                <button class="proses-btn" onclick="window.location.href='./?page=oreste&act=konversi'">Konversi Data</button>
            </div>
            </div>

            <div id="bottom"></div>