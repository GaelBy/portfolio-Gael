<?php
class Chat
{
	private $id;
	private $content;
	private $date;
	private $status;
	private $id_user;

	private $user;

	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getContent()
	{
		return $this->content;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getStatus()
	{
		return $this->status;
	}
	public function getUser()
	{
		if ($this->user === null)
		{
			$manager = new UserManager($this->link);
			$this->user = $manager->getById($this->id_user);
		}
		return $this->user;
	}
	public function setContent($content)
	{
		if (strlen($content) < 1)
			throw new Exception("Veuillez entrer un message");
		if (strlen($content) > 1023)
			throw new Exception("Message trop long (maximum 1023 caractères)");
		$this->content = $content;
	}
	public function setStatus($status)
	{
		if ($status != 0 && $status !=1)
			throw new Exception("Paramètre incorrect : statut");
		$this->status = $status;
	}
	public function setUser(User $user)
	{
		$this->id_user = $user->getId();
		$this->user = $user;
	}
}
?>