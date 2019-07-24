<?php
	/**
	 * Programmer Imroatul Faizah
	 */
	class ModelKaryawan{
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
			$statement = $konek->prepare("SELECT * FROM karyawan");
			$statement->execute();
			while ($row = $statement->fetch()){
				$hasile[] = $row;
			}

			return $hasile;
		}

		public function hapusae($nik){
			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("DELETE FROM karyawan WHERE nik='$nik'");
			$hapus = $statement->execute();
			return $hapus;
		}

		public function getById($nik){

			$koneksi = $this->oleh_koneksi();
			$statement = $koneksi->prepare("SELECT * FROM karyawan WHERE nik='$nik'");
			$statement->execute();
			while ($row = $statement->fetch()) {
			    $hasil[] = $row;
			}
			return $hasil;

		}
		public function lebokno($nik,$nama_karyawan,$kode_jabatan,$kode_bagian,$kode_golongan,$alamat_karyawan,$no_hp){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("INSERT INTO karyawan(nik,nama_karyawan,kode_jabatan,kode_bagian,kode_golongan,alamat_karyawan,no_hp) VALUES(?,?,?,?,?,?,?)");
			return $statement->execute(array($nik,$nama_karyawan,$kode_jabatan,$kode_bagian,$kode_golongan,$alamat_karyawan,$no_hp));

		}

		public function update_karyawan($nik,$nama_karyawan,$kode_jabatan,$kode_bagian,$kode_golongan,$alamat_karyawan,$no_hp){

			$konek = $this->oleh_koneksi();
			$statement = $konek->prepare("UPDATE karyawan 
				SET nama_karyawan='$nama_karyawan',kode_jabatan='$kode_jabatan',kode_bagian='$kode_bagian',kode_golongan='$kode_golongan',alamat_karyawan='$alamat_karyawan',no_hp='$no_hp' WHERE nik='$nik'");
			return $statement->execute();

		}
	}

  ?>