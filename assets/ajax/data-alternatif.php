<?php 

require '../../aplikasi/config/database.php';
$keyword = $_GET['keyword'];
 ?>

 <table class="tabel-alternatif">
                    <thead>
                        <tr>
                            <th class="no">No.</th>
                            <th class="kode">Kode</th>
                            <th class="nama">Nama</th>
                            <th class="penghasilan">Penghasilan</th>
                            <th class="aus">Anak Usia Sekolah</th>
                            <th class="lansia">Lansia</th>
                            <th class="pd">Penyandang Disabilitas</th>
                            <th class="td-dtks">Terdaftar Dalam DTKS</th>
                            <th class="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $tabel  = "alternatif";
                        $field  = "*";
                        $where  = " WHERE 
                        			kode LIKE '%$keyword%' OR
                        			nama LIKE '%$keyword%' OR 
                        			penghasilan LIKE '%$keyword%' OR
                        			sekolah LIKE '%$keyword%' OR
                        			lansia LIKE '%$keyword%' OR
                        			disabilitas LIKE '%$keyword%' OR
                        			dtks LIKE '%$keyword%'
                        			";
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

                <br>
                
