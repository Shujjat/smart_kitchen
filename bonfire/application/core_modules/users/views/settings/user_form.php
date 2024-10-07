
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
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" autocomplete="off"'); ?>

    <section class="content">

      <div class="row">
        <div class="col-md-5">
            
            
          <div class="box box-primary">
          
          
            <div class="box-body box-profile" >
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/logo.png" alt="User profile picture" />
              
               <div class="control-group <?php echo form_error('username') ? 'error' : '' ?>">
    			
    			<div class="controls">
                    <h3 class="profile-username text-center" >
                        <input type="file" class="btn btn-sm" placeholder="Name" type="text" name="username" id="username" value="<?php echo isset($user) ? $user->username : set_value('username') ?>" />
                    </h3>
                      
    				
    				<?php if (form_error('username')) echo '<span class="help-inline">'. form_error('username') .'</span>'; ?>
    			</div>
    		</div> 
              
              <div class="control-group <?php echo form_error('username') ? 'error' : '' ?>">
    			
    			<div class="controls">
                    <h3 class="profile-username text-center">
                        <?php
                        $_POST['display_name']!=''?$value=$_POST['display_name']:$value=$user->display_name ;
                        ?>
                        <input 
                            type="text" name="display_name" 
                            id="display_name" value="<?php echo $value; ?>" 
                            placeholder="Name of User"
                         />
                    </h3>
                      
    				
    				<?php if (form_error('display_name')) echo '<span class="help-inline">'. form_error('display_name') .'</span>'; ?>
    			</div>
    		</div>
              
              
              
              
              
                
              

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>CNIC</b> 
                  <a class="pull-right">
                    <?php
                        $_POST['cnic']!=''?$value=$_POST['cnic']:$value=$user->cnic;
                    ?>
                    <input type="text" name="cnic" id="cnic" value="<?php echo $value; ?>" />  
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Contact Person</b> 
                  <a class="pull-right">
                    <?php
                        $_POST['contact_person']!=''?$value=$_POST['contact_person']:$value=$user->contact_person;
                    ?>
                    <input type="text" name="contact_person" id="contact_person" value="<?php echo $value; ?>" />  
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Mobile No</b> 
                  <a class="pull-right">
                    <?php
                        $_POST['mobile']!=''?$value=$_POST['mobile']:$value=$user->mobile;
                    ?>
                    <input type="text" name="mobile" id="mobile" value="<?php echo $value; ?>" />  
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Phone No</b> 
                  <a class="pull-right">
                    <?php
                        $_POST['phone']!=''?$value=$_POST['phone']:$value=$user->phone ;
                    ?>
                    <input type="text" name="phone" id="phone" value="<?php echo $value; ?>" />  
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Fax</b> 
                  <a class="pull-right">
                    <?php
                        $_POST['fax']!=''?$value=$_POST['fax']:$value=$user->fax;
                    ?>
                    <input type="text" name="fax" id="fax" value="<?php echo $value; ?>" />  
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Web</b> 
                  <a class="pull-right">
                    <?php
                        $_POST['web']!=''?$value=$_POST['web']:$value=$user->web;
                    ?>
                    <input type="text" name="web" id="web" value="<?php echo $value; ?>" />  
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> 
                  <a class="pull-right">
                    <?php
                        $_POST['email']!=''?$value=$_POST['email']:$value=$user->email ;
                    ?>
                    <input type="email" name="email" id="email" 
                    value="<?php echo $value; ?>" />
                  </a>
                </li>
                
                
                <li class="list-group-item">
                  <b>Password</b> 
                  <a class="pull-right">
                    
                    <input type="password" name="password" id="password" value="<?php echo $_POST['password'];?>" />
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Address </b> 
                  <p class="pull-right">
                  
                    <?php
                        $_POST['address_line_1']!=''?$value=$_POST['address_line_1']:$value=$user->address_line_1 ;
                    ?>
                  
                    <input  type="text" name="address_line_1" id="address_line_1" 
                    placeholder="Address Line 1"
                    value="<?php echo $value; ?>" />
                    <br />
                    <?php
                        $_POST['address_line_2']!=''?$value=$_POST['address_line_2']:$value=$user->address_line_2 ;
                    ?>
                    <input  type="text" name="address_line_2" id="address_line_2" 
                    placeholder="Address Line 2"
                    value="<?php echo $value; ?>" />
                    <br />
                    <?php
                        $_POST['address_line_3']!=''?$value=$_POST['address_line_3']:$value=$user->address_line_3 ;
                    ?>
                    <input  type="text" name="address_line_3" id="address_line_3" 
                    placeholder="Address Line 3"
                    value="<?php echo $value; ?>" />
                     <br />
                        <select name="city"><option value="lahore">Lahore</option></select>
                        <select name="state"><option value="punjab">Punjab</option></select>
                        <select name="country" ><option value="pakistan">Pakistan</option></select>
                        
                   
                    
                  </p>
                  
                  <br /><br /><br /><br /><br />
                  <li class="list-group-item">
                  <b>Role </b> 
                  <p class="pull-right">
                    
                    <br />
                    <?php
                        $_POST['role_id']!=''?$value=$_POST['role_id']:$value=$user->role_id ;
                        
                        $controller_role_id=$this->my_role_model->get_controller_role($value);
                       
                        $controller_users=$this->my_user_model->get_users_by_role($controller_role_id);
                        
                    ?>
                    
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
                    
                  </p>
                  
                  <br /><br />
                  
                  <li class="list-group-item">
                  <b>Controller </b> 
                  <p class="pull-right">
                    <br />
                    <select name="controller_id" id="controllerID" class="chzn-select">
					
						<?php 
                        
                        $users_ids=array_keys($controller_users);
                        foreach ($users_ids as $user_id) : ?>
                            <option value="<?php echo $user_id ?>" >
								<?php echo $controller_users[$user_id]; ?>
							</option>

							

						<?php endforeach; ?>
				
					</select>
                    
                    
                    
                    
                  </p>
                  
                  <br /><br />
                  <li class="list-group-item">
                  <b>Discount Rate</b> 
                  <p class="pull-right">
                    
                    <br />
                    <?php
                        $_POST['discount_rate']!=''?$value=$_POST['discount_rate']:$value=$user->discount_rate;
                        
                        
                    ?>
                        <input  type="text" name="discount_rate" id="credit_limit" 
                        placeholder="Discount Rate"
                        value="<?php echo $value; ?>" />
                    
                    
                  </p>
                  
                  <br /><br />
                  <li class="list-group-item">
                  <b>Credit Limit </b> 
                  <p class="pull-right">
                    
                    <br />
                    <?php
                        $_POST['credit_limit']!=''?$value=$_POST['credit_limit']:$value=$user->credit_limit;
                        
                        
                    ?>
                        <input  type="text" name="credit_limit" id="credit_limit" 
                        placeholder="Credit Limit"
                        value="<?php echo $value; ?>" />
                    
                    
                  </p>
                  
                  <br /><br />
                  <li class="list-group-item">
                  <b>Credit Days </b> 
                  <p class="pull-right">
                    
                    
                    <?php
                        $_POST['credit_days']!=''?$value=$_POST['credit_days']:$value=$user->credit_days;
                        
                        
                    ?>
                        <input  type="text" name="credit_days" id="credit_days" 
                        placeholder="Credit Days"
                        value="<?php echo $value; ?>" />
                    
                    
                  </p>
                  
                  <br /><br />
                  <li class="list-group-item">
                  <b>Payment Commitment</b> 
                  <p class="pull-right">
                    
                    
                    <?php
                        $_POST['payment_commitment']!=''?$value=$_POST['payment_commitment']:$value=$user->payment_commitment;
                        
                        
                    ?>
                        <select name="payment_commitment" id="payment_commitment" class="chzn-select">
					
						<?php 
                        
                        $payment_commitments=array('next_visit'=>'Next Visit','next_month'=>'Next Month');
                        $payment_commitments_keys=array_keys($payment_commitments);
                        foreach ($payment_commitments_keys as $key) : ?>
                            <?php
                            if($key==$value)
                            {
                                ?>
                                <option selected="selected" value="<?php echo $key ?>" >
                                <?php    
                            }
                            else
                            {
                                ?>
                                <option value="<?php echo $key ?>" >
                                <?php
                            }
                            ?>
                            
                            
                            
								<?php echo $payment_commitments[$key]; ?>
							</option>

							

						<?php endforeach; ?>
				
					</select>
                    
                    
                  </p>
                  
                  <br /><br />
                  <li class="list-group-item">
                  <b>Referrer </b> 
                  <p class="pull-right">
                    
                    <select name="referrer" id="referrer" class="chzn-select">
					
						<?php 
                        
                        $users_ids=array_keys($users);
                        foreach ($users_ids as $user_id) : ?>
                            <option value="<?php echo $user_id ?>" >
								<?php echo $users[$user_id]; ?>
							</option>

							

						<?php endforeach; ?>
				
					</select>
                    
                    
                    
                    
                  </p>
                  
                  <br /><br />
                  
                  <li class="list-group-item">
                  <b>Referrer Share</b> 
                  <p class="pull-right">
                    
                        <input class="form-control" id="referrerShare" name="referrer_share" />
                    
                    
                    
                    
                  </p>
                  
                  <br /><br />
                  
                  
                  <li class="list-group-item">
                  <b>Agreement</b> 
                  <p class="pull-right">
                    <?php
                        $_POST['target_sale']!=''?$value=$_POST['target_sale']:$value=$user->target_sale ;
                    ?>
                    <input  type="text" name="target_sale" id="targetSale" 
                    placeholder="Target Sale"
                    value="<?php echo $value; ?>" />
                    <br />
                    <?php
                        $_POST['target_amount']!=''?$value=$_POST['target_amount']:$value=$user->target_amount ;
                    ?>
                    <input  type="text" name="target_amount" id="targetAmount" 
                    placeholder="Target Amount"
                    value="<?php echo $value; ?>" />
                    <br />
                    <?php
                        $_POST['received_amount']!=''?$value=$_POST['received_amount']:$value=$user->received_amount;
                    ?>
                    <input  type="text" name="received_amount" id="receivedAmount" 
                    placeholder="Received Amount"
                    value="<?php echo $value; ?>" />
                    <br />
                    <?php
                        $_POST['required_sale']!=''?$value=$_POST['required_sale']:$value=$user->required_sale;
                    ?>
                    <input  type="text" name="required_sale" id="requiredSale" 
                    placeholder="Required Sale"
                    value="<?php echo $value; ?>" />
                    <br />
                    <?php
                        $_POST['required_recovery']!=''?$value=$_POST['required_recovery']:$value=$user->required_recovery;
                    ?>
                    <input  type="text" name="required_recovery" id="requiredRecovery" 
                    placeholder="Required Recovery"
                    value="<?php echo $value; ?>" />
                    <br />
                    
                    
                    
                  </p>
                  
                  <br /><br />
                  <input type="file" id="agreement" class="form-control" name="agreement[]" />
                  
                  
                  
                  <li class="list-group-item">
                  <b>Regions </b> 
                  <p class="pull-right">
                  
                    
                     <br />
                        <select name="city"><option value="lahore">Region</option></select>
                        <select name="state"><option value="punjab">Zone</option></select>
                        <select name="country" ><option value="pakistan">Sector</option></select>
                        
                   
                    
                  </p>
                  
                  <br /><br />
                  <li class="list-group-item">
                  <b>Remarks</b> 
                  <a class="pull-right">
                  <?php
                        
                        $_POST['remarks']!=''?$value=$_POST['remarks']:$value=$user->remarks;
                        
                    ?>
                    <textarea name="remarks"><?php echo $value;?></textarea>
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