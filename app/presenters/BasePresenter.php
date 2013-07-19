<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	/** @var Thread */
	protected $thread;

	
	protected function startup()
	{
		parent::startup();
	
		//instance sluzby
		$this->thread = $this->context->thread;
	}
	

}
