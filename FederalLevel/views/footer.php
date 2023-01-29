<?php 
  if ( !( $page == 'login' || $page == 'sign_up' ) )
  {
?> 
  <!-- Start Change Password Modal-->
  <div class="modal fade" id="password" tabindex="-1">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <h3 class="modal-title text-success"><strong>Change Password</strong></h3>
      <button type="button" class="btn-close h2" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <!-- START FORM -->
      <form action="" method="POST">

        <h5>Please, fill in the details below!</h5>
        <div class="row">
          <div class="form-group mt-3">
            <label class="fw-bold" for="pword">Password <span class="text-danger">*</span></label>
            <input type="password" name="pword" id="pword" class="form-control" required placeholder="Enter Password" maxlenght="10">
          </div>
          <div class="form-group mt-3">
            <label class="fw-bold" for="con_pword">Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="con_pword" class="form-control" id="con_pword" required placeholder="Enter Password" maxlenght="10">
          </div>
          <div class="text-center mt-3">
            <button type="submit" name="change_pword_btn" id="change_pword_btn" class="btn btn-success" >Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> 
          </div>

        </div>
      </form>
      <!-- END FORM -->
     </div>
    </div>
   </div>
  </div>
  <!-- End Change Password Modal-->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright text-success">
      &copy; Copyright 
          <?php 
              
            echo date('Y');

          ?>
      <strong><span></span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php
  }
?>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- datatables -->
  <script src="assets/vendor/new_datatables/datatables.min.js" ></script>
  <script src="assets/vendor/new_datatables/pdfmake.min.js" ></script>
  <script src="assets/vendor/new_datatables/vfs_fonts.min.js" ></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/app.js"></script>

  <script type="text/javascript">
    $(document).ready( () => {
      $('#my_datatable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [ 'excel',/* 'pdf',*/
              {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'B2'
              }
            ],
        pageLength: 50,
        bLengthChange:false,
      });
    } );
  </script>

</body>

</html>