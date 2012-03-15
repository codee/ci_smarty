<?php
/*
+--------------------------------------------------------------------+
| CI_Smarty version 0.1
+--------------------------------------------------------------------+
| Copyright DarkOverlordOfData (c) 2012
+--------------------------------------------------------------------+
|                                                                    |
| This file is a part of CI_Smarty .                                 |
|                                                                    |
| CI_Smarty is free software; you can copy, modify, and distribute   |
| it under the terms of the GNU General Public License Version 3     |
|                                                                    |
+--------------------------------------------------------------------+
*/
/**
 * 
 * @package     CI_Smarty
 * @subpackage  CodeIgniter
 * @category    Smarty
 * @copyright   DarkOverlordOfData (c) 2012
 * @author      Bruce Davidson
 * 
 * 
 *  Set Smarty configuration here
 *
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?><?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Template dir
|--------------------------------------------------------------------------
|
| The directory where source templates are found.  
| Typically this is application/views/ 
|
*/
$config['template_dir'] = APPPATH . "views/";

/*
|--------------------------------------------------------------------------
| Compile dir
|--------------------------------------------------------------------------
|
| The directory where compiled templates are cached.  
| Typically this is system/cache/ 
|
*/
$config['compile_dir'] = BASEPATH.'cache/';

/*
|--------------------------------------------------------------------------
| Plugins dir
|--------------------------------------------------------------------------
|
| The directory where custom plugins for CodeIgniter are found.   
| Typically this is smarty/ci/ 
|
*/
$config['plugins_dir'] = APPPATH."libraries/smarty/ci/";

/*
|--------------------------------------------------------------------------
| Caching
|--------------------------------------------------------------------------
|
| Tells Smarty whether or not to cache the output of the templates  
| to the $cache_dir.
|
*/
$config['caching']        = 0;

/*
|--------------------------------------------------------------------------
| Force compile
|--------------------------------------------------------------------------
|
| Forces Smarty to (re)compile templates on every invocation.    
| When deploying, change this value to 0
|
*/
$config['force_compile'] = 1;
/*
|--------------------------------------------------------------------------
| Compile check
|--------------------------------------------------------------------------
|
|     
|  
|
*/
$config['compile_check'] = TRUE;
/*
|--------------------------------------------------------------------------
| Template
|--------------------------------------------------------------------------
|
|     
|  
|
*/
$config['default_template'] = 'ci:template.tpl';
/*
|--------------------------------------------------------------------------
| Extension
|--------------------------------------------------------------------------
|
|     
|  
|
*/
$config['default_ext'] = '.tpl';
/*
|--------------------------------------------------------------------------
| Region
|--------------------------------------------------------------------------
|
| When passing a single view to smarty->load, the default region     
| is used:
|
*/
$config['default_region'] = 'page_content';

/*
|--------------------------------------------------------------------------
| Resource Namespace
|--------------------------------------------------------------------------
|
| Namespace used to hook file resources     
|
*/
$config['default_resource_type'] = 'ci';

/*
/* End of file smarty.php */
/* Location: ./application/config/smarty.php */
