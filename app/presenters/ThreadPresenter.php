<?php

class ThreadPresenter extends BasePresenter
{
	
	public function renderDefault($id)
	{
		$this->template->thread = $this->thread->fetch($id);
	}
	
	
}