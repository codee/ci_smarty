#CI Smarty

##CodeIgniter Smarty Bridge

### Features
 
* Use familiar CodeIgniter templating idioms:

	+ Render a single template: 
	
		`$CI->smarty->parse('help_template', $data, FALSE);`
	
	+ Render and embed one template in another:
	 
		`$CI->smarty->load('customer_template', 'customer/edit', $data, FALSE);`

	+ Render and embed a set templates:
	
		`$sections = array('header' => 'customer/header', 'content' => 'customer/edit', 'footer' => 'customer/footer');`
		`$CI->smarty->load('customer_template', $sections, $data, FALSE);`
	
* PHP Interoperability:

	+ Render an existing view.php file:
	
		`$CI->smarty->parse('view.php', $data, FALSE);`

	+ Render a Smarty template with embedded `<?php ... ?>` tags:
	
		`$CI->smarty->parse('template.tpl', $data, FALSE);`
	
	+ CodeIgniter Form_Helper plugin exposes helpers in Smarty, such as:
	
		`{form_open action="customer/add"}`
		`{form_input data=$customer.name}`
		
	+ Include php code from smarty:
	
		`{include file='navigation.php'}`

* Easy configuration:

	+ Set Smarty preferences in config/smarty.php

		`$config['template_dir'] = APPPATH . "views/";`
	
	+ For convenience, add to your config/autoload.php:

		`$autoload['libraries'] = array(..., 'smarty');`		
	
* Compatible CodeIgniter versions:
 + 2.10
* Compatible Smarty versions:
 + 2.6.26
 + 3.1.8	
