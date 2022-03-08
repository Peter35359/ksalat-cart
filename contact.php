<?php

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    if($name=='' || $email=='' || $number=='' ||$message==''){
        echo "<script>alert('All Field are Required !')</script>";
    }
    else{

        $to     = "pkimtech98@gmail.com";  
        $subject = "Contact Us From SWAS DEVELOPMENT";

        $header  = "From: $email";

        $message = " \n Name : ". $name . "\n Email : ". $email . " \n Number : ". $number ." \n Message : ". $message;

        $sendmail = mail($to, $subject, $message, $header);

        //popup message
        echo "<script>alert('Thank you for Contact Us')</script>";
        // redirect to thank you page
        echo "<script>window.location.href = 'index.php';</script>";

        }
}
        ?>
 <!DOCTYPE html>
<html>
     <head>
        <!-- Latest compiled and minified CSS -->
        <style>
            .container{
                background-color: #757575;
            }
            a{
                color: black;
                text-decoration: none;
            }
    </style>
    </head>
    <body>
                <div class="container">
                      <div class="row">
                    <div class="col-md-8">
                            <form name="contact-form" action="" method="post" id="contact-form">
                                    <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control" name="number" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                            <label for="message">Comments</label>
                            <textarea name="message" class="form-control" rows="3" cols="28" rows="5" placeholder="Comments"></textarea> 
                     </div>
                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
        </form>
        </div>
    </div>
</div>
</body>
</html>