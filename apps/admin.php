<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'])
{
	$no_contact = 'hide';
	$manager = new ContactManager($link);
	$list = $manager->getAll();
	if (empty($list))
		$no_contact = '';
	require('views/admin.phtml');
}
?>