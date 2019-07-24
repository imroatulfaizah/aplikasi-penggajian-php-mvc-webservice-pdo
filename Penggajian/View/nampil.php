
<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR DATA PDO</title>
	<style>
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
</style>
</head>
<body>
	<center>

	<div style="text-align:right;margin:20px 0px;"><a href='index.php?insert=add' class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Tambah Baru</a></div>
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header" width="20%">NPM</th>
	  <th class="table-header" width="40%">Nama</th>
	  <th class="table-header" width="20%">Prodi</th>
	  <th class="table-header" width="20%">Fakultas</th>
	  <th class="table-header" width="5%">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	foreach ($data as $row){
	?>
	  <tr class="table-row">
		<td><?php echo $row["npm"]; ?></td>
		<td><?php echo $row["nama"]; ?></td>
		<td><?php echo $row["prodi"]; ?></td>
		<td><?php echo $row["fakultas"]; ?></td>
		<td><a class="ajax-action-links" href="index.php?npm=<?php echo $row['npm']?>&get=true"><img src="crud-icon/edit.png" title="Update" /></a> <a class="ajax-action-links" href="index.php?npm=<?php echo $row['npm']?>&delete=true"><img src="crud-icon/delete.png" title="Delete" /></a></td>
	  </tr>
    <?php
		}
		
	?>
  </tbody>
</table>
</center>
</body>
</html>