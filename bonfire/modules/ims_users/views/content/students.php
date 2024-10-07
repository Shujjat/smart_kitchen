<div class="admin-box">
	<h3><?php echo lang('ims_users');?></h3>
    	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
					<tr>
                	<th><?php echo lang('status')?>|<?php echo lang('action') ?></th>
					<th><?php echo lang('name') ?></th>
                    <th><?php echo lang('role') ?></th>
				
				</tr>
			</thead>
			
			<tbody>
			<?php
            
            if (isset($records) ) : ?>
			<?php foreach ($records->result()  as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('IMS_Users.Content.Edit')) : ?>
					<td><?php 
                $criteria=array('id'=>$record->user_id);
                $user_id=$record->user_id;
                $user_result=$this->db->get_where('users',$criteria);
                $user=$user_result->row();
                $status=$user->active;
                
                if($status=='1')
                {
                   echo lang('active').'|';
                   echo anchor('admin/content/ims_users/block/students/'.$user_id,lang('block'));
                }
                elseif($status=='0')
                {
                   echo lang('blocked').'|';
                   echo anchor('admin/content/ims_users/activate/students/'.$user_id,lang('activate'));
                    
                } 
                ?></td>
					<?php endif;?>
					
				<td><?php
                        $name=$this->students_model->get_name($record->in_type_id);
                        echo $name;?>
                </td>
                <td>Student
                </td>
				
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