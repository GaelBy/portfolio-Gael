<?php
session_start();
$error = '';
$page = 'home';
function __autoload($class_name)
{
	require('models/'.$class_name.'.class.php');
}
require('config.php');
$link = mysqli_connect($localhost, $login, $pass, $database);
if (!$link)
{
	require('views/bigerror.phtml');
	exit;
}
$access = array('home', 'about', 'works', 'contact', 'contact_confirm', 'admin_login', 'admin', 'admin_contact_item', 'admin_work');
if (isset($_GET['page']) && in_array($_GET['page'], $access))
	$page = $_GET['page'];
$access_traitement = array('home'=>'chat', 'contact'=>'contact', 'admin_login'=>'admin', 'admin'=>'admin', 'admin_contact_item'=>'contact', 'admin_work'=>'work');
if (array_key_exists($page, $access_traitement))
	require('apps/traitement_'.$access_traitement[$page].'.php');
if (isset($_GET['ajax']))
{
	$access_ajax = array('chat_item');
	if (isset($_GET['page']) && in_array($_GET['page'], $access_ajax))
	{
		$page_ajax = $_GET['page'];
		require('apps/'.$page_ajax.'.php');
	}
}
else
	require('apps/skel.php');
?>