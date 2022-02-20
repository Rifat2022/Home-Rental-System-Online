<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home Rental services</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        contact@northsouth.edu
                    </div>
                    <div class="col-sm-6">
                        +88 0 222244433
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Houses</a>
                            <a href="product-detail.php" class="nav-item nav-link">House Details</a>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    
                                    
                                    <a href="contact.php" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                            <a href="form.php" class="nav-item nav-link active">Add/Delete product by Admin</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                    <?php  if (isset($_SESSION['username'])) : ?>
                                        <p style="color: white;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                                        <p style="color: white;> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                                    <?php endif ?>
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <h4>Add house information for MAP</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="form.php">Home Details Add/Delete  by Admin</a></li>
                    
                </ul>
            </div>
        </div>
        <br><br>
        <!-- Breadcrumb End -->

<?php include('db_connect.php'); ?>



<div class="container" style="margin: 0 auto;">

<form style="margin: 0 auto;" action="house_info_process.php" method="POST" >
<label>Name:</label><br>
<input type="text" name="name" value=""><br><br>
<label>Address:</label><br>
<input type="text" name="address" value=""><br><br>
<label>Type:</label><br>
<input type="text" name="type" value=""><br><br>

<label>latitude:</label><br>
<input type="text" name="latitude" ><br><br>

<label>longitude:</label><br>
<input type="text" name="longitude" ><br><br>

<button type="submit" name="submit" >Submit </button><br><br><br>

</form>
   
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                 
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
    
</html>


