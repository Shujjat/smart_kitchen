<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Dishes.Content.View');
		$this->load->model('dishes_model', null, true);
		$this->lang->load('dishes');
		
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_js('jquery-ui-1.8.13.min.js');
		Assets::add_css('jquery-ui-timepicker.css');
		Assets::add_js('jquery-ui-timepicker-addon.js');
		Template::set_block('sub_nav', 'content/_sub_nav');
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
						$result = $this->dishes_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('dishes_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('dishes_delete_failure') . $this->dishes_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('dishes_delete_error') . $this->dishes_model->error, 'error');
				}
			}
		}

		$records = $this->dishes_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage dishes');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a dishes object.
	*/
	public function create()
	{
		$this->auth->restrict('Dishes.Content.Create');
        $this->load->model('qrcode_model', null, true);
        if ($this->input->post('submit_button'))
		{
        	if ($insert_id = $this->save_dishes())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('dishes_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'dishes');

				Template::set_message(lang('dishes_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/dishes');
			}
			else
			{
				Template::set_message(lang('dishes_create_failure') . $this->dishes_model->error, 'error');
			}
		}
		Assets::add_module_js('dishes', 'dishes.js');

		Template::set('toolbar_title', lang('dishes_create') . ' dishes');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of dishes data.
	*/
	public function edit()
	{
		$this->auth->restrict('Dishes.Content.Edit');
      
        $this->load->model('qrcode_model', null, true);
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('dishes_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/dishes');
		}
  
      
        //var_dump($_POST);die();
		if ($this->input->post('submit_button') or true)
		{
			if ($this->save_dishes('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('dishes_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'dishes');

				Template::set_message(lang('dishes_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('dishes_edit_failure') . $this->dishes_model->error, 'error');
			}
		}

		Template::set('dishes', $this->dishes_model->find($id));
        Template::set('ingredients', $this->dishes_model->get_ingredients($id));
        
        
		Assets::add_module_js('dishes', 'dishes.js');

		Template::set('toolbar_title', lang('dishes_edit') . ' dishes');
        Template::set('host', $host);
        Template::set_view('content/create');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of dishes data.
	*/
	public function delete()
	{
		$this->auth->restrict('Dishes.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->dishes_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('dishes_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'dishes');

				Template::set_message(lang('dishes_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('dishes_delete_failure') . $this->dishes_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/dishes');
	}


	private function save_dishes($type='insert', $id=0)
	{
	   
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('name','Name','required|unique[dishes.name,dishes.id]|max_length[100]');
		$this->form_validation->set_rules('serving_size','Serving Size','max_length[11]');
		$this->form_validation->set_rules('cooking_time','Cooking Time','max_length[11]');
		$this->form_validation->set_rules('remarks','Remarks','');
		

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['name']                = $this->input->post('name');
		$data['serving_size']        = $this->input->post('serving_size');
		$data['cooking_time']        = $this->input->post('cooking_time');
		$data['remarks']             = $this->input->post('remarks');
		$data['created_on']          = date("Y-m-d H:i:s");
        
		if ($type == 'insert')
		{
			$id = $this->dishes_model->insert($data);
            
			if (is_numeric($id))
			{
				$return = $id;
			} 
            else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
		    $this->upload_images($id);  
            
		    $descriptions=$this->uri->segment(6);
            if($descriptions!='')
            {
                $this->dishes_model->insert_ingredients($id,$descriptions);    
            }
            $return = $this->dishes_model->update($id, $data);
            
            
            
		}
        

        
        
        
		return $return;
	}
    
    
    
    function    upload_images($id)
    {
       
        $countfiles = count($_FILES['images']['name']);
        $upload_location = $this->dishes_model->get_images_upload_loaction();
        $files_arr = array();
        $filename = $_FILES['images']['name'][0];
        
        $path = $upload_location.$id.'.jpg';
       
        unlink($path);
        move_uploaded_file($_FILES['images']['tmp_name'][0],$path);
       
    }
    
    function    save_ingredient($dish_id,$description)
    {
        
        
        
        $criteria=array(
                        
                            
                            'sr_description' =>  $description,
                        
                        );
        
        $this->dishes_model->save_nutrient($dish_id,$criteria);
        
        
        
        
        
    }
    
    function    empty_ingredients($dish_id)
    {
        if($dish_id=='')
        {
            $criteria=array(
                        'dish_id'       =>  $dish_id,
                    );
        }
        else
        {
            $criteria=array(
                        'dish_id'       =>  $this->uri->segment(5),
                    );    
        }
        
        $this->dishes_model->empty_ingredients($criteria);
        Template::redirect(HOST.'index.php/admin/content/dishes/edit/'.$this->uri->segment(5));
        
       
    } 
    function    remove_ingredient()
    {
        $criteria=array(
                        'id'       =>  $this->uri->segment(5),
                    );
        $this->dishes_model->remove_ingredients($criteria);
    }
    

    
}