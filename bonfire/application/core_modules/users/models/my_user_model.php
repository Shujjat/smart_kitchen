<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2012, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * User Model
 *
 * The central way to access and perform CRUD on users.
 *
 * @package    Bonfire
 * @subpackage Modules_Users
 * @category   Models
 * @author     Bonfire Dev Team
 * @link       http://cibonfire.com
 */
class My_User_model extends BF_Model
{

	/**
	 * Name of the table
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Use soft deletes or not
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $soft_deletes = TRUE;

	/**
	 * The date format to use
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $date_format = 'datetime';

	/**
	 * Set the created time automatically on a new record
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $set_modified = FALSE;

	//--------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

	}//end __construct()

	//--------------------------------------------------------------------

	/**
	 * Helper Method for Generating Password Hints based on Settings library.
	 *
	 * Call this method in your controller and echo $password_hints in your view.
	 *
	 * @access public
	 *
	 * @return void
	 */
	
    function get_users_by_role($role_id='')
    {
        $criteria=array(
                            
                            'role_id'   =>  $role_id,
                            'active'    =>  '1',
                            
                        );
          
        $result=$this->db->get_where('users',$criteria);

        
        $users=array();
        
        foreach($result->result() as $row)
        {
            //var_Dump($row);
            $id=$row->id;
            
           
            $users[$id]=$row->display_name;
        }
       
        return $users;
            
    }
    
    
    
    function get_all_users()
    {
          
        $result=$this->db->get_where('users');

        
        $users=array();
        
        foreach($result->result() as $row)
        {
            //var_Dump($row);
            $id=$row->id;
            
           
            $users[$id]=$row->display_name;
        }
       
        return $users;
            
    }
    
    function    get_user_name($id)
    {
        $criteria=array(
                            
                            'id'   =>  $id,
                            
                            
                        );
          
        return  $this->db->get_where('users',$criteria)->row()->username;

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
    function    get_user_image_upload_location()
    {
        return  getcwd().'/bonfire/application/core_modules/users/images/';
    }
     function    get_user_image_web_location($id)
    {
        return  HOST.'bonfire/application/core_modules/users/images/'.$id.'.jpg';
    }
	//--------------------------------------------------------------------

}//end User_model
