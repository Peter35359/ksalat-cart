<!DOCTYPE HTML>
 <html lang="en">
     <head>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width,initial-scale=1.0">
             <meta charset ="UTF-8">
             <title>ksalat adminiastrator section</title>
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <style>
                    .main{
                         background-color:gainsboro;
                        margin-top:10px;
                        max-width: 400px;
                        }
                        input{
                            margin-top: 10px;
                        }
                </style>
            </head>
            <body>
                    <?php
                        include 'config.php';
                    $ID = $_GET['Id'];
                    $Record = mysqli_query($con,"SELECT * FROM `cart` WHERE  Id = $ID");
                    $data = mysqli_fetch_array($Record);
                    ?>

            <center>
             <div class="main">
             <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Name:</label>
                    <input type="text" value="<?php echo $data['name']?>" name="name"><br>
                    <label for="">Price:</label>
                    <input type="text" value="<?php echo $data['price']?>" name="price" id=""><br>
                    <label for="">Image:</label>
                    <td><input type="file" name="image" value="<?php echo $data['image']?>width ='200px' heigth='70px'"><img src="<?php echo $data['image']?>"></td><br>
                   <input type="hidden" name="Id" value="<?php echo $data['Id']?>">
                    <button type="submit" name="update" class='btn btn-primary'>update</button>
               
             </form> 
            </div>
         </center>
         
         <!--update code-->

            </body>
            </html>