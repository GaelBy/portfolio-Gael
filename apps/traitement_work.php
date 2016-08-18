<?php
if (isset($_SESSION['admin'], $_POST['id']) && $_SESSION['admin'])
{
	$manager = new WorkManager($link);
	if (empty($_POST['id']))
	{
		try
		{
			$work = $manager->create($_POST);
			header('Location: index.php?page=works');
			exit;
		}
		catch(Exception $e)
		{
			$error = $e->getMessage();
		}
	}
	else
	{
		try
		{
			$work = $manager->getById($_POST['id']);
			if ($work !== null)
			{
				if (isset($_POST['title'], $_POST['description'], $_POST['image'], $_POST['url']))
				{
					$work->setTitle($_POST['title']);
					$work->setDescription($_POST['description']);
					$work->setImage($_POST['image']);
					$work->setUrl($_POST['url']);
					$work = $manager->update($work);
					header('Location: index.php?page=works');
				}
				else
					$error = 'Paramètre manquant';
			}
			else
				$error = 'Réalisation non trouvée';		
		}
		catch(Exception $e)
		{
			$error = $e->getMessage();
		}
	}
}
?>