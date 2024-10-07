
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($dishes) ) {
    $dishes = (array)$dishes;
}
$id = isset($dishes['id']) ? $dishes['id'] : '';
?>
<div class="admin-box">
    <h3>dishes</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
            <?php echo form_label('Name'. lang('bf_form_label_required'), 'name', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="name" type="text" name="name" maxlength="100" value="<?php echo set_value('name', isset($dishes['name']) ? $dishes['name'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('name'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('serving_size') ? 'error' : ''; ?>">
            <?php echo form_label('Serving Size', 'serving_size', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="serving_size" type="text" name="serving_size" maxlength="11" value="<?php echo set_value('serving_size', isset($dishes['serving_size']) ? $dishes['serving_size'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('serving_size'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('cooking_time') ? 'error' : ''; ?>">
            <?php echo form_label('Cooking Time', 'cooking_time', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="cooking_time" type="text" name="cooking_time" maxlength="11" value="<?php echo set_value('cooking_time', isset($dishes['cooking_time']) ? $dishes['cooking_time'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('cooking_time'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('remarks') ? 'error' : ''; ?>">
            <?php echo form_label('Remarks', 'remarks', array('class' => "control-label") ); ?>
            <div class='controls'>
            <?php echo form_textarea( array( 'name' => 'remarks', 'id' => 'remarks', 'rows' => '5', 'cols' => '80', 'value' => set_value('remarks', isset($dishes['remarks']) ? $dishes['remarks'] : '') ) )?>
            <span class="help-inline"><?php echo form_error('remarks'); ?></span>
        </div>

        </div>
        <div class="control-group <?php echo form_error('created_on') ? 'error' : ''; ?>">
            <?php echo form_label('Created On', 'created_on', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="created_on" type="text" name="created_on" maxlength="11" value="<?php echo set_value('created_on', isset($dishes['created_on']) ? $dishes['created_on'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('created_on'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Edit dishes" />
            or <?php echo anchor(SITE_AREA .'/settings/dishes', lang('dishes_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Dishes.Settings.Delete')) : ?>

            or <a class="btn btn-danger" id="delete-me" href="<?php echo site_url(SITE_AREA .'/settings/dishes/delete/'. $id);?>" onclick="return confirm('<?php echo lang('dishes_delete_confirm'); ?>')" name="delete-me">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('dishes_delete_record'); ?>
            </a>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
