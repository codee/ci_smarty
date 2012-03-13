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
 *	Class CI_Smarty
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?><?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!class_exists('Smarty')) {
    //  Smarty may already be loaded by the hosting application (such as CiviCRM)
    require_once("smarty/Smarty.class.php");
}


class CI_Smarty extends Smarty {
    
    var $CI;
    var $default_template = '';
    var $default_region = '';
    var $default_ext = '';
    var $regions = array();
    

    /**
     *  Constructor
     * 
     *      Load configuration from CodeIgniter
     *
     *
     * @access  public
     * @param   array
     * @return  none
     */
	function __construct($config = array()) {

		parent::__construct();

		$this->CI =& get_instance();     
		        
		if (count($config) > 0) {
		    $this->init($config);
		}
		
		//  Register CodeIgniter template resource ci:filename.php
		$this->register_resource("ci", array(
		        $this, 
		        "ci_get_template", 
		        "ci_get_timestamp", 
		        "ci_get_secure", 
		        "ci_get_trusted"
		));        
        
		log_message('debug', "Smarty Class Initialized");
	}


    /**
     *  Init
     * 
     *      set Smarty preferences
     *
     *
     * @access  public
     * @param   array
     * @return  none
     */
    function init($config = array()) {

        foreach ($config as $name => $value) {
            
            if (isset($this->$name)) {

                if ($this->$name === 'plugins_dir') {
                    
                    $this->plugins_dir[] = $value;
                }
                else {
                    
                    $this->$name = $value;
                }
            }
        }
    }

    /**
     *  Set Delimiters
     * 
     *      Set the left/right variable delimiters
     *
     *
     * @access  public
     * @param   string   left delimiter char
     * @param   string   right delimiter char
     * @return  none
     */
    function set_delimiters($left_delimiter = '{', $right_delimiter = '}') {
    	
        $this->left_delimiter = $left_delimiter;
        
        $this->right_delimiter = $right_delimiter;
    }

	/**
	 *  Parse
     * 
     *      Render data using a Smarty template
	 *
	 *
	 * @access	public
	 * @param	string   Template file name
	 * @param	array    named data
	 * @param	bool     TRUE will not be sent to browser
	 * @return	string
	 */
	function parse($template = '', $data = array(), $return = FALSE) {
	    
        $this->CI->benchmark->mark('smarty_parse_start');

        if (is_array($data)) {
            $this->assign($data);
        }
                    
        $result = $this->fetch($this->_fix_template_name($template));
        
        if ($return === FALSE) {
            $this->CI->output->set_output($result);
        }

        $this->CI->benchmark->mark('smarty_parse_end');
        
        return $result;
	}
    
    /**
     *  Load
     * 
     *      Parse nested templates 
     *
     *
     * @access  public
     * @param   string   Template file name
     * @param   string   view to embed in template
     * @param   array    named data
     * @param   bool     TRUE will not be sent to browser
     * @return  string
     */
    function load($template = '', $view = '' , $data = array(), $return = FALSE)
    {               

        if (is_array($data)) {
            $this->assign($data);
        }
        
        if (is_array($view)) {
            
            $regions = array();
            
            foreach ($view as $name => $value) {
                
                $regions[$name] = $this->parse($view, NULL. TRUE);
            }

            return $this->parse($template, $regions, $return);
            
        }
        else {
            
            $this->assign($this->default_region, $this->parse($view, NULL, TRUE));     
                
            return $this->parse($template, NULL, $return);
        }
    }
    
    /**
     *  CI Get Template
     * 
     *  Process php template first
     *
     * @access  public
     * @param   string  Template filename
     * @param   string  Template source
     * @param   object  this
     * @return  bool    TRUE
     */
    function ci_get_template ($template, &$source, &$smarty_obj) {
        
        $source = $this->CI->load->view($template, $smarty_obj->get_template_vars(), TRUE);
        
        return TRUE;
    }
    
    /**
     *  CI Get Timestamp
     * 
     *  Used to determine if recompile is necessary
     *
     * @access  public
     * @param   string  Template filename
     * @param   string  Template timestamp
     * @param   object  this
     * @return  bool    TRUE
     */
    function ci_get_timestamp($template, &$timestamp, &$smarty_obj) {
        
        $ext = pathinfo($template, PATHINFO_EXTENSION);
        
        $file = ($ext == '') ? $template.EXT : $template;

        $path = $this->template_dir.$file; 
        
        $timestamp = filectime($path);
        
        return ($timestamp !== FALSE);
    }
    
    /**
     *  CI Get Secure
     * 
     *  Assume all templates are secure
     *
     * @access  public
     * @param   string  Template filename
     * @param   object  this
     * @return  bool    TRUE
     */
    function ci_get_secure($template, &$smarty_obj) {
        
        return TRUE;
    }
    
    /**
     *  CI Get Trusted
     * 
     *  Not used for templates
     *
     * @access  public
     * @param   string  Template filename
     * @param   object  this
     * @return  bool    FALSE
     */
    function ci_get_trusted($template, &$smarty_obj) {

        return FALSE;
    }    
    
    /**
     *  Fix Template Name
     * 
     *      If name is blank, use default value
     *      If ext is missing, use default value
     *
     *
     * @access  public
     * @param   string  Template filename
     * @return  string	Fixed filename
     */
    function _fix_template_name($template = '') {

        $template = ($template == '') ? $this->default_template : $template;
               
        $ext = pathinfo($template, PATHINFO_EXTENSION);
        
        $template = ($ext == '') ? $template.$this->default_ext : $template;
        
        return $template;
        
    }
    
}
// END Smarty Class
/*
/* End of file smarty.php */
/* Location: ./application/libraries/smarty.php */
