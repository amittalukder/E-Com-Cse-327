<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Dash</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="css/signup.css" rel="stylesheet">
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
	<div class="card-deck">
  <div class="card">
    <img class="card-img-top pt-3" src="image/laptop.png" alt="Card image cap" height="200">
    <div class="card-body">
      <h3 style="text-align: center;"><a href="laptop.php">Laptop </a></h3>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top pt-3" src="image/phone.png" alt="Card image cap" height="200" style="width: 150px; margin:0 auto;">
    <div class="card-body">
      <h3 style="text-align: center;"><a href="phone.php">Phone </a></h3>
    </div>
  </div>
 <div class="card">
    <img class="card-img-top pt-3" src="image/tab.png" alt="Card image cap" height="200" style="width: 150px; margin:0 auto;">
    <div class="card-body">
      <h3 style="text-align: center;"><a href="tab.php">Tab </a></h3>
    </div>
  </div>
</div>
<br>
<div class="card-deck">
  <div class="card">
    <img class="card-img-top pt-3" src="image/tv.png" alt="Card image cap" height="200">
    <div class="card-body">
      <h3 style="text-align: center;"><a href="tv.php">TV </a></h3>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top pt-3" src="image/game.png" alt="Card image cap" height="200" style="width: 150px; margin:0 auto;">
    <div class="card-body">
      <h3 style="text-align: center;"><a href="game.php">Game </a></h3>
    </div>
  </div>
 <div class="card">
    <img class="card-img-top pt-3" src="image/logout.png" alt="Card image cap" height="200" style="width: 150px; margin:0 auto;">
    <div class="card-body">
      <h3 style="text-align: center;"> <a href="logout.php">Logout </a></h3>
    </div>
  </div>
</div>
<br>
<a href="adminpasswordchange.php" style="font-size: 18px;">Password Change</a>
<a href="order_history.php" style="font-size: 18px;">Order History</a>
</div>
</body>
</html>
