<?php 
	
	require_once 'config/conn.php';

	$day_id = $_POST['day_id'];

	 $id = $_POST['id'];
	  $sql = "SELECT * FROM tbl_payment_type WHERE type_id= $id ";
	  $result = mysqli_query($conn,$sql);
	 
	  $out='';
	  while($row = mysqli_fetch_assoc($result)) 
	  {   
	     $out .=  '<option>'.$row['price'].'</option>'; 
	  }
	   echo $out;
	

 ?>