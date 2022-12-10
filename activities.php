<?php 
session_start();
    require './config/reservation_class.php';
    require './config/conn.php';
    require 'lib/header.php';
    require 'lib/nav.php';
 ?>
        <!-- Navigation-->
        
        <!-- Header-->

<section class="pb-5" id="book" style="background-image: url('assets/img/bluelight.png');"> <center>  <BR><h2><b>RESORT ACTIVITIES</b></h2> </center>
     <div class="container-fluid px-md-5 px-lg-5 mt-5">
                
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-6 row-cols-xl-4 justify-content-center">
                     
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->                            
                                <img class="card-img-top" src="assets/img/Zipline.png" alt="..." />
                            <!-- Product details-->
                            <div class="card-body">
                            <span>ZIPLINE</span>
                            </div>
                           
                        </div>
                    </div>
                   
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->                            
                                <img class="card-img-top" src="assets/img/functional.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body">
                            <span>BIRTHDAY PARTY</span>
                            </div>
                           
                        </div>
                    </div>
               </div>
          </div>

      <div class="container-fluid px-md-5 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                     

                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->                            
                                <img class="card-img-top" src="assets/img/Climbing.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body">
                            <span>CLIMBING</span>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->                            
                                <img class="card-img-top" src="assets/img/Team Building.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body">
                            <span>TEAM BUILDING</span>
                           
                        </div>
                    </div>

                </div>
            </div>
     
        
        </section>


        <!-- Footer-->
       <?php require 'lib/footer.php'; ?>