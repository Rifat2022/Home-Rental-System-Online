<?php include('db_connect.php'); ?>


<?php
	$id=$_GET["id"];

	$res=mysqli_query($connection, "SELECT * FROM house_detail where id=$id");
	while($row=mysqli_fetch_array($res)){
		$img=$row["image"];
	}
	unlink(filename);
	mysqli_query($connection, "DELETE FROM house_detail where id=$id");
?>

<script type="text/javascript">
	window.location="form.php";
</script>