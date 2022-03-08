<?php
    include 'config.php';
   $ID = $_GET['Id'];
   mysqli_query($con, "DELETE FROM `cart` WHERE  Id = $ID ");
   header('location:admin.php'); 
   ?>