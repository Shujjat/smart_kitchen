<?php
 $types=array('employees',
            'students',//'parents'
                ); 
?>
<ul class="nav nav-pills">
    <?php 
    foreach($types as $type)
    {
        ?>
	
	<?php if ($this->auth->has_permission('IMS_Users.Content.View')) : ?>
	<li <?php echo $this->uri->segment(4) == $type ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/ims_users/list_users/'.$type) ?>"><?php echo lang($type); ?></a>
	</li>
	<?php endif; 
    }
    ?>
</ul>