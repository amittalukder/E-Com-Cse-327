<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="css/signup.css" rel="stylesheet">

<body>
 
<div class="container">
    <div class="row">
        <div class="c1 col-md-5" style="margin: 10% auto;">
         <div class="im1">
          <img class="img-responsive" src="image/account-login.png">
           <h4>Login</h4>
            </div>
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
                <button type="submit" name="sub" class="btn btn-success">Login</button>  
             </div>
             </form>
             <h5 style="float: right; margin-top:15px;">New to our site? <a href="signup.php">Signup</a></h5>
            
             
        </div>
    </div>
</div>

<?php
        include_once("connection.php");
        
        session_start();
        
        if(isset($_POST['sub'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
           
            
            $sql = "SELECT id,username,password,type,address,phone,card FROM signup
                           WHERE username='$user'";
            
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $record = mysqli_fetch_assoc($res); 
            $hash = $record['password'];
            if(password_verify($pass, $hash)){
                $_SESSION['user_name']=$record['username'];
                $_SESSION['user_id']=$record['id'];
                $_SESSION['user_type']=$record['type'];
                $_SESSION['address_data']=$record['address'];
                $_SESSION['user_phone']=$record['phone'];
            header('location: public.php');
            }
            
            else{
               echo"<script>swal({
                    title: 'Username or Password is Incorrect',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                });</script>";
            }
            
        }
        
        
        
        
        ?>
   

</body>
</html>