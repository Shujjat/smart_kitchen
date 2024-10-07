<div class="admin-box">
	<h3>IMS Users</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('IMS_Users.Settings.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Institute Id</th>
					<th>Type</th>
					<th>User Id</th>
					<th>In Type Id</th>
					<th>Ims User Created By</th>
					<th>Ims User Created On</th>
					<th>Remarks</th>
					<th>Status</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('IMS_Users.Settings.Delete')) : ?>
				<tr>
					<td colspan="9">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('ims_users_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('IMS_Users.Settings.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('IMS_Users.Settings.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/settings/ims_users/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->institute_id) ?></td>
				<?php else: ?>
				<td><?php echo $record->institute_id ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->type?></td>
				<td><?php echo $record->user_id?></td>
				<td><?php echo $record->in_type_id?></td>
				<td><?php echo $record->ims_user_created_by?></td>
				<td><?php echo $record->ims_user_created_on?></td>
				<td><?php echo $record->remarks?></td>
				<td><?php echo $record->status?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="9">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>