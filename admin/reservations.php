<?php 
include '../config/conn.php';
include './head.php';
include('includes/fetch.php');
?>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                          <div class="row">
                          <div class="col-md-12">
                            <div class="card my-4">
                              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-dark shadow- border-radius-lg pt-4 pb-3">
                                  <h4 class="text-dark text-uppercase ps-3 text-left">Reservations Today</h4>
                                </div>
                              </div>
                              <div class="card-body">
                                <?php 
                                    $date = date('Y-m-d');
                                    // $conn = new class_model();
                                    // $booked = $conn->fetchBooked($date);
                                    ?>
                                <div class="table-responsive">
                                  <table id="tableData" class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th class="text-dark text-md opacity-10 ps-2">No.</th>
                                        <th class="text-dark text-md opacity-10">Name</th>
                                        <th class="text-dark text-md opacity-10">Room</th>
                                        <th class="text-dark text-md opacity-10 ps-2">Appointment Date</th>
                                        <th class="text-dark text-md opacity-10 ps-2">Status</th>
                                        <th class="text-dark text-center ">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $get_reservation_today = mysqli_query($con, "SELECT *, re.room_type_id AS day, re.id AS room_id, u.name as user, room.name as room_name, u.name as user_name  FROM tbl_reservation re LEFT JOIN tbl_user u ON u.user_id = re.user_id LEFT JOIN tbl_room room ON room.id = re.room_id LEFT JOIN room_category cat ON cat.id = room.category_id WHERE re.booked_datetime LIKE '%$date%' AND re.status = 'PENDING'");

                                      if(mysqli_num_rows($get_reservation_today) != 0){ 
                                        foreach ($get_reservation_today as $row){ 
                                          ?>  
                                      <tr>
                                        <td><?= $row['room_id']; ?></td>
                                        <td><?= $row['user_name'] ?></td>
                                        <td><?= $row['room_name'] ?></td>
                                        <td><?= date('M-d-y', strtotime($row['date_accomodation'])); ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td style="text-align: center;">
                                          <a href="view-client.php?reservationID=<?= $row['room_id'] ?>"class="btn btn-success btn-sm">View</a>
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
                        </div>

                        <div id="styleSelector">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#tableData').DataTable();  
  })
</script>
<?php
include './bottom.php'
?>

