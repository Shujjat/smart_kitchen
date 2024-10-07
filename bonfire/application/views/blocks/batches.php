<div>
<div class="admin-box">
	<h1>Classes</h1>
	<?php echo form_open($this->uri->uri_string()); ?>
    <fieldset>
    		<table class="table table-striped">
    			<thead>
                    <th>
                
                    <?php 
                $campuses=$this->auth->show_campuses();
                foreach($campuses as $campus_id)
                {
                    $campus_name=$this->campuses_model->get_name($campus_id);
              
                    
                   
                        
                    $departments=$this->departments_model->get_all_departments_resultset($campus_id);
                    foreach($departments->result() as $department)
                    {
                        
                        $department_id=$department->id;
                        $department_name=$this->departments_model->get_name($department_id);
                        
                        
                       
                       
                        $programs=$this->programs_model->get_all_programs_in_department_resultset($department_id);
                        foreach($programs->result() as $program)
                        {
                            
                            $program_id=$program->id;
                            $program_name=$this->programs_model->get_name($program_id);
                            
                            
                            echo '<br />'.'>>'.$program_name.'[';
                            
                            if($this->auth->institute_type()=='university')
                            {
                                $semesters=$this->programs_model->get_all_semesters_in_program($program_id);
                                //var_dump($semesters);
                                foreach($semesters as $semester_id)
                                {
                                    echo '>>Semester '.$semester_id.'[';
                                    $batches=$this->batches_model->get_all_batches_resultset($department_id,$program_id,$semester_id);
                                    foreach($batches->result() as $batch)
                                    {
                                         //var_dump($batch);
                                        $batch_id=$batch->id;
                                        $batch_name=$batch->batch;
                                        
                                        echo anchor($this->uri->uri_string().'/1/'.$batch_id,$batch_name).',';
                                       // echo anchor('','a');
                                    }
                                    echo ']';
                                }
                            }
                            else
                            {
                                $batches=$this->batches_model->get_all_batches_resultset($department_id,$program_id,1); 
                                foreach($batches->result() as $batch)
                                {
                                     //var_dump($batch);
                                    $batch_id=$batch->id;
                                    $batch_name=$batch->batch;
                                    
                                    echo anchor(site_url().'/admin/content/students/all_students/1/'.$batch_id,$batch_name).',';
                                   // echo anchor('','a');
                                } 
                            }
                            
                            echo ']<br />';
                           
                            
                               
                        }
                      
                         
                    }
                    
                   } 
                    
                      ?>
    				</th>
    	</thead>
    		
    		</table>
    	<?php echo form_close(); 
        
        ?>
        </fieldset>
</div>
</div>