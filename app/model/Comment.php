<?php

class Comment extends BaseManager
{
	
	public function insert($data)
	{
		return $this->dibi->query('
			INSERT INTO `comment`', $data
		);	
	}
        
        /**
         * vybere komentare podle ID vlakna
         * @param int $id
         */
        public function fetchAllByThreadId($id)
        {
            return $this->dibi->fetchAll('
                SELECT 
                    `id`, `text`, `ip`, `date`
                FROM
                    `comment`
                WHERE
                    `thread_id` = %i
                ', $id);
            
        }
        
        /**
         * vybere komentar podle ID threadu a komentare
         * @param int $threadId
         * @param int $commentId
         */
        public function fetchById($threadId, $commentId)
        {
            return $this->dibi->fetch('
               SELECT
                    `id`, `text` AS comment, `ip`, `date`
               FROM
                    `comment`
               WHERE
                    `thread_id` = %i AND `id` = %i
               ', $threadId, $commentId);
        }
        
        /**
         * pocet komentaru v jednotlivych vlaknech
         * @return DibiRow
         * metoda query() vraci objekt DibiResult, pro pristup k objektu metoda fetch()
         */
        public function getCountByThreadId()
        {
            return $this->dibi->fetchAll('
                SELECT
                    `thread_id`, COUNT(id) AS `count`
                FROM
                    `comment`
                GROUP BY
                    `thread_id`
            ');
        }
        
        /**
         * datum posledniho komentare v diskuznim vlaknu
         * @return DibiRow
         */
        public function getLastCommentDate()
        {
            return $this->dibi->fetchAll('
                SELECT
                    `thread_id`, MAX(`date`) AS date
                FROM
                    `comment`
                GROUP BY
                    `thread_id`
            ');
                   
            
        }
	
}