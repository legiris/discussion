<?php

use Nette\Application\UI\Form;


class ZalozitNovouDiskuziPresenter extends BasePresenter
{		
		
	protected function createComponentThread()
	{
		$form = new Form();
		$form->addText('title', 'Nadpis:');	
		$form->addText('comment', 'Dotaz:');
		$form->addSubmit('submit', 'Odeslat');
		$form->onSuccess[] = $this->threadSubmitted;
		return $form;
	}	
	
	public function threadSubmitted(Form $form)
	{
		$ip = $this->context->httpRequest->getRemoteAddress();
		
		/* hack localhost IP */
		if ($ip == '::1') { $ip = '127.0.0.1'; }
		
		$data = $form->getValues();
		$data = (array) $data;
		$data['ip'] = $ip;
		
		$this->thread->insert($data);
		$this->flashMessage('Diskuzní vlákno bylo přidáno.');
		$this->redirect('Homepage:default');	
	}
	
}