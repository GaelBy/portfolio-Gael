<?php
if (isset($_POST['form']))
{
	$manager = new UserManager($link);
	if ($_POST['form'] == 'login')
	{
		try
		{
			if (isset($_POST['login'], $_POST['pass']) && ($user = $manager->getByLogin($_POST['login'])) !== null)
			{
				if ($user->checkPass($_POST['pass']))
				{
					if ($user->getStatus())
					{
						$_SESSION['id'] = $user->getId();
						header('Location: index.php');
						exit;
					}
					else
						$error = 'Vous ne pouvez pas poster sur le chat';
				}
			}
			else
			{
				$user = $manager->create($_POST);
				$_SESSION['id'] = $user->getId();
				header('Location: index.php');
				exit;
			}
		}
		catch (Exception $e)
		{
			$error = $e->getMessage();
		}
	}
	else if ($_POST['form'] == 'send')
	{
		try
		{
			if (isset($_SESSION['id']))
			{
				$user = $manager->getById($_SESSION['id']);
				if ($user->getStatus())
				{
					$chat_manager = new ChatManager($link);
					$message = $chat_manager->create($_POST, $user);
					header('Location: index.php?page=home');
					exit;
				}
			}
		}
		catch (Exception $e)
		{
			$error = $e->getMessage();
		}
	}
}
if (isset($_POST['admin'], $_SESSION['admin'], $_POST['id']) && $_SESSION['admin'])
{
	if ($_POST['admin'] == 'moderate')
	{
		try
		{
			$manager = new ChatManager($link);
			$message = $manager->getById($_POST['id']);
			$message = $manager->delete($message);
			header('Location: index.php');
			exit;
		}
		catch (Exception $e)
		{
			$error = $e->getMessage();
		}
	}
	else if ($_POST['admin'] == 'ban')
	{
		try
		{
			$manager = new UserManager($link);
			$user = $manager->getById($_POST['id']);
			$user = $manager->delete($user);
			$chat_manager = new ChatManager($link);
			$list = $chat_manager->deleteAllByUser($user);
		}
		catch (Exception $e)
		{
			$error = $e->getMessage();
		}
	}
}
?>