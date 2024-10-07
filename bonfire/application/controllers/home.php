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
 * Home controller
 *
 * The base controller which displays the homepage of the Bonfire site.
 *
 * @package    Bonfire
 * @subpackage Controllers
 * @category   Controllers
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class Home extends Front_Controller
{


	/**
	 * Displays the homepage of the Bonfire app
	 *
	 * @return void
	 */
	public function index()
	{
	    $this->load->library('user_agent');
        
        
        if(ENVIRONMENT=='update' and $this->auth->is_logged_in() and $this->auth->role_id()!=1)
        {
            Template::set_view('home/updates_in_progress');
        }
        Assets::add_css( 'ajax.js' );
	    Assets::add_js( 'morris/morris.css' );
       
        Template::set('toolbar_title','Welcome');
        
        
        if(($this->uri->segment(1)=='' and !$this->auth->is_logged_in())or $this->uri->segment(1)=='login'  )
        {
            if(DM=='ST')
            {
                Template::set_view('users/users/st/login');
            }
            else
            {
                Template::set_view('users/users/login');    
            }
            
        } 
        if(DM=='LMS' )
        {
            Template::set_view('home/lms_dashboard');
        }
        else
        {
            //Template::set_view('home/index');
                    
        }   
        Template::set_view('home/index');     
            
        Template::render();
	}//end index()
    function    errors()
    {
        
        $error_type=$this->uri->segment(5);
        switch($error_type)
        {
            case    '404':
                Template::set('description','Your requested page is not available.');
                break;
            case    'db':
                $code=$this->uri->segment(6);
                
                Template::set('description','Some internal issue occured. Please go back and check. The error code is: '.$code);
                break;
        }
        
        Template::set_theme('adminLTE');
        Template::render();
    }
	//--------------------------------------------------------------------
    


}//end class