<?php
 $con =mysqli_connect('localhost', 'root', '','shopping_cart_db');
if(isset($_POST['submit'])){
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $email =$_POST['email'];
    $imagename =$_FILES['image']['name'];
    $tmpname =$_FILES['image']['tmp_name'];
    $uploc ='images/' .$imagename;

    $sql = "INSERT INTO `make_order`( `firstname`, `lastname`, `email`, `image`) 
    VALUES ('$firstname','$lastname ',' $email ','$imagename')";

        if(mysqli_query($con,$sql) == TRUE){
            move_uploaded_file($tmpname,$uploc);
            echo"<script>alert'Data Inserted'</script>";
        }else{
            echo"<script>'data not inserted'</script>";
        }
}
?>
<!Doctype html>
<html>
    <head>
        <title>make an order</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
        <style>
            body{
                background:grey;
            }
            .container{
                border: solid 2px;
                background: white;
                width: 45%;
                margin-top: 10px;
            }
            h1{
                background: blue;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>MAKE YOUR ORDER</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname"></br><br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname"></br><br>
        <label for="email">Email</label>
        <input type="email" name="email"></br><br>
        <input type="file" name="image"></br><br>
        <input  class="btn" type="submit" name="submit" value="upload"></br><br>
    </form>
</div>
    </body>
</html>