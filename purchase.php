<?php

session_start();
$connect = mysqli_connect("localhost","root","","shopping_cart_db");

if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to database');
    window.location.href=' cart.php')</script>";
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['purchase']))
    {
        $query1="INSERT INTO `order_manager`( `full_name`, `phone_no`,  `address`, `pay_mod`) 
                VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mod]')";
        if(mysqli_query($connect,$query1))
        {
            $order_id=mysqli_insert_id($connect);
            $query2="INSERT INTO `user_order`( `id`,`name`, `price`, `quantity`) 
                VALUES (?,?,?,?)";
            $stmt=mysqli_prepare($connect,$query2);
            if($stmt)
            {
            mysqli_stmt_bind_param($stmt,"isii", $id,$name,$price,$quantity);
             foreach($_SESSION['cart']as $key => $values)
            {
            $name=$values['name']; 
            $price=$value['price'];
            $quantity=$value['quantity'];
            mysqli_stmt_execute($stmt);
            
            }
            unset($_SESSION['cart']);
                    echo"<script>alert('Order placed.');
                    window.location.href='index.php';
                    </script>";
            }
            else{
                echo"<script>alert('SQL Query Error');
                window.location.href='cart.php';
                </script>";
            }
        }
        else{
                echo"<script>
                        alert('Query not executed.');
                        window.location.href='cart.php';
                    </script>";
            }
        }
    }   
?>