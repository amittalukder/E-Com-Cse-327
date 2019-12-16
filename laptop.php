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

<div class="container mt-3">

  <!-- Button trigger modal -->
  <div style="text-align: center;">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Add Laptop
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Laptop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="" enctype="multipart/form-data"> 
       <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Brand</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" name="brand">
    <option selected>Choose...</option>
    <option value="Apple">Apple</option>
    <option value="Assus">Assus</option>
    <option value="Accer">Accer</option>
    <option value="Hp">Hp</option>
    <option value="Dell">Dell</option>
    <option value="Lenevo">Lenevo</option>
  </select>
</div>
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
  </div>
  <input type="text" name="name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
  </div>
  <input type="text" name="des" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Stock</span>
  </div>
  <input type="text" name="stock" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
  </div>
  <input type="text" name="price" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
</div>
    <img src="" id="image" style="display:none;" height="150" width="100">
    <label>Insert Your Image</label>
    <input name="img" onchange="showImage.call(this)" type="file" required>
<div style="text-align: center;">
<button class="btn btn-primary" type="submit" name="submit">Add</button>
</div>
    </form>
    <?php
        include_once("connection.php");
        
     
        
        if(isset($_POST['submit'])){
        
        $brand = $_POST['brand'];    
        $name = $_POST['name'];
        $des = $_POST['des'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $imagePath = "item/";
        $uniquesavename=time().uniqid(rand()) . '.jpg';
        $destFile = $imagePath . $uniquesavename;
        $filename = $_FILES["img"]["tmp_name"];
        list($width, $height) = getimagesize( $filename);       
        move_uploaded_file($filename,  $destFile);
   
            $sql = "INSERT INTO laptop(brand,name,des,stock,price,img_name)
                                VALUES('$brand','$name','$des','$stock','$price','$uniquesavename')";
         

                $res = mysqli_query($conn,$sql);              
                echo"<script>swal({
                    title: 'Laptop Added Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,
                });</script>";
            
        }
      
        ?>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<h3>Edit</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
  Apple
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apple</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
     <?php
      include_once("connection.php");
      $count = 0;
      $rom="SELECT * FROM laptop WHERE brand='Apple'";
      $rim = mysqli_query($conn,$rom);
      
      while ($res = mysqli_fetch_array($rim)) {
      $count++;
      ?>
     
  
  
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $res['name']; ?></td>
      <td><a href="editlaptop.php?view=1&id=<?php echo $res['id']; ?>">Edit</a></td>
    </tr>
  
      <?php
        
      }
     
    ?>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
  Assus
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
     <?php
      include_once("connection.php");
      $count = 0;
      $rom="SELECT * FROM laptop WHERE brand='Assus'";
      $rim = mysqli_query($conn,$rom);
     
      while ($res = mysqli_fetch_array($rim)) {
      $count++;
      ?>
     
  
  
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $res['name']; ?></td>
       <td><a href="editlaptop.php?view=1&id=<?php echo $res['id']; ?>">Edit</a></td>
    </tr>
  
      <?php
        
      }
     
  
    ?>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
  Accer
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Accer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
     <?php
      include_once("connection.php");
      $count = 0;
      $rom="SELECT * FROM laptop WHERE brand='Accer'";
      $rim = mysqli_query($conn,$rom);
      
      while ($res = mysqli_fetch_array($rim)) {
      $count++;
      ?>
     
  
  
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $res['name']; ?></td>
      <td><a href="editlaptop.php?view=1&id=<?php echo $res['id']; ?>">Edit</a></td>
    </tr>
  
      <?php
        
      }
     
    ?>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
  Hp
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
     <?php
      include_once("connection.php");
      $count = 0;
      $rom="SELECT * FROM laptop WHERE brand='Hp'";
      $rim = mysqli_query($conn,$rom);
      
      while ($res = mysqli_fetch_array($rim)) {
      $count++;
      ?>
     
  
  
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $res['name']; ?></td>
      <td><a href="editlaptop.php?view=1&id=<?php echo $res['id']; ?>">Edit</a></td>
    </tr>
  
      <?php
        
      }
     
    ?>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5">
  Dell
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dell</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
     <?php
      include_once("connection.php");
      $count = 0;
      $rom="SELECT * FROM laptop WHERE brand='Dell'";
      $rim = mysqli_query($conn,$rom);
      
      while ($res = mysqli_fetch_array($rim)) {
      $count++;
      ?>
     
  
  
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $res['name']; ?></td>
       <td><a href="editlaptop.php?view=1&id=<?php echo $res['id']; ?>">Edit</a></td>
    </tr>
  
      <?php
        
      }
     
    ?>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal6">
  Lenevo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lenevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
     <?php
      include_once("connection.php");
      $count = 0;
      $rom="SELECT * FROM laptop WHERE brand='Lenevo'";
      $rim = mysqli_query($conn,$rom);
      
      while ($res = mysqli_fetch_array($rim)) {
      $count++;
      ?>
     
  
  
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $res['name']; ?></td>
       <td><a href="editlaptop.php?view=1&id=<?php echo $res['id']; ?>">Edit</a></td>
    </tr>
  
      <?php
        
      }
     
    ?>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<br>
<hr>
<a href="admindash.php" style="text-align: center; font-size: 25px; font-weight: bolder;">Back To Home</a>
</div>

   <script type="text/javascript">
    
    function showImage(){
        if(this.files && this.files[0]){
            var obj = new FileReader();
            obj.onload = function(data){
                var image = document.getElementById("image");
                image.src = data.target.result;
                image.style.display = "block";
            }
            
            obj.readAsDataURL(this.files[0]);
        }
    }
    
    </script>
</body>
</html>
