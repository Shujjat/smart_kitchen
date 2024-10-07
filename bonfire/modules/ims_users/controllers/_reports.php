<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class _reports extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('IMS_Users.Reports.View');
		$this->load->model('ims_users_model', null, true);
		$this->lang->load('ims_users');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
		Template::set_block('sub_nav', 'reports/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
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

		$records = $this->ims_users_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage IMS Users');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a IMS Users object.
	*/
	public function create()
	{
		$this->auth->restrict('IMS_Users.Reports.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_ims_users())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('ims_users_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'ims_users');

				Template::set_message(lang('ims_users_create_success'), 'success');
				Template::redirect(SITE_AREA .'/reports/ims_users');
			}
			else
			{
				Template::set_message(lang('ims_users_create_failure') . $this->ims_users_model->error, 'error');
			}
		}
		Assets::add_module_js('ims_users', 'ims_users.js');

		Template::set('toolbar_title', lang('ims_users_create') . ' IMS Users');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of IMS Users data.
	*/
	public function edit()
	{
		$this->auth->restrict('IMS_Users.Reports.Edit');

		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('ims_users_invalid_id'), 'error');
			redirect(SITE_AREA .'/reports/ims_users');
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
	public function delete()
	{
		$this->auth->restrict('IMS_Users.Reports.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->ims_users_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('ims_users_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'ims_users');

				Template::set_message(lang('ims_users_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('ims_users_delete_failure') . $this->ims_users_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/reports/ims_users');
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

	//--------------------------------------------------------------------



}