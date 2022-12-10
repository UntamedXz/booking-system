<?php
	
	if(isset($_POST['edit_category'])){

		$conn = new class_model();

		$category_id = trim(stripcslashes($_POST['category_id']));
		$name = trim(stripcslashes($_POST['name']));
		$slug = trim(stripcslashes($_POST['slug']));

		$add = $conn->edit_category($name,$slug,$category_id);
		if($add == true){
			echo '<script>alert("Category edit Successfully")</script><script>setTimeout(function() {  location.replace("../admin/view-category.php"); }, 1000); </script>';
		}else{
			echo '<script>alert("Category Update Failed!")</script><script>setTimeout(function() {  location.replace("../admin/view-category.php"); }, 1000); </script>';
		}
	}

 ?>