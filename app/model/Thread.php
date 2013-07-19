<?php

class Thread extends BaseManager
{

	public function insert($data)
	{
		return $this->dibi->query('
			INSERT INTO `thread`', $data
		);  
	}
	
	/**
	 * @return array of DibiRow
	 */
	public function fetchAll()
	{
		return $this->dibi->fetchAll('
			SELECT
				`id`, `title`, `date`
			FROM
				`thread`
			ORDER BY
				`date` DESC
		');
	}
	
	
	public function fetch($id)
	{
		return $this->dibi->fetch('
			SELECT 
				`id`, `title`, `comment`, `ip`, `date`
			FROM
				`thread`
			WHERE
				`id` = %i', $id
		);
	}
	
	

}