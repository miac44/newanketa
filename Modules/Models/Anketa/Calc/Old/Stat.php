<?php
namespace App\Models;

class Stat
{
	public $count_true;
	public $count_false;
	public $points;
	public $count;

	public function __construct($count_true=0, $count_false=0)
	{
		$this->count_true = $count_true;
		$this->count_false = $count_false;
		$this->count = $count_true+$count_false;
		$this->points = 0;
	}

	public function getCount()
	{
		return $this->count;
	}

	public function getPercent()
	{
		if ($this->count==0){
			return 0;
		} else {
			return round(100 / $this->count * $this->count_true);
		}
	}
}