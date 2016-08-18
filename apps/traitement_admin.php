<?php
if ($page == 'admin_login')
{
	if (isset($_POST['login'], $_POST['pass']))
	{
		$manager = new UserManager($link);
		try
		{
			$user = $manager->getByLogin($_POST['login']);
			if ($user !== null && $user->checkPass($_POST['pass']) && $user->getAdmin())
			{
				$_SESSION['id'] = $user->getId();
				$_SESSION['admin'] = 1;
				header('Location: index.php?page=admin');
				exit;
			}
			else
				$error = "Vous n'avez pas l'autorisation d'accéder à cette section";
		}
		catch (Exception $e)
		{
			$error = "Vous n'avez pas l'autorisation d'accéder à cette section";
		}
	}
}
else if ($page == 'admin')
{
	if (!(isset($_SESSION['admin']) && $_SESSION['admin']))
	{
		header('Location: index.php?page=admin_login');
		exit;
	}
}
?>