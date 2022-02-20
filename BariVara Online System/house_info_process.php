<?php include('db_connect.php'); ?>

<?php

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$type = $_POST['type'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

	$latitude=floatval($latitude);
	$longitude=floatval($longitude);
	

	$query="INSERT INTO house (name, address, type, lat, lng) VALUES('{$name}','{$address}','{$type}','{$latitude}','{$longitude}');";

	$performQuery=mysqli_query($connection, $query);

	/*if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      }*/
      
	if(!$performQuery)
		echo 'Unsuccessful';
	else
		echo 'Query successful';

	$insertedId=mysqli_insert_id($connection);
}

?>

<script type="text/javascript">
	window.location="house_for_map.php";
</script>