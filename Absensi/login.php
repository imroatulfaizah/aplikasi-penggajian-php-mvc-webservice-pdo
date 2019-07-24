<?php

session_start();
if (@$_SESSION['nik'] != '' and  @$_SESSION['no_hp'] != '' and @$_SESSION['status'] != ''){
        header('http://localhost/Penggajian_MVC3/Absensi/indexabsensi.php');
      }

// membaca username dari form login
$nik = $_POST['nik'];
// membaca password dari form login
$no_hp = $_POST['no_hp'];

// membuat URL GET request ke sistem A
$url = "http://localhost/Penggajian_MVC3/Penggajian/service.php?nik=".$nik."&no_hp=".$no_hp."&api=1234"; 

// mengirim GET request ke sistem A dan membaca respon XML dari sistem A
$bacaxml = simplexml_load_file($url);

// membaca data XML hasil dari respon sistem A
foreach($bacaxml->response as $respon)
{
  // jika responnya TRUE maka login sukses
  // jika FALSE maka login gagal
  if ($respon == "TRUE"){
    echo "Login Sukses";

    $_SESSION['nik'] = $nik;
    $_SESSION['no_hp'] = $no_hp;
  $_SESSION['status'] = "login";
  header("location:indexabsensi.php");
  

  }
  else if ($respon == "FALSE"){
    echo "Login Gagal";
  }
}  

?>