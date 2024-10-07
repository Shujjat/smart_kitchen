<?php
echo 'ppp'; 
$link=mysql_connect('localhost','root','');
mysql_select_db('ims',$link);           
$query="
            INSERT  INTO    errors
            (message)
            VALUES('-1')                                        
        ;"; 
mysql_query($query,$link) ;
$id=mysql_insert_id();
$file=fopen('errors/'.$id.'.log','w');
$message=$message.'\n';
echo $message;
fwrite($file,$message);
fclose($file);
header('Location: '.HOST.'/index.php/home/errors/db/'.$id);
if($this->auth->role_id()!=1)
{
    
        
}

?>