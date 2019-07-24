


<!DOCTYPE html>
<html>
<head>
	<title>Admin page | View All Produk</title>
 <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
	<style type="text/css">
		          :root {
  --modal-duration: 1s;
  --modal-color: #428bca;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background: #f4f4f4;
  font-size: 17px;
  line-height: 1.6;
  display: flex;
  height: 90vh;
  align-items: center;
  justify-content: center;
}

.button {
color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;
margin-left: 60%;
  color: #fff;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
}

.button:hover {
  background: #3876ac;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  margin: 10% auto;
  width: 60%;
  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
  animation-name: modalopen;
  animation-duration: var(--modal-duration);
}

.modal-header h2,
.modal-footer h3 {
  margin: 0;
}

.modal-header {
  background: var(--modal-color);
  padding: 15px;
  color: #fff;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.modal-body {
  padding: 10px 20px;
  background: #fff;
}

.modal-footer {
  background: var(--modal-color);
  padding: 10px;
  color: #fff;
  text-align: center;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.close {
  color: #ccc;
  float: right;
  font-size: 30px;
  color: #fff;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

@keyframes modalopen {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
.frm-add {border: #c3bebe 1px solid;
    padding: 30px;}
.demo-form-heading {margin-top:0px;font-weight: 500;} 
.demo-form-row{margin-top:20px;}
.demo-form-field{width:300px;padding:10px;}
.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;}
	</style>
</head>
<body><div class="container" border="1px">
<div style="text-align:right;margin:20px 0px;"><button id="modal-btn" class="button"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Tambah Baru</a></button></div>

<table id="myTable" class="table table-striped  table-hover" >

	<thead>
		<tr>

	  	  <th >Kode Gaji</th>
	  <th>Absensi</th>
	  <th >NIK</th>
	  <th >Total Gaji</th>
			<th>
				Action
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
	foreach ($data as $row){
	?>
		<tr>
	<td><?php echo $row["kode_gaji"]; ?></td>
		<td><?php echo $row["absensi"]; ?></td>
		<td><?php echo $row["nik"]; ?></td>
		<td><?php echo $row["total_gaji"]; ?></td>
		<td><a class="ajax-action-links" href="indexpenggajian.php?kode_gaji=<?php echo $row['kode_gaji']?>&get=true"><img src="crud-icon/edit.png" title="Update" /></a> <a class="ajax-action-links" href="indexpenggajian.php?kode_gaji=<?php echo $row['kode_gaji']?>&delete=true"><img src="crud-icon/delete.png" title="Delete" /></a></td>
		</tr>
		<?php } ?>
	</tbody>
</table></div>
		<div class="col-md-5"></div>
	</div>
</div>


<div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        
      </div>
      <div class="modal-body">
<h1 class="demo-form-heading">Tambah Penggajian</h1>
<form name="frmAdd" action="indexpenggajian.php?save=true" method="POST">
  <div class="demo-form-row">
	  <label>Kode Gaji: </label><br>
	  <input type="text" name="kode_gaji" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
    <label>Absensi: </label><br>
    <input type="text" name="absensi" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <label>NIK: </label><br>
        <?php $con=mysqli_connect("localhost","root","","penggajian");?>

    <select  name="nik" class="demo-form-field" required><?php $sql = "select * from karyawan";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)!=''){ while ($data = mysqli_fetch_array($result,MYSQLI_NUM)) {
      ?>
  
      <option value="<?php echo $data['0']?>"><?php echo $data[0]?> </option>
      <?php 
    }
  }else{
    echo "data tidak ada";
  }
  ?>

    </select>
  </div>
  <div class="demo-form-row">
    <label>Total Gaji: </label><br>
    <?php $con=mysqli_connect("localhost","root","","penggajian");?>

    <select  name="total_gaji" class="demo-form-field" required><?php $sql = "select * from golongan";

    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)!=''){ while ($data = mysqli_fetch_array($result,MYSQLI_NUM)) {
      ?>
  
      <option value="<?php echo $data['1']+$data['2']?>"><?php echo $data[1]+$data[2]?> </option>


      <?php 
    }
  }else{
    echo "data tidak ada";
  }
   ?>
    </select>
  </div>
  <div class="demo-form-row">
    <input name="simpan" type="submit" value="TAMBAH" class="demo-form-submit">
  </div>
  </form>
  </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
<script type="text/javascript">$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
<script type="text/javascript">const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
  modal.style.display = 'block';
}

// Close
function closeModal() {
  modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}
</script>
<script type="text/javascript"> var userform=document.getElementById('edit-form-user');
var btn=document.getElementById('form-user');
var span=document.getElementClassName("close")[0];
btn.onclick=function(){
	userform.style.display="block";
}
</script>
</body>
</html>
