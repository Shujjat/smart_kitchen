<div class="admin-box">
	<h3>dishes</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Dishes.Settings.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Name</th>
					<th>Serving Size</th>
					<th>Cooking Time</th>
					<th>Remarks</th>
					<th>Created On</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Dishes.Settings.Delete')) : ?>
				<tr>
					<td colspan="6">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('dishes_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Dishes.Settings.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Dishes.Settings.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/settings/dishes/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->name) ?></td>
				<?php else: ?>
				<td><?php echo $record->name ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->serving_size?></td>
				<td><?php echo $record->cooking_time?></td>
				<td><?php echo $record->remarks?></td>
				<td><?php echo $record->created_on?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="6">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>