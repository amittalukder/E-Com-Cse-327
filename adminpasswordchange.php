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


 
    
    if($username == true && $usertype == true){
        
    }
    
  
    else{
        header("location: admin123xyz.php");
    }

?>

<div class="container mt-5">
    <div class="row">
        <div class="c1 col-md-5" style="margin: 10% auto;">
           <h4 style="text-align: center;">Password Change</h4>
            <form method="post" action="">
            <div class="form-group">
        <input type="text" name="username" id="username" class="form-control" required>
        <label class="form-control-placeholder" for="username">Userame</label>
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control" required>
        <label class="form-control-placeholder" for="password">Password</label>
      </div>
             <div class="bt">
                <button type="submit" name="sub" class="btn btn-success">Update</button>  
             </div>
             </form>
             <a href="admindash.php" style="float: right;">Back To Home</a>
        </div>
    </div>
</div>
<?php
        include_once("connection.php");
        
        
        if(isset($_POST['sub'])){
            $user = $_POST['username'];
            $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $userid = $_SESSION['user_id'];
            
            $sql = "Update admin SET username='$user',password='$pass' WHERE id='$userid'";
            
            $res = mysqli_query($conn,$sql);
            echo"<script>swal({
                    title: 'Username or Password Changed Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,
                });</script>";
    
            
        }
        
        
        
        
        ?>

</div>
</body>
</html>
