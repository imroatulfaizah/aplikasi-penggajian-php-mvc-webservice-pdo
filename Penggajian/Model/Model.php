<?php
	/**
	 * Programmer Imroatul Faizah
	 */
	class Model{
		private $koneksi = null;

		public function oleh_koneksi(){
			if (!is_null($this->koneksi)) {
            	return $this->koneksi;
        	}
	        $this->koneksi = false;
	        try {
	            $this->koneksi = new PDO('mysql:host=localhost;dbname=data_mhs', 'root', '');
	        } catch(PDOException $e) { 
	        	echo $e->getMessage();
	        }

	        return $this->koneksi;
		}

		public function jukokdata(){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("SELECT * FROM mahasiswa");
			$statement->execute();
			while ($row = $statement->fetch()){
				$hasile[] = $row;
			}

			return $hasile;
		}

		public function hapusae($npm){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("DELETE FROM mahasiswa WHERE npm='$npm'");
			$hapus = $statement->execute();
			return $hapus;
		}

		public function getById($npm){

			$koneksi = $this->oleh_koneksi();
			$statement = $koneksi->prepare("SELECT * FROM mahasiswa WHERE npm='$npm'");
			$statement->execute();
			while ($row = $statement->fetch()) {
			    $hasil[] = $row;
			}
			return $hasil;

		}
		public function lebokno($npm,$nama,$prodi,$fakultas){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("INSERT INTO mahasiswa(npm,nama,prodi,fakultas) VALUES(?,?,?,?)");
			return $statement->execute(array($npm,$nama,$prodi,$fakultas));

		}

		public function update_mhs($npm,$nama,$prodi,$fakultas){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("UPDATE mahasiswa 
				SET nama='$nama',prodi='$prodi',fakultas='$fakultas' WHERE npm='$npm'");
			return $statement->execute();

		}
	}

  ?>