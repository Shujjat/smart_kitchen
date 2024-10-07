
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
    <h3>IMS Users</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
    <?php $options = array(
                '-1'         =>  'Select Type',
                'students'   =>  'Students',
                'employees'  =>  'Employees'
); ?>

        <?php echo form_dropdown('type', $options, set_value('type', isset($ims_users['type']) ? $ims_users['type'] : $this->input->post('type')), 'Type')?>        <div class="control-group <?php echo form_error('user_id') ? 'error' : ''; ?>">
         <div class="form-actions">
            <br/>
            <input type="submit" name="display" class="btn btn-primary" value="Display" />
            or <?php echo anchor(SITE_AREA .'/content/ims_users', lang('ims_users_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
