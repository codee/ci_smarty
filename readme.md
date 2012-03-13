#CI_Smarty

##CodeIgniter Smarty Bridge

### Features
 
* Familiar CodeIgniter templating idioms used:

	`$this->smarty->parse('help_template', $data, FALSE);`
	
	`$this->smarty->load('customer_template', 'customer/edit', $data, FALSE);`

	`$this->smarty->load('customer_template', array(
		'header' 	=> 	'customer/header',
		'content'	=>	'customer/edit',
		'footer'	=>	'customer/footer'
	), $data, FALSE);`

* Declarative setup using config/smarty.php:

	`$config['template_dir'] = APPPATH . "views/";`
	
	
* Compatible CodeIgniter versions:
 + 2.10
* Compatible Smarty versions:
 + 2.6.26
 + 3.1.8	
