<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ims_users_model extends BF_Model {

	protected $table		= "ims_users";
    protected $system_users_table		= "users";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
    
    function get_non_users($type)
    {
        $query='
                    SELECT  * 
                    FROM    '.$this->table.'
                    WHERE   '.$this->table.'.institute_id='.$this->auth->institute_id().'
                    AND     '.$this->table.'.type=\''.$type.'\'                   
                ;
                ';
        $result=$this->db->query($query);
        foreach($result->result() as $row)
        {
            $in=$in.','.$row->in_type_id;
        }
        $in=substr($in,1);
        if($in!='')
        {
            $query='
                    SELECT  * 
                    FROM    '.$type.'
                    WHERE   '.$type.'.institute_id='.$this->auth->institute_id().'
                    AND     '.$type.'.campus_id='.$this->auth->campus_id().'
                    AND     '.$type.'.status="active"
                    AND     id NOT IN ('.$in.')
                   
                ;
                '; 
        }
        else
        {
            $query='
                    SELECT  * 
                    FROM    '.$type.'
                    WHERE   '.$type.'.institute_id='.$this->auth->institute_id().'
                    AND     '.$type.'.campus_id='.$this->auth->campus_id().'
                    AND     '.$type.'.status="active"
                  
                   
                ;
                ';   
        }
       // echo $query;
       
        $result=$this->db->query($query);
        return $result;
    } 
    
    function make_user($institute_id,$campus_id,$candidate_id,$type,$role_id)
    {
        
        if($institute_id=='')
        {
            $institute_id=$this->auth->institute_id();
        }
        switch($type)
        {
            case 'students':
                    
                    $student_id=$candidate_id;
                    $username=$this->students_model->get_name($student_id);
                    $first_name=$this->students_model->get_first_name($student_id);
                    $last_name=$this->students_model->get_last_name($student_id);
                    $display_name=$username;
                    $language='english';
                    $email=$this->students_model->get_email($student_id);
                    if($email=='')
                    {
                        $email=$student_id.$institute_id.'@ims.com';
                    }
                    $password=$email;
                    
                    break;
             case 'parents':
                    
                    $parent_id=$candidate_id;
                    $username=$this->parents_model->get_name($student_id);
                    $first_name=$this->parents_model->get_first_name($student_id);
                    $last_name=$this->parents_model->get_last_name($student_id);
                    if($last_name==''){$last_name=$first_name;}
                    $display_name=$username;
                    $language='english';
                    $email=$this->students_model->get_email($student_id);
                    if($email=='')
                    {
                        $email='p'.$parent_id.'@ims.com';
                    }
                    $password=$email;
                    
                    break;
            case 'employees':
                    
                    $employee_id=$candidate_id;
                    $username=$this->employees_model->get_name($employee_id);
                    $first_name=$this->employees_model->get_first_name($employee_id);
                    $last_name=$this->employees_model->get_last_name($employee_id);
                    $display_name=underscore($username);
                    $password=$display_name;
                    $language='english';
                    $email=$this->employees_model->get_email($employee_id);
                    if($email=='')
                    {
                        $email=$display_name.'@ims.com';
                    }
                    break;
        }
      
        
        $data=array(
                    'username'  =>  '12345',
                    'password'  => $password,
                    'role_id'   =>  $role_id,
                    'display_name'=> $username,
                    'language'  =>$language,
                    'email'     =>$email,
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email' =>$email,
                    'institute_id'  =>$institute_id,
                    'campus_id'     =>$campus_id,
                    'active'        =>'1',
                    'in_type_id'    =>  $candidate_id,
                    'type'          =>  $type
                    );
       
        $this->user_model->insert($data);
        $user_id=$this->db->insert_id();
        unset($data);
        $data=array(
                    'institute_id'  =>  $institute_id,
                    'type'          =>  $type,
                    'user_id'       =>  $user_id,
                    'in_type_id'    =>  $candidate_id,
                    'status'        =>  'active',
                    'created_by'    =>  $this->auth->user_id(),
                    'created_on'    =>  date("Y-m-d H:i:s"),
                    );
        
        $this->db->insert('ims_users',$data);
      
    }
    function get_id_by_name($role_name)
    {
        $criteria=array('role_name'=>$role_name);
        $result=$this->db->get_where('roles',$criteria);
        $row=$result->row();
        $role_id=$row->role_id;
        return $role_id;
    }
    function get_user_id($id,$type,$flat=false)
    {
         if(!$flat)
         {
            $criteria=array(
                            'institute_id'  =>  $this->auth->institute_id(),
                            'in_type_id'    =>  $id,
                            'type'          =>  $type
                        );
            
         }
         else
         {
            $criteria=array(
                            
                            'in_type_id'    =>  $id,
                            'type'          =>  $type
                        );
         
         }
        
         $result=$this->db->get_where('users',$criteria);
         $row=$result->row();
         
         $user_id=$row->id;
        
         return $user_id;
    }
    function get_user($id)
    {
         $criteria=array(
                         //   'institute_id'  =>  $this->auth->institute_id(),
                            'id'    =>  $id,
                           
                        );
        
         $result=$this->db->get_where('users',$criteria);
         return $result->row();
         
    }
    function get_in_type_id($user_id,$type)
    {
         $criteria=array(
                           // 'institute_id'  =>  $this->auth->institute_id(),
                            'id'    =>  $user_id,
                           
                        );
         $result=$this->db->get_where('users',$criteria);
        
         $row=$result->row();
         
         $in_type_id=$row->in_type_id;
         return $in_type_id;
    }
    function get_role_id($user_id)
    {
        $criteria=array('id' => $user_id);
        // print_r($criteria);die();
        $result=$this->db->get_where('users',$criteria);
        $row=$result->row();
        $role_id=$row->role_id;
        return $role_id;
        
    }
      
    function get_all_roles()
    {
        $roles=array('-1'=>'Select Role');
        $not_include=array('Administrator','Editor','Developer','User','WaysAll');
        $result=$this->db->get('roles');
        foreach($result->result() as $row)
        {
            $role_id=$row->role_id;
            $role_name=$row->role_name;
            if(!in_array($role_name,$not_include))
            {
                $roles[$role_id]=$role_name;
            }
        }
        return $roles;
    }
    
    function has_campus($institute_id,$campus_id,$user_id)
    {
        $criteria=array(
                           'institute_id'   =>  $institute_id,
                           'campus_id'      =>  $campus_id,
                           'principal_id'   =>  $user_id, 
                            
                        );
        
                        
        $result=$this->db->get_where('campuses_principals',$criteria);
      
        if($result->num_rows>0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    function get_name($user_id,$type,$link=false)
    {
        
        $id=$this->get_in_type_id($user_id,$type);
        if($type=='employees')
        {
            
            $this->load->model('employees/employees_model');
            $name=$this->employees_model->get_name($id);
            if($this->auth->has_permission('Employees.Content.View'))
            {
                $output=anchor(''.HOST.'/index.php/admin/content/employees/edit/'.$id,$name,array('target'=>'blank'));
            }
        }
        elseif($type=='students')
        {
            $this->load->model('students/students_model');
            
            $name=$this->students_model->get_name($id);
            if($this->auth->has_permission('Students.Content.View'))
            {
                $output=anchor(''.HOST.'/index.php/admin/students_self/students/'.$id,$name,array('target'=>'blank'));
                
                
            }
            
        }
        elseif($type=='parents')
        {
            $this->load->model('parents/prents_model');
            $name=$this->prents_model->get_name($id);
            if($this->auth->has_permission('Students.Content.View'))
            {
                $output=anchor(''.HOST.'/index.php/admin/content/parents/edit/'.$id,$name,array('target'=>'blank'));
            }
        }
        return $output;
    }   
    function get_system_email($in_type_id,$type)
    {
        $criteria=array(
                            'in_type_id'    =>      $in_type_id,
                            'type'          =>      $type,
                        
                        );
        $result=$this->db->get_where('users',$criteria);
        $row=$result->row();
        $system_email=$row->email;
        return  $system_email;
        
    }       
    function    update_role($user_id,$new_role)
    {
        $criteria=array(
                            'id'    =>      $user_id,
                        );
        $data=array('role_id'=>$new_role);
        $this->db->update($this->system_users_table,$data,$criteria);
        return true;
    }
       
}
