<div class="admin-box">
	<h3>IMS Users</h3>
	<?php echo form_open($this->uri->uri_string()); 
 $types=array('employees' ,'students'//,'parents'
                );
    ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('IMS_Users.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
				    <th colspan="<?php echo count($types); ?>"><?php echo lang('select_a_type');?></th>
                    	<?php endif;?>
				</tr>
			</thead>
		      <tr>
              <?php 
               
                foreach($types as $type)
                {?>
                    <td> <?php echo anchor(SITE_AREA.'/content/ims_users/list_users/'.$type,lang($type));?></td>    
        <?php   }
              ?>
              
              </tr>
					
				
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>