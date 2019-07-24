<?php

// koneksi ke database di sistem A
mysql_connect("localhost", "root", "");
mysql_select_db("penggajian");

// membaca username dari GET request
$user = $_GET['nik'];
// membaca password dari GET request
$pass = $_GET['no_hp'];
// membaca kode API dari GET request
$api = $_GET['api'];

// jika kode API nya '1234' maka lakukan proses validasi username dan password
// jika kode API nya salah, maka proses validasi tidak dilakukan (diberikan respon "FALSE")
if ($api == "1234")
{
   // membaca data password user berdasar usernamenya
   $query = "SELECT * FROM karyawan WHERE nik = '$user'";
   $hasil = mysql_query($query);
   $data  = mysql_fetch_array($hasil);
   $password = $data['no_hp'];

   // mencocokkan password user dari db dan dari GET request
   // jika cocok, maka responnya TRUE, jika tidak cocok responnya FALSE
   if ($pass == $password) $response = "TRUE";
   else $response = "FALSE";
}
else $response = "FALSE";

// membuat header dokumen XML
header('Content-Type: text/xml');
echo "<?xml version='1.0'?>";

// membuat tag data respon pada dokumen XML
echo "<data>";
echo "<response>".$response."</response>";
echo "</data>";
?>