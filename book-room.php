<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require 'lib/header.php';
require 'lib/nav.php';
?>
<section class="py-5">
    <div class="container-fluid px-lg-4 mb-5 py-5">
  <div class="col-lg-12 col-md-12">
   <div class="card">
    <div class="card-header bg-dark text-white">
       <h5>Book This Room</h5>
   </div>
   <div class="card-body">
    <div class="col-md-12 col-lg-12">
        <div class="col-md-12 col-lg-12 p-0">
            <div class="col-lg-8 p-0">
                <div class="card mb-3">
                <h5 class="px-3 mt-2">Check Room Availability</h5>
                    <form id="availability_form">
                        <div class="row px-3">
                            <input type="hidden" name="roomid" id="roomid" value="<?php echo $_GET['roomid']; ?>">
                            <div class="col-lg-8 col-md-8 mb-3">
                                <label>Select Date</label>
                                <input required class="form-control"  type="date" id="check_date" name="check_date" required>
                            </div>
                            <div class="col-lg-4 col-md-4 mb-3 d-flex">
                                <!-- <label class="invisible">TEST</label> -->
                                <button type="submit" name="check_date_btn" class="btn btn-success align-self-end w-100">CHECK</button>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label>Morning Availability</label>
                                <input required class="form-control"  type="text" id="morning_availability" name="morning_availability" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label>Night Availability</label>
                                <input required class="form-control"  type="text" id="night_availability" name="night_availability" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="px-3 mt-2">Room Description</h5>
            <div class="card-body">
               <form id="bookroom_form" autocomplete="off" enctype="multipart/form-data">
                <?php 
                if(isset($_GET['roomid'])){
                    $conn = new class_model();
                    $room_id = $_GET['roomid'];
                    $datas = $conn->fetchByID($room_id);
                    $total_price = 0;
                    if($datas > 0)
                    {
                        foreach($datas as $row)
                        {
                            ?>
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                                        <input type="hidden" name="room_id" value="<?= $row['id'] ?>">
                                        <div class="col-lg-12 col-md-12 mb-2 d-flex justify-content-center">
                                            <div class="col-lg-6">
                                                <img class="img-thumbnail" src="admin/room_image/<?= $row['image'] ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 mb-2">
                                           <label>Room Name</label>
                                           <input readonly class="form-control" type="text" name="room_category" value="<?= $row['name'] ?>">
                                       </div>
                                       <div class="col-lg-6 col-md-6 mb-2">
                                           <label>Capacity</label>
                                           <input readonly class="form-control" type="text" name="capacity" value="<?= $row['person'] ?> Person">
                                       </div>
                                        <div class="col-lg-6 col-md-6">
                                           <label>Day</label>
                                            <select id="day_id" class="form-control form-select" name="room_type">
                                                <option selected>SELECT</option>
                                                <option value="1">MORNING</option>
                                                <option value="2">NIGHT</option>
                                            </select>                                    
                                       </div>
                                       <div class="col-lg-6 col-md-6 mb-2">
                                           <label>Room Price</label>
                                           <input readonly class="form-control" type="text" id="price" name="price" value="">
                                       </div>
                                      
                                       <div class="col-lg-6 col-md-6">
                                           <label>Mode of Payment</label>
                                           <select required class="form-control form-select text-center mb-2" name="payment_type" id="payment_type">
                                               
                                               <option value="Through Counter">Thru Counter</option>
                                               <option value="Gcash">Gcash</option>
                                           </select>
                                       </div>
                                       <div class="col-lg-6 col-md-6 mb-3">
                                           <label>Date</label>
                                           <input required class="form-control"  type="date" id="date_accomodation" name="date_accomodation">
                                       </div>
                                       <div style="display: none;" class="col-lg-6 col-md-6 mb-3 gcash_cont">
                                            <div class="card d-flex flex-column gap-2 p-2 justify-content-center">
                                                <img class="align-self-center" style="width: 150px;" src="./assets/img/gcash_qrcode.jpg" alt="">
                                                <div class="d-flex flex-column">
                                                    <label>Screenshot of Payment</label>
                                                    <input class="form-control" type="file" name="reference_p" id="reference_p">
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <label>Reference No.</label>
                                                    <input class="form-control" type="text" name="reference_num" id="reference_num" placeholder="Input reference number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="13"
                                    maxlength="13" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false">
                                                </div>
                                            </div>
                                       </div>
                                       <div style="display: none;" class="col-lg-6 col-md-6 mb-3 gcash_cont2"></div>
                                       <div class="col-lg-6 col-md-6 mb-2">
                                           <label>Number of Person</label>
                                           <input required class="form-control" type="number" name="number_p" placeholder="How Many People?">
                                       </div>
                                       <div class="col-md-6 col-lg-6"></div>
                                       <div class="col-lg-6 col-md-6 mb-2">
                                           <label>Age <small style="color: #d9534f;">*Note: Below 1 year old is considered as 1 don't input months</small> </label>
                                           <input required class="form-control" type="text" name="age" id="age" data-role="tagsinput" placeholder='Separated by "," e.g. "10,15,13"' required>
                                       </div>
                                       <div class="d-flex align-items-center justify-content-between">
                                  <button type="submit" name="book_now" class="btn btn-success">Reserve this Room</button>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-md-4 col-lg-4 pt-3">
                                    <div class="card p-3">
                                    <p class="text-center">
                                    <h4 class="text-danger">Reminders:</h4>
                                    <h6>Please be reminded that, Additional Entrance fee will be added to your Payment.</h6>
                                    <hr>
                                    <h5 class="fw-bolder">Total</h5>
                                    <h3 class="fw-bolder">Room Price : ₱ <?= number_format($row['morning_price']); ?></h3>
                                    <br>
                                    <br>
                      <?php 
                      $get_morning_headfee = mysqli_query($con, "SELECT * FROM tbl_headfee WHERE id = 1");
                      
                      $get_night_headfee = mysqli_query($con, "SELECT * FROM tbl_headfee WHERE id = 2");
                      
                      $fetchmorning = mysqli_fetch_assoc($get_morning_headfee);
                      
                      $fetchnight = mysqli_fetch_assoc($get_night_headfee);
                      
                      $morningfee = $fetchmorning['price'];
                      
                      $nightfee = $fetchnight['price'];
                      ?>
                                    <h6 class="fw-bolder">Entrance Fee Per Head:<br><br> Morning = <?= $morningfee; ?>&nbsp;&nbsp; 8:00 am - 5:00 pm <br> Night &nbsp;&nbsp;&nbsp;&nbsp; = <?= $nightfee; ?> &nbsp;&nbsp;6:00 pm - 4:00 am</h6> 
                                    <h7 class="text-danger">&nbsp;&nbsp;One year old and below are FREE!</h7>
                                    <!-- <h4>Room Amount Total : ₱ <?= number_format($row['price']);  ?> </h4> -->
                                </p>
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
                   <?php
               } 
           }
       }
       ?>     
   </form>

