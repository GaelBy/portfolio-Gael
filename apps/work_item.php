<?php
$manager = new WorkManager($link);
$list = $manager->getAll();
$admin = 'hide';
if (isset($_SESSION['admin']) && $_SESSION['admin'])
	$admin = '';
$i = 0;
while ($i < sizeof($list))
{
	$work = $list[$i];
	require('views/work_item.phtml');
	$i++;
}
?>