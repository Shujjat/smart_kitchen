<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;
 
$host=$_SERVER[SERVER_NAME];

if($host=='localhost' or $host=='127.0.0.1')
{
    //$host='127.0.0.1';
    $db['default']['hostname'] = $host;
    $db['default']['username'] = 'root';
    $db['default']['password'] = '';
    $db['default']['database'] = 'ims';
   //$db['default']['database'] = 'i';
    
}
else
{
    $db['default']['hostname'] = 'www.extremeprep.org';
    $db['default']['username'] = 'rlcihaoc_extreme';
    $db['default']['password'] = 'pHL0N$kihGBBy@sVZj@';
    $db['default']['database'] = 'rlcihaoc_extreme_prep';
     
}
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = TRUE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = TRUE;


/** Archive Group  */
$db['archive']['hostname'] = $host;
$db['archive']['username'] = 'root';
$db['archive']['password'] = '';

$db['archive']['database'] = 'ims_archive';
$db['archive']['dbdriver'] = 'mysql';
$db['archive']['dbprefix'] = '';
$db['archive']['pconnect'] = FALSE;
$db['archive']['db_debug'] = TRUE;
$db['archive']['cache_on'] = FALSE;
$db['archive']['cachedir'] = '';
$db['archive']['char_set'] = 'utf8';
$db['archive']['dbcollat'] = 'utf8_general_ci';
$db['archive']['swap_pre'] = '';
$db['archive']['autoinit'] = TRUE;
$db['archive']['stricton'] = TRUE;



/* End of file database.php */
/* Location: ./application/config/database.php */