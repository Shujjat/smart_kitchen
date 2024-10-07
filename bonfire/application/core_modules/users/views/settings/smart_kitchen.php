
<?php if (isset($user) && $user->banned) : ?>
<div class="alert alert-warning fade in">
	<h4 class="alert-heading"><?php echo lang('us_banned_admin_note'); ?></h4>
</div>
<?php endif; ?>
<!--
<div class="row-fluid">
	<div class="span8 offset2">
		<div class="alert alert-info fade in">
		  <a data-dismiss="alert" class="close">&times;</a>
			<h4 class="alert-heading"><?php echo lang('bf_required_note'); ?></h4>
			<?php if (isset($password_hints) ) echo $password_hints; ?>
		</div>
	</div>
</div>
-->
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" autocomplete="off" enctype="multipart/form-data"'); ?>

    <section class="content">

      <div class="row">
        <div class="col-md-5">
            
            
          <div class="box box-primary">
          
          
            <div class="box-body box-profile" >
                <?php
                    if($id!='')
                    { 
                    ?>
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=menu_<?php echo $user->id;?>&choe=UTF-8" height="50" width="50"  /> 
                    <?php
                    }
                    ?>
              <img class="profile-user-img img-responsive img-circle" height="100" width="100" src="<?php echo $this->my_user_model->get_user_image_web_location($id)?>" alt="User profile picture" />
              
               <div class="control-group <?php echo form_error('username') ? 'error' : '' ?>">
    			
    			<div class="controls">
                    <h3 class="profile-username text-center" >
                        <input type="file" class="btn btn-sm" name="image"   />
                    </h3>
                      
    				
    				<?php if (form_error('username')) echo '<span class="help-inline">'. form_error('username') .'</span>'; ?>
    			</div>
    		</div> 
              
              <div class="control-group <?php echo form_error('username') ? 'error' : '' ?>">
    			
    			<div class="controls">
                    <h3 class="profile-username text-center">
                        <input 
                            type="text" name="display_name" 
                            id="display_name" value="<?php echo isset($user) ? $user->display_name : set_value('display_name') ?>" 
                            placeholder="Name of Restaurant"
                         />
                    </h3>
                      
    				
    				<?php if (form_error('username')) echo '<span class="help-inline">'. form_error('username') .'</span>'; ?>
    			</div>
    		</div>
              
              
              
              
              
                
              

              <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                    
                    
                    <?php
                        $_POST['role_id']!=''?$value=$_POST['role_id']:$value=$user->role_id ;
                        
                       
                        
                    ?>
                    <b>Role</b> 
                      <a class="pull-right">
                          
                      
                            <select name="role_id" id="role_id" class="chzn-select" onchange="submit();">
        					
        						<?php 
                                foreach ($roles as $role)
                                {
                                    
                                    if($role->role_id==$value)
                                    {
                                        ?>
                                        <option selected="selected" value="<?php echo $role->role_id ?>" >
                                        <?php
                                    }
                                    else
                                    {
                                     ?>
                                     <option value="<?php echo $role->role_id ?>" >
                                     <?php   
                                    }
                                    ?>
                                   	
        								<?php echo ucfirst($role->role_name) ?>
        							</option>
        
                                    
                                    <?php    
                                } 
                                
                                ?>
        
        						  
        						
        							
        
        						
        					
        					</select>
                        </a>
                    
                  </li>
              
              
                <li class="list-group-item">
                  <b>What'sApp</b> 
                  <a class="pull-right">
                    <input type="text" name="phone" id="phone" value="<?php echo isset($user) ? $user->phone: set_value('phone') ?>" />  
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> 
                  <a class="pull-right">
                    <input type="email" name="email" id="email" 
                    value="<?php echo isset($user) ? $user->email : set_value('email') ?>" />
                  </a>
                </li>
                
                
                <li class="list-group-item">
                  <b>Password</b> 
                  <a class="pull-right">
                    <input type="password" name="password" id="password" 
                    value="<?php echo isset($user) ? $user->password : set_value('password') ?>" />
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Address </b> 
                  <p class="pull-right">
                    <input  type="text" name="address_line_1" id="address_line_1" 
                    placeholder="Address Line 1"
                    value="<?php echo isset($user) ? $user->address_line_1 : set_value('address_line_1') ?>" />
                    <br />
                    <input  type="text" name="address_line_2" id="address_line_2" 
                    placeholder="Address Line 2"
                    value="<?php echo isset($user) ? $user->address_line_1 : set_value('address_line_1') ?>" />
                    <br />
                    <input  type="text" name="address_line_3" id="address_line_3" 
                    placeholder="Address Line 3"
                    value="<?php echo isset($user) ? $user->address_line_1 : set_value('address_line_1') ?>" />
                     <br />
                    <select name="country" ><option value="contry">Country</option></select>
                    <select name="state"><option value="state">State</option></select>
                    <select name="city"><option value="city">City</option></select>
                    
                  </p>
                  
                  <br /><br /><br /><br /><br />
                  <li class="list-group-item">
                  <b>About Us</b> 
                  <a class="pull-right">
                    <textarea name="about_us"><?php echo isset($user) ? $user->about_us : set_value('about_us') ?></textarea>
                  </a>
                  <br /><br />
                </li>
              </ul>

              
            
            <button type="submit" name="submit_button"  class="btn btn-primary pull-right btn-block btn-sm">Save</button>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<?php echo form_close(); ?>