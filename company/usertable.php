

<?php 
include('database.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP CRUD Operations</title>
<style>
     table, td, th {  
      border: 1px solid #ddd;
      text-align: left;
    }
    
    table {
      border-collapse: collapse;
      max-width: 100%;
     width:90%;

    }
    .table-data{
      
      width:65%;
      float: right;
    }
    th, td {
      padding: 15px;
    }
body{
    overflow-x: hidden;
}

* {
  box-sizing: border-box;}
</style>
</head>
<body>

<?php

if(isset($_GET['delete'])){

    $deleteid= $_GET['delete'];
  delete_data($conn, $deleteid);

}

$fetchData= fetch_data($conn);

// fetch query
function fetch_data($conn){
  $query="SELECT * from vivenns ORDER BY id";
  $exec=mysqli_query($conn, $query);
  if(mysqli_num_rows($exec)>0){

    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}

// delete data query
function delete_data($conn, $id){
   
    $query="DELETE from vivenns WHERE id=$id";
    $exec= mysqli_query($conn,$query);

    if($exec){
      echo $msg="Data was deleted sucessfully";
    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($conn);    }
}

?>
<div class="table-data">
        <div class="list-title">
 <h2>CRUD List</h2>
          
            </div>

    <table border="1">

        <tr>

            <th>S.N</th>
            <th>username</th>
            <th>password</th>


        </tr>
        
<?php

        if(count($fetchData)>0){
        $sn=1;
        foreach($fetchData as $data){
            
?> <tr>
<td><?php echo $sn; ?></td>
<td><?php echo $data['username']; ?></td>
<td><?php echo $data['password']; ?></td>

<td><a href="form.php?edit=<?php echo $data['id']; ?>">Edit</a></td>
<td><a href="usertable.php?delete=<?php echo $data['id']; ?>">Delete</a></td>

</tr> <?php

      $sn++; }

      }else{
            
?>

      <tr>
        <td colspan="7">No Data Found</td>
      </tr>
                
<?php

    }
?>
 
    </table>
    </div>

</body>
</html>