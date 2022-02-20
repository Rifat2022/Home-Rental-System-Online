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
        <!-- Map work started  -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/googlemap.js"></script>
        <style type="text/css">
        .map-container {
            height: 450px;
        }
        #map {
            width: 100%;
            height: 100%;
            border: 1px solid blue;
        }
        #map-data, #map-allData {
            display: none;
        }
        </style>
        <!-- map work ended -->
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
                       support@northsouth.edu
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +880-2-55668200
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
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Houses</a>
                            <a href="product-detail.php" class="nav-item nav-link">House Details</a>
                            <a href="house_for_map.php" class="nav-item nav-link">Insert House for Map</a>
                            
                            
                            <a href="admin_index.php" class="nav-item nav-link">Add/Delete Houses by Admin</a>

                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <?php  if (isset($_SESSION['username'])) : ?>
                                        <p style="color: white;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                                        <p style="color: white;> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                                    <?php endif ?>
                                </div>
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
                        <div class="logo0">
                            <a href="index.html">
                                <img style="height: 150px; width: 150px;" src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- map division start -->   
        <div class="map-container">
            <center><h1>House Locations in Google Maps API</h1></center>
            <hr>
            <?php 
                require 'house.php';
                $edu = new house;
                $coll = $edu->getCollegesBlankLatLng();
                $coll = json_encode($coll, true);
                echo '<div id="map-data">' . $coll . '</div>';

                $allData = $edu->getAllColleges();
                $allData = json_encode($allData, true);
                echo '<div id="map-allData">' . $allData . '</div>';            
            ?>
        <div id="map" style="margin-left: auto; margin-right: auto;width:90%; height: 340px; border: 2px dotted tomato; "></div>
        </div>    
        
        <!-- map division end -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i>House</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-plus-square"></i>Rental Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Book Now</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Contact Us</a>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/brand-1.jpg" height="400" width="600" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Cox's Bazar</p>
                                    <a class="btn" href=""></i>Book Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/brand-2.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Dhaka</p>
                                    <a class="btn" href=""></i>Book Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/brand-3.jpg." height="400" width="600" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Chittagong</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/brand-4.jpg" />
                                <a class="img-text" href="">
                                    <p>gulshan 2 </p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="img/brand-5.jpg" />
                                <a class="img-text" href="">
                                    <p>Tangail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.jpg" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.jpg" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.jpg" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.jpg" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.jpg" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.jpg" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->      
        
        <!-- Feature Start-->
     
        <!-- Feature End-->      
        
        <!-- Category Start-->
       <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/category-1.jpg" />
                            <a class="category-name" href="">
                                <p>Book Now</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="img/category-2.jpg" />
                            <a class="">
                                <p>Book Now</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="img/category-5.jpg" />
                            <a class="category-name" href="">
                                <p>Book Now</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="img/category-4.jpg" />
                            <a class="category-name" href="">
                                <p>Book Now</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="img/category-5.jpg" />
                            <a class="category-name" href="">
                                <p>Book Now</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/category-3.jpg" />
                            <a class="">
                                <p>Book Now</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+880-2-55668200</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
             
        
        <!-- Newsletter Start -->
        
        <!-- Newsletter End --> 
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Available for Rent </h1>
                </div>
                      
            </div>
        </div>

        <!-- Featured Product End -->       
   
<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php include('db_connect.php'); ?>        
<?php

$res=mysqli_query($connection, "SELECT * FROM house_detail");
while($row=mysqli_fetch_array($res)){

?>

							<div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?php echo $row['name']; ?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                       
                                             <img style="height: 200px; width: 280px;" src="house_details/<?php echo $row['image']; ?>" alt="photo of product" width="200" height="300">
                                       
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span><?php echo $row['rent']; ?></h3>
                                        <a class="btn" href="specific_product_detail.php?id=<?php echo $row['id'];  ?>">Details</a>
                                    </div>
                                </div>
                            </div>



<?php
}

?>                            
<?php mysqli_close($connection); ?>                          
                            
                        
                           
                    
                    
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
        <!-- Review Start -->
       <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="rifat.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Rifat Hossian</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                   Totally awesome services.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="sumi.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Custome Name</h2>
                                <h3>Sumi</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    They are reliable and secured.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="ahasan.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Ahasan</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                  It's good to deal with them.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review End -->        
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Bashundhara, Dhaka-1229, Bangladesh</p>
                                <p><i class="fa fa-envelope"></i>registrar@northsouth.edu</p>
                                <p><i class="fa fa-phone"></i>+880-2-55668200 </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    
                                    <a href="https://www.facebook.com/ahasan.islam.786/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.linkedin.com/in/mdahasanulislam/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/whoisahasanul/"><i class="fab fa-instagram"></i></a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                      
                    </div>
                </div>
                
                
            </div>
        </div>
        <!-- Footer End -->
        
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
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZLfaqsY1iNfCI_yfsGo8OKTZGLpUUfEU&callback=loadMap">
    </script>
</html>
