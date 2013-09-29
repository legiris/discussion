<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
		
	public function renderDefault()
	{
		$this->template->threads = $this->thread->fetchAll(); 
                
                //pocet prispevku ve vlaknu na hlavni strance
                $countComments = array();
                foreach ($this->comment->getCountByThreadId() as $comment) {
                    $countComments[$comment->thread_id] = $comment->count;
                }
                $this->template->countComments = $countComments;  
         }
	
}
