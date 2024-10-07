<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/reports/dishes') ?>" id="list"><?php echo lang('dishes_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Dishes.Reports.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/reports/dishes/create') ?>" id="create_new"><?php echo lang('dishes_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>