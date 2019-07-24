
<html>
<head>
<title>PHP PDO CRUD - Edit Record</title>
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
<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to List</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Edit Data Mahasiswa</h1>
<form name="frmAdd" action="index.php?update=true" method="POST">
	 <?php foreach ($data as $row) {?>

  <div class="demo-form-row">
	  <label>NPM: </label><br>
	  <input type="text" name="npm" class="demo-form-field" value="<?php echo $row['npm']; ?>" readonly="readonly" />
  </div>
  <div class="demo-form-row">
	  <label>Nama: </label><br>
	  <input type="text" name="nama" class="demo-form-field" value="<?php echo $row['nama']; ?>" required  />
  </div>
  <div class="demo-form-row">
	  <label>Prodi: </label><br>
	  <input type="text" name="prodi" class="demo-form-field" value="<?php echo $row['prodi'] ?>" required  />
  </div>
  <div class="demo-form-row">
	  <label>Fakultas: </label><br>
	  <input type="text" name="fakultas" class="demo-form-field" value="<?php echo $row['fakultas']; ?>" required  />
  </div>
    <?php } ?>
  <div class="demo-form-row">
	  <input name="submit" type="submit" value="UPDATE" class="demo-form-submit">
  </div>
  </form>
</div>
</body>
</html>