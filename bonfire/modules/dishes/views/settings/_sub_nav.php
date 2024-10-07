<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/dishes') ?>" id="list"><?php echo lang('dishes_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Dishes.Settings.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/settings/dishes/create') ?>" id="create_new"><?php echo lang('dishes_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>