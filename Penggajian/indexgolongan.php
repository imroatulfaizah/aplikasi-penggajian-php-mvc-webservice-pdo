<?php  

require_once 'Controller/ControllerGolongan.php';

$golongan = new Controllergolongan();
if (isset($_GET['get'])) {
	$golongan->ngupdate();
}else if (isset($_GET['update'])) {
	$golongan->wayaeupdate();
}else if (isset($_GET['insert'])) {
	$golongan->get_lebokno();
}else if (isset($_GET['save'])) {
	$golongan->do_lebokno();
}else if (isset($_GET['delete'])) {
	$golongan->hapusendata();
}else{
	$golongan->tampilnodata();
}


?>