<?php
if (isset($_SESSION['admin'], $_GET['action']) && $_SESSION['admin'])
{
	if ($_GET['action'] == 'create')
	{
		$work = new Work($link);
		$action = 'Ajouter';
	}
	else if ($_GET['action'] == 'edit' && isset($_GET['id']))
	{
		$manager = new WorkManager($link);
		$work = $manager->getById($_GET['id']);
		$action = 'Modifier';
	}
	require('views/admin_work.phtml');
}
?>