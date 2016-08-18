<?php
if (isset($_SESSION['id']))
	require('views/chat_send.phtml');
else
	require('views/chat_login.phtml');
?>