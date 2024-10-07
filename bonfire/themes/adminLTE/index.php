<?php 
//echo $this->uri->segment(1) ;die();
if( !$this->auth->is_logged_in())
{
    echo Template::yield_content(); 
       
}
else
{
    

?>

<?php echo theme_view('parts/_header'); 
$user_name=(isset($current_user->display_name) && !empty($current_user->display_name)) ? $current_user->display_name : ($this->settings_lib->item('auth.use_usernames') ? $current_user->username : $current_user->email); 
?>
    <body class="skin-blue">
    
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php
                if($this->auth->role_id()==13 or $this->auth->role_id()==14)
                {
                    $home_url=''.HOST.'index.php/'.$this->session->userdata('login_destination');
                } 
                else
                {
                    $home_url=site_url();
                }
            ?>
            <a href="<?php echo $home_url;?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Smart Kitchen
            </a>
            <?php 
            if($this->auth->user_id()!='')
            {    
            ?>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                    
                    
                    
                    
                        
                        
                        
                       
                    
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $user_name;?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <!--<img src="img/avatar3.png" class="img-circle" alt="User Image" /> -->
                                    <p>
                                        <?php echo $user_name;
                                               
                                        ?>
                                        <!-- <small>Member since Nov. 2012</small> -->
                                    </p>
                                </li>
                                
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('users/profile');?>" class="btn btn-adminLTE btn-primary">
                                            <?php echo lang('bf_user_settings') ?>
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                    
                                        <a href="<?php echo site_url('logout');?>" class="btn btn-adminLTE btn-danger">
                                        <?php echo lang('bf_action_logout') ?>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php }?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            
                             
                        </div>
                        
                        <div class="pull-left info">
                            
                            <?php 
                            if($this->auth->user_id()!='')
                            {
                            ?>
                                <p>
                                
                                Welcome 
                                <?php echo $user_name;?>  
                                                     
                                </p>
                                
                            <?php 
                            }
                            else
                            {
                                 ?>
                                 <a href="<?php echo site_url().'/login';?>"><i class="fa fa-sign-in text-success"></i>Sing In</a>
                                
                                
                                <?php 
                            }?>
                        </div>
                    </div>
                                    
                   
                  






</head>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    	
                    <h1>
                       <?php if (isset($toolbar_title)) : ?>
                			<h1><?php echo humanize($toolbar_title); ?></h1>
                		<?php endif; ?>
                    
                        
                    </h1>
                    <ol class="breadcrumb">

                        	<?php Template::block('sub_nav', ''); ?>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                     

                    <div class="row">
                        <?php 
                            echo Template::message(); 
                        	echo isset($content) ? $content : Template::yield_content();?>
                    </div>
                    <script src="<?php echo HOST;?>/assets/js/ajax.js" type="text/javascript"></script>   
                    <script src="<?php echo HOST;?>/assets/js/js.js" type="text/javascript"></script>
                    <!-- Main row -->
                    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php echo theme_view('parts/_footer'); ?> 

<?php 
}
?>
