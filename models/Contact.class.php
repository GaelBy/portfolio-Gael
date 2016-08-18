<?php
class Contact
{
	private $id;
	private $title;
	private $content;
	private $date;
	private $status;
	private $id_sender;

	private $sender;

	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getTitle()
	{
		return $this->title;
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
	public function getSender()
	{
		if ($this->sender === null)
		{
			$manager = new SenderManager($this->link);
			$this->sender = $manager->getById($this->id_sender);
		}
		return $this->sender;
	}
	public function setTitle($title)
	{
		if (strlen($title) < 3)
			throw new Exception("Titre trop court (au moins trois caractères)");
		if (strlen($title) > 127)
			throw new Exception("Titre trop long (maximum 127 caractères)");
		$this->title = $title;
	}
	public function setContent($content)
	{
		if (strlen($content) < 10)
			throw new Exception("Message trop court (au moins 10 caractères)");
		if (strlen($content) > 2047)
			throw new Exception("Message trop long (maximum 2047 caractères)");
		$this->content = $content;
	}
	public function setStatus($status)
	{
		if ($status != 0 && $status != 1)
			throw new Exception("Paramètre incorrect : statut");
		$this->status = $status;
	}
	public function setSender(Sender $sender)
	{
		$this->id_sender = $sender->getId();
		$this->sender = $sender;
	}
}
?>