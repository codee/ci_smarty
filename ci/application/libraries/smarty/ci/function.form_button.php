<?php
/*
+--------------------------------------------------------------------+
| CiviLedger version 0.1
+--------------------------------------------------------------------+
| Copyright DarkOverlordOfData (c) 2012
+--------------------------------------------------------------------+
|                                                                    |
| This file is a part of CiviLedger.                                 |
|                                                                    |
| CiviLedger is free software; you can copy, modify, and distribute  |
| it under the terms of the GNU General Public License Version 3     |
|                                                                    |
+--------------------------------------------------------------------+
*/
/**
 * 
 * @package     Ledger
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
function smarty_function_form_button($params, &$smarty)
{
        return call_user_func_array('form_button', $params);
}
?>
