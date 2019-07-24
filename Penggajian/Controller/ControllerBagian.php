<?php
	require_once 'Model/ModelBagian.php';

	/**
	 *  Programmer imroatul faizah
	 */ 
	class ControllerBagian{
		public $modelbagian;

		function __construct(){
			$this->modelbagian = new ModelBagian();
		}


		public function tarikmang($location){
			header('location:'.$location);
		}

		public function tampilnodata(){
			$data = $this->modelbagian->jukokdata();
			include 'View/Bagian/ViewBagian.php';
		}


		public function get_lebokno(){
			include 'View/Bagian/SaveBagian.php';
		}

		public function do_lebokno(){

			if (isset($_POST['simpan'])) {
				$kode_bagian	= $_POST['kode_bagian'];
				$nama_bagian	= $_POST['nama_bagian'];

				$save = $this->modelbagian->lebokno($kode_bagian,$nama_bagian);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='indexbagian.php'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='indexbagian.php'</script>";
				}
			}

		}

		public function hapusendata(){
			$kode_bagian = $_GET['kode_bagian'];
			$this->modelbagian->hapusae($kode_bagian);
			$this->tarikmang('indexbagian.php');
		}

		public function ngupdate(){
			$kode_bagian = $_GET['kode_bagian'];
			$data = $this->modelbagian->getById($kode_bagian);
			include 'View/Bagian/UpdateBagian.php';
		}

		public function wayaeupdate(){

			if (isset($_POST['submit'])) {
				$kode_bagian  = $_POST['kode_bagian'];
				$nama_bagian  = $_POST['nama_bagian'];

				$update = $this->modelbagian->update_bagian($kode_bagian,$nama_bagian);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='indexbagian.php'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='indexbagian.php'</script>";
				}
			}
	
		}


}

  ?>