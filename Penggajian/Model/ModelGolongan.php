<?php
	/**
	 * Programmer Imroatul Faizah
	 */
	class ModelGolongan{
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
			$statement = $konek->prepare("SELECT * FROM golongan");
			$statement->execute();
			while ($row = $statement->fetch()){
				$hasile[] = $row;
			}

			return $hasile;
		}

		public function hapusae($kode_golongan){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("DELETE FROM golongan WHERE kode_golongan='$kode_golongan'");
			$hapus = $statement->execute();
			return $hapus;
		}

		public function getById($kode_golongan){

			$koneksi = $this->oleh_koneksi();
			$statement = $koneksi->prepare("SELECT * FROM golongan WHERE kode_golongan='$kode_golongan'");
			$statement->execute();
			while ($row = $statement->fetch()) {
			    $hasil[] = $row;
			}
			return $hasil;

		}
		public function lebokno($kode_golongan,$gaji_pokok,$tunjangan_golongan){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("INSERT INTO golongan(kode_golongan,gaji_pokok,tunjangan_golongan) VALUES(?,?,?)");
			return $statement->execute(array($kode_golongan,$gaji_pokok,$tunjangan_golongan));

		}

		public function update_golongan($kode_golongan,$gaji_pokok,$tunjangan_golongan){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("UPDATE golongan 
				SET gaji_pokok='$gaji_pokok',tunjangan_golongan='$tunjangan_golongan' WHERE kode_golongan='$kode_golongan'");
			return $statement->execute();

		}
	}

  ?>