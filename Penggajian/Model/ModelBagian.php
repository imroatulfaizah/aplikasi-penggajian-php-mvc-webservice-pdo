<?php
	/**
	 * Programmer Imroatul Faizah
	 */
	class ModelBagian{
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
			$statement = $konek->prepare("SELECT * FROM bagian");
			$statement->execute();
			while ($row = $statement->fetch()){
				$hasile[] = $row;
			}

			return $hasile;
		}

		public function hapusae($kode_bagian){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("DELETE FROM bagian WHERE kode_bagian='$kode_bagian'");
			$hapus = $statement->execute();
			return $hapus;
		}

		public function getById($kode_bagian){

			$koneksi = $this->oleh_koneksi();
			$statement = $koneksi->prepare("SELECT * FROM bagian WHERE kode_bagian='$kode_bagian'");
			$statement->execute();
			while ($row = $statement->fetch()) {
			    $hasil[] = $row;
			}
			return $hasil;

		}
		public function lebokno($kode_bagian,$nama_bagian){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("INSERT INTO bagian(kode_bagian,nama_bagian) VALUES(?,?)");
			return $statement->execute(array($kode_bagian,$nama_bagian));

		}

		public function update_bagian($kode_bagian,$nama_bagian){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("UPDATE bagian 
				SET nama_bagian='$nama_bagian' WHERE kode_bagian='$kode_bagian'");
			return $statement->execute();

		}
	}

  ?>