<?php

	/**
	 * Programmer Imroatul Faizah
	 */
	class ModelAbsensi{
		private $koneksi = null;

		public function oleh_koneksi(){
			if (!is_null($this->koneksi)) {
            	return $this->koneksi;
        	}
	        $this->koneksi = false;
	        try {
	            $this->koneksi = new PDO('mysql:host=localhost;dbname=absensi', 'root', '');
	        } catch(PDOException $e) { 
	        	echo $e->getMessage();
	        }

	        return $this->koneksi;
		}

		public function jukokdata(){
			$konek = $this->oleh_koneksi();
			$nik = $_SESSION['nik'];
			$statement = $konek->prepare("SELECT * FROM absen where nik ='$nik'");
			$statement->execute();
			while ($row = $statement->fetch()){
				$hasile[] = $row;
			}

			return $hasile;
		}

		public function hapusae($id_absensi){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("DELETE FROM absen WHERE id_absensi='$id_absensi'");
			$hapus = $statement->execute();
			return $hapus;
		}

		public function getById($id_absensi){

			$koneksi = $this->oleh_koneksi();
			$statement = $koneksi->prepare("SELECT * FROM absen WHERE id_absensi='$id_absensi'");
			$statement->execute();
			while ($row = $statement->fetch()) {
			    $hasil[] = $row;
			}
			return $hasil;

		}
		public function lebokno($id_absensi,$nik,$tanggal_absensi){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("INSERT INTO absen(id_absensi,nik,tanggal_absensi) VALUES(?,?,?)");
			return $statement->execute(array($id_absensi,$nik,$tanggal_absensi));

		}

		public function update_bagian($id_absensi,$nik,$tanggal_absensi){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("UPDATE absensi 
				SET nik='$nik',tanggal_absensi='$tanggal_absensi' WHERE id_absensi='$id_absensi'");
			return $statement->execute();

		}
	}

  ?>