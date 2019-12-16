<!DOCTYPE html>
<html lang="en">
<head>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Vollkorn&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link href="css/cart.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  h1{
    font-family: 'Vollkorn', serif;
    color: #0099ff;
  }
   .modal-body {
   
   overflow: auto;
}
</style>
</head>
<body>
    <?php
session_start();

if (isset($_SESSION['user_name']) )
{ 
    $name = $_SESSION['user_name'];

}

?>
   <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="text-white sidebar-heading"> BuyTech </div>
      <div class="list-group list-group-flush">

        <div class="btn-group dropright">
  <button type="button" class="list-group-item list-group-item-action bg-dark dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Laptop
  </button>
  <div class="dropdown-menu bg-info">
        <a href="apple.php" class="list-group-item list-group-item-action bg-info" >Apple</a>
        <a href="asus.php" class="list-group-item list-group-item-action bg-info">Asus</a>
        <a href="accer.php" class="list-group-item list-group-item-action bg-info">Accer</a>
        <a href="hp.php" class="list-group-item list-group-item-action bg-info">Hp</a>
        <a href="dell.php" class="list-group-item list-group-item-action bg-info">Dell</a>
        <a href="lenevo.php" class="list-group-item list-group-item-action bg-info">Lenevo</a>
  </div>
</div>


           <div class="btn-group dropright">
  <button type="button" class="list-group-item list-group-item-action bg-dark dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Mobile
  </button>
  <div class="dropdown-menu bg-info">
        <a href="iphone.php" class="list-group-item list-group-item-action bg-info" >iPhone</a>
        <a href="samsung.php" class="list-group-item list-group-item-action bg-info">Samsung</a>
        <a href="huawei.php" class="list-group-item list-group-item-action bg-info">Huawei</a>
        <a href="xiomi.php" class="list-group-item list-group-item-action bg-info">Xiomi</a>
        <a href="oneplus.php" class="list-group-item list-group-item-action bg-info">OnePlus</a>
  </div>
</div>


    <div class="btn-group dropright">
  <button type="button" class="list-group-item list-group-item-action bg-dark dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tablet
  </button>
  <div class="dropdown-menu bg-info">
        <a href="ipad.php" class="list-group-item list-group-item-action bg-info" >iPad</a>
        <a href="samsung_tab.php" class="list-group-item list-group-item-action bg-info">Samsung</a>
  </div>
</div>

    <div class="btn-group dropright">
  <button type="button" class="list-group-item list-group-item-action bg-dark dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    TV
  </button>
  <div class="dropdown-menu bg-info">
        <a href="sony.php" class="list-group-item list-group-item-action bg-info" >Sony</a>
        <a href="samsung_tv.php" class="list-group-item list-group-item-action bg-info">Samsung</a>
        <a href="lg.php" class="list-group-item list-group-item-action bg-info">Lg</a>
  </div>
</div>


    <div class="btn-group dropright">
  <button type="button" class="list-group-item list-group-item-action bg-dark dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Gaming
  </button>
  <div class="dropdown-menu bg-info">
        <a href="xbox.php" class="list-group-item list-group-item-action bg-info" >Xbox</a>
        <a href="ps4.php" class="list-group-item list-group-item-action bg-info">PS4</a>
  </div>
</div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-info border-bottom">
        <button class="btn" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        
      <li class="nav-item">
              <!-- Button trigger modal -->
