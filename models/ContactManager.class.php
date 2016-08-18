<?php
class ContactManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getAll()
	{
		$query = "SELECT * FROM contact";
		$res = mysqli_query($this->link, $query);
		$list = [];
		while ($contact = mysqli_fetch_object($res, "Contact", [$this->link]))
			$list[] = $contact;
		return $list;
	}
	public function getById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM contact WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		$contact = mysqli_fetch_object($res, "Contact", [$this->link]);
		return $contact;
	}
	public function getBySender(Sender $sender)
	{
		$id_sender = intval($sender->getId());
		$query = "SELECT * FROM contact WHERE id_sender=".$id_sender;
		$res = mysqli_query($this->link, $query);
		$list = [];
		while ($contact = mysqli_fetch_object($res, "Contact", [$this->link]))
			$list[] = $contact;
		return $list;
 	}
 	public function create($data, Sender $sender)
 	{
 		$contact = new Contact($this->link);
 		if (!isset($data['title']))
 			throw new Exception("Paramètre manquant : titre");
 		if (!isset($data['content']))
 			throw new Exception("Paramètre manquant : message");
 		$contact->setTitle($data['title']);
 		$contact->setContent($data['content']);
 		$contact->setStatus(0);
 		$contact->setSender($sender);
 		$title = mysqli_real_escape_string($this->link, $contact->getTitle());
 		$content = mysqli_real_escape_string($this->link, $contact->getContent());
 		$status = intval($contact->getStatus());
 		$id_sender = intval($contact->getSender()->getId());
 		$query = "INSERT INTO contact (title, content, status, id_sender) 
 		VALUES ('".$title."', '".$content."', '".$status."', '".$id_sender."')";
 		$res = mysqli_query($this->link, $query);
 		if ($res)
 		{
 			$id = mysqli_insert_id($this->link);
 			if ($id)
 			{
 				$contact = $this->getById($id);
 				return $contact;
 			}
 			else
 				throw new Exception("Erreur interne");
 		}
 		else
 			throw new Exception("Erreur interne");
 	}
 	public function updateStatus(Contact $contact)
 	{
 		$id = intval($contact->getId());
 		$status = intval($contact->getStatus());
 		$query = "UPDATE contact SET status='".$status."' WHERE id=".$id;
 		$res = mysqli_query($this->link, $query);
 		if ($res)
 		{
 			$contact = $this->getById($id);
 			return $contact;
 		}
 		else
 			throw new Exception("Erreur interne");
 	}
}
?>