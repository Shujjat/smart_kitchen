<?php 

if( !$this->auth->is_logged_in())
{
    echo Template::yield_content(); 
       
}
else
{
  
     
    include('partials/header.php');
    
    ?>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper ">
    
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php 
        include('partials/site_id.php');
        include('partials/sidebar.php');
    
        ?>
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php 
       // include('partials/topnav.php');
        include('partials/bread_crumb.php');
        //include('partials/content.php');
        echo Template::yield_content();
    
        
        
        ?>
    
      <?php 
        include('partials/footer_content.php');
    
     ?>
    
      <!-- Control Sidebar -->
      <?php 
        include('partials/side_bar_footer.php');
    
      ?>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    
    </div>
    <!-- ./wrapper -->
    <?php 
    include('partials/footer.php');
    
    ?>
    </body>
    </html>
<?php
}
?>