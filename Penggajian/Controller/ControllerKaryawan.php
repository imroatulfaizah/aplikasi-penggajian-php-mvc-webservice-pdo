<?php
	require_once 'Model/ModelKaryawan.php';

	/**
	 *  Programmer imroatul faizah
	 */ 
	class ControllerKaryawan{
		public $modelkaryawan;

		function __construct(){
			$this->modelkaryawan = new ModelKaryawan();
		}


		public function tarikmang($location){
			header('location:'.$location);
		}

		public function tampilnodata(){
			$data = $this->modelkaryawan->jukokdata();
			include 'View/Karyawan/ViewKaryawan.php';
		}


		public function get_lebokno(){
			include 'View/Karyawan/SaveKaryawan.php';
		}

		public function do_lebokno(){

			if (isset($_POST['simpan'])) {
				$nik	= $_POST['nik'];
				$nama_karyawan	= $_POST['nama_karyawan'];
				$kode_jabatan	= $_POST['kode_jabatan'];
				$kode_bagian	= $_POST['kode_bagian'];
				$kode_golongan	= $_POST['kode_golongan'];
				$alamat_karyawan	= $_POST['alamat_karyawan'];
				$no_hp	= $_POST['no_hp'];

				$save = $this->modelkaryawan->lebokno($nik,$nama_karyawan,$kode_jabatan,$kode_bagian,$kode_golongan,$alamat_karyawan,$no_hp);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='indexkaryawan.php'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='indexkaryawan.php'</script>";
				}
			}

		}

		public function hapusendata(){
			$nik = $_GET['nik'];
			$this->modelkaryawan->hapusae($nik);
			$this->tarikmang('indexkaryawan.php');
		}

		public function ngupdate(){
			$nik = $_GET['nik'];
			$data = $this->modelkaryawan->getById($nik);
			include 'View/Karyawan/UpdateKaryawan.php';
		}

		public function wayaeupdate(){

			if (isset($_POST['submit'])) {
				$nik = $_POST['nik'];
				$nama_karyawan  = $_POST['nama_karyawan'];
				$kode_jabatan	= $_POST['kode_jabatan'];
				$kode_bagian	= $_POST['kode_bagian'];
				$kode_golongan	= $_POST['kode_golongan'];
				$alamat_karyawan	= $_POST['alamat_karyawan'];
				$no_hp	= $_POST['no_hp'];

				$update = $this->modelkaryawan->update_karyawan($nik,$nama_karyawan,$kode_jabatan,$kode_bagian,$kode_golongan,$alamat_karyawan,$no_hp);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='indexkaryawan.php'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='indexkaryawan.php'</script>";
				}
			}
	
		}


}

  ?>