<?php
	session_start();
	require_once 'Model/ModelAbsensi.php';
	/**
	 *  Programmer imroatul faizah
	 */ 
	class ControllerAbsensi{
		public $modelabsensi;

		function __construct(){
			
 			if (@$_SESSION['nik'] == '' and  @$_SESSION['no_hp'] == '' and @$_SESSION['status'] == ''){
 				header('location:http://localhost:8080/Penggajian_MVC3/Absensi/');
 			}
			$this->modelabsensi = new ModelAbsensi();
		}


		public function tarikmang($location){
			
			header('location:'.$location);
		}

		public function tampilnodata(){
			$data = $this->modelabsensi->jukokdata();
			include 'View/Absensi/ViewAbsensi.php';
		}


		public function get_lebokno(){
				
			include 'View/Absensi/SaveAbsensi.php';
		}

		public function do_lebokno(){

			if (isset($_POST['simpan'])) {
				$id_absensi	= $_POST['id_absensi'];
				$nik	= $_POST['nik'];
				$tanggal_absensi	= $_POST['tanggal_absensi'];

				$save = $this->modelabsensi->lebokno($id_absensi,$nik,$tanggal_absensi);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='indexabsensi.php'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='indexabsensi.php'</script>";
				}
			}

		}

		public function hapusendata(){
			$id_absensi = $_GET['id_absensi'];
			$this->modelabsensi->hapusae($id_absensi);
			$this->tarikmang('indexabsensi.php');
		}

		public function ngupdate(){
			$id_absensi = $_GET['id_absensi'];
			$data = $this->modelabsensi->getById($id_absensi);
			include 'View/absensi/Updateabsensi.php';
		}

		public function wayaeupdate(){

			if (isset($_POST['submit'])) {
				$id_absensi  = $_POST['id_absensi'];
				$nik  = $_POST['nik'];
				$tanggal_absensi  = $_POST['tanggal_absensi'];

				$update = $this->modelabsensi->update_absensi($id_absensi,$nik,$tanggal_absensi);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='indexabsensi.php'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='indexabsensi.php'</script>";
				}
			}
	
		}


}

  ?>