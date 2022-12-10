<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require 'lib/header.php';
require 'lib/nav.php';
?>

<section class="py-3 mb-5">
	<div class="container">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4>My Inquiries</h4>
				</div>
				<div class="card-body">
					<?php
						$user_id = $_SESSION['user_id'];
						$conn = new class_model();
						$inquired = $conn->fetchIdinquireByUsers($user_id);
						?>
					<div class="table-responsive">
						<table id="mytable" class="table table-sm table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Message</th>
									<th>Subject</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="table-group-divider">
								<?php
								if(!empty($inquired)){ 
									foreach ($inquired as $row){ 
										?>  
										<tr>
											<td><?= $row['id'] ?></td>
											<td><?= $row['message'] ?></td>
											<td><?= $row['subject'] ?></td>
											<td>
												<?php 
												if($row['read_reply'] == 1)
												{
													?>
													<span class="badge bg-success">Read</span>
													<?php
												 }else
												 {
												 	?>
													<span class="badge bg-info">Unread</span>
													<?php
												 } 
												?>
											</td>
											<td>
												<a class="btn btn-info btn-sm" href="view-reply.php?id=<?= $_SESSION['user_id']; ?>"><i class="bi bi-eye text-white"></i></a>
												<button class="btn btn-danger btn-sm delete_D" data-del="<?= htmlentities($row['id']); ?>"><i class="bi bi-trash"></i></button>
											</td>
										</tr>
										<?php
									} 
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include 'lib/script.php'; ?>
<script>
   $(document).ready(function() {   
   load_data();    
   var count = 1; 
   function load_data() {
     $(document).on('click', '.delete_D', function() {
      var inquire_id = $(this).data("del");
      console.log(inquire_id);
      get_delId(inquire_id); //argument    
      });
   }

   function get_delId(inquire_id) {
    $.ajax({
      type: 'POST',
      url: 'admin/fetch_row/delete.php',
      data: {
       inquire_id:inquire_id
      },
      success: function (result){
        swal({
        title: "Are you sure to delete this Inquiries?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((get_delId) => {
        if (get_delId) {
          location.reload();
        }
      });
      }
    });
  }

});
 </script>