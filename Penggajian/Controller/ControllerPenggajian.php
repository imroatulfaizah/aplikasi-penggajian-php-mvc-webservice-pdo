<?php
	require_once 'Model/ModelPenggajian.php';

	/**
	 *  Programmer imroatul faizah
	 */ 
	class ControllerPenggajian{
		public $modelpenggajian;

		function __construct(){
			$this->modelpenggajian = new ModelPenggajian();
		}


		public function tarikmang($location){
			header('location:'.$location);
		}

		public function tampilnodata(){
			$data = $this->modelpenggajian->jukokdata();
			include 'View/Penggajian/ViewPenggajian.php';
		}


		public function get_lebokno(){
			include 'View/Penggajian/SavePenggajian.php';
		}

		public function do_lebokno(){

			if (isset($_POST['simpan'])) {
				$kode_gaji	= $_POST['kode_gaji'];
				$absensi	= $_POST['absensi'];
				$nik	= $_POST['nik'];
				$total_gaji	= $_POST['total_gaji'];

				$save = $this->modelpenggajian->lebokno($kode_gaji,$absensi,$nik,$total_gaji);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='indexpenggajian.php'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='indexpenggajian.php'</script>";
				}
			}

		}

		public function hapusendata(){
			$kode_gaji = $_GET['kode_gaji'];
			$this->modelpenggajian->hapusae($kode_gaji);
			$this->tarikmang('indexpenggajian.php');
		}

		public function ngupdate(){
			$kode_gaji = $_GET['kode_gaji'];
			$data = $this->modelpenggajian->getById($kode_gaji);
			include 'View/Penggajian/UpdatePenggajian.php';
		}

		public function wayaeupdate(){

			if (isset($_POST['submit'])) {
				$kode_gaji = $_POST['kode_gaji'];
				$absensi  = $_POST['absensi'];
				$nik	= $_POST['nik'];
				$total_gaji	= $_POST['total_gaji'];

				$update = $this->modelpenggajian->update_penggajian($kode_gaji,$absensi,$nik,$total_gaji);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='indexpenggajian.php'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='indexpenggajian.php'</script>";
				}
			}
	
		}


}

  ?>