<section class="content">

    <div class="error-page">
        <h2 class="headline"><i class="fa fa-warning text-yellow"></i>Crap...!</h2>
        <br /><br /><br /><br /><br /><br /><br /><br />
        <div class="error-content">
            <h3>
                <?php
                if($this->uri->segment(3)=='404') 
                {
                    ?>
                    Your requested page is not available.
                    <?php
                }
                elseif($this->uri->segment(3)=='db')
                {
                    ?>
                    It seems something incorrect was submitted.
                    <br />
                    <code>Code:<?php echo $this->uri->segment(4); ?></code>
                    <?php    
                    
                }
                ?>
                
            </h3>
            <br />
            <p>
               <?php echo $description;?>
            </p>
            <p>
            
            If the problem persists, please talk to 
            
            
            
            and provide all necessary information to recreate the issue.
            You can also use the chat box on the bottom right of this page to talk to our online representative. 
            
            </p>
        </div>
    </div><!-- /.error-page -->

</section>