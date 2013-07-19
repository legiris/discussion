<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
		
	public function renderDefault()
	{
		$this->template->threads = $this->thread->fetchAll(); 
	}
	
	
	public function renderDiskuze($id = 0)
	{
		$this->template->diskuze = $this->thread->fetch($id);
	}

}
