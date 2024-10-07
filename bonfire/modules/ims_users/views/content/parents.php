<div class="admin-box">
	<h3>IMS Users</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('IMS_Users.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Edit</th>
					<th>Type</th>
					
					<th>Name</th>
				
					<th>Status</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('IMS_Users.Content.Delete')) : ?>
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
					<?php if ($this->auth->has_permission('IMS_Users.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('IMS_Users.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/ims_users/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' ) ?></td>
				<?php else: ?>
				<td><?php echo $record->institute_id ?></td>
				<?php endif; ?>
			
				
				<td><?php echo $record->user_id?></td>
				<td><?php
                        $type=$record->type;
                        if($type=='students')
                        {
				             $name=$this->students_model->get_name($record->in_type_id);
                              
                        }
                        elseif($type=='employees')
                        {
                            $name=$this->employees_model->get_name($record->in_type_id);
                            
                        }
                       
                        echo $name;?></td>
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