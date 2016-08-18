<?php
class UserManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM user WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		$user = mysqli_fetch_object($res, "User", [$this->link]);
		return $user;
	}
	public function getByLogin($login)
	{
		$login = mysqli_real_escape_string($this->link, $login);
		$query = "SELECT * FROM user WHERE login='".$login."'";
		$res = mysqli_query($this->link, $query);
		$user = mysqli_fetch_object($res, "User", [$this->link]);
		return $user;
	}
	public function create($data)
	{
		$user = new User($this->link);
		if (!isset($data['login']))
			throw new Exception("Paramètre manquant : login");
		if (!isset($data['pass']))
			throw new Exception("Paramètre manquant : mot de passe");
		$user->setLogin($data['login']);
		$user->setPass($data['pass']);
		$user->setStatus(1);
		$login = mysqli_real_escape_string($this->link, $user->getLogin());
		$pass = mysqli_real_escape_string($this->link, $user->getPass());
		$status = intval($user->getStatus());
		$query = "INSERT INTO user (login, pass, status) 
		VALUES ('".$login."', '".$pass."', '".$status."')";
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				$user = $this->getById($id);
				return $user;
			}
			else
				throw new Exception("Erreur interne");
		}
		else
			throw new Exception("Erreur interne");
	}
	public function delete(User $user)
	{
		$id = intval($user->getId());
		$status = 0;
		$query = "UPDATE user SET status=".$status." WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$user = $this->getById($id);
			return $user;
		}
		else
			throw new Exception("Erreur interne");
	}
}
?>