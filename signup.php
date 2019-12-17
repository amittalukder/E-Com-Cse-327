<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
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
<div class="container">
    <div class="row">
        <div class="c1 col-md-5" style="margin: 5% auto;">
         <div class="im1">
          <img class="img-responsive" src="image/user.png">
           <h4>Sign Up</h4>
            </div>

            <form method="post" action="">
            <div class="form-group">
        <input type="text" id="name" name="firstname" class="form-control"  required>
        <label class="form-control-placeholder" for="name">Firstname</label>
      </div>

      <div class="form-group">
        <input type="text" id="lname" name="lastname" class="form-control" required>
        <label class="form-control-placeholder"  for="lname">Lastname</label>
      </div>

            <div class="form-group">
        <input type="text" id="uname" name="username" class="form-control" required >
        <label class="form-control-placeholder" for="uname">Username</label>
      </div>
  
      <div class="form-group">
        <input type="text" id="email" name="email" class="form-control" required >
        <label class="form-control-placeholder" for="email">Email</label>
      </div>
  
            <div class="form-group">
        <input type="password" id="password" name="password" class="form-control" required >
        <label class="form-control-placeholder" for="password">Password</label>
      </div>
      <div class="form-group">
        <input type="text" id="address" name="address" class="form-control" required >
        <label class="form-control-placeholder" for="address">Address</label>
      </div>
      <div class="form-group">
        <input type="number" id="phone" name="phone" class="form-control" required >
        <label class="form-control-placeholder" for="phone">Phone</label>
      </div>
      <div class="form-group">
        <input type="text" id="zipcode" name="zipcode" class="form-control" required >
        <label class="form-control-placeholder" for="zipcode">Zipcode</label>
      </div>

             <div class="bt">
                <button type="submit" name="submit" class="btn btn-success">Signup</button>  
             </div>
             </form>
       <h5 style="float: right; margin-top:15px;">Already registered? <a href="login.php">Login</a></h5>
            
             
        </div>
    </div>
</div>
<?php

include_once('connection.php');

if(isset($_POST['submit'])){

  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $zipcode = $_POST['zipcode'];

  $sql = "INSERT INTO signup(first_name,last_name,username,email,password,address,phone,zipcode,type) VALUES('$first_name','$last_name','$username','$email','$password','$address','$phone','$zipcode','public')";
  





  if(empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password) || empty($address) || empty($phone) || empty($zipcode))
  {
                echo"<script>swal({
                    title: 'Fill Up All Field',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                });</script>";
            }
           elseif(!$res = mysqli_query($conn,$sql)){
                echo"<script>swal({
                    title: 'Enter Another Username, Email Or Phone Number',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                });</script>";
            }
            else{
                $res = mysqli_query($conn,$sql);
               
              
                echo"<script>swal({
                    title: 'Your Information Added Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,
                });</script>";
            }


}



?>


</body>
</html>