<!DOCTYPE html>
<html lang="en">
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

</style>
</head>

<body>
    <?php

session_start();
   
    
    
    $username = $_SESSION['user_name'];
    $usertype = $_SESSION['user_type'];


 
    
    if($username == true && $usertype == 'admin'){
        
    }
    
  
    else{
        header("location: admin123xyz.php");
    }

    ?>
        
        <div class="container mt-5">
          <h1 style="text-align: center;">BuyTech</h1> 
          <p style="text-align: center;">Bashundhara Residential Area, <br> Dhaka,Bangladesh</p>

    <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      
    </tr>
  </thead>
  <tbody>



   
<?php

include_once("connection.php");
    if(isset($_GET['print'])){
         
         $count=0;
         $number = '';
         $username = '';
         $total = 0;
        $sql = "SELECT * FROM order_history WHERE order_number = '{$_GET['order_number']}' AND type = 1 AND shipment = 0";
        $rim = mysqli_query($conn,$sql);
    

        while ($res = mysqli_fetch_array($rim)) {
            $count++;
            $number = $res['order_number'];
            $username = $res['username'];
            $total +=$res['price'];
            ?>

            <tr>
      <th><?php echo $count;?></th>
      <td><?php echo $res['item'];?></td>
      <td><?php echo $res['quantity'];?></td>
      <td><?php echo $res['price'];?></td>
     

     
      <?php

        }
         
        ?>
        </tr>
    <p>Order Number: <?php echo $number; ?></p>
    <p>Username: <?php echo $username; ?></p>
     
   <?php

     $uql = "SELECT * FROM signup WHERE username = '$username'";
     $ures = mysqli_query($conn,$uql);
     while ($result = mysqli_fetch_array($ures)) {

        ?>
          <p>First Name : <?php echo $result['first_name'];?></p>
          <p>Last Name : <?php echo $result['last_name'];?></p>
          <p>Email : <?php echo $result['email'];?></p>
          <p>Address : <?php echo $result['address'];?></p>
          <p>Phone : <?php echo $result['phone'];?></p>
          <br>
          <h5>Order History</h5>
          <br>
        <?php
}

    ?>

  </tbody>
</table>
 <h5 style="text-align: center;">Total Price: <?php echo $total;?></h5>
 <br>
 <div style="text-align: center;">
         <a id="printPageButton" class="btn btn-primary btn-sm"  href="order_update.php?shipment=1&order_number=<?php echo $number; ?>" onclick="window.print()" >Print</a>
         <br>
         <a id="printPageButton" style="color: salmon;" href="order_history.php" >Back</a>
         </div>
        <?php
    }

?>
   
    
        </div>
        <style type="text/css">
            @media print {
  #printPageButton {
    display: none;
  }
}
        </style>
        


</body>
</html>








