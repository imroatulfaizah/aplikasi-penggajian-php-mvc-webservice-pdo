<?php  

require_once 'Controller/ControllerBagian.php';

$bagian = new ControllerBagian();
if (isset($_GET['get'])) {
	$bagian->ngupdate();
}else if (isset($_GET['update'])) {
	$bagian->wayaeupdate();
}else if (isset($_GET['insert'])) {
	$bagian->get_lebokno();
}else if (isset($_GET['save'])) {
	$bagian->do_lebokno();
}else if (isset($_GET['delete'])) {
	$bagian->hapusendata();
}else{
	$bagian->tampilnodata();
}


?>