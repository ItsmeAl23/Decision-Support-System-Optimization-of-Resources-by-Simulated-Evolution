<?php 
// API = REST - SOAP
$host    = "127.0.0.1"; // localhost
$user    = "root";
$pass    = "";
$db_name = "dbspk";
$port    = 3306;
// mysql_connect() - MYSQL OOP - PDO
$conn    = mysqli_connect($host,$user,$pass,$db_name,$port);
if(mysqli_connect_errno()){
	echo "Failed to connect to Database";
}

// Fungsi CRUD - Create, Read, Update, Delete
// Create = INSERT, Read = SELECT, Update, Delete

// Fungsi untuk Select - getRecord
function getRecord($tabel,$field,$where){
	global $conn;
	$query = mysqli_query($conn,"SELECT {$field} FROM {$tabel} {$where}");
	return $query;
}

// Fungsi untuk menyisipkan data 
function insert($tabel,$field,$value){
	global $conn;
	$query = mysqli_query($conn,"INSERT INTO {$tabel} {$field} VALUES {$value}");
	return $query;
}

// Fungsi untuk update data
function update($tabel,$value,$where){
	global $conn;
	$query = mysqli_query($conn,"UPDATE {$tabel} SET {$value} WHERE {$where}");
	return $query;
}

// Fungsi untuk hapus data
function delete($tabel,$where){
	global $conn;
	$query = mysqli_query($conn,"DELETE FROM {$tabel} WHERE {$where}");
	return $query;
}

// Fungsi untuk mengambil data 
function fetch($query){
	$data = mysqli_fetch_array($query);
	return $data;
}

// Fungsi untuk menghitung data
function count_rows($query){
	$count = mysqli_num_rows($query);
	return $count;
}

// Fungsi mengambil data v2
function ambil($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

 ?>