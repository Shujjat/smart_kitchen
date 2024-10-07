<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');$config['module_config'] = array(
	'description'	=> 'This module manages users running in the cloud envirnoment and does not include IMS Super Administration',
	'name'		=> 'IMS Users',
	'version'		=> '0.0.1',
	'author'		=> 'shujjat.shirafat',
    'menus'	=> array(
					
				'content'	=> 'ims_users/content/menu',
                'reports'	=> 'ims_users/reports/menu'
                
			),
    
);
