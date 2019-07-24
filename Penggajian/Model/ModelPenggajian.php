<?php
	/**
	 * Programmer Imroatul Faizah
	 */
	class ModelPenggajian{
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
			$statement = $konek->prepare("SELECT * FROM penggajian");
			$statement->execute();
			while ($row = $statement->fetch()){
				$hasile[] = $row;
			}

			return $hasile;
		}

		public function hapusae($kode_gaji){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("DELETE FROM penggajian WHERE kode_gaji='$kode_gaji'");
			$hapus = $statement->execute();
			return $hapus;
		}

		public function getById($kode_gaji){

			$koneksi = $this->oleh_koneksi();
			$statement = $koneksi->prepare("SELECT * FROM penggajian WHERE kode_gaji='$kode_gaji'");
			$statement->execute();
			while ($row = $statement->fetch()) {
			    $hasil[] = $row;
			}
			return $hasil;

		}
		public function lebokno($kode_gaji,$absensi,$nik,$total_gaji){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("INSERT INTO penggajian(kode_gaji,absensi,nik,total_gaji) VALUES(?,?,?,?)");
			return $statement->execute(array($kode_gaji,$absensi,$nik,$total_gaji));

		}

		public function update_penggajian($kode_gaji,$absensi,$nik,$total_gaji){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("UPDATE penggajian 
				SET absensi='$absensi',nik='$nik',total_gaji='$total_gaji' WHERE kode_gaji='$kode_gaji'");
			return $statement->execute();

		}
	}

  ?>