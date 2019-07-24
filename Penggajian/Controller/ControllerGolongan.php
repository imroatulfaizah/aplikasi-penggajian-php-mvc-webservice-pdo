<?php
	require_once 'Model/ModelGolongan.php';

	/**
	 *  Programmer imroatul faizah
	 */ 
	class ControllerGolongan{
		public $modelgolongan;

		function __construct(){
			$this->modelgolongan = new ModelGolongan();
		}


		public function tarikmang($location){
			header('location:'.$location);
		}

		public function tampilnodata(){
			$data = $this->modelgolongan->jukokdata();
			include 'View/Golongan/ViewGolongan.php';
		}


		public function get_lebokno(){
			include 'View/Golongan/ViewGolongan.php';
		}

		public function do_lebokno(){

			if (isset($_POST['simpan'])) {
				$kode_golongan	= $_POST['kode_golongan'];
				$gaji_pokok	= $_POST['gaji_pokok'];
				$tunjangan_golongan	= $_POST['tunjangan_golongan'];

				$save = $this->modelgolongan->lebokno($kode_golongan,$gaji_pokok,$tunjangan_golongan);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='indexgolongan.php'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='indexgolongan.php'</script>";
				}
			}

		}

		public function hapusendata(){
			$kode_golongan = $_GET['kode_golongan'];
			$this->modelgolongan->hapusae($kode_golongan);
			$this->tarikmang('indexgolongan.php');
		}

		public function ngupdate(){
			$kode_golongan = $_GET['kode_golongan'];
			$data = $this->modelgolongan->getById($kode_golongan);
			include 'View/Golongan/UpdateGolongan.php';
		}

		public function wayaeupdate(){

			if (isset($_POST['submit'])) {
				$kode_golongan = $_POST['kode_golongan'];
				$gaji_pokok  = $_POST['gaji_pokok'];
				$tunjangan_golongan	= $_POST['tunjangan_golongan'];

				$update = $this->modelgolongan->update_golongan($kode_golongan,$gaji_pokok,$tunjangan_golongan);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='indexgolongan.php'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='indexgolongan.php'</script>";
				}
			}
	
		}


}

  ?>