<?php
class User
{
	private $id;
	private $login;
	private $pass;
	private $status;
	private $admin;

	private $messages;

	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getLogin()
	{
		return $this->login;
	}
	public function getPass()
	{
		return $this->pass;
	}
	public function getStatus()
	{
		return $this->status;
	}
	public function getAdmin()
	{
		return $this->admin;
	}
	public function getMessages()
	{
		if ($this->messages === null)
		{
			$manager = new ChatManager($this->link);
			$this->messages = $manager->getByUser($this);
		}
		return $this->messages;
	}
	public function checkPass($pass)
	{
		if (!password_verify($pass, $this->pass))
			throw new Exception("Login utilisé / Mot de passe incorrect");
		return true;
	}
	public function setLogin($login)
	{
		if (strlen($login) < 2)
			throw new Exception("Login trop court (au moins deux caractères)");
		if (strlen($login) > 15)
			throw new Exception("Login trop long (maximum 15 caractères)");
		$this->login = $login;
	}
	public function setPass($pass)
	{
		if (strlen($pass) < 5)
			throw new Exception("Mot de passe trop court (au moins cinq caractères)");
		$this->pass = password_hash($pass, PASSWORD_BCRYPT, array("cost"=>8));
	}
	public function setStatus($status)
	{
		if ($status != 0 && $status != 1)
			throw new Exception("Paramètre incorrect : statut");
		$this->status = $status;
	}
}
?>