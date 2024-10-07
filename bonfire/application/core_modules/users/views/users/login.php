<html class="lockscreen">
    <head>
        <meta charset="UTF-8">
        <title>
            <?php echo $this->settings_lib->item('site.title') ?>
        </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo HOST;?>/bonfire/themes/adminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Automatic element centering using js -->
        <div class="center">            
            <div class="headline text-center" >
                <?php echo $this->settings_lib->item('site.title') ?>            
                
                
            </div><!-- /.headline -->
            
           
            
            <?php
	 $site_open = $this->settings_lib->item('auth.allow_register');
    
?>

      <?php if ( !$site_open ) : ?>
        <div class="row-fluid">
        	<div class="span12">
        		<div class="alert alert-danger fade in span6" >
        		  <a data-dismiss="alert" class="close">&times;</a>
        			<h4 class="alert-heading">Sorry this is invite only site.</h4>
        		</div>
        	</div>
        </div>
        <?php
    	endif;
    	if (auth_errors() || validation_errors()) :
        ?>
        
        
        <div class="box-body">
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>Alert!</b> <?php echo auth_errors() . validation_errors(); ?>
            </div>
            
        </div>
        <?php  endif; ?>

           
           
                
                <div class="form-box" id="login-box">
                    <div class="header">Sign In</div>
                    <?php echo form_open('login', array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
                        <div class="body bg-gray">
                            <div class="form-group">
                                
                                <input class="form-control" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
                            </div> 
                            <?php if ($this->settings_lib->item('auth.allow_remember')) : ?>         
                            <div class="form-group">
                               <input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
	                           <span class="inline-help"><?php echo lang('us_remember_note'); ?></span>
                            </div>
                            <?php endif; ?>                            
                        </div>
                        <div class="footer">                                                               
                              
                            <button class="btn bg-olive btn-block" type="submit" name="submit" id="submit" value="Let Me In" tabindex="5" >Sign me in</button>
                            
                            <!--<p><a href="#">I forgot my password</a></p>
                            
                            <a href="register.html" class="text-center">Register a new membership</a>
                            -->
                        </div>
                    </form>
                    <!--
                    <div class="margin text-center">
                        <span>Sign in using social networks</span>
                        <br/>
                        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
        
                    </div>
                    -->
                </div>  
                
                <!-- /.lockscreen credentials -->

           

                      
        </div><!-- /.center -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- page script 
        <script type="text/javascript">
            $(function() {
                startTime();
                $(".center").center();
                $(window).resize(function() {
                    $(".center").center();
                });
            });

            /*  */
            function startTime()
            {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();

                // add a zero in front of numbers<10
                m = checkTime(m);
                s = checkTime(s);

                //Check for PM and AM
                var day_or_night = (h > 11) ? "PM" : "AM";

                //Convert to 12 hours system
                if (h > 12)
                    h -= 12;

                //Add time to the headline and update every 500 milliseconds
                $('#time').html(h + ":" + m + ":" + s + " " + day_or_night);
                setTimeout(function() {
                    startTime()
                }, 500);
            }

            function checkTime(i)
            {
                if (i < 10)
                {
                    i = "0" + i;
                }
                return i;
            }

            /* CENTER ELEMENTS IN THE SCREEN */
            jQuery.fn.center = function() {
                this.css("position", "absolute");
                this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                        $(window).scrollTop()) - 30 + "px");
                this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                        $(window).scrollLeft()) + "px");
                return this;
            }
        </script>
        -->
    </body>
</html>
<script lang="javascript">cssClassChanger();</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b66ca65e21878736ba2a2f4/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->