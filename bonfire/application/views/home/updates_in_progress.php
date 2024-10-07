<section class="content">

    <div class="error-page">
        <h2 class="headline"><i class="fa fa-warning text-yellow"></i>Updates in progress...!</h2>
        <br /><br /><br /><br /><br /><br /><br /><br />
        <div class="error-content">
            <h3>
                
                
                Hi Buddy, its me 
                <?php 
                if(DM=='ST')
                {
                   $email='info@eco-friendlyschools.org'; 
                   $voice='+92 313 9991277';
                   echo 'Eco-Friendly Schools'; 
                }    
                else
                {
                    $voice='0336 4540037';
                    $email='info@jugnuu.org';
                    e($this->settings_lib->item('site.title'));     
                }
                ?>.
                My develpers are currently updating me to give you best of services.
                For this I am not available for now. Meanwhile you can talk to my development team @ <?php echo $voice ?>,
                or email us <?php echo $email;?>.
        
                Also, you can <a href="<?php echo site_url(); ?>" > refresh </a>here to see the current status of me.
                
            </h3>
            <br />
            
            
        </div>
    </div><!-- /.error-page -->

</section>