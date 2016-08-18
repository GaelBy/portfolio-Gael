<?php
$manager = new ChatManager($link);
$list = $manager->getAll();
if (!empty($list))
{
	$i = 0;
	$admin = 'hide';
	if (isset($_SESSION['admin']) && $_SESSION['admin'])
		$admin = '';
	while ($i < sizeof($list))
	{
		$message = $list[$i];
		if ($message->getStatus())
			require('views/chat_item.phtml');
		$i++;
	}
}
?>