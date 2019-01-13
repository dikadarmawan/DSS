<?php


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




?>