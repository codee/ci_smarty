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
 */
/**
 * Smarty {ci_form_open} function plugin
 *
 * @param array wrapping CI form_helper parameters
 * @param Smarty
 */
function smarty_function_form_upload($params, &$smarty)
{
        return call_user_func_array('form_upload', $params);
}
?>
