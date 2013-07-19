<?php

class Comment extends BaseManager
{
	
	public function insert($data)
	{
		return $this->dibi->query('
			INSERT INTO `comment`', $data
		);	
	}
	
}