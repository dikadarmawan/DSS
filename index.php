<?php
	include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>DSS</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
  	<div class="container">
		<div class="row" >
			<div class="col-md-12">
				<h1 align="center">DATA PENDAFTAR </h1>	
				<?php include "ranking.php"?>
			</div>
		</div>
		<div class="row" style="margin-bottom:50px;">
			<div class="col-md-12">
				<h2> </h2>	
				<?php include "ranking_tertulis.php"?>
			</div>
		</div>
		<div class="row" style="margin-bottom:50px;" align="center">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPendaftar" >
				Tambah Pendaftar
			</button>		
		</div>
		<div class="row" style="margin-bottom:50px;" >
			<div class="col-md-12">
				<h2> NORMALISASI DATA PENDAFTAR</h2>	
				<?php include "normalisasi.php"?>
			</div>
		</div>
		<div class="row" style="margin-bottom:150px">
			<div class="col-md-12">
			<h2>RANKING </h2>
				<?php include "perankingan.php"?>
			</div>
		</div>

	<h1 align="center"> DATA KRITERIA</h1>
		<div class="row" >	
			<div class="col-md-3">
				<?php include "data_parameter.php"?>
			</div>		
			<div class="col-md-9">
				<?php include "data_pembobotan.php"?>	
			</div>
		</div>
		<div class="row" style="margin-bottom:50px;">
			<div class="col-md-3">	
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalParameter" >
					Tambah Parameter
				</button>
			</div>	
			<div class="col-md-3">	
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPembobotan" >
					Tambah Pembobotan
				</button>
			</div>		
		</div>
		<div class="row" style="margin-bottom:50px;">
			<div class="col-md-12">
				<h2>RATA-RATA BOBOT </h2>	
				<?php include "data_rata_bobot.php"?>
			</div>
		</div>
		<div class="row" style="margin-bottom:50px; display:none">
			<div class="col-md-12">
			<h2>KONSISTENSI </h2>
				<?php include "data_konsistensi.php"?>
			</div>
		</div>


	<!-- Modal Parameter-->
	<div class="modal fade" id="ModalParameter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Modal Kriteria</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="POST" action="input_parameter.php">
			  <div class="form-group">
				<label for="exampleFormControlInput1">Nama Kriteria</label>
				<input type="text" name="parameter" class="form-control" id="exampleFormControlInput1" placeholder="Krisna Arynasta">
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="sumbit" class="btn btn-primary">Save changes</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	

	<!-- Modal Pembobotan-->
	<div class="modal fade" id="ModalPembobotan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Modal Pembobotan</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="POST" action="input_pembobotan.php">
			  <div class="form-group">
				<label for="exampleFormControlSelect1">Kriteria</label>
				<select class="form-control" id="parameterX" name="parameterX">
					<?php
						$sql1 = "SELECT * FROM tbl_parameter";
						$result = mysqli_query($conn, $sql1);

						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_array($result)) {
					?>
				  <option value="<?=$row['id_parameter']?>"><?=$row['parameter']?></option>
					<?php	
							}
						}
					?>
				</select>
			  </div>		  
			  <div class="form-group">
				<label for="exampleFormControlSelect1">Kriteria</label>
				<select class="form-control" id="parameterY" name="parameterY">
					<?php
						$sql1 = "SELECT * FROM tbl_parameter ";
						$result = mysqli_query($conn, $sql1);

						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_array($result)) {
					?>
				  <option value="<?=$row['id_parameter']?>"><?=$row['parameter']?></option>
					<?php	
							}
						}
					?>
				</select>
			  </div>
			   <div class="form-group">
				<label for="exampleFormControlInput1">Pembobotan</label>
				<input type="number" class="form-control" id="pembobotan" name="pembobotan" step="0.00000001">
			  </div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	
	
	
	<!-- Modal pendaftar-->
	<div class="modal fade" id="ModalPendaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Modal Pendaftar</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="POST" action="pemrosesan.php">
			  <div class="form-group">
				<label for="exampleFormControlInput1">Nama Pendaftar</label>
				<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Krisna Arynasta" name="nama">
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlInput1">Jumlah Penghasilan Pendaftar</label>
				<input type="text" class="form-control" id="exampleFormControlInput1" value="0" name="penghasilan">
			  </div>		  
			  <div class="form-group">
				<label for="exampleFormControlInput1">Jumlah Tanggungan Pendaftar</label>
				<input type="number" class="form-control" id="exampleFormControlInput1" value="0" name="tanggungan">
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlSelect1">Kondisi Rumah</label>
				<select class="form-control" id="exampleFormControlSelect1" name="rumah">
				  <option value="5">Tidak Layak</option>
				  <option value="3">Cukup Layak Huni</option>
				  <option value="1">Layak</option>
				</select>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlSelect1">Aset Kendaraan</label>
				<select class="form-control" id="exampleFormControlSelect1" name="aset">
				  <option value="5">Tidak Memiliki</option>
				  <option value="3">Motor</option>
				  <option value="1">Mobil</option>
				</select>
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="sumbit" class="btn btn-primary">Save changes</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	
  
	</div>	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	// <script>
		// $('#myModal').on('shown.bs.modal', function () {
		  // $('#myInput').trigger('focus')
		// })
	// </script>
		
 </body>
</html>