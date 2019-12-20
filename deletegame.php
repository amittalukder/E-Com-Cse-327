
<?php
include_once("connection.php");
     session_start();
   
    
       
    $username = $_SESSION['user_name'];
    $usertype = $_SESSION['user_type'];


 
    
    if($username == true && $usertype == true){
        
    }
    
  
    else{
        header("location: admin123xyz.php");
    }

    if(isset($_GET['delete'])){
      $sql= "DELETE FROM game WHERE id='{$_GET['id']}'"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('location: game.php');
        }
    }
?>