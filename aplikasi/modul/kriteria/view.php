<div class="content">
    <div class="isi-content">
        <h1 class="judul-content">Kriteria</h1>
        <div class="tabel">
            <table class="tabel-alternatif">
                <thead>
                    <tr>
                        <th class="no">No.</th>
                        <th class="kode">Kode</th>
                        <th class="kriteria">Kriteria</th>
                        <th class="bobot">Bobot</th>
                        <th class="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $tabel  = "kriteria";
                    $field  = "*";
                    $where  = "";
                    $query = getRecord($tabel,$field,$where);
                    while ($row = fetch($query)) {
                    ?>
                    <tr>
                        <td><?= $no;  ?></td>
                        <td><?= $row['kode'];  ?></td>
                        <td><?= $row['nama'];  ?></td>
                        <td><?= $row['bobot'];  ?></td>
                        <td><button class="proses-btn" onclick="window.location.href='./?page=kriteria&act=edit&id=<?= $row['id'];?>'">Edit</button></td>
                    </tr>
                    <?php 
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .no{
        width: 5%;
    }
    .kode{
        width: 15%;
    }
    .kriteria{
        width: 35%;
    }
    .bobot{
        width: 15%;
    }
    .aksi{
        width: 15%;
    }
</style>