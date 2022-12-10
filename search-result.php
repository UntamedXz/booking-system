<?php 
require './config/reservation_class.php';
require './config/conn.php';
  require 'lib/header.php';
  require 'lib/nav.php';
require_once 'config/conn1.php';
 ?>

 <section class="py-5">
        <div class="container-fluid px-md-5 px-lg-5 mt-5">
            <div class="card">
                <div class="card-header bg-warning text-center">
                    <h4>Make Your Reservation</h4>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_POST['search'])){

                            $start = $_POST['start'];
                            $end = $_POST['end'];
                            $person = $_POST['number_p'];
                            $room_type = $_POST['room_type'];

                            $sql = "SELECT * FROM tbl_reservation WHERE  date_accomodation = '$start' AND check_out = '$end' AND number_p = '$person'  ";
                            $query = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($query)>0)
                            {
                                 ?>
                                 <div class="alert alert-danger">The Date you seleceted is Already Booked</div>
                                 <?php
                            }
                            else
                            {
                               $sql1 = "SELECT *, tbl_room.name as name, tbl_room.price as price FROM tbl_room LEFT JOIN room_category ON room_category.id = tbl_room.category_id LEFT JOIN tbl_reservation tr ON tr.room_id = tbl_room.id WHERE room_category.name = '$room_type' AND tbl_room.person = '$person' ";
                               $query1 = mysqli_query($conn, $sql1);
                               if(mysqli_num_rows($query1) > 0)
                               {
                                // $sql2 = "SELECT *, tbl_room.id as room_id FROM tbl_room ";
                                // $QUERY = mysqli_query($conn, $sql2);
                                // if(mysqli_num_rows($QUERY) > 0)
                                // {
                                    foreach($query1 as $row)
                                    {
                                        ?>
                                          <div class="col-md-12">
                                              <div class="row">
                                                  <div class="col-md-4 mb-4">
                                                      <div class="card">
                                                          <div class="card-header">
                                                              <h4><?= $row['name'] ?></h4>
                                                          </div>
                                                          <div class="card-body">
                                                            <a href="view-room.php?id=<?= $row['room_id']; ?>">
                                                                <img class="card-img-top" src="admin/room_image/<?= $row['image'] ?>" alt="..." />
                                                            </a>
                                                              <label>Price <?= $row['price'] ?></label>
                                                          </div>
                                                          <div class="card-footer text-center">
                                                               <?php 
                                                                if(isset($_SESSION['user_id'])){
                                                                    ?>
                                                                    <a class="btn btn-success mt-auto" href="book-room.php?roomid=<?= $row['id'] ?>">Book this Room</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      <?php
                                  /*}*/
                              }
                          }else{
                                ?>
                                <div class="alert alert-danger">It Seems, that The Room Doesn't Exist or Room cannot be Found!</div>
                                <?php
                              }

                      }

                  }
                  ?>
                </div>
            </div>
        </div>
 </section>           


 <?php require 'lib/footer.php'; ?>
 