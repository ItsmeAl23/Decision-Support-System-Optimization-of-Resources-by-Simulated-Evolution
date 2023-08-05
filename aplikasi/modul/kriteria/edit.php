<?php
$id = $_GET['id'];
$query  = getRecord("kriteria","*","WHERE id='$id'");
$row    = fetch($query);
?>

<h1 class="judul-content">Form Edit Data Kriteria</h1>
<form action="" method="POST">
<table >
        <tr>
            <th><label for="kode">Kode Kriteria</label></th>
            <td>: <input class="input-text" type="text" name="kode" id="kode" value="<?= $row["kode"]  ?>" readonly></td>
        </tr>
        <tr>
            <th><label for="nama">Nama Kriteria</label></th>
            <td>: <input class="input-text" type="text" name="nama" id="nama" value="<?= $row["nama"]  ?>" readonly></td>
        </tr>
        <tr>
            <th><label for="decimalInput">Bobot</label></th>
            <td>: <input class="input-text" type="text" name="bobot" id="decimalInput" value="<?= $row["bobot"]  ?>" autocomplete="off" required></td>
        </tr>
    </table>
	<br>
    <div class="btn-bawah">
		<button class="batal-btn" type="button" onclick="window.location.href='./?page=kriteria'">Batal</button>
        <button class="proses-btn" type="submit" name="simpan">Edit Data</button>
    </div>
</form>

<script>
    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>

<script>
  const decimalInput = document.getElementById("decimalInput");
  decimalInput.addEventListener("input", function() {
    const value = this.value;
    const decimalRegex = /^\d*\.?\d*$/;
    if (!decimalRegex.test(value)) {
      this.value = value.slice(0, -1);
    }
  });
</script>

<?php 

if (isset($_POST['simpan'])) {
	$kode  = htmlspecialchars($_POST['kode']);
	$nama  = htmlspecialchars($_POST['nama']);
	$bobot = htmlspecialchars($_POST['bobot']);

	$table  = "kriteria";
	$where  = "id='$id'";
	$value  = "kode='$kode',nama='$nama',bobot='$bobot'";
	$simpan = update($table,$value,$where);
	if($simpan){
		//echo "Data Sukses Disimpan !";
		echo "<script>
              Swal.fire({
                  title: 'Bobot kriteria berhasil diedit',
                  width: '40%',
                  icon: 'success',
                  iconColor: 'rgb(27, 199, 133)',
                  showConfirmButton: false,
                  allowEnterKey: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
              });

              setTimeout(function(){
                  window.location.href='./?page=kriteria';
              }, 1500);
        </script>";
	}else{
		echo "Data Gagal Disimpan !";
	}
} 
?>
<style>
	td{
	    border: none;
	}
	.input-text{
	    padding: 8px;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	}
	.btn-bawah{
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
	.batal-btn{
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
	.batal-btn:last-child{
	    margin-right: 0;
	}
	.batal-btn:hover{
	    background-color: #da190b;
	}
</style>