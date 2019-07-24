<?php

session_start();


// membuat URL GET request ke sistem A
$url = "http://localhost/Penggajian_MVC3/Penggajian/service.php?nik=".$nik."&no_hp=".$no_hp."&api=1234"; 

// mengirim GET request ke sistem A dan membaca respon XML dari sistem A
$bacaxml = simplexml_load_file($url);

  // jika FALSE maka login gagal
    $_SESSION['nik'] = $nik;
    $_SESSION['no_hp'] = $no_hp;
  $_SESSION['status'] = "login";
  header("location:SaveAbsensi.php?insert=add");


?>