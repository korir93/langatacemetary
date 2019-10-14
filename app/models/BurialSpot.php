<?php
class BurialSpot extends DBObject
{
	public $name, $description, $status;
	protected 	$table = 'burial_spots';
	protected 	$foreign_key_name 	= 'burial_spot_id';
	public function getStatus()
	{
		if ($this->status == '0') {
			return "FREE";
		} else if ($this->status == '1') {
			return "OCCUPIED";
		}
	}
	public function getDeceasedName()
	{
		$deceased = new Deceased;
		$deceased->names = "NOT_OCCUPIED";
		if ($this->status == '1') {
			$deceased =  $this->findAll(Deceased::class)[0]->names;
			if ($deceased) {
				return $deceased;
			} else {
				$deceased = new Deceased;
				$deceased->names = "NOT_FOUND";
				return $deceased->names;
			}
		}
		return $deceased->names;
	}
}
