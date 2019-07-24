<?php
	/**
	 * Programmer Imroatul Faizah
	 */
	class ModelJabatan{
		private $koneksi = null;

		public function oleh_koneksi(){
			if (!is_null($this->koneksi)) {
            	return $this->koneksi;
        	}
	        $this->koneksi = false;
	        try {
	            $this->koneksi = new PDO('mysql:host=localhost;dbname=penggajian', 'root', '');
	        } catch(PDOException $e) { 
	        	echo $e->getMessage();
	        }

	        return $this->koneksi;
		}

		public function jukokdata(){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("SELECT * FROM jabatan");
			$statement->execute();
			while ($row = $statement->fetch()){
				$hasile[] = $row;
			}

			return $hasile;
		}

		public function hapusae($kode_jabatan){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("DELETE FROM jabatan WHERE kode_jabatan='$kode_jabatan'");
			$hapus = $statement->execute();
			return $hapus;
		}

		public function getById($kode_jabatan){

			$koneksi = $this->oleh_koneksi();
			$statement = $koneksi->prepare("SELECT * FROM jabatan WHERE kode_jabatan='$kode_jabatan'");
			$statement->execute();
			while ($row = $statement->fetch()) {
			    $hasil[] = $row;
			}
			return $hasil;

		}
		public function lebokno($kode_jabatan,$nama_jabatan,$tunjangan_jabatan){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("INSERT INTO jabatan(kode_jabatan,nama_jabatan,tunjangan_jabatan) VALUES(?,?,?)");
			return $statement->execute(array($kode_jabatan,$nama_jabatan,$tunjangan_jabatan));

		}

		public function update_jabatan($kode_jabatan,$nama_jabatan,$tunjangan_jabatan){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("UPDATE jabatan 
				SET nama_jabatan='$nama_jabatan',tunjangan_jabatan='$tunjangan_jabatan' WHERE kode_jabatan='$kode_jabatan'");
			return $statement->execute();

		}
	}

  ?>