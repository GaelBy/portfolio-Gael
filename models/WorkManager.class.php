<?php
class WorkManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getAll()
	{
		$query = "SELECT * FROM work";
		$res = mysqli_query($this->link, $query);
		$list = [];
		while ($work = mysqli_fetch_object($res, "Work", [$this->link]))
			$list[] = $work;
		return $list;
	}
	public function getById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM work WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		$work = mysqli_fetch_object($res, "Work", [$this->link]);
		return $work;
	}
	public function create($data)
	{
		$work = new Work($this->link);
		if (!isset($data['title']))
			throw new Exception("Paramètre manquant : titre");
		if (!isset($data['description']))
			throw new Exception("Paramètre manquant : description");
		if (!isset($data['image']))
			throw new Exception("Paramètre manquant : image");
		if (!isset($data['url']))
			throw new Exception("Paramètre manquant : lien");
		$work->setTitle($data['title']);
		$work->setDescription($data['description']);
		$work->setImage($data['image']);
		$work->setUrl($data['url']);
		$title = mysqli_real_escape_string($this->link, $work->getTitle());
		$description = mysqli_real_escape_string($this->link, $work->getDescription());
		$image = mysqli_real_escape_string($this->link, $work->getImage());
		$url = mysqli_real_escape_string($this->link, $work->getUrl());
		$query = "INSERT INTO work (title, description, image, url) 
		VALUES ('".$title."', '".$description."', '".$image."', '".$url."')";
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				$work = $this->getById($id);
				return $work;
			}
			else
				throw new Exception("Erreur interne");
		}
		else
			throw new Exception("Erreur interne");
	}
	public function update(Work $work)
	{
		$id = intval($work->getId());
		$title = mysqli_real_escape_string($this->link, $work->getTitle());
		$description = mysqli_real_escape_string($this->link, $work->getDescription());
		$image = mysqli_real_escape_string($this->link, $work->getImage());
		$url = mysqli_real_escape_string($this->link, $work->getUrl());
		$query = "UPDATE work SET title='".$title."', description='".$description."', image='".$image."', url='".$url."' 
		WHERE id=".$id;
		$res = mysqli_query($this->link, $query);
		if ($res)
		{
			$work = $this->getById($id);
			return $work;
		}
		else
			throw new Exception("Erreur interne");
	}
}
?>