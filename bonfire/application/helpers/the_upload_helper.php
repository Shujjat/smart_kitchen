<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function    get_path($module,$file_name,$additional_info,$purpose)
{
    
    $config=array();
    $config['overwrite']  = true;
    
    switch($module)
    {
        case    'students':
           $path=set_realpath($path).'bonfire/modules/students/assets/images';
           $config['overwrite']  = true;
           break;
        case    'employees':
            $path=set_realpath($path).'bonfire/modules/employees/assets/images';
            break;                        
        case    'complaints':
           $path=set_realpath($path).'bonfire/modules/complaints/assets/attachments/complaints/'.$file_name.'/'; 
           
           break;
        case    'comments':
           $path=set_realpath($path).'bonfire/modules/complaints/assets/attachments/comments/'; 
           mkdir($path);
           break;
        case    'study_material':
            if($purpose=='http')
            {
                $path=HOST.'/bonfire/modules/courses/assets/study_materials/'.$additional_info;
            }
            else
            {
                $path=set_realpath($path).'/bonfire/modules/courses/assets/study_materials/'.$additional_info;
            }
            
            mkdir($path);
            
            return  $path;            
            break;
    }
}
function    upload_file($document,$module,$file_name,$additional_info)
{
    
            
    
    $config=array();
    $config['file_name']  = $file_name;   
    $config['upload_path'] = $path;
    $config['allowed_types'] = '*';
    
    $config['overwrite']  = true;
    $this->load->library('upload', $config);
    if($document!='')
    {
        
        do_upload($document);    
    }
    else
    {
        do_upload();
    }
    compress_image($path, $path.'a', 40) ;
    echo 'here';die();
    $error = array('error' => $this->upload->display_errors());
    return $file_name;
        
    
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

