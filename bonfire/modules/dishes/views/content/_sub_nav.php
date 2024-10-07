<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/dishes') ?>" id="list"><?php echo lang('dishes_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Dishes.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/dishes/create') ?>" id="create_new"><?php echo lang('dishes_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>