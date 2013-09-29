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
                        thread.id, thread.title, thread.date,             
                            CASE WHEN max_comment IS NOT NULL
                                THEN max_comment
                                ELSE thread.date
                            END AS last_comment
                    FROM
                        thread
                    LEFT JOIN (
                        SELECT thread_id, MAX(comment.date) AS max_comment
                            FROM
                                comment
                            GROUP BY
                                thread_id    
                        ) MaxComment
                    ON
                        thread.id = MaxComment.thread_id
                    ORDER BY
                        last_comment DESC
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