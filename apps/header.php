<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'])
	require('views/header_admin.phtml');
else
	require('views/header.phtml');
?>