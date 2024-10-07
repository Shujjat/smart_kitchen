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
 * Role Settings Model
 *
 * Provides access and utility methods for handling role storage
 * in the database.
 *
 * @package    Bonfire
 * @subpackage Modules_Roles
 * @category   Models
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class My_Role_model extends BF_Model
{

	/**
	 * Name of the table
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $table		= 'roles';

	/**
	 * Name of the primary key
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $key			= 'role_id';

	/**
	 * Use soft deletes or not
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $soft_deletes	= TRUE;

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
	protected $set_created = FALSE;

	/**
	 * Set the modified time automatically on editing a record
	 *
	 * @access protected
	 *
	 * @var bool
	 */
	protected $set_modified = FALSE;

	//--------------------------------------------------------------------

	/**
	 * Class constructor. Will load the permission_model, if it's not
	 * already loaded.
	 */
	public function __construct()
	{
		parent::__construct();

		if (!class_exists('Permission_model'))
		{
			$this->load->model('permissions/permission_model');
		}

	}
    function    get_child_roles($role_id)
    {
        //See base Line/ roles db file to know the basic
        // parent child idea.
        switch($role_id)
        {
            case    1:
            case    35:
            
                return array(
                                36  =>    $this->get_role_name(36),
                                37  =>    $this->get_role_name(37),
                                38  =>    $this->get_role_name(38),
                                39  =>    $this->get_role_name(39),
                                40  =>    $this->get_role_name(40),
                                
                            );  
            case    36:
                return array(
                                
                                37  =>    $this->get_role_name(37),
                                38  =>    $this->get_role_name(38),
                                39  =>    $this->get_role_name(39),
                                
                            );  
            case    37:
                return array(
                               
                                38  =>    $this->get_role_name(38),
                                39  =>    $this->get_role_name(39),
                                
                            );  
            case    38:
                return array(
                                39  =>    $this->get_role_name(39),
                                
                            );  
            case    39:
            case    40:
            default:
                return NULL;
            
        }
    }
    function get_controller_role($role_id)
    {
        switch($role_id)
        {
            
                 
            case    36:
                return  35;
                  
            case    37:
                return  36;      
            case    38:
                return  37;  
            case    39:
                return  38;
                 
            case    40:
                 return 35 ;
                 
            case    1:
            default:
                return NULL;
            
        }
    }
    function get_role_name($role_id)
    {
        $criteria=array('role_id' => $role_id);
        $result=$this->db->get_where('roles',$criteria);
        $row=$result->row();
        return $row->role_name;
        
        
    }  
    
    
}//end Role_model
