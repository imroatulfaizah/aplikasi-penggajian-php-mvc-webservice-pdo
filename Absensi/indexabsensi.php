<?php  

require_once 'Controller/ControllerAbsensi.php';

$absensi = new ControllerAbsensi();
if (isset($_GET['get'])) {
  $absensi->ngupdate();
}else if (isset($_GET['update'])) {
  $absensi->wayaeupdate();
}else if (isset($_GET['insert'])) {
  $absensi->get_lebokno();
}else if (isset($_GET['save'])) {
  $absensi->do_lebokno();
}else if (isset($_GET['delete'])) {
  $absensi->hapusendata();
}else{
  $absensi->tampilnodata();
}


?>