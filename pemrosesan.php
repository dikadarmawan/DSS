<?php
	include "koneksi.php";
	
	$nama=$_POST['nama'];
	$penghasilan=$_POST['penghasilan'];
	$tanggungan=$_POST['tanggungan'];
	$rumah=$_POST['rumah'];
	$aset=$_POST['aset'];

	if($penghasilan >= 6000000){
		$kriteria = 1;
	}else if($penghasilan >= 4000000 && $penghasilan < 6000000){
		$kriteria = 2;
	}else if($penghasilan >= 2000000 && $penghasilan < 4000000){
		$kriteria = 3;
	}else if($penghasilan >= 1000000 && $penghasilan < 2000000){
		$kriteria = 4;
	}else{
		$kriteria = 5;
	}
	
	if($tanggungan >= 5){
		$kriteriaTanggungan = 5;
	}else if($tanggungan >= 2 && $tanggungan < 5){
		$kriteriaTanggungan = 3;
	}else{
		$kriteriaTanggungan = 1;
	}
	
	if($rumah == 5){
		$kriteriaRumah = "tidak layak";
	}else if($rumah == 3 ){
		$kriteriaRumah = "cukup layak huni";
	}else{
		$kriteriaRumah = "layak";
	}
	
	if($aset == 5){
		$kriteriaAset = "tidak memiliki";
	}else if($aset == 3 ){
		$kriteriaAset = "motor";
	}else{
		$kriteriaAset = "mobil";
	}


$sql1 = "SELECT max(id_pendaftar) as id FROM tbl_pendaftar";
$resultPend = mysqli_query($conn, $sql1);
$rowPend = mysqli_fetch_array($resultPend); 
if(!empty($rowPend)){
	$id=$id_pendaftar = $rowPend['id']+1;
}else{
	$id=1;
}	
	
$sql = "INSERT INTO tbl_pendaftar VALUES ('$id', '$nama')";

	if (mysqli_query($conn, $sql)) {
		$sqlP = "SELECT * FROM tbl_parameter";
		$resultPar = mysqli_query($conn, $sqlP);
		while($rowPar = mysqli_fetch_array($resultPar)){
			$par = $rowPar['id_parameter'];
			if($par=='3'){
				$sqlPar = "INSERT INTO tbl_ranking VALUES ('', '$id', '$par', '$kriteria', '$penghasilan')";
			}else if($par=='4'){
				$sqlPar = "INSERT INTO tbl_ranking VALUES ('', '$id', '$par', '$kriteriaTanggungan', '$tanggungan')";
			}else if($par=='5'){
				$sqlPar = "INSERT INTO tbl_ranking VALUES ('', '$id', '$par', '$rumah', '$kriteriaRumah')";
			}else if($par=='6'){
				$sqlPar = "INSERT INTO tbl_ranking VALUES ('', '$id', '$par', '$aset', '$kriteriaAset')";
			}
			
			if (mysqli_query($conn, $sqlPar)) {
						echo ("<script>
			window.alert('Success');
			window.location.href='index.php';
			</script>");
			}
		} 
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);



?>