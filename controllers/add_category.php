<?php
	
	if(isset($_POST['add_category'])){

		$conn = new class_model();

		$name = trim(stripcslashes($_POST['name']));
		$slug = trim(stripcslashes($_POST['slug']));

		$add = $conn->add_category($name,$slug);
		if($add == true){
			echo '<script>localStorage.setItem("status", "added");
			location.replace("category.php");
			</script>';
		}else{
			echo '<script>swal("Failed!", "Something went wrong!", "error");</script>';
		}
	}

 ?>