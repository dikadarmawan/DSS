<?php
	include "koneksi.php";

	$parameterX = $_POST['parameterX'];
	$parameterY = $_POST['parameterY'];
	$pembobotan = $_POST['pembobotan'];

	$sql = "INSERT INTO tbl_pembobotan VALUES ('', '$parameterX', '$parameterY', '$pembobotan')";

	if (mysqli_query($conn, $sql)) {
		echo ("<script>
			window.alert('Success');
			window.location.href='index.php';
			</script>");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>