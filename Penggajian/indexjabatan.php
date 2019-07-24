<?php  

require_once 'Controller/ControllerJabatan.php';

$jabatan = new ControllerJabatan();
if (isset($_GET['get'])) {
	$jabatan->ngupdate();
}else if (isset($_GET['update'])) {
	$jabatan->wayaeupdate();
}else if (isset($_GET['insert'])) {
	$jabatan->get_lebokno();
}else if (isset($_GET['save'])) {
	$jabatan->do_lebokno();
}else if (isset($_GET['delete'])) {
	$jabatan->hapusendata();
}else{
	$jabatan->tampilnodata();
}


?>