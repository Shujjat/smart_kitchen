<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class My_File_Upload
{
    function    get_path($module,$file_name)
    {
        switch($module)
        {
            case    'students':
               $path=set_realpath($path).'bonfire/modules/students/assets/images';
               
               break;
            case    'employees':
                $path=set_realpath($path).'bonfire/modules/employees/assets/images';
                break;                        
            case    'complaints':
               $path=set_realpath($path).'bonfire/modules/complaints/assets/attachments/complaints/'.$file_name.'/'; 
               
               break;
            case    'comments':
               $path=HOST.'bonfire/modules/complaints/assets/attachments/comments/'.$file_name.'/'; 
               mkdir($path);
               break;
        }
        return  $path;
    }
    
        function compress_image($source_url, $destination_url, $quality) 
        {
    
           $info = getimagesize($source_url);
    
            if ($info['mime'] == 'image/jpeg')
                  $image = imagecreatefromjpeg($source_url);
    
            elseif ($info['mime'] == 'image/gif')
                  $image = imagecreatefromgif($source_url);
    
          elseif ($info['mime'] == 'image/png')
                  $image = imagecreatefrompng($source_url);
    
            imagejpeg($image, $destination_url, $quality);
        return $destination_url;
        }
}
