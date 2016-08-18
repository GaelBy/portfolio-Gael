<?php
class Work
{
	private $id;
	private $title;
	private $description;
	private $image;
	private $url;

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
	public function getDescription()
	{
		return $this->description;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function getUrl()
	{
		return $this->url;
	}
	public function setTitle($title)
	{
		if (strlen($title) < 3)
			throw new Exception("Titre trop court (au moins trois caractères)");
		if (strlen($title) > 127)
			throw new Exception("Titre trop long (maximum 127 caractères)");
		$this->title = $title;
	}
	public function setDescription($description)
	{
		if (strlen($description) < 10)
			throw new Exception("Description trop courte (au moins dix caractères)");
		if (strlen($description) > 511)
			throw new Exception("Description trop longue (maximum 511 caractères)");
		$this->description = $description;
	}
	public function setImage($image)
	{
		if (!filter_var($image, FILTER_VALIDATE_URL))
			throw new Exception("Lien d'image incorrect");
		$this->image = $image;
	}
	public function setUrl($url)
	{
		if (!filter_var($url, FILTER_VALIDATE_URL))
			throw new Exception("Lien incorrect");
		$this->url = $url;
	}
}
?>