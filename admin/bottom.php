
<!-- Warning Section Ends -->
<!-- Required Jquery -->

<script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>

   <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

<script src="assets/js/alertify.min.js"></script>

<script>
    <?php if(isset($_SESSION['message'])) { ?>
        alertify.set('notifier','position', 'top-center');
        alertify.success('<?= $_SESSION['message'] ?>');
    <?php 
        unset($_SESSION['message']);
    } 
    ?>
      
</script>

<script>
    <?php if(isset($_SESSION['error_message'])) { ?>
        alertify.set('notifier','position', 'top-center');
        alertify.error('<?= $_SESSION['error_message'] ?>');
    <?php 
        unset($_SESSION['error_message']);
    } 
    ?>
      
</script>

<script src="assets/js/sweetalert.min.js"></script>




  <!-- Github buttons -->
  <script async defer src="assets/js/buttons.js"></script>>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="./assets/js/pcoded.min.js"></script>
<script src="assets/js/vartical-demo.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
