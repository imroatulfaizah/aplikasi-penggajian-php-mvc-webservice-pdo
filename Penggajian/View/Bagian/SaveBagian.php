<html>
<head>
<title>PHP PDO CRUD - Tambah Data Bagian</title>
<style>
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
.frm-add {border: #c3bebe 1px solid;
    padding: 30px;}
.demo-form-heading {margin-top:0px;font-weight: 500;}	
.demo-form-row{margin-top:20px;}
.demo-form-field{width:300px;padding:10px;}
.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;}
</style>
</head>
<body>
<div style="margin:20px 0px;text-align:right;"><a href="indexbagian.php?save=true" class="button_link">List Bagian</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Tambah Bagian</h1>
<form name="frmAdd" action="indexbagian.php?save=true" method="POST">
  <div class="demo-form-row">
	  <label>Kode Bagian: </label><br>
	  <input type="text" name="kode_bagian" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <label>Nama Bagian: </label><br>
	  <input type="text" name="nama_bagian" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
    <input name="simpan" type="submit" value="TAMBAH" class="demo-form-submit">
  </div>
  </form>
</div> 
</body>
</html>