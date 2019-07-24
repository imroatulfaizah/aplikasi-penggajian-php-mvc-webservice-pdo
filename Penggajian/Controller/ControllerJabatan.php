<?php
	require_once 'Model/ModelJabatan.php';

	/**
	 *  Programmer imroatul faizah
	 */ 
	class ControllerJabatan{
		public $modeljabatan;

		function __construct(){
			$this->modeljabatan = new ModelJabatan();
		}


		public function tarikmang($location){
			header('location:'.$location);
		}

		public function tampilnodata(){
			$data = $this->modeljabatan->jukokdata();
			include 'View/Jabatan/ViewJabatan.php';
		}


		public function get_lebokno(){
			include 'View/Jabatan/SaveJabatan.php';
		}

		public function do_lebokno(){

			if (isset($_POST['simpan'])) {
				$kode_jabatan	= $_POST['kode_jabatan'];
				$nama_jabatan	= $_POST['nama_jabatan'];
				$tunjangan_jabatan	= $_POST['tunjangan_jabatan'];

				$save = $this->modeljabatan->lebokno($kode_jabatan,$nama_jabatan,$tunjangan_jabatan);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='indexjabatan.php'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='indexjabatan.php'</script>";
				}
			}

		}

		public function hapusendata(){
			$kode_jabatan = $_GET['kode_jabatan'];
			$this->modeljabatan->hapusae($kode_jabatan);
			$this->tarikmang('indexjabatan.php');
		}

		public function ngupdate(){
			$kode_jabatan = $_GET['kode_jabatan'];
			$data = $this->modeljabatan->getById($kode_jabatan);
			include 'View/Jabatan/UpdateJabatan.php';
		}

		public function wayaeupdate(){

			if (isset($_POST['submit'])) {
				$kode_jabatan = $_POST['kode_jabatan'];
				$nama_jabatan  = $_POST['nama_jabatan'];
				$tunjangan_jabatan= $_POST['tunjangan_jabatan'];

				$update = $this->modeljabatan->update_jabatan($kode_jabatan,$nama_jabatan,$tunjangan_jabatan);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='indexjabatan.php'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='indexjabatan.php'</script>";
				}
			}
	
		}

}

  ?>