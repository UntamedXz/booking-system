  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#tableData').DataTable({
    });
});
  </script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

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
  <script async defer src="assets/js/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js"></script>