<a href="" class="nav-link" data-toggle="modal" data-target="#exampleModal7">
  Cart
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table class="table table-bordered">
    <tr>
      <th>#</th>
     <th>Item Name</th>
     <th>Quantity</th>
     <th>Price</th>
     <th>Total</th>
     <th>Action</th>
    </tr>
   <?php
   if(isset($_COOKIE["shopping_cart"]))
   {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    $count = 0;
    foreach($cart_data as $keys => $values){
       $count++;
   ?>
    <tr>
      <form method="post">
    <td><?php echo $count ?></td>
     <td><?php echo $values["item_name"]; ?></td>
     <td><?php echo $values["item_quantity"]; ?></td>
     <td> <?php echo $values["item_price"]; ?> Tk.</td>
     <td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> Tk.</td>
     <td><a href="add_cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
    </tr>
   <?php 
     $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
   ?>
   <?php

       if($count == 0){
        echo 'No Items in Cart';

       }

       else{
        ?>
        <tr>
              <td colspan="4" align="right">Total</td>
     <td align="right">$ <?php echo number_format($total, 2); ?></td>
     <td> <?php
       
       if($_COOKIE["shopping_cart"]){
        ?>
        <a href="add_cart.php?action=clear&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove Al</span></a>
        <?php
       }

     ?> </td>
    </tr>
        <?php
       }

   ?>
      

    <?php
         
         if(isset($name)){
          ?>
        
      <?php

      if($count == 0){
        echo '';
      }

      else{
        ?>
      
      <tr>
      <td colspan="6" style="">
       <div class="radio">
  <label style="color: green;"><input type="radio" name="payment" value="cash on delivery" checked> Cash on delivery</label>
</div>
<?php 

    include_once("connection.php");
      $user = $_SESSION['user_name'];
    $fql = "SELECT card FROM signup WHERE username = '$user'";
    $hql = mysqli_query($conn,$fql);
    $count=mysqli_num_rows($hql);
    $record = mysqli_fetch_assoc($hql); 

   
   if($record['card'] == 0){
    echo 'No Card Added';
   }
   else{
    ?>
     <div class="radio">
  <label style="color: green;"><input type="radio" name="payment" value="<?php echo $record['card']; ?>"> Card</label>
</div>
    <?php
   }

?>
    
  </td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: center;">
      <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
      </td>
    </tr>
        <?php
      }

      ?>
          <?php
         }

    ?>
    
  </form>

   <?php
   }
   else
   {
    echo '
    <tr>
     <td colspan="5" align="center">No Items in Cart</td>
    </tr>
    ';
   }
   ?>
   </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
            </li>



            <?php
              if(isset($name)){
               ?>
                   <li class="nav-item">
              <a class="nav-link" href="profile.php"><?php echo $name; ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
               <?php
              }
              else{
                ?>
                 <li class="nav-item">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Signup</a>
            </li>
                <?php
              }

            ?>
           
          </ul>
        </div>
      </nav>

  <?php
include_once("connection.php");

 if(isset($_POST['checkout'])){
      
      $order_number = substr(number_format(time() * rand(),0,'',''),0,6);
      $user = $_SESSION['user_name'];
      $user_add = $_SESSION['address_data'];
      $user_phone = $_SESSION['user_phone'];
      $date = date('Y-m-d H:i:s');
      $payment = $_POST['payment'];
      $pro_data = json_decode($cookie_data, true);
       foreach($pro_data as $keys => $values){
         $item = $values['item_name'];
         $quantity = $values['item_quantity'];
         $price = $values['item_price'] * $quantity;

         $cql = "INSERT INTO order_history(order_number,username,item,quantity,price,address,phone,date_time,type,shipment,payment)VALUES('$order_number','$user','$item','$quantity','$price','$user_add','$user_phone',NOW(),0,0,'$payment')";

         $result = mysqli_query($conn,$cql);

         setcookie("shopping_cart", "", time() - 3600);
         header('Location: ' . $_SERVER['HTTP_REFERER']);

       }
        
        try{
 $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
 $paramArray = array(
 'userName' => "01629710423",
 'userPassword' => "pranto224466",
 'mobileNumber' => "$user_phone",
 'smsText' => "Your Order Placed Successfully.Your Order Number is $order_number ---BuyTech",
 'type' => "TEXT",
 'maskName' => '',
 'campaignName' => '',
 );
 
 $value = $soapClient->__call("OneToOne", array($paramArray));
 print_r($value->OneToOneResult);
} 
catch (Exception $e) {
 print_r($e->getMessage());
}

 
}

?>
   



<div class="container-fluid" style="margin-top: 1%;">
  <h1 style="text-align: center;">Lg</h1>
  <hr>
  <div class="card-deck">

    <?php
    include_once("connection.php");
      $rom="SELECT * FROM tv WHERE brand = 'Lg'";
      $rim = mysqli_query($conn,$rom);
      
      while ($res = mysqli_fetch_array($rim)) {
    
       ?>
         <div class="col-lg-3 col-md-6 col-12">
          <br>
       <div class="card" style="">
        <div class="hovereffect">
        <img class="card-img-top" style="height: 250px;" src="item/<?php echo $res['img_name'] ?>">
         <div class="overlay">
           <form method="post" action="add_cart.php">
       <input type="hidden" name="quantity" value="1" class="form-control" />
      <input type="hidden" name="hidden_name" value="<?php echo $res["name"]; ?>" />
      <input type="hidden" name="hidden_price" value="<?php echo $res["price"]; ?>" />
      <input type="hidden" name="hidden_id" value="<?php echo $res["id"]; ?>" />
           <button type="submit" name="add_to_cart" class="info">Add Cart</button>
           </form>
        </div>
    </div>
      <div class="card-body">

        <p><?php echo $res['name']; ?><span style="float: right; color: salmon;"><?php echo $res['price'].' Tk.'; ?></span></p> 
        <p>Stock: <span style="color: red;"><?php echo $res['stock']; ?> </span><span style="float: right;"><a style="float: right;" href="" class="" data-toggle="modal" data-target="#exampleModalCenter1<?php echo $res['id'];?>">
  View More
</a></span></p> 



        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1<?php echo $res['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $res['name'];?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php
       include_once("connection.php");
       $id = $res['id'];
      $rkm="SELECT * FROM laptop WHERE id = '$id'";
      $rtm = mysqli_query($conn,$rkm);
      
      while ($result = mysqli_fetch_array($rtm)) { 
        ?>
        <div style="text-align: center;">
        <img class="img-responsive" style="height: 150px;" src="item/<?php echo $res['img_name'] ?>">
        </div>
        <br>
        <p><span style="color: #00cc99;">Brand: </span> <?php echo $result['brand'];?></p>
        <p><span style="color: #00cc99;">Name: </span> <?php echo $result['name'];?></p>
        <p><span style="color: #00cc99;">Description: </span> <?php echo $result['des'];?></p>
        <?php
      }

       ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      

</div>
   



  </div>
  </div>

       <?php
     
}
  ?>

</div>



  </div>
    <!-- /#page-content-wrapper -->

      <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  </div>
</body>
</html>