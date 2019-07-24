<?php  

require_once 'Controller/ControllerPenggajian.php';

$penggajian = new ControllerPenggajian();
if (isset($_GET['get'])) {
	$penggajian->ngupdate();
}else if (isset($_GET['update'])) {
	$penggajian->wayaeupdate();
}else if (isset($_GET['insert'])) {
	$penggajian->get_lebokno();
}else if (isset($_GET['save'])) {
	$penggajian->do_lebokno();
}else if (isset($_GET['delete'])) {
	$penggajian->hapusendata();
}else{
	$penggajian->tampilnodata();
}


?>