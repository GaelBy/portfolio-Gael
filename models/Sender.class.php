<?php
class Sender
{
	private $id;
	private $name;
	private $email;
	private $tel;
	private $society;

	private $contacts;

	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getTel()
	{
		return $this->tel;
	}
	public function getSociety()
	{
		return $this->society;
	}
	public function getContacts()
	{
		if ($this->contacts === null)
		{
			$manager = new ContactManager($this->link);
			$this->contacts = $manager->getBySender($this);
		}
		return $this->contacts;
	}
	public function setName($name)
	{
		if (strlen($name) < 2)
			throw new Exception("Nom trop court (au moins deux caractères)");
		if (strlen($name) > 63)
			throw new Exception("Nom trop long (maximum 63 caractères)");
		$this->name = $name;
	}
	public function setEmail($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			throw new Exception("Email incorrect");
		$this->email = $email;
	}
	public function setTel($tel)
	{
		if (!empty($tel))
		{
			if (!preg_match("#0[1-9]([-. ]?[0-9]{2}){4}$#",$tel))
				throw new Exception("Numéro de téléphone incorrect");
			$this->tel = $tel;
		}
		else
			$this->tel = "";
	}
	public function setSociety($society)
	{
		if (!empty($society))
		{
			if (strlen($society) < 2)
				throw new Exception("Nom de société trop court (au moins deux caractères)");
			if (strlen($society) > 127)
				throw new Exception("Nom de société trop long (maximum 127 caractères)");
			$this->society = $society;
		}
		else
			$this->society = "";
	}
}
?>