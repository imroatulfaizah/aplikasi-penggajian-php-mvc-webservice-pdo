<?php  

require_once 'Controller/ControllerKaryawan.php';

$karyawan = new ControllerKaryawan();
if (isset($_GET['get'])) {
	$karyawan->ngupdate();
}else if (isset($_GET['update'])) {
	$karyawan->wayaeupdate();
}else if (isset($_GET['insert'])) {
	$karyawan->get_lebokno();
}else if (isset($_GET['save'])) {
	$karyawan->do_lebokno();
}else if (isset($_GET['delete'])) {
	$karyawan->hapusendata();
}else{
	$karyawan->tampilnodata();
}


?>