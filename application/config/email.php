<?php
//$this->load->library('email');
$config['protocol'] = 'mail';
//$config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
$config['smtp_host'] = 'https://webmail.uk.syrahost.com';
$config['smtp_port'] = '465';

$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";

$config['smtp_user'] = 'support@yourglobalpro.com'; //change this
$config['smtp_pass'] = 'ygpmail'; //change this
	
    //$config['smtp_user'] = 'muthusunda@gmail.com'; //change this
    //$config['smtp_pass'] = 'arsenal5174'; //change this
	//$this->email->initialize($config);
	?>