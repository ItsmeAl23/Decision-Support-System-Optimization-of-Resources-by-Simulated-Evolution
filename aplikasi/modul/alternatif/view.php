<div class="content">
    <div class="isi-content">
        <h1 class="judul-content">Alternatif</h1>
        <div class="tabel">
            <form action="" method="POST">
            <br>
            <div class="pencarian">
                <input type="text" class="input-cari" id="keyword" name="keyword" size="40" placeholder="Masukan keyword pencarian" autofocus autocomplete="off">
                <button type="submit" id="btn-cari">Cari</button>
            </div>
            <br>
            </form>
            <div id="container-ajax">
            <table class="tabel-alternatif">
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
                        <th class="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $tabel  = "alternatif";
                    $field  = "*";
                    $where  = "ORDER BY kode ASC";
                    $query = getRecord($tabel,$field,$where);
                    while ($row = fetch($query)) {
                    ?>
                    <tr>
                        <td><?= $no;  ?></td>
                        <td><?= $row['kode'];  ?></td>
                        <td><?= $row['nama'];  ?></td>
                        <td>Rp. <?= number_format($row['penghasilan'],0,',','.');  ?></td>
                        <td><?= $row['sekolah'];  ?></td>
                        <td><?= $row['lansia'];  ?></td>
                        <td><?= $row['hamil'];  ?></td>
                        <td><?= $row['disabilitas'];  ?></td>
                        <td><?= $row['dtks'];  ?></td>
                        <td><button class="proses-btn" onclick="window.location.href='./?page=alternatif&act=edit&id=<?= $row['id'];?>'" type="button">Edit</button> | <button class="proses-btn" onclick="hapus(<?= $row['id'];?>)" type="button">Hapus</button></td>
                    </tr>
                    <?php 
                      $no++;
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
                <div class="btn">
                    <button class="proses-btn" onclick="window.location.href='./?page=alternatif&act=add'">Tambah Data Alternatif</button>
                </div>
    </div>
</div>
<script src="assets/js/script.js"></script>

<script>
    function hapus(id) {
        Swal.fire({
            title: 'Konfirmasi hapus data?',
            icon: 'warning',
            iconColor: 'orange',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonColor: 'rgb(255, 0, 0)',
            cancelButtonText: 'Tidak',
            confirmButtonColor: 'rgb(42, 89, 227)',
            allowEnterKey: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    width: '35%',
                    position: 'center',
                    icon: 'success',
                    iconColor: 'rgb(27, 199, 133)',
                    title: 'Data berhasil dihapus',
                    showConfirmButton: false,
                    allowEnterKey: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                });
                setTimeout(function() {
                    window.location.href = './?page=alternatif&act=delete&id=' + id;
                }, 1500);
            }
        })
    }
</script>
<style>
.pencarian{
    display: flex;
    align-items: center;
    padding-left: 10px;
}
.input-cari{
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.btn-cari{
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 10px;
}
.btn-cari:hover {
    background-color: #3e8e41;
}
</style>