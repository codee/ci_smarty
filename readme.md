#CI Smarty

##CodeIgniter Smarty Bridge

### Features
 
* Use familiar CodeIgniter templating idioms:

	+ Render a single template: 
		- `$CI->smarty->parse('help_template', $data, FALSE);`
	
	+ Render and embed a template in another: 
		- `$CI->smarty->load('customer_template', 'customer/edit', $data, FALSE);`

	+ Render and embed a set of set of templates: 
		 -`$sections = array(
			'header' 	=> 	'customer/header',
			'content'	=>	'customer/edit',
			'footer'	=>	'customer/footer'
		);`
		- `$CI->smarty->load('customer_template', $sections, $data, FALSE);`
	
* PHP Interoperability:

	+ Render an existing view.php file:
		- `$CI->smarty->parse('ci:view.php', $data, FALSE);`

	+ Render a Smarty template with embedded `<?php ... ?>` tags:
		- `$CI->smarty->parse('ci:template.tpl', $data, FALSE);`
	
	+ CodeIgniter Form_Helper plugin exposes helpers in Smarty, such as:
		- `{form_open action="customer/add"}`
		- `{form_input data=$customer.name}`

* Declarative setup using config/smarty.php:

	`$config['template_dir'] = APPPATH . "views/";`
	
	
* Compatible CodeIgniter versions:
 + 2.10
* Compatible Smarty versions:
 + 2.6.26
 + 3.1.8	
