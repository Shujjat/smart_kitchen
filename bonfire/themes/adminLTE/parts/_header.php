<?php 
Assets::add_css( array(
                     //   'morris/morris.css',
                        'jvectormap/jquery-jvectormap-1.2.2.css',
                        'datepicker/datepicker3.css',
                        'daterangepicker/daterangepicker-bs3.css',
                        'bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
                        'AdminLTE.css',
                        
                        ));

?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <link rel='icon' href='<?php echo HOST;?>bonfire/themes/adminLTE/img/favicon.ico' type='image/x-icon' />
        <title>
            <?php echo $this->settings_lib->item('site.title') ?>
        </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HOST;?>bonfire/themes/adminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css">
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        
        
        <?php echo Assets::css();?>
       
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo HOST;?>/bonfire/themes/adminLTE/js/AdminLTE/jquery.min.js"></script>        
      
    </head>