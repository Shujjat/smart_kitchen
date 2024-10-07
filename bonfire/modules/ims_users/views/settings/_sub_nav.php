<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/ims_users') ?>" id="list"><?php echo lang('ims_users_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('IMS_Users.Settings.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/settings/ims_users/create') ?>" id="create_new"><?php echo lang('ims_users_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>