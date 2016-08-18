<?php
if (!empty($_POST))
{
	try
	{
		$manager = new ContactManager($link);
		if (isset($_POST['id']))
		{
			if (isset($_SESSION['admin']) && $_SESSION['admin'])
			{
				$contact = $manager->getById($_POST['id']);
				if ($contact !== null)
				{
					$contact->setStatus(1);
					$contact = $manager->updateStatus($contact);
					header('Location: index.php?page=admin');
					exit;
				}
			}
			else
			{
				header('Location: index.php');
				exit;
			}
		}
		else if (isset($_POST['email']))
		{
			$sender_manager = new SenderManager($link);
			$sender = $sender_manager->getByEmail($_POST['email']);
			if (isset($_POST['name'], $_POST['tel'], $_POST['society']) && $sender !== null && $sender->getName() == $_POST['name'])
			{
				$sender->setTel($_POST['tel']);
				$sender->setSociety($_POST['society']);
				$sender = $sender_manager->update($sender);
			}
			else
				$sender = $sender_manager->create($_POST);
			$contact = $manager->create($_POST, $sender);
			header('Location: index.php?page=contact_confirm');
			exit;
		}
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}
}
?>