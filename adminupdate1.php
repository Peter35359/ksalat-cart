<?php
include 'config.php';
 
if(isset($_POST['update'])){
    $ID = $_POST ['Id'];
    $NAME =$_POST['name'];
    $PRICE =$_POST['price'];
    $IMAGE =$_FILES['image'];
    $img_loc =$_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = $img_name;
    move_uploaded_file($img_loc,"img/" .$img_name);


    //insert data
    mysqli_query($con, "UPDATE `cart` SET `name`='$NAME',`price`='$PRICE',`image`='$img_des' WHERE Id = $ID");
    header('location: index2.php');
}

?>