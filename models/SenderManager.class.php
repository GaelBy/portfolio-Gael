<?php
class SenderManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM sender WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		$sender = mysqli_fetch_object($res, "Sender", [$this->link]);
		return $sender;
	}
	public function getByEmail($email)
	{
		$email = mysqli_real_escape_string($this->link, $email);
		$query = "SELECT * FROM sender WHERE email='".$email."'";
		$res = mysqli_query($this->link, $query);
		$sender = mysqli_fetch_object($res, "Sender", [$this->link]);
		return $sender;
	}
	public function create($data)
	{
		$sender = new Sender($this->link);
		if (!isset($data['name']))
			throw new Exception("Paramètre manquant : nom");
		if (!isset($data['email']))
			throw new Exception("Paramètre manquant : email");
		if (!isset($data['tel']))
			throw new Exception("Paramètre manquant : téléphone");
		if (!isset($data['society']))
			throw new Exception("Paramètre manquant : société");
		$sender->setName($data['name']);
		$sender->setEmail($data['email']);
		$sender->setTel($data['tel']);
		$sender->setSociety($data['society']);
		$name = mysqli_real_escape_string($this->link, $sender->getName());
		$email = mysqli_real_escape_string($this->link, $sender->getEmail());
		$tel = mysqli_real_escape_string($this->link, $sender->getTel());
		$society = mysqli_real_escape_string($this->link, $sender->getSociety());
		$query = "INSERT INTO sender (name, email, tel, society) 
		VALUES ('".$name."', '".$email."', '".$tel."', '".$society."')";
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				$sender = $this->getById($id);
				return $sender;
			}
			else
				throw new Exception("Erreur interne");
		}
		else
			throw new Exception("Erreur interne");
	}
	public function update(Sender $sender)
	{
		$id = intval($sender->getId());
		$tel = mysqli_real_escape_string($this->link, $sender->getTel());
		$society = mysqli_real_escape_string($this->link, $sender->getSociety());
		$query = "UPDATE sender SET tel='".$tel."', society='".$society."' WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$sender = $this->getById($id);
			return $sender;
		}
		else
			throw new Exception("Erreur interne");
	}
}
?>