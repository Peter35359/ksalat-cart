   <!Doctype html>
    <html lang= "en">
        <head>
            <!--meta-->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="UTF-8">
            <title>Ksalat shopping page</title>
            <!-- boostrap-->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
            <!--font awesome-->
            <link href="ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="144x144">
          <link href="ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon" sizes="114x114">
          <link href="ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
          <link href="ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
          <link href="ico/favicon.png" rel="shortcut icon">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!--linking css-->
</head>
<style>
  {
    margin: 0%;
    padding: 0%;
}
body{
    font-family: 'Times New Roman', serif;
    background-color: none;
}
.header{
  height: 50px;
}
.d-flex{
    margin-right: 0%;
}
h3 p{
  color:black;
}
.btn a{
    color: white;
    text-decoration: none;
}
</style>
<body>
    <?php
           include('header.php');
      ?> 
      <header>
          <div
          class="p-5 text-center bg-image"
          style="
            background-image: url('img/ts.png');
            background-size:cover;
            height: 400px;
            margin-top: 58px;">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h1 class="mb-3">WELCOME TO KSALAT</h1>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h4 class="mb-3">Your Number One Shopping and Printers</h4>
                <h5>We  print logos , images,  graphic  on  clothes of any kind, send your image/logo or brand name</br>
                                        choose type of Cloth</h5>
                <a class="btn btn-outline-primary btn-lg" href="order.php" role="button">Make order</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->
      </header>
              <div class="container" id="shirt">
                <div class="col-md-12">
                  <div class="row show_cart my-5">
                    <?php
                    include 'show_cart.php';
                    ?>
                  </div>
                </div>
              </div>
              <div class="about">
                  <style>
                    .about{
                      text-align: center;
                      font-size: 3vh;
                    }
                  </style>
                  <h3 id="about">About us</h3>
                  <p>
                    <?php
                    include 'about.php';
                    ?>
                </p>
                </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

            <script type="text/javascript">
              
              $(document).ready(function(){
                  
                show_cart();

              function show_cart(){
                $.ajax({
                      method: "POST",
                      url:"show_cart.php",
                      success:function(data){
                        $(".show_cart").html(data);
                      }
                });	
              }
                $(document).on("click",".add",function(){
                    var id = $(this).attr("id");
                    var name = $("#name"+id+"").val();
              var price = $("#price"+id+"").val();
              var quantity = $("#quantity"+id+"").val();

              $.ajax({
                  method:"POST",
                  url: "add_to_cart.php",
                  data:{id:id,name:name,price:price,quantity:quantity},
                  success:function(data){
                    alert("you have add new item");
                  }
              });
          });
        
        });

                  $(document).ready(function() {
          $('#cart-popover').popover({
              html : true,
              container: 'body',
              content: function() {
                  return $('#popover_content_wrapper').html();
              }
          });
          });

      </script>
      </body>
      </html>
