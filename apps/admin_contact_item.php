<?php
if (isset($_SESSION['admin'], $_GET['id']) && $_SESSION['admin'])
{
	$manager = new ContactManager($link);
	$contact = $manager->getById($_GET['id']);
	if ($contact !== null)
		require('views/admin_contact_item.phtml');
}
?>