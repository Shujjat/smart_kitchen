
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($ims_users) ) {
    $ims_users = (array)$ims_users;
}
$id = isset($ims_users['id']) ? $ims_users['id'] : '';
?>
<div class="admin-box">
    <h3>IMS Users</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('institute_id') ? 'error' : ''; ?>">
            <?php echo form_label('Institute Id', 'institute_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="institute_id" type="text" name="institute_id" maxlength="11" value="<?php echo set_value('institute_id', isset($ims_users['institute_id']) ? $ims_users['institute_id'] : ''); ?>"  />
        <span class="help-inlinee"><?php echo form_error('institute_id'); ?></span>
        </div>


        </div>


        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                150 => 150,
); ?>

        <?php echo form_dropdown('type', $options, set_value('type', isset($ims_users['type']) ? $ims_users['type'] : ''), 'Type')?>        <div class="control-group <?php echo form_error('user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User Id', 'user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="user_id" type="text" name="user_id" maxlength="11" value="<?php echo set_value('user_id', isset($ims_users['user_id']) ? $ims_users['user_id'] : ''); ?>"  />
        <span class="help-inlinee"><?php echo form_error('user_id'); ?></span>
        </div>


        </div>


        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                11 => 11,
); ?>

        <?php echo form_dropdown('in_type_id', $options, set_value('in_type_id', isset($ims_users['in_type_id']) ? $ims_users['in_type_id'] : ''), 'In Type Id')?>        <div class="control-group <?php echo form_error('ims_user_created_by') ? 'error' : ''; ?>">
            <?php echo form_label('Ims User Created By', 'ims_user_created_by', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="ims_user_created_by" type="text" name="ims_user_created_by" maxlength="11" value="<?php echo set_value('ims_user_created_by', isset($ims_users['ims_user_created_by']) ? $ims_users['ims_user_created_by'] : ''); ?>"  />
        <span class="help-inlinee"><?php echo form_error('ims_user_created_by'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('ims_user_created_on') ? 'error' : ''; ?>">
            <?php echo form_label('Ims User Created On', 'ims_user_created_on', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="ims_user_created_on" type="text" name="ims_user_created_on" maxlength="11" value="<?php echo set_value('ims_user_created_on', isset($ims_users['ims_user_created_on']) ? $ims_users['ims_user_created_on'] : ''); ?>"  />
        <span class="help-inlinee"><?php echo form_error('ims_user_created_on'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('remarks') ? 'error' : ''; ?>">
            <?php echo form_label('Remarks', 'remarks', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'remarks', 'id' => 'remarks', 'rows' => '5', 'cols' => '80', 'value' => set_value('remarks', isset($ims_users['remarks']) ? $ims_users['remarks'] : '') ) )?>
            <span class="help-inlinee"><?php echo form_error('remarks'); ?></span>
        </div>

        </div>


        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                200 => 200,
); ?>

        <?php echo form_dropdown('status', $options, set_value('status', isset($ims_users['status']) ? $ims_users['status'] : ''), 'Status')?>


        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Create IMS Users" />
            or <?php echo anchor(SITE_AREA .'/reports/ims_users', lang('ims_users_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
