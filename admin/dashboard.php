<?php 
include './head.php';
include '../config/conn.php';
include('includes/fetch.php');
?>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body pt-4">
                          <div class="row d-flex">
                            <div class="col-md-12 col-lg-4 mb-4">
                                <div class="card h-100 d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-block text-center">
                                      <?php
                                      $get_room = mysqli_query($con, "SELECT COUNT(id) FROM tbl_room GROUP BY `name`");
                                      $fetch_room = mysqli_num_rows($get_room);
                                      ?>
                                        <i class="fa-solid fa-people-roof text-c-blue d-block f-40"></i>
                                        <h4 class="m-t-20"><span class="text-c-blue"><?php echo $fetch_room; ?></span> ALL ROOMS</h4>
                                        <button class="btn btn-primary btn-sm btn-round" onclick="location.replace('add-room.php');">VIEW</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100 d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-block text-center">
                                        <?php
                                        $date = date('Y-m-d');
                                        $get_reservation = mysqli_query($con, "SELECT * FROM tbl_reservation WHERE status = 'PENDING' and DATE(booked_datetime) = '$date'");
                                        $fetch_reservation = mysqli_num_rows($get_reservation);
                                        ?>
                                        <i class="fa-solid fa-landmark text-c-green d-block f-40"></i>
                                        <h4 class="m-t-20"><span class="text-c-blgreenue"><?php echo $fetch_reservation; ?></span> RESERVATION</h4>
                                        <button class="btn btn-success btn-sm btn-round" onclick="location.replace('reservations.php');">VIEW</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100 d-flex flex-column justify-content-center align-items-center">
                                    <div class="card-block text-center">
                                        <?php
                                        $date = date('Y-m-d');
                                        $get_income_today = mysqli_query($con, "SELECT SUM(total) as Total FROM tbl_reservation WHERE DATE(paid_date) = '$date'");
                                        $fetch_income_today = mysqli_fetch_array($get_income_today);
                                        ?>
                                        <i class="fa-solid fa-money-bill-wave text-c-pink d-block f-40"></i>
                                        <h4 class="m-t-20"><span class="text-c-blgreenue"><?= $fetch_income_today['Total'] ?></span> INCOME REPORT TODAY</h4>
                                        <button onclick="location.replace('income-report.php');" class="btn btn-danger btn-sm btn-round">VIEW</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="card p-3">
                                    <canvas class="h-100 w-100" id="myChart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3">
                                    <canvas class="h-100 w-100" id="myChart2"></canvas>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
</script>

<script>
    <?php 
    $get_income = mysqli_query($con, "SELECT DATE(paid_date) as Date, SUM(total) as Total FROM tbl_reservation WHERE paid_date != '0000-00-00 00:00:00' GROUP BY Date");

    $date = array();
    $label = array();

    foreach($get_income as $row) {
        $date[] = $row['Date'];
        $label[] = $row['Total'];
    }

    $get_room = mysqli_query($con, "SELECT tbl_room.name, COUNT(tbl_reservation.room_id) as count
    FROM tbl_reservation
    LEFT JOIN tbl_room
    ON tbl_reservation.room_id = tbl_room.id
    WHERE tbl_reservation.status = 'PAID'
    GROUP BY tbl_reservation.room_id
    LIMIT 5");

    $name = array();
    $count = array();

    foreach($get_room as $row1) {
        $name[] = $row1['name'];
        $count[] = $row1['count'];
    }
    ?>

    const data = {
        labels: <?php echo json_encode($date); ?>,
        datasets: [{
            label: 'Daily Income',
            data: <?php echo json_encode($label)?>,
            backgroundColor: [
                '#38a0a6'
            ],
            borderColor: [
                '#1c465a'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'line',
        data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // render init block
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const data1 = {
        labels: <?php echo json_encode($name); ?>,
        datasets: [{
            label: 'Most Booked Room(s)',
            data: <?php echo json_encode($count)?>,
            backgroundColor: [
                '#68cfbc',
                '#58b5d8',
                '#f2cd5c',
                '#f36b6c',
                '#ac6fc5'
            ],
        }]
    };

    const config1 = {
        type: 'bar',
        data: data1,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // render init block
    const myChart1 = new Chart(
        document.getElementById('myChart2'),
        config1
    );
</script>
<?php
include('includes/scripts.php'); 
include './bottom.php'
?>

