<?php
	$q = strval($_GET['id']);

	$con = mysqli_connect('localhost','root','root','preferences');

	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"preferences");
	$sql="SELECT * FROM post WHERE id = '".$q."'";
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result)) {
	    echo $row['title'];
	}
	mysqli_close($con);
?>