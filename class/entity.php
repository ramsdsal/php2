<?php
class entity{
	
	private $id;
	private $name;
	private $father_id;

	public function setId($id){ $this->id = $id; }
	public function getId(){ return $this->id; }
	public function setName($name){ $this->name = $name; }
	public function getName(){ return $this->name; }
	public function setFatherId($father){ $this->father_id = $father; }
	public function getFatherId(){ return $this->father_id; }

	
	

}