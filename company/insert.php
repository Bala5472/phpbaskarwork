<?php

include('database.php');
print_r($_POST);
if(!empty($_POST)){
   
     echo  $msg=insert_data($conn);
      
}

// insert query
function insert_data($conn){
   
      $username= legal_input($_POST['username']);
      $password= legal_input($_POST['password']);
      if($_POST['id'] > 0){
        $id = $_POST['id'];
        $query="UPDATE vivenns SET username = '$username',password= '$password' WHERE id = $id ";
        $exec= mysqli_query($conn,$query);
        if($exec){

          $msg="Data was updated sucessfully";
          header("Location:usertable.php");
          die();
          return $msg;
        
        }else{
          $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
        }
      }else{
        $query="INSERT INTO vivenns (username,password) VALUES ('$username','$password')";
        $exec= mysqli_query($conn,$query);
        if($exec){

          $msg="Data was created sucessfully";
          header("Location:usertable.php");
          die();
          return $msg;
        
        }else{
          $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
        }
      }
      
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>