<?php 
$path='/content/ims_users/';
$types=array('employees','students');
?>
<ul>

	<li><a href="<?php echo site_url(SITE_AREA .$path) ?>"><?php echo lang('ims_users_home')?></a></li>

	<?php 
    $path='/content/ims_users/list_users/';
    foreach($types as $type)
    {
         if ($this->auth->has_permission('IMS_Users.Content.View')) : ?>
       
        	<li><a href="<?php echo site_url(SITE_AREA .$path.$type) ?>"><?php echo lang($type)?></a></li>
         <?php
        endif;
    }
    ?>
</ul>