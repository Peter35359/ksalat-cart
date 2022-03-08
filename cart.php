<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ksalat Cart page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
	body{
		background-image: linear-gradient( rgba(255,0,0,0), rgba(19, 6, 78, 0.795)),url('img/ts.png');
		background-size: cover;
	}
</style>
<body>
	<div class="container ">
   </div>
		<div class="col-md-12">
			<table class="table table-bordered table-dark my-5">
				<tr class="table-danger">
					<th >ITEM NAME</th>
					<th>ITEM QUANTITY</th>
					<th>ITEM PRICE</th>
					<th>ACTION</th>
				</tr>

				<?php 

				$total_price = 0;

				if (!empty($_SESSION['cart'])) {
					
					foreach ($_SESSION['cart'] as $key => $value) { ?>
						<tr>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['quantity']; ?></td>
							<td><?php echo $value['price']; ?></td>
                             <td>
                             	<button class="btn btn-danger remove" id="<?php echo $value['id']; ?>" >Remove</button>
                             </td>
						</tr>

						  <?php $total_price = $total_price + $value['quantity'] * $value['price']; ?>			
					<?php }
				}else{ ?>
                       <tr class="bg-info">
                       	  <td class="text-center" colspan="5">NO ITEM SELECTED</td>
                       </tr>
				<?php }
				 ?>

				 <tr  class="table-primary">
							<td colspan="1"></td>
							<td>Total Price</td>
							<td>$.<?php echo number_format($total_price,2); ?></td>
							<td>
                             	<button class="btn btn-warning clearall">Clear All</button>
                             </td>
						</tr>
			</table>
		</div>
	</div>
	<div class="col-lg-3">
			<div class="border bg-light round p-4">
				<h4>Grand Total: <?php echo number_format($total_price,2);?></h4>
				<h5 class="text-form" id="gtotal"></h5>
				<br>
				<?php
				if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
				{
				?>
				<form action="purchase.php" method="POST">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="full_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label >Phone number</label>
						<input type="number" name="phone_no" class="form-control" required>
					</div>
					<div class="form-group">
						<label >Address</label>
						<input type="address" name="address" class="form-control" required>
					</div>
					<div class="form-check">
  					<input class="form-check-input"  name="pay_mod" type="checkbox" value="C.O.D" id="flexCheckChecked" checked>
  					<label class="form-check-label" for="flexCheckChecked">
   							 Cash On Delivery
  					</label>
					</br>
					<button class="btn btn-primary btn-block" name="purchase">Make Parchase</button>
   			 </form> 
				<?php
				}
				?>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



<script type="text/javascript">
	$(document).ready(function(){


		$(".remove").click(function(){
           var id = $(this).attr("id");
                
                var action = "remove";

             $.ajax({
               method:"POST",
               url:"action.php",
               data:{action:action,id:id},
               success:function(data){
                  alert("you have Remove item with ID "+id+"");
               }
            });
		});
        

        $(".clearall").click(function(){
              
              var action = "clear";

            $.ajax({
               method:"POST",
               url:"action.php",
               data:{action:action},
               success:function(data){
                  alert("you have cleared all item");
               }
            });
        });
	});
</script>
</body>
</html>