<?php
	require_once 'Model/Model.php';

	/**
	 *  Programmer imroatul faizah
	 */ 
	class Controller{
		public $model;

		function __construct(){
			$this->model = new Model();
		}


		public function tarikmang($location){
			header('location:'.$location);
		}

		public function tampilnodata(){
			$data = $this->model->jukokdata();
			include 'View/nampil.php';
		}


		public function get_lebokno(){
			include 'View/form_nyimpen.php';
		}

		public function do_lebokno(){

			if (isset($_POST['simpan'])) {
				$npm	= $_POST['npm'];
				$nama	= $_POST['nama'];
				$prodi	= $_POST['prodi'];
				$fakultas = $_POST['fakultas'];

				$save = $this->model->lebokno($npm,$nama,$prodi,$fakultas);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='index.php'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='index.php'</script>";
				}
			}

		}

		public function hapusendata(){
			$npm = $_GET['npm'];
			$this->model->hapusae($npm);
			$this->tarikmang('index.php');
		}

		public function ngupdate(){
			$npm = $_GET['npm'];
			$data = $this->model->getById($npm);
			include 'View/form_ngupdate.php';
		}

		public function wayaeupdate(){

			if (isset($_POST['submit'])) {
				$npm	  = $_POST['npm'];
				$nama 	  = $_POST['nama'];
				$prodi 	  = $_POST['prodi'];
				$fakultas = $_POST['fakultas'];

				$update = $this->model->update_mhs($npm,$nama,$prodi,$fakultas);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='index.php'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='index.php'</script>";
				}
			}
	
		}


}

  ?>