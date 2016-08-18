<?php
class ChatManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getAll()
	{
		$query = "SELECT * FROM chat";
		$res = mysqli_query($this->link, $query);
		$list = [];
		while ($message = mysqli_fetch_object($res, "Chat", [$this->link]))
			$list[] = $message;
		return $list;
	}
	public function getById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM chat WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		$message = mysqli_fetch_object($res, "Chat", [$this->link]);
		return $message;
	}
	public function getByUser(User $user)
	{
		$id_user = intval($user->getId());
		$query = "SELECT * FROM chat WHERE id_user=".$id_user;
		$res = mysqli_query($this->link, $query);
		$list = [];
		while ($message = mysqli_fetch_object($res, "Chat", [$this->link]))
			$list[] = $message;
		return $list;
	}
	public function create($data, User $user)
	{
		$message = new Chat($this->link);
		if (!isset($data['content']))
			throw new Exception("Paramètre manquant : message");
		$message->setContent($data['content']);
		$message->setStatus(1);
		$message->setUser($user);
		$content = mysqli_real_escape_string($this->link, $message->getContent());
		$status = intval($message->getStatus());
		$id_user = intval($message->getUser()->getId());
		$query = "INSERT INTO chat (content, status, id_user) 
		VALUES ('".$content."', '".$status."', '".$id_user."')";
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				$message = $this->getById($id);
				return $message;
			}
			else
				throw new Exception("Erreur interne");
		}
		else
			throw new Exception("Erreur interne");
	}
	public function delete(Chat $message)
	{
		$id = intval($message->getId());
		$status = 0;
		$query = "UPDATE chat SET status=".$status." WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$message = $this->getById($id);
			return $message;
		}
		else
			throw new Exception("Erreur interne");
	}
	public function deleteAllByUser(User $user)
	{
		$id_user = intval($user->getId());
		$status = 0;
		$query = "UPDATE chat SET status=".$status." WHERE id_user=".$id_user;
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$list = $this->getByUser($user);
			return $list;
		}
		else
			throw new Exception("Erreur interne");
	}
}
?>