<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>
	<?php 
	include('database.php');
	if($_GET['edit'] > 0){
		$_GET['edit'] = $_GET['edit'];
	}else{
		$_GET['edit'] = '';
	}
	$id =  $_GET['edit'];
	if($id > 0){
		$sql =  "SELECT * FROM vivenns WHERE id = $id";
		$exec= mysqli_query($conn,$sql);

		 
	      if(mysqli_num_rows($exec)>0){

	        $row= mysqli_fetch_row($exec);  
	            
	      }
	}else{
	         $row=['','',''];
	      }
	
       // print_r($row);exit;

	?>
	<form method="post" action="insert.php">
		<label>Username:</label>
		<input type="text" name="username" value="<?php echo $row[1]?>" ><br>
		<label>Password:</label>
		<input type="password" name="password" value=<?php echo $row[2] ?> ><br>
		 <input type="hidden" id="id" name="id" value=<?php if($id > 0){echo $id; }else{echo 0;}?> >

		<input type="submit" value="Login">
	</form>
</body>
</html>