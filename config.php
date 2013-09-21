<?php 

/*
# ---------------------------------------------------------------------
@ WEBSITE DEVELOPMENT 	: Project SERVICE
@ Date Create 			: 07-07-56 
@ Create by 			: nharm Abstract code
@ USE For ......
@ © 2012-2013, Abstractcodify.com All Rights Reserved.
# ---------------------------------------------------------------------
*/

// check error 
// error_reporting(E_ALL);

// © 2012-2013, [ Abstract Codify ] Abstractcodify.com All Rights Reserved.
$site_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
$site_url .= '://'. $_SERVER['HTTP_HOST'];
$site_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
define( 'ABSURL', $site_url );


// include plugin connect database by codeigniter farmwork

include 'database/DB.php';

$CI_DB = DB(array(
	'dbdriver' => 'mysql',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'db_project',
	'dbprefix' => ''
));

/*
# ---------------------------------------
# Function get grad
# ---------------------------------------
*/
function transliterate_grad( $info = '' )
{
	switch ( $info ) 
	{
		case '4':
			$grad = 'A';
			break;
		case '3.5':
			$grad = 'B+';
			break;
		case '3':
			$grad = 'B';
			break;		
		case '2.5':
			$grad = 'C+';
			break;
		case '2':
			$grad = 'C';
			break;
		case '1.5':
			$grad = 'D+';
			break;	
		case '1':
			$grad = 'D';
			break;
		case '0':
			$grad = 'F';
			break;

		default:
			$grad = 'F';
			break;
	}
	return $grad;
}

?>