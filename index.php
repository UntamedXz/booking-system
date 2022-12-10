<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require 'lib/header.php';
require 'lib/nav.php';
?>

<style>
    .book_now {
        background-color: #38a0a6 !important;
        border: 1px solid #38a0a6 !important;
    }

    .book_now:hover {
        background-color: #1c465a !important;
        border: 1px solid #1c465a !important;
    }
</style>

<!-- Navigation-->
<div class="page-holder bg-cover" style="background-image: url('assets/img/bluelight.png');">
<header class="bg-dark">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="width: 100%; height: auto; object-fit: cover;">
                    <img src="assets/img/15.jpg" style="width: 100%; height: 100%; object-fit: cover;" alt="assets/img/rgpresortbg.jpg">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="font-weight: bold; font-style:  font-size: 70px; text-align: center; margin-top: 0; margin-bottom: 20px;  text-shadow: 3px 3px black;">Book Your Stay With Us!</h1>
                    <h5 style="rousel-caption">
                    <h7 style="font-weight: normal; font-style:  font-size: 0px; text-shadow: 2px 2px black;">Comfort and Safety Assured!</h7>
                    
                    <br><br>
                    <a href="reservation.php" class="btn btn-dark text-white book_now" ><b>BOOK NOW</b></a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid mt-3">
    <div class="text-center d-block d-md-none" style="color: transparent !important;">
        <h1 style="font-weight: bold; font-style:  font-size: 70px; text-align: center; margin-top: 0; margin-bottom: 20px; color: #000; ">Book Your Stay With Us!</h1>
        <h5 style="rousel-caption">
        <h7 style="font-weight: normal; font-style:  font-size: 0px; color: #000;">Comfort and Safety Assured!</h7>
        
        <br><br>
        <a href="reservation.php" class="btn btn-dark text-white book_now" ><b>BOOK NOW</b></a>
    </div>
</div>

<section class="mt-3 py-2" style="background-image: url('assets/img/bluelight.png');">
    <div class="container-fluid">
        <div class="col-md-12 col-lg-12 mb-5">
            <div class="card">
                <div class="card-header text-center bg-dark text-white" style="background-color: #1c465a !important;">
                    <h1 style="font-style: Yu Gothic Light; "><b>STRIKE RGP RESORT</b></h1>
                </div>
                    <div class="card-body">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-6 col-lg-6 mb-2 col-sm-6 col-xs-6">
                                 <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                      <div class="carousel-inner">
                                        <div class="carousel-item active">
                                          <img src="assets/img/ROOM.jpg" class="d-block w-100" alt="assets/img/ROOM.jpg">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="assets/img/ROOMS.jpg" class="d-block w-100" alt="assets/img/ROOMS.jpg">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="assets/img/ROOOM.jpg" class="d-block w-100" alt="assets/img/ROOOM.jpg">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 mb-2 col-sm-6 col-xs-6">
                                <h1 style="font-style: Arial;" class="text-center mb-5">Standard Rooms</h1>
                                
                                    <h3 style="font-family: Yu Gothic Light;" class="mb-5">Celebrate your Special Occasion with us!</h3>
                                    
                                    
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Minimum of 4 Below</h5>
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Free TV</h5>
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Charging Station</h5> 
                            </div>
                            <div class="col-md-6 col-lg-6 mb-2 col-sm-6 col-xs-6">
                               <h1 style="font-style: Arial; opacity: 0.9;" class="text-center">Cottages</h1>
                               <br>
                                    <h3 style="font-family: Yu Gothic Light; class="mb-5">Celebrate your Special Occasion with us!</h3>
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Charging Station</h5>
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Max Capacity 4 and Above</h5>
                                    <br>
                                     <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Lutuan</h5>
                                    
                            </div>
                            <div class="col-md-6 col-lg-6 mb-2 col-sm-6 col-xs-6">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                      <div class="carousel-inner">
                                        <div class="carousel-item active">
                                          <img src="assets/img/hahaaa.jpg" class="d-block w-100" alt="assets/img/hahaaa.jpg">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="assets/img/hak.jpg" class="d-block w-100" alt="assets/img/hak.jpg">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="assets/img/3000.jpg" class="d-block w-100" alt="assets/img/3000.jpg">
                                      </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6 col-lg-6 mb-2 col-sm-6 col-xs-6">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                      <div class="carousel-inner">
                                        <div class="carousel-item active">
                                          <img src="assets/img/Pic13.jpg" class="d-block w-100" alt="assets/img/Pic13.jpg">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="assets/img/Zipline.png" class="d-block w-100" alt="assets/img/Zipline.png">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="assets/img/functional.jpg" class="d-block w-100" alt="assets/img/functional.jpg">
                                      </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6 col-lg-6 mb-2 col-sm-6 col-xs-6">
                               <h1 style="font-style: opacity: 0.9;" class="text-center">Events</h1>
                                    <h3 style="font-family: Yu Gothic Light; class="mb-5"> Celebrate your Special Occasion with us!</h3>
                                   
                                   <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Team Building</h5>
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Zipline etc.</h5>
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Meeting Center</h5>
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Birthday Party</h5> 
                                    <br>
                                    <h5><i class="bi bi-check-circle text-warning"></i>&nbsp;Conference Center</h5> 
                            </div>
                          </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Header-->
</div>

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "112876601648947");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
    FB.init({
        xfbml            : true,
        version          : 'v15.0'
    });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Footer-->
<?php require 'lib/footer.php'; ?>