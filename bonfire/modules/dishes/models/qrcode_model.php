<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode_model extends BF_Model 
{
    
    function    get_qrcode_directory($module)
    {
        switch($module)
        {
            case    'dishes':
                return  HOST.'bonfire/modules/dishes/assets/qrcodes/';
                break;
            case    'users':
                return  HOST.'bonfire/application/core_modules/users/assets/qrcodes/';
                break;
        }
        
        
    }
    function    get_qrcode_web_directory($module)
    {
        switch($module)
        {
            case    'dishes':
                return  HOST.'bonfire/modules/dishes/assets/qrcodes/';
                break;
            case    'users':
                return  HOST.'/bonfire/application/core_modules/users/assets/qrcodes/';
                break;
        }
        
    }

    function    generate_qr_code($name,$data,$module)
    {
        
        $PNG_TEMP_DIR = $this->get_qrcode_directory($module);
        
        $path= getcwd().'/bonfire/application/libraries/phpqrcode/qrlib.php';
        echo $path;
        echo '<br />';
        
        echo file_exists($path);
        $PNG_WEB_DIR = $PNG_TEMP_DIR ;
        $filename=$PNG_TEMP_DIR.$name.'.png';
        echo '<br />';
        echo $filename;
        if (!file_exists($filename))
        {
            
            require($path);
            
            $errorCorrectionLevel = 'L';
            $matrixPointSize = 4;
            if (trim($data) != '')
            {
                QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
            }
              
           
        }
        
    }
    
}