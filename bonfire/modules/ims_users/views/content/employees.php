<?php 
$roles=$this->ims_users_model->get_all_roles();
$not_include=array('1','2','4','6');
foreach($not_include as $role)
{
    if(in_array($role,$roles))
    {
        
    }
}

?>
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
			<?php if (isset($records) ) : ?>
			<?php foreach ($records->result()  as $record) :
                
                $role_id=$record->role_id;
                if(in_array($role_id,$not_include)){continue;}
                $user_id=$record->id;
                
                
                $status=$record->active;
               
                 
           if ($this->auth->has_permission('IMS_Users.Content.Edit') ) : ?>            
                        
				<tr>
					
					<td>
                    <?php                    
                        if($status=='1')
                        {
                            echo lang('active').'|';
                            echo anchor('admin/content/ims_users/block/employees/'.$user_id,lang('block'));
                        }
                        elseif($status=='0')
                        {
                            echo lang('blocked').'|';
                            echo anchor('admin/content/ims_users/activate/employees/'.$user_id,lang('activate'));
                            
                        } 
                    ?>
                </td>
				
					
				<td>
                    <?php
                     
                        $name=$this->employees_model->get_name($record->in_type_id);
                        echo $name;
                     ?>
                </td>
                <td>
                    <?php
                       
                       $criteria=array('role_id'=>$role_id);
                       $role_result=$this->db->get_where('roles',$criteria);
                       $role=$role_result->row();
                       $role_name=$role->role_name;
                     
                     //  print_r($roles);
       	                echo form_dropdown('role_id_'.$user_id, $roles, $role_id);
                      ?>
                </td>
				
				</tr>
			<?php 
  	         endif;
            endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="9">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
            
    
			</tbody>
		</table>
        <div class="text-right">
		<br/>
		<input type="submit" name="submit_button" class="btn btn-primary" value="Update"/> 
       <?php echo lang('or');?>
        
	</div>
	<?php echo form_close(); ?>
</div>