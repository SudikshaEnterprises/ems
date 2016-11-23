<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php $this->load->view('includes/login_head');?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!--sidebar-->
		<?php  $this->load->view('includes/side_bar');?>
		<!--sidebar-->
        <!-- top navigation -->
        <?php  $this->load->view('includes/topbar');?>
        <!-- /top navigation -->

        <!-- page content -->
        <?php echo $content;?>
        <!-- /page content -->

        <!-- footer content -->
        <?php  $this->load->view('includes/footer');?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <?php  $this->load->view('includes/js');?>
    <!-- /gauge.js -->
  </body>
</html>
