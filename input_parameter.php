<?php
	include "koneksi.php";

	$parameter = $_POST['parameter'];

	$sql = "INSERT INTO tbl_parameter VALUES ('', '$parameter')";

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