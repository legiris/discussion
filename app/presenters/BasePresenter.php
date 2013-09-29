<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	/** @var Thread */
	protected $thread;
        
        /** @var Comment */
        protected $comment;

	
	protected function startup()
	{
		parent::startup();
	
		//instance sluzby
		$this->thread = $this->context->thread;
                $this->comment = $this->context->comment;
	}
	

}