</div>
</div>
</div>
</div>
</div>
</section>

<?php
$get_price = mysqli_query($con, "SELECT a.*, b.name AS category FROM tbl_room a LEFT JOIN room_category b ON a.category_id = b.id WHERE a.id = $room_id");

$fetch_price = mysqli_fetch_array($get_price);
$morning_price = $fetch_price['morning_price'];
$night_price = $fetch_price['night_price'];
?>

<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate()+ 1;
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#date_accomodation').attr('min', maxDate);
    $('#check_date').attr('min', maxDate);
});
</script>

<script>
  $(document).ready(function(){
    $('#payment_type').on('change', function(e) {
        // alert('working');
        if($(this).val() == 'Gcash') {
            $('.gcash_cont').css('display', 'block');
            $('.gcash_cont2').css('display', 'block');
            $('#reference_p').prop('required', true);
            $('#reference_num').prop('required', true);
        } else {
            $('.gcash_cont').css('display', 'none');
            $('.gcash_cont2').css('display', 'none');
            $('#reference_p').prop('required', false);
            $('#reference_num').prop('required', false);
        }
    })

    $('#day_id').change(function(){
      var day_id = $('#day_id').val();
      console.log(day_id); 
       $.ajax({
          url:'fetch.php',
          type:'POST',
          data:{id:day_id},
          success:function(response)
          {
            $('#loading').css('display','block');
            setTimeout(function()
            { 
                $('#show').html(response);
                $('#show').show();
                $('#loading').css('display','none');
                $('#loading').css('height','50px');
            });
          }
       });
    });

    $('#day_id').on('change', function(e) {
        e.preventDefault();

        if($(this).val() == '1') {
            $('#price').val('<?php echo $morning_price ?>');
        } else if($(this).val() == '2') {
            $('#price').val('<?php echo $night_price ?>');
        } else {
            $('#price').val('0.00');
        }
    })

    $('#bookroom_form').on('submit', function(e) {
        e.preventDefault();

        if($('#payment_type').val() == 'Gcash') {
            var imgExt = $('#reference_p').val().split('.').pop().toLowerCase();

            if ($.inArray(imgExt, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                swal("Failed!", "File not supported!", "error");
            } else {
                var imgSize = $('#reference_p')[0].files[0].size;

                if (imgSize > 10485760) {
                    swal("Failed!", "File too large!", "error");
                } else {
                    var form = new FormData(this);
                    form.append('book_now', true);
                    $.ajax({
                        url: "../controllers/book_room.php",
                        type: "POST",
                        data: form,
                        dataType: 'text',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data == 'success') {
                                swal({
                                    title: "Success!",
                                    text: "Booked room successfully!",
                                    icon: "success",
                                    type: "success"
                                }).then(function() {
                                    window.location = "view-bookings.php";
                                });
                            } else if(data.includes('Capacity exceeded')) {
                                swal("Failed!", "The Capacity Exceeded!", "error");
                            } else if(data.includes('Room is fully booked! Choose different room or date!')) {
                                swal("Failed!", "Room is fully booked! Choose different room or date!", "error");
                            } else if(data.includes('Invalid input in age!')) {
                            swal("Failed!", "Invalid input in age!", "error");
                            } else if(data.includes('Invalid age!')) {
                            swal("Failed!", "Invalid age!", "error");
                            } else {
                                swal("Failed!", "Something went wrong!", "error");
                            }
                            console.log(data);
                        }
                    })
                }
            }
        } else {
            var form = new FormData(this);
            form.append('book_now', true);
            $.ajax({
                url: "../controllers/book_room.php",
                type: "POST",
                data: form,
                dataType: 'text',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data == 'success') {
                        swal({
                            title: "Success!",
                            text: "Booked room successfully!",
                            icon: "success",
                            type: "success"
                        }).then(function() {
                            window.location = "view-bookings.php";
                        });
                    } else if(data.includes('Capacity exceeded')) {
                        swal("Failed!", "The Capacity Exceeded!", "error");
                    } else if(data.includes('Room is fully booked! Choose different room or date!')) {
                        swal("Failed!", "Room is fully booked! Choose different room or date!", "error");
                    } else if(data.includes('Invalid input in age!')) {
                    swal("Failed!", "Invalid input in age!", "error");
                    } else {
                        swal("Failed!", "Something went wrong!", "error");
                    }
                    console.log(data);
                }
            })
        }
    })

    $('#availability_form').on('submit', function(e) {
        e.preventDefault();

        var form = new FormData(this);
        form.append('check_availability', true);
        $.ajax({
            url: "../controllers/book_room.php",
            type: "POST",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                var obj = JSON.parse(data);
                $('#morning_availability').val(obj.morning);
                $('#night_availability').val(obj.night);
                console.log(data);
            }
        })
    })
  });
</script>


<?php
require 'lib/footer.php'; ?>