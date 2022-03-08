<?php 
include('function.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location:login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location:home/index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ksalat administration section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link  rel="stylesheet" href="header.css"> 
            <!-- <link  rel="stylesheet" href="user.css">      -->
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                <style>
                    body{
                        font-size: 2.5vh;
                    }
                    .main{
                         background-color:gainsboro;
                        margin-top:10px;
                        max-width: 400px;
                        }
                        input{
                            margin-top: 10px;
                        }

                        .logout{
                            display: flex;
                            margin-left: 90%;
                            margin-right: 20%;
                            color:red;
                            
                        }
                        .logout a{
                            text-align: none'
                            color:black;
                            text-decoration: none;
                            
                        }
                        .row{
                            background-color: white;
                        }
                        .table{
                            font-size: 2vh;
                        }
                        .container{
                            margin-right: 0%;
                            width: 83%;
                        }
                        .header {
                                background: #003366;
                                    width: 100%;
                                    color: white;
                                    text-align: center;
                                    border: 1px solid #B0C4DE;
                                    border-bottom: none;
                                    border-radius: 10px 10px 0px 0px;
                                    padding: 20px;
                                }
                                .img{
                                        width: 50px;
                                        height:auto; 
                                        
                                   }
                                
                                button[name=register_btn] {
                                    background: #003366;
                                }
                </style>
<body>
<div id="wrapper" data-spy="scroll" data-target="#spy" class="">
            <!-- Sidebar -->
            <div id="sidebar-wrapper" class="">
                <nav id="spy">
                    <ul class="sidebar-nav nav">
                        <li class="sidebar-brand active"> 
                            <a href="#home" >
                                <span class="fa fa-home solo">Home</span>
                            </a>
                        </li>
                       
                        <li class=""> <a href="#new" data-scroll="" class="">
                                    <span class="fa fa-anchor solo">New Products</span>
                                </a>
                        </li>
                         <li class=""> <a href="#order2" data-scroll="" class="delivery bg-danger">
                                    <span class="fa fa-anchor solo">Special Order</span>
                                </a>
                        </li>
                        <li class=""> <a href="#order" data-scroll="" class="">
                                    <span class="fa fa-anchor solo">Order</span>
                                </a>
                        </li>
                        <li class=""> <a href="#" data-scroll="" class="">
                                    <span class="fa fa-anchor solo"></span>
                                </a>
                        </li>
                    </ul>
                </nav>
            </div>
	
                <!-- notification message -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success" >
                        <h3><center>
                            <?php 
                                echo $_SESSION['success']; 
                                unset($_SESSION['success']);
                            ?></center> </h3>                     
                    </div>
                <?php endif ?>
        
        
		<!-- logged in user information -->
		<div class="logout">
            <small>
                 <button style="font-size:24px">
                    <i class="fa fa-sign-out"><a href="index.php?logout='1'" style="color: red;">logout</a></i>
                </button>
						
                       &nbsp; <a href="create_user.php"> + add user</a>
					</small>
              </div>     
        <div class="header"> 
                <h1> WELCOME:
                    <?php  if (isset($_SESSION['user'])) : ?>
                        <strong><?php echo $_SESSION['user']['username']; ?></strong>
                </h1>
                </div>	
				<?php endif ?>
			</div>
	</div>
    <div class="row">
                        <div class="col-md-12 well"><!-- add new products-->
                            <legend id="new" class="product">New product</legend>
                            <p class="">
                          <center>
                                <div class="main">
                                <form action="admininsert.php" method="POST" enctype="multipart/form-data">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name"><br>
                                        <label for="name">Price:</label>
                                        <input type="text" name="price" id=""><br>
                                        <label for="">Image:</label>
                                        <input type="file" name="image" id=""><br>
                                        <button name="upload" class='btn btn-dark'>upload</button>
                                
                                </form> 
                                </div>
                            </center>
                            <!--fetch data-->
                            <div class="container">
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Update</th>
                                    
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                <?php

                                    include 'config.php';
                                    $pic = mysqli_query($con,"SELECT * FROM `cart`");
                                    while($row = mysqli_fetch_array($pic)){
                                        echo"
                                        <tr>
                                            <td>$row[id]</td>
                                            <td>$row[name]</td>
                                            <td>$row[price]</td>
                                            <td><img src='img/$row[image]' width ='200px' heigth='70px'></td>
                                            <td><a href='admindelete.php? Id= $row[id]' class='btn btn-danger'>Delete</a></td>
                                            <td><a href='adminupdate.php? Id= $row[id]'class='btn btn-primary'>Update</a></td>
                                        </tr> ";
                                    }
                                        ?>
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                        <!--update database-->
                        <div class="col-md-12 well">
                            <legend id="update" class="">UPDATE PRODUCTS</legend>
                            <p>
                         
                            </p>
                            <p class="">
                             <?php
                                 //include('products/fetch.php');
                                 ?>
                            </p>
                           </div>
                            <legend id="order" class=""><b>Orders</b></legend>
                            <p class="">
                                        
                                                    <table class="table table-dark table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">Id</th>
                                                                <th scope="col">Customer Name</th>
                                                                <th scope="col">Phone No</th>
                                                                <th scope="col">Address</th>
                                                                <th scope="col">Pay Mode</th>
                                                                <th scope="col">Order</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query = "SELECT * FROM `order_manager`";
                                                                $user_result=mysqli_query($con,$query);
                                                                while($user_fetch=mysqli_fetch_assoc($user_result))
                                                                {
                                                                    echo"
                                                                    <tr>
                                                                        <td>$user_fetch[id]</td>
                                                                        <td>$user_fetch[full_name]</td>
                                                                        <td>$user_fetch[phone_no]</td>
                                                                        <td>$user_fetch[address]</td>
                                                                        <td>$user_fetch[pay_mod]</td>
                                                                        <td>
                                                                            <table class='table text-center table-dark'>
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope='col'>Item Name</th>
                                                                                <th scope='col'>Price</th>
                                                                                <th scope='col'>Quantity</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>";
                                                                        $order_query = "SELECT * FROM user_order  WHERE  id = $user_fetch[id]";
                                                                        $order_result=mysqli_query($con, $order_query);
                                                                        while($order_fetch=mysqli_fetch_assoc($order_result)){
                                                                            echo"
                                                                            <tr>
                                                                                <td>$order_fetch[name]</td>
                                                                                <td>$order_fetch[price]</td>
                                                                                <td>$order_fetch[quantity]</td>
                                                                            </tr>";
                                                                        }
                                                                        echo"
                                                                            </tbody>
                                                                            </table>
                                                                            </td>
                                                                    </tr>";
                                                                }?>
                                                            </tbody>
                                                            </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <p class="">.</p>
                                    </div>
                                    <h2><center>CUSTOMER ORDER</center></h2>
                                    <div class="container">   
                                    <div class="col-md-12 well">
                                        <div class="row">
                                        <legend id="order2" class=""></legend>
                                        <p class="form" style="margin: left 20%;;">
                                                <?php
                                                $con =mysqli_connect('localhost', 'root', '','shopping_cart_db');
                                                $sql = "SELECT * FROM  make_order ORDER BY id DESC";
                                                $data = mysqli_query($con, $sql);
                                                $row =mysqli_fetch_assoc($data);
                                                $firstname = $row['firstname'];
                                                $lastname = $row['lastname'];
                                                $email = $row['email'];
                                                $image = $row['image'];
                                                echo "<table border= solid 2px><tr></tr>";
                                                echo "<tr><th>Firstname</th><th>lastname</th><th>email</th><th>image</th></tr>";
                                                echo "<tr><td>$firstname</td><td>$lastname</td><td>$email</td>";
                                                echo "<td><img src='images/$image' class='img' width ='200px' heigth='70px'></td></tr>";
                                                ?>
                                                </table>
                                            </div>
                                          </div>
                                        </p>
                                        
                                    </div>
                                </div>
                            </p>
                            
                        </div>
                    </div>
                    <div class="navbar navbar-default navbar-static-bottom">
                        <p class="navbar-text pull-left">Built by <a  target="_blank">Peter k Kigen
                            </a>
                        </p>
                 </div>
</body>
</html>
    <script>
            $(document).ready(function() {    
            /*Menu-toggle*/
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("active");
            });
        
            /*Scroll Spy*/
            $('body').scrollspy({ target: '#spy', offset:80});
        
            /*Smooth link animation*/
            $('a[href*=logout]:not([href=logout])').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
        
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
                
                });

</script>
</body>
</html>