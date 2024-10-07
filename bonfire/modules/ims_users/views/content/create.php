
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php 

// Change the css classes to suit your needs
if( isset($ims_users) ) {
    $ims_users = (array)$ims_users;
}
$id = isset($ims_users['id']) ? $ims_users['id'] : '';
?>
<div class="admin-box">
    <h3>IMS Users<?php echo ' ['.$type.']';?></h3>
<?php echo form_open(site_url().'/admin/content/ims_users/make_users', 'class="form-horizontal"'); ?>
    <table class="table table-striped">
        
        <?php if($type=='employees')
        {?>
        <th>Select</th>
        <th>Name</th>
        <th>Campus</th>
        <th>Department</th>
  
       <?php }
       else if($type=='students')
       {?>
       <th>Select</th>
        <th>Name</th>
       <th>Campus</th>
        <th>Department</th>
        <th>Program</th>
        <th>Semester</th>
        <th>batch</th>

       <?php } ?>
               <input  type="hidden" name="type" value="<?php echo $type;?>"/>
        <?php
        
            $candidates=$this->ims_users_model->get_non_users($type);
            if($candidates->num_rows()>0)
            {   
                 $options=array(
                                    'principal'=>'Principal',
                                    'vice principal'=>'Vice Principal',
                                    'advisor'=>'Advisor',
                                    'class incharge'=>'Class Incharge',
                                    'sports incharge'=>'Sports Incharge',
                                    'disciplin incharge'=>'Discipline Incharge',
                                    'examiner'=>'Examiner',
                                    'paper checker'=>'Paper Checker',
                                    'fee collector'=>'Fee Collector'
                    
                                    );
                    $roles=array();
                    foreach($options as $option)
                    {
                        $role_id=$this->ims_users_model->get_id_by_name($option);
                        $roles[$role_id]=$option;
                        
                        
                    }
                  
                foreach($candidates->result() as $candidate)
                {   
                    //$type=$candidate->type;
                    $candidate_id=$candidate->id;
                    $name=$candidate->first_name.' '.$candidate->last_name;
                   
                      echo "<tr>";
                    if($type=='employees')
                    {
                        $campus_id=$candidate->campus_id;
                        $department_id=$candidate->department_id;
                        $campus_id=$candidate->campus_id;
                        echo "<td><input type='checkbox' name='".$candidate_id."'/></td>";
                        echo "<td>".$name."</td>";
                        
                        echo "<td>".$campus_id."</td>";
                        echo "<td>".$department_id."</td>";
                         echo "<td>".form_dropdown('employees_role_'.$candidate_id, $roles ,'' )."</td>";
                        
                    }
                    elseif($type=='students')
                    {
                        $campus_id=$candidate->campus_id;
                        $department_id=$candidate->department_id;
                        $campus_id=$candidate->campus_id;
                        $department_id=$candidate->department_id;
                        $program_id=$candidate->program_id;
                        $semester_no=$candidate->semester_no;
                        $batch_id=$candidate->batch_id;  
                        echo "<td>".$name."</td>";
                        echo "<td>".$campus_id."</td>";
                        echo "<td>".$department_id."</td>";
                        echo "<td>".$program_id."</td>";
                        echo "<td>".$semester_no."</td>";
                        echo "<td>".$batch_id."</td>";
                        echo "</tr>";     
                        
                    }
                    
                    
                    
                }
            }
        ?>
    </table>
  
<fieldset>
        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Create Users" />
            or <?php echo anchor(SITE_AREA .'/content/ims_users', lang('ims_users_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('IMS_Users.Content.Delete')) : ?>

            or <a class="btn btn-danger" id="delete-me" href="<?php echo site_url(SITE_AREA .'/content/ims_users/delete/'. $id);?>" onclick="return confirm('<?php echo lang('ims_users_delete_confirm'); ?>')" name="delete-me">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('ims_users_delete_record'); ?>
            </a>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
