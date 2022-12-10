<?php
session_start();
require './config/reservation_class.php';
require './config/conn.php';
    require 'lib/header.php';
    require 'lib/nav.php';
 ?>
        <!-- Navigation-->
        
        <!-- Header-->

                <div class="card">
                    <div class="card-header text-center bg-info mt-2">
                    <h2><b>MAKE YOUR RESERVATION</b></h2>
                    </div>
                    
                </div>

        <section class="pb-5" id="book" style="background-image: url('assets/img/bluelight.png');">
            <div class="container-fluid px-md-5 px-lg-5 mt-5">
                <?php 
                $conn = new class_model();
                $rooms = $conn->fetchRooms();
                ?> 
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                     <?php
                if(!empty($rooms)){ 
                foreach ($rooms as $row){
                ?>   
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="view-room.php?id=<?= $row['room_id']; ?>">
                                <img class="card-img-top" src="admin/room_image/<?= $row['image'] ?>" alt="..." />
                            </a>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $row['room_name'] ?></h5>
                                    Price: ₱ <?= number_format($row['morning_price']); ?>
                                </div>
                                <p style="font-style: italic; text-align: center;"><?= $row['description'] ?></p>
                                <p class="text-center">Good For: <?= $row['person'] ?></p>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer">
                                <div class="text-center">
                                    <?php 
                                        if($row['availability'] <= 0)
                                        {
                                            ?>
                                            <button class="btn bg-danger btn disabled text-white">Fully Booked!</button>
                                            <?php
                                        }else
                                        {
                                            ?>
                                            <?php 
                                                if(isset($_SESSION['user_id']))
                                                {
                                                    ?>
                                                    <a class="btn btn-dark mt-auto" href="book-room.php?roomid=<?= $row['id'] ?>">Book Now</a>
                                                    <?php
                                                }else
                                                {
                                                    ?>
                                                    <a class="btn btn-outline-danger mt-auto" onclick="location.href='login.php';">Login To Continue</a>
                                                    <?php
                                                }
                                             ?>
                                            <?php
                                        }
                                     ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                      } 
                    }else
                    {
                        ?>
                        <h6 class="fw-bolder">No Available Rooms and Cottage</h6>
                        <?php
                    }
                  ?>            
                </div>
            </div>
        </section>

       
<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate() + 1;
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#date_accomodation').attr('min', maxDate);
    $('#end_accomodation').attr('min', maxDate);
});
</script>


        <!-- Footer-->
       <?php require 'lib/footer.php'; ?>