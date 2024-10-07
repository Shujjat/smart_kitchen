<!-- Modal -->

<?php
if($this->auth->has_permission('IMS_Sessions.Settings.View'))
{
    

    if($this->auth->default_ims_session_id()=='' or $this->auth->default_ims_session_id()=='-1')
    {
        
        Template::set_message('Academic Sesstion not set. <a href="http://'.HOST.'/index.php/admin/settings/ims_sessions">Click here to fix.</a>','danger');
    }
}
?>
<div class="modal " id="cvgs" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Virtual Groups</h4>
        </div>
        <div class="modal-body">
        
        <table cellpadding="5" cellspacing="5" width="100%" align="center" >
        <tr >
            <td>
                
                <div class="box box-solid bg-white">
                    <div class="box-header">
                        <h3 class="box-title">Virtual Groups</h3>
                    </div>
                    <div class="box-body">
                        <p>
                            <?php 
                            //Put correct permissions
                           if($this->auth->has_permission('Fees.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/cvg/campuses' ?>">All Groups</a><br />
                            <?php
                            }
                            ?>
                             <?php 
                           if($this->auth->has_permission('Students.Content.View'))
                           {
                            ?>
                           <a href="<?php echo 'http://'.HOST.'/index.php/admin/cvg/campuses/create' ?>">Create</a><br />
                           <?php
                            }
                            ?>
                           
                           
                           <?php 
                           if($this->auth->has_permission('Fees.Settings.View'))
                           {
                            ?>
                           <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/fees' ?>">Finished</a><br />
                           <?php
                            }
                            ?>
                           <?php 
                           if($this->auth->has_permission('Fees.Settings.View'))
                           {
                            ?>
                           <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/fees' ?>">Active</a><br />
                           <?php
                            }
                            ?>
                           
                           
                           <?php 
                           if($this->auth->has_permission('Students.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/students' ?>">Blocked</a><br />
                            <?php
                           }
                           ?>
                           <?php 
                           if($this->auth->has_permission('Institutes.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/institutes' ?>">Institute Settings</a><br />
                            <?php
                            }
                            ?>
                           
                            <?php 
                           if($this->auth->has_permission('Employees.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/employees' ?>">Employees Settings</a><br />
                            <?php
                            }
                            ?>
                          
                           
                        </p>
                    </div><!-- /.box-body -->
                </div>   
                </td>
                
                
                
        </tr>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>
<div class="modal " id="settings" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Settings</h4>
        </div>
        <div class="modal-body">
        
        <table cellpadding="5" cellspacing="5" width="100%" align="center" >
        <tr >
            <td>
                
                <div class="box box-solid bg-white">
                    <div class="box-header">
                        <h3 class="box-title">Settings</h3>
                    </div>
                    <div class="box-body">
                        <p>
                            <?php 
                           if($this->auth->has_permission('Fees.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo ''.HOST.'/index.php/admin/settings/fees/empty_all_bills' ?>">Empty All Bills</a><br />
                            <?php
                            }
                            ?>
                             <?php 
                           if($this->auth->has_permission('Students.Content.View'))
                           {
                            ?>
                           <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/students/all_students' ?>">All Students</a><br />
                           <?php
                            }
                            ?>
                           
                           
                           <?php 
                           if($this->auth->has_permission('Fees.Settings.View'))
                           {
                            ?>
                           <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/fees' ?>">Fees Settings</a><br />
                           <?php
                            }
                            ?>
                           
                           
                           <?php 
                           if($this->auth->has_permission('Students.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/students' ?>">Students Settings</a><br />
                            <?php
                           }
                           ?>
                           <?php 
                           if($this->auth->has_permission('Institutes.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/institutes' ?>">Institute Settings</a><br />
                            <?php
                            }
                            ?>
                           
                            <?php 
                           if($this->auth->has_permission('Employees.Settings.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/settings/employees' ?>">Employees Settings</a><br />
                            <?php
                            }
                            ?>
                          
                           
                        </p>
                    </div><!-- /.box-body -->
                </div>   
                </td>
                
                
                
        </tr>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>
<div class="modal " id="reports" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reports</h4>
        </div>
        <div class="modal-body">
            <?php 
            if($this->auth->has_permission('Students.Reports.Admissions'))
            {
                ?>
                <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/reports/students/admissions_summary' ?>">
                    <i class=""></i> General Reports
                </a>
                <?php 
            }
            ?>
            
            
           
            <?php 
            if($this->auth->has_permission('Students.Reports.View'))
            {
                ?>
                <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/reports/students/inquiries' ?>">
                     Inquiries
                </a>
                <?php 
            }
            ?>
            <?php 
            if($this->auth->has_permission('Fees.Content.PayBill'))
            {
                ?>
                <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/content/fees/pay_bill' ?>">
                     Siblings Reports
                </a>
                <?php 
            }
            ?>
            
            <?php 
            if($this->auth->has_permission('Students.Reports.View'))
            {
                ?>
                <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/reports/students/attendance_summary' ?>">
                     Attendance Summary
                </a>
                <?php 
            }
            ?>
            <?php 
            if($this->auth->has_permission('Fees.Content.PayBill'))
            {
                ?>
                <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/monthly_student_fee_statement' ?>">
                    Fee Summary
                </a>
                <?php 
            }
            ?>
            <?php 
            if($this->auth->has_permission('Fees.Content.PayBill'))
            {
                ?>
                <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/over_due_fees' ?>">
                     Fee Defaulters
                </a>
                <?php 
            }
            ?>
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>
<div class="modal fade" id="accounts" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Accounts</h4>
        </div>
        <div class="modal-body">
        
        <table cellpadding="5" cellspacing="5" width="100%" align="center" >
        <tr >
            <td>
                
                <div class="box box-solid bg-white">
                    <div class="box-header">
                        <h3 class="box-title">Accounts</h3>
                    </div>
                    <div class="box-body">
                        <p>
                            <?php 
                            if($this->auth->has_permission('Accounts.Content.Create'))
                            {
                            ?>
                            <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/accounts/create' ?>">New Journal Entry</a><br />
                            <?php 
                            }
                            if($this->auth->has_permission('Accounts.Reports.Browse_Journal'))
                            {
                             ?><a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/accounts/' ?>">Browse Journal</a><br /><?php   
                            }?>
                            <?php 
                            if($this->auth->has_permission('Accounts.Reports.Browse_Ledger'))
                            {
                             ?><a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/accounts/browse_ledger' ?>">Browse Ledger</a><br /><?php   
                            }?>
                            
                            <?php 
                            if($this->auth->has_permission('Accounts.Reports.View_Day_Book') )
                            {
                             ?><a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/accounts/day_book' ?>">Day Book</a><br /><?php   
                            }?>
                            
                            <?php 
                            
                            if($this->auth->has_permission('Fees.Content.ViewAdvanceFees') )
                            {
                             ?><a href="<?php echo 'http://'.HOST.'/index.php/admin/content/fees/advances' ?>">All Advances</a><br /><?php   
                            }?>
                             <?php 
                            
                            if($this->auth->has_permission('Fees.Content.RecieveAdvanceFee') )
                            {
                             ?><a href="<?php echo 'http://'.HOST.'/index.php/admin/content/fees/advance_create' ?>">Recieve Advance Fees</a><br /><?php   
                            }?>
                            
                            
                            
                        </p>
                    </div><!-- /.box-body -->
                </div>   
                </td>
                
        </tr>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Manage Students</h4>
        </div>
        <div class="modal-body center">
            <?php
            
            
            if($this->auth->has_permission('Students.Content.Inquiry'))
            {
            ?>
            
            <a class="btn btn-app bg-maroon" href="http://<?php echo HOST.'/index.php/admin/content/students/inquiry';?>">
                <i class="fa fa-plus "></i> New Inquiry
            </a>
            <?php
            }
           if($this->auth->has_permission('Students.Content.Create'))
           {
            ?>
            <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/content/students/create' ?>">
                <i class="fa fa-user"></i> New Admission
            </a>
            <?php
            }
            
           if($this->auth->has_permission('Fees.Reports.PrintBills'))
           {
            ?>
            
            <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/print_bills' ?>">
                <i class="fa fa-print"></i> Print Challan
            </a>
            
            <?php
            } 
           if($this->auth->has_permission('Fees.Content.PayBill'))
           {
            ?>
            <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/content/fees/pay_bill' ?>">
                <i class="fa fa-money"></i> Pay Challan
            </a>
           <?php 
           }
           
           if($this->auth->has_permission('Students.Content.TakeAttendanc'))
           {
            ?>
           
            <a class="btn btn-app bg-maroon" href="<?php echo 'http://'.HOST.'/index.php/admin/content/students/take_attendance' ?>">
                <i class="fa fa-user-plus"></i> Attendance
            </a>
           <?php
           }
           ?>
            
            
        
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>
  <div class="modal fade" id="myModalOld" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Manage Students</h4>
        </div>
        <div class="modal-body">
        
        <table cellpadding="5" cellspacing="5" width="100%" align="center" >
        <tr >
            <td>
                
                <div class="box box-solid bg-white">
                    <div class="box-header">
                        <h3 class="box-title">Fees</h3>
                    </div>
                    <div class="box-body">
                        <p>
                             <?php 
                           if($this->auth->has_permission('Fees.Content.PayBill'))
                           {
                            ?>
                            <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/fees/pay_bill' ?>">Pay Bill</a><br />
                             <?php
                            }
                            ?>
                             <?php 
                           if($this->auth->has_permission('Fees.Reports.ViewMonthlyFeeStatement'))
                           {
                            ?>
                            <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/monthly_student_fee_statement' ?>">All Statement</a><br />
                             <?php
                            }
                            ?>
                             <?php 
                           if($this->auth->has_permission('Fees.Reports.PrintFeeBill'))
                           {
                            ?>
                            <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/print_bills' ?>">Total collection</a><br />
                             <?php
                            }
                            ?>
                             <?php 
                           if($this->auth->has_permission('Fees.Reports.ViewCollection'))
                           {
                            ?>
                            <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/fees_recieved_by' ?>">Fee Recieved By</a><br />
                             <?php
                            }
                            ?>
                             <?php 
                           if($this->auth->has_permission('Fees.Reports.ViewCollection'))
                           {
                            ?>
                            <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/over_due_fees' ?>">Over Due Fees</a><br />
                             <?php
                            }
                            ?>
                             <?php 
                           if($this->auth->has_permission('Fees.Reports.PrintFeeBill'))
                           {
                            ?>
                            <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/fees/print_bills' ?>">Print Bills</a><br />
                            <?php
                            }
                            ?>
                           
                        </p>
                    </div><!-- /.box-body -->
                </div>   
                
               
                
                </td>
                <td >
                    <div class="box box-solid bg-white">
                        <div class="box-header">
                            <h3 class="box-title">Students</h3>
                        </div>
                        <div class="box-body">
                            <p>
                                
                                 <?php 
                           if($this->auth->has_permission('Students.Content.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/students/all_students' ?>">All Students</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Students.Content.Create'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/students/create' ?>">Create New Students</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Students.Content.TakeAttendanc'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/students/take_attendance' ?>">Take Attendance</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Students.Content.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/students/incomplete_enrollment' ?>">All Inquiries</a><br />
                             <?php
                            }
                            ?>
                            </p>
                        </div><!-- /.box-body -->
                    </div>
                </td>
                <td>
                
                    <div class="box box-solid bg-white">
                            <div class="box-header">
                                <h3 class="box-title">Results</h3>
                            </div>
                            <div class="box-body">
                                <p>
                                    
                                    
                            <?php 
                           if($this->auth->has_permission('Students.Settings.View'))
                           {
                            ?>
                                    <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/exams' ?>">List</a><br />
                                     <?php
                            }
                            ?>
                                     <?php 
                           if($this->auth->has_permission('Exams.Reports.ConsolidatedResu'))
                           {
                            ?>
                                    <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/exams/consolidated_results' ?>">Consolidates Result</a><br />
                                     <?php
                            }
                            ?>
                                     <?php 
                           if($this->auth->has_permission('Exams.Reports.Analyse'))
                           {
                            ?>
                                    <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/exams/analyzer' ?>">Analyzer</a><br />
                                     <?php
                            }
                            ?>
                                     <?php 
                           if($this->auth->has_permission('Exams.Reports.PrintBoardResultCard'))
                           {
                            ?>
                                    <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/exams/print_external_result_card' ?>">Print External Result Card</a><br />
                                     <?php
                            }
                            ?>
                                </p>
                            </div><!-- /.box-body -->
                    </div>   
                    
                    
                </td>
         
                <td>
                    
                    <div class="box box-solid bg-white">
                            <div class="box-header">
                                <h3 class="box-title">Attandances</h3>
                            </div>
                            <div class="box-body">
                                <p>
                                     <?php 
                           if($this->auth->has_permission('Students.Reports.ContactList'))
                           {
                            ?>
                                    <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/students/print_mailing_list' ?>">Contact List</a><br />
                                     <?php
                            }
                            ?>
                                     <?php 
                           if($this->auth->has_permission('Students.Reports.Admissions'))
                           {
                            ?>
                                    <a href="<?php echo 'http://'.HOST.'/index.php/admin/reports/students/admissions_summary' ?>">Admission Summary</a><br />
                                     <?php
                            }
                            ?>
                                </p>
                            </div><!-- /.box-body -->
                    </div>   
                
                
                </td>
                    
                
        </tr>
        </table>
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>
<!-- Frist lightbox complite -->

 <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Exams Controller</h4>
        </div>
        <div class="modal-body">
            <?php 
            if($this->auth->has_permission('Exams.Content.EnterMarks'))
            {
            ?>
            <a class="btn btn-app bg-red" href="<?php echo 'http://'.HOST.'/index.php/admin/content/exams/'; ?>">
                Home
            </a>
            
            <?php
            }
            ?>
            
            
            <?php 
            if($this->auth->has_permission('Exams.Content.Create'))
            {
            ?>
            <a class="btn btn-app bg-red" href="<?php echo 'http://'.HOST.'/index.php/admin/content/exams/create'; ?>">
                 New Exam
            </a>
            
            <?php
            }
            ?>
            <?php 
            if($this->auth->has_permission('Exams.Content.EnterMarks'))
            {
            ?>
            <a class="btn btn-app bg-red" href="<?php echo 'http://'.HOST.'/index.php/admin/content/exams/list_all'; ?>">
                 Enter Marks
            </a>
            
            <?php
            }
            ?>
            
            <?php 
            if($this->auth->has_permission('Students.Reports.PrintResult'))
            {
            ?>
            <a class="btn btn-app bg-red" href="<?php echo 'http://'.HOST.'/index.php/admin/reports/exams/gazette' ?>">
                 Print Results
            </a>
            
            <?php
            }
            ?>

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>

<!-- Second lightbox complite and close -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SMS Center</h4>
        </div>
        <div class="modal-body">
        <center>
        <table>
        <tr>
                <td>
                <div class="box box-solid bg-white">
                        <div class="box-header">
                            <h3 class="box-title">SMS</h3>
                        </div>
                        <div class="box-body">
                            <p>
                                 <?php 
                           if($this->auth->has_permission('Messages.Content.Create'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/messages/create'; ?>">Create Message</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Messages.Content.Send'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/messages/send_a_message'; ?>">Send a Message</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Messages.Content.Send'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/messages/send_message_to_selected_students'; ?>">Send Message to Selected Students</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Messages.Content.Send'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/messages/sms_anonymus'; ?>">SMS</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Messages.Content.View'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/messages/outbox'; ?>">Log Book</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Messages.Content.Send'))
                           {
                            ?>
                                <a href="<?php echo 'http://'.HOST.'/index.php/admin/content/messages/sms_to_employees'; ?>">SMS to Employees</a><br />
                                 <?php
                            }
                            ?>
                                 <?php 
                           if($this->auth->has_permission('Messages.Content.Send'))
                           {
                            ?>
                                <a href="<?php echo site_url(SITE_AREA .'/content/fees/send_fee_defaulter_notifications') ?>"><?php echo humanize('send_fee_defaulter_notifications');?> </a>
                             <?php
                            }
                            ?>
                            </p>
                        </div><!-- /.box-body -->
                    </div>
                </td>
  
        </tr>
        </table>
          </center>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>

<?php 
$available_credits=$this->credits_model->get_available_credits(array('campus_id'=>$this->auth->campus_id()));
$used_credits=$this->credits_model->get_used_credits(array('campus_id'=>$this->auth->campus_id()));
$loaded_credits=$this->credits_model->get_loaded_credits(array('campus_id'=>$this->auth->campus_id()));
$percentage=ceil($available_credits/$loaded_credits*100);

if($percentage<30)
{
    $color='red';
}
else
{
    $color='green';
}

?>
<?php 
if($this->auth->has_permission('Credits.Content.View') or $this->auth->has_permission('Fees.Reports.View'))
{
    
    
    ?>
    <div class="row">
        <div class="col-md-12">
            
            <div class="box box-solid box-info">
                <div class="box-header">
                    <h3 class="box-title">Today at <?php echo $this->campuses_model->get_name($this->auth->campus_id());?></h3>
                   
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <?php 
        if($this->auth->has_permission('Credits.Content.View')) 
        {
        
        
        ?>    
            <div class="col-md-2">
                
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">SMS Credits</h3>
                        
                        
                    </div>
                    <div class="box-body">
        
                        <code><?php echo $available_credits; ?></code>
                        <br />
                        
                        <div class="progress vertical large progress-striped active"  >
                            <div class="progress-bar progress-bar-<?php echo $color;?>" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="height: <?php echo $percentage; ?>%">
                                <span class="sr-only"><?php echo $percentage; ?></span>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    
        <?php 
        if($this->auth->has_permission('Fees.Reports.View')) 
        {
            $this->load->model('fees/fees_model');
    		Assets::add_js($this->load->view('fees/reports/js', null, true), 'inline');
    		$three_days_comparison_chart_string=$this->fees_model->get_three_days_comparison_chart_string();
            $remaining_balances_chart_string=$this->fees_model->get_remaining_balances_of_campuses_for_chart_string();
            
        
        ?>    
            <div class="col-md-4">
            
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <h3 class="box-title">Fee Collection </h3>
                        
                    </div>
                    <div class="box-body">
                        <code>Recent Three Days</code>
                        <p>
                            
                            <div id="chart_div" ></div>   
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            
                <div class="box box-solid box-success" >
                    <div class="box-header">
                        <h3 class="box-title">Attendance</h3>
                        
                    </div>
                    <div class="box-body">
                        <code>Today</code>
                        <div id="employeesAttendance" style="width: 250px; height: 300px; padding: 0px 0px 0px 0px;margin: 0px 0px 0px 0px;"></div>
                        
                        
                    </div>
                    
                </div>
            </div>
            <div class="col-md-3">
            
                <div class="box box-solid box-success" >
                    <div class="box-header">
                        <h3 class="box-title">Attendance</h3>
                        
                    </div>
                    <div class="box-body">
                        <code>Today</code>
                        
                        
                        <div id="studentsAttendance" style="width: 250px; height: 300px; "></div>
                    </div>
                    
                </div>
            </div>
    
        <?php
        }
        ?>
    </div>
<?php
}
?>

<div class="row">
    <div class="col-md-12">
        
        <div class="box box-solid box-info">
            <div class="box-header">
                <h3 class="box-title">Let's do something awesome</h3>
               
            </div>
            
        </div>
    </div>
</div>
<!-- third lightbox complite and close -->
<?php 
if($this->auth->has_permission('Students.Content.View'))
{
    

?>


<div class="row">
    
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?php echo lang('students');?>
                </h3>
                <p>
                    <?php echo lang('students');?>
                    <?php echo lang('management');?>
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <?php echo anchor(SITE_AREA.'/content/students','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#myModal" class="small-box-footer"')?>
            
        </div>
    </div>
<?php
}
 ?>
    
  <?php 
if($this->auth->has_permission('Exams.Content.View'))
{
?>
  <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        Exams
                    </h3>
                    <p>
                        Tests, Datesheets and Gazettes
                    </p>
                </div>
                <div class="icon">
                    <i class="fa  fa-question-circle"></i>
                </div>
                <?php echo anchor(SITE_AREA.'/content/exams','Dive In <i class="fa fa-arrow-circle-right"></i>',' data-toggle="modal" data-target="#myModal2" class="small-box-footer"')?>
                                
            </div>
    </div>
<?php
}

if($this->auth->has_permission('Messages.Content.View') and DM!='ST')
{

?>
    
    <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>
                        Messages
                    </h3>
                    <p>
                        SMS, Log books and Credits
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <?php echo anchor(SITE_AREA.'/content/messages','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#myModal3" class="small-box-footer"')?>
                                
            </div>
        </div>
<?php 
}


if($this->auth->has_permission('Accounts.Content.View') and DM!='ST')
{
    

?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        Accounts
                    </h3>
                    <p>
                       Journal, Reports
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-gears"></i>
                </div>
                
                <?php echo anchor(SITE_AREA.'/content/accounts','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#accounts" class="small-box-footer"')?>
                
            </div> 
        </div>
<?php
}
 
 
 
if($this->auth->has_permission('Employees.Content.View'))
{
?>
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3>
                Employees
            </h3>
            <p>
                Registration, Attendance and others
            </p>
        </div>
        <div class="icon">
            <i class="glyphicon glyphicon-user"></i>
        </div>
        
        <?php echo anchor(SITE_AREA.'/content/employees/','Dive In <i class="fa fa-arrow-circle-right"></i>','class="small-box-footer"')?>
    </div>
</div>
<?php 
}
    
if($this->auth->has_permission('Students.Reports.View') )
{
    

?>
   
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>
                    Reports
                </h3>
                <p>
                   All Categories
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-charts"></i>
            </div>
            
            <?php echo anchor(SITE_AREA.'/reports','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#reports" class="small-box-footer"')?>
            
        </div>
    </div>
<?php 

}
 
if($this->auth->has_permission('Institutes.Settings.View') )
{
    

?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>
                    Settings
                </h3>
                <p>
                   Cross Site Settings
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-charts"></i>
            </div>
            
            <?php echo anchor(SITE_AREA.'/reports','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#settings" class="small-box-footer"')?>
            
        </div>
    </div>
<?php
} 
if($this->auth->has_permission('Campuses.Content.View') )
{
    

?>  
    
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php echo lang('management');?>
                </h3>
                <p>
                    General Options 
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-gears"></i>
            </div>
            
            <?php echo anchor(SITE_AREA.'/content/campuses/management','Dive In <i class="fa fa-arrow-circle-right"></i>',' class="small-box-footer"');?>
            
        </div>
    </div>
 <?php
 
} 

if($this->auth->has_permission('Campuses.Content.View') and DM!='ST')
{
    

?>  
    
   <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    Virtual Groups
                </h3>
                <p>
                   Distance Learning
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-charts"></i>
            </div>
            
            <?php echo anchor(SITE_AREA.'/reports','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#cvgs" class="small-box-footer"')?>
            
        </div>
    </div>
 <?php
 
} 
    

?>   
    
    <!-- ./col -->
</div>
<?php
$this->load->model('employees/employees_model');
$this->load->model('students/students_model');
$total_employees=count($this->employees_model->get_all_employees($this->auth->campus_id()))-1;

$criteria=array(
                    'campus_id' =>  $this->auth->campus_id(),
                    'status'    =>  'present',
                    'date_on'   =>  date("Y-m-d"),
                );

$present_employees=$this->employees_model->get_attendance($criteria)->num_rows();
$absent_employees=$total_employees-$present_employees;
$criteria=array(
                    'campus_id' =>  $this->auth->campus_id(),
                    'status'    =>  'leave',
                    'date_on'   =>  date("Y-m-d"),
                );
                
$leave_employees=$this->employees_model->get_attendance($criteria)->num_rows();
$criteria=array(
                    'campus_id' =>  $this->auth->campus_id(),
                    'status'    =>  'late',
                    'date_on'   =>  date("Y-m-d"),
                );
$late_employees=$this->employees_model->get_attendance($criteria)->num_rows();
$total_students=$this->students_model->get_all_students($this->auth->campus_id())->num_rows();

$criteria=array(
                    'campus_id' =>  $this->auth->campus_id(),
                    'status'    =>  'present',
                    'date_on'   =>  date("Y-m-d"),
                );

$present_students=$this->students_model->get_attendance($criteria)->num_rows();
$absent_students=$total_students-$present_students;
$criteria=array(
                    'campus_id' =>  $this->auth->campus_id(),
                    'status'    =>  'late',
                    'date_on'   =>  date("Y-m-d"),
                );
$late_students=$this->students_model->get_attendance($criteria)->num_rows();
$criteria=array(
                    'campus_id' =>  $this->auth->campus_id(),
                    'status'    =>  'leave',
                    'date_on'   =>  date("Y-m-d"),
                );
$leave_students=$this->students_model->get_attendance($criteria)->num_rows();



?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      <?php 
      echo $three_days_comparison_chart_string;
      ?>
      
      
       
    ]);

    var options = {
      chart: {
        title: '',
        subtitle: '',
        
      }
    };

    var chart = new google.charts.Bar(document.getElementById('chart_div'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      <?php 
        echo $remaining_balances_chart_string;
      ?>
      
      
       
    ]);

    var options = {
      chart: {
        title: '',
        subtitle: '',
        
      }
    };

    var chart = new google.charts.Bar(document.getElementById('remaining_balances'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>




<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['', ''],
      
      
      ['Leave',      <?php echo $leave_employees;?>],
      ['Absent',      <?php echo $absent_employees;?>],
      ['Late',      <?php echo $late_employees;?>],
      ['Present',     <?php echo $present_employees; ?>],
      
     
    ]);

    var options = {
      title: 'Employees Attendance',
      slices: {
            
            
            0: { color: 'yellow' },
            1: { color: 'red' },
            2: { color: 'orange' },
            3: { color: 'green' },
            
          },
      chartArea:{left:20,top:0,width:'100%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('employeesAttendance'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['', ''],
      ['Leave',      <?php echo $leave_students;?>],
      ['Absent',      <?php echo $absent_students;?>],
      ['Late',      <?php echo $late_students;?>],
      ['Present',     <?php echo $present_students; ?>],
      
     
    ]);

    var options = {
      title: 'Students Attendance',
     
      slices: {
            
            
            0: { color: 'yellow' },
            1: { color: 'red' },
            2: { color: 'orange' },
            3: { color: 'green' },
            
          },
      chartArea:{left:20,top:0,width:'100%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('studentsAttendance'));

    chart.draw(data, options);
  }
</script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    
  </body>
</html>

