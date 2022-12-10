<style>
    .padding {
        height: 50px;
        width: 100%;
    }

    @media (min-width: 768px) {
        .padding {
            height: 100px;
        }
    }

    .text_logo {
        font-size: 21px;
    }

    @media (min-width: 768px) {
        .text_logo {
            font-size: 28px;
        }
    }

    body {
        background-image: url('assets/img/bluelight.png') !important;
    }
</style>


<nav  class="navbar navbar-light navbar-expand-xxl navbar-dark fw-bold bg-dark text-white fixed-top" style="background-color: #1c465a !important;">
            <div class="container-fluid px-4 px-lg-5 d-flex justify-content-between align-items-center">
                <!-- <a class="navbar-brand text-white fs-3 " href="index.php">
                    <img class="logo d-sm-flex" style="display: none; width: 70px; position: fixed;  top: 1px;" src="assets/img/logodaw.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>STRIKE RESORT </b>
                </a> -->

                <a href="index.php" class="navbar-brand d-flex justify-content-between align-items-center h-100">
                    <img src="./assets/img/logodaw.png" alt="" style="height: 80px; display: none;" class="d-md-flex">
                    <h2 style="color: #fff; font-weight: 700;" class="text_logo">STRIKE RGP RESORT</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon text-light"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0  d-flex align-items-center justify-content-center">
                        <li class="nav-item text-white"><a class="nav-link active text-white" aria-current="page" href="index.php" style="text-transform: uppercase;">&nbsp; &nbsp;Home</a></li>
                        <li class="nav-item text-white"><a class="nav-link active text-white" aria-current="page" href="gallery.php" style="text-transform: uppercase;">&nbsp; &nbsp;Gallery</a></li>
                        <li>
                        <li class="nav-item text-white"><a class="nav-link active text-white" aria-current="page" href="activities.php" style="text-transform: uppercase;">&nbsp; &nbsp;Extra Activities</a></li>
                        <li>
                       
                          <a class="nav-link text-white fw-bold" href="reservation.php" style="text-transform: uppercase;">&nbsp; &nbsp;Room and Cottages</a>
                        
                        </li>
                        <?php if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') : ?>
                         <li class="nav-item text-white">
                            <button class="btn nav-item text-white fw-bold" onclick="location.href='login.php';" style="text-transform: uppercase;"><i class="bi bi-person-circle"></i>&nbsp;Log in</button>
                        
                        </li>
                      <!--  <li class="nav-item">
                            <button class="btn nav-item text-white fw-bold" aria-current="page" data-bs-toggle="modal" data-bs-target="#registerModal" aria-current="page">Register</button>
                        </li>-->
                        <?php endif; ?>
                         &nbsp;&nbsp;
                         <?php if(isset($_SESSION['user_id']) && isset($_SESSION['role_user'])) : ?>
                        <?php 
                        $user_id = $_SESSION['user_id'];
                        $conn = new class_model();
                        $user = $conn->user_account($user_id);
                        echo '<li class="nav-item dropdown">
                            <a style="text-decoration: none; cursor: pointer; background-color: #38a0a6 !important; border: 1px solid #38a0a6 !important;" class="nav-item text-white fw-bold btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Welcome,&nbsp;'.ucwords($user['name']).'</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view-bookings.php">My Booking</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>';
                        // echo ' <li class="nav-item text-white">
                        //     <a href="logout.php" class="btn nav-item text-white fw-bold">Logout</a>
                        // </li>'; 
                        ?>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav> 

<div class="padding">
</div>