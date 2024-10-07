<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('IMS_Users.Content.View');
		$this->load->model('ims_users_model', null, true);
        $this->load->model('users/user_model');
        $this->load->model('students/students_model', null, true);
        $this->load->model('employees/employees_model', null, true);
		$this->lang->load('ims_users');
        $this->lang->load('ims_users/school',$this->auth->language);
	//	$this->lang->load('ims_users/school','pure_urdu');
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_js('jquery-ui-1.8.13.min.js');
		Template::set_block('sub_nav', 'content/_sub_nav');
        Assets::add_js('ajax.js');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

	
		if ($action = $this->input->post('delete'))
		{
			if ($action == 'Delete')
			{
				$checked = $this->input->post('checked');

				if (is_array($checked) && count($checked))
				{
					$result = FALSE;
					foreach ($checked as $pid)
					{
						$result = $this->ims_users_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('ims_users_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('ims_users_delete_failure') . $this->ims_users_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('ims_users_delete_error') . $this->ims_users_model->error, 'error');
				}
			}
		}
       
	    

		
		Template::set('toolbar_title', lang('ims_users_manage'));
		Template::render();
	}

	//--------------------------------------------------------------------
    function list_users()
	{

		$this->auth->restrict('IMS_Users.Content.View');
		
        $type=$this->uri->segment(5);
        
        if($type!='')
        {
            
            $criteria=array(
                                'institute_id'  =>  $this->auth->institute_id(),
                                //'campus_id'  =>  $this->auth->campus_id(),
                                'type'          =>  $type,
                                
                            );
            //print_r($criteria);
            
            $records=$this->db->get_where('users',$criteria);
            
            $records1=$records;
            if($this->input->post('submit_button'))
            {
                foreach($records1->result() as $row)
                {
                    $user_id=$row->id;
                  
                    $criteria=array('id'=>$user_id);
                    $role_id=$this->input->post('role_id_'.$user_id);
                    
                    $this->db->update('users',array('role_id'=>$role_id),array('id'=>$user_id));
                    
                }
               
               
            }
          
            Template::set_view('content/'.$type);
            Template::set('records', $records);
            
           
        }
	    

		
		Template::set('toolbar_title', lang('ims_users_manage'));
		Template::render();
	}


    function block()
    {
   	     Template::set('toolbar_title', 'Manage IMS Users');
         $this->auth->restrict('IMS_Users.Content.Edit');
         $type=$this->uri->segment(5);
         $user_id=$this->uri->segment(6);
         $criteria=array(
                                'institute_id'  =>  $this->auth->institute_id(),
                                'type'          =>  $type,
                            );
            $records=$this->db->get_where('ims_users',$criteria);
            
            
            if($user_id!='')
            {
                $this->db->update('users', array('active'=>0), array('id' => $user_id));
                
            }
            if($type=='employees')
            {
                Template::redirect(SITE_AREA.'/content/employees/all_employees/');    
            }
            else
            {
                Template::redirect($_SERVER['HTTP_REFERER']);
                
            }
            
    }
    function activate()
    {
        $this->auth->restrict('IMS_Users.Content.Edit');
         $type=$this->uri->segment(5);
         $user_id=$this->uri->segment(6);
         $criteria=array(
                                'institute_id'  =>  $this->auth->institute_id(),
                                'type'          =>  $type,
                            );
            $records=$this->db->get_where('ims_users',$criteria);
            
            
            if($user_id!='')
            {
                $this->db->update('users', array('active'=>1), array('id' => $user_id));
                
            }
           if($type=='employees')
            {
                Template::redirect(SITE_AREA.'/content/employees/all_employees/');    
            }
            else
            {
                Template::redirect($_SERVER['HTTP_REFERER']);
                
            }
    }


	/*
		Method: create()

		Creates a IMS Users object.
	*/
	public function create()
	{
		$this->auth->restrict('IMS_Users.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_ims_users())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('ims_users_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'ims_users');

				Template::set_message(lang('ims_users_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/ims_users');
			}
			else
			{
				Template::set_message(lang('ims_users_create_failure') . $this->ims_users_model->error, 'error');
			}
		}
		Assets::add_module_js('ims_users', 'ims_users.js');

		Template::set('toolbar_title', lang('ims_users_create') );
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of IMS Users data.
	*/
	public function edit()
	{
		$this->auth->restrict('IMS_Users.Content.Edit');

		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('ims_users_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/ims_users');
		}

		if ($this->input->post('submit'))
		{
			if ($this->save_ims_users('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('ims_users_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'ims_users');

				Template::set_message(lang('ims_users_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('ims_users_edit_failure') . $this->ims_users_model->error, 'error');
			}
		}

		Template::set('ims_users', $this->ims_users_model->find($id));
		Assets::add_module_js('ims_users', 'ims_users.js');

		Template::set('toolbar_title', lang('ims_users_edit') . ' IMS Users');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of IMS Users data.
	*/
	public function delete($id)
	{
		$this->auth->restrict('IMS_Users.Content.Delete');

		$this->load->model('statusmanager/status_model');
        if (!empty($id))
		{	
		   if ($this->status_model->change_status($id,'deleted','ims_users'))
            {
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('ims_users_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'ims_users');

				Template::set_message(lang('ims_users_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('ims_users_delete_failure') . $this->ims_users_model->error, 'error');
			}
		}
       } 
public function restore($id)
	{
		$this->auth->restrict('IMS_Users.Content.Restore');

		$this->load->model('statusmanager/status_model');
        if (!empty($id))
		{	
		   if ($this->status_model->change_status($id,'restore','ims_users'))
            {
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('ims_users_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'ims_users');

				Template::set_message(lang('ims_users_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('ims_users_delete_failure') . $this->ims_users_model->error, 'error');
			}
		}

	}	

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_ims_users()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_ims_users($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('ims_users_institute_id','Institute Id','max_length[11]');
		$this->form_validation->set_rules('ims_users_type','Type','max_length[150]');
		$this->form_validation->set_rules('ims_users_user_id','User Id','max_length[11]');
		$this->form_validation->set_rules('ims_users_in_type_id','In Type Id','max_length[11]');
		$this->form_validation->set_rules('ims_users_ims_user_created_by','Ims User Created By','max_length[11]');
		$this->form_validation->set_rules('ims_users_ims_user_created_on','Ims User Created On','max_length[11]');
		$this->form_validation->set_rules('ims_users_remarks','Remarks','');
		$this->form_validation->set_rules('ims_users_status','Status','max_length[200]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['institute_id']        = $this->input->post('ims_users_institute_id');
		$data['type']        = $this->input->post('ims_users_type');
		$data['user_id']        = $this->input->post('ims_users_user_id');
		$data['in_type_id']        = $this->input->post('ims_users_in_type_id');
		$data['ims_user_created_by']        = $this->input->post('ims_users_ims_user_created_by');
		$data['ims_user_created_on']        = $this->input->post('ims_users_ims_user_created_on') ? $this->input->post('ims_users_ims_user_created_on') : '0000-00-00';
		$data['remarks']        = $this->input->post('ims_users_remarks');
		$data['status']        = $this->input->post('ims_users_status');

		if ($type == 'insert')
		{
			$id = $this->ims_users_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->ims_users_model->update($id, $data);
		}

		return $return;
	}
    function display()
    {
        if($this->input->post('display') and $this->input->post('type')!='-1')
        {
            
            $type=$this->input->post('type');
            Template::set('type',$type);
            Template::set_view('content/create');
        }
        Template::render();
    }
    function make_users()
    {
        $type=$this->input->post('type');
        
        $candidates=$this->ims_users_model->get_non_users($type);
        
        if($candidates->num_rows()>0)
        {
                       
            foreach($candidates->result() as $candidate)
            {
               $candidate_id=$candidate->id;
                
                if($this->input->post($candidate_id))
                {
                     
                    if($type=='students')
                    {
                        $this->ims_users_model->make_user($candidate_id,$type);
                    }
                    elseif($type=='employees')
                    {
                       
                        $role_id=$this->input->post('employees_role_'.$candidate_id);
                        $this->ims_users_model->make_user($candidate_id,$type,$role_id);
                    }
                }
            }
        }
        
        Template::set_view('content/display');
        Template::render();
    }
	//--------------------------------------------------------------------



}