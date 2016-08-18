<?php
$i = 0;
while ($i < sizeof($list))
{
	$contact = $list[$i];
	$read = 'strong';
	if ($contact->getStatus())
		$read = '';
	require('views/admin_contact.phtml');
	$i++;
}
?>