

<?php include('db_connect.php'); ?>

<?php

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$rent = $_POST['rent'];
	$description = $_POST['description'];

	$filename = $_FILES["image"]["name"];

    $tempname = $_FILES["image"]["tmp_name"];   

        $folder = "house_details/".$filename;

        // Get all the submitted data from the form 
       
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 

	$query="INSERT INTO house_detail (name, rent, description, image) VALUES('{$name}','{$rent}','{$description}','{$filename}');";

	$performQuery=mysqli_query($connection, $query);

	if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 
      
	if(!$performQuery)
		echo 'Query unsuccessful';
	else
		echo 'Query successful';

	$insertedId=mysqli_insert_id($connection);
}

?>

<script type="text/javascript">
	window.location="form.php";
</script>
	