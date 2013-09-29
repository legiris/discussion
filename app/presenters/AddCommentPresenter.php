<?php

use Nette\Application\UI\Form;


class AddCommentPresenter extends BasePresenter
{   
    protected $threadId;
    
    protected $commentId;
    
   
    public function actionDefault($threadId, $commentId)
    {
        $this->threadId = $threadId;
        $this->commentId = $commentId;
    }
    
    public function renderDefault($threadId, $commentId)
    {   
        if ($commentId == NULL) {
            $this->template->thread = $this->thread->fetch($threadId);
        }
        else {    
            // inicializace
            $lastComment = $this->comment->fetchById($threadId, $commentId);
            $this->template->thread = $lastComment;
            
            
            //$test = $lastComment->comment;
            //var_dump($test);
            
            //$test = preg_replace('/[citace].*[\/citace]/', 'IS', $test);
       
            //var_dump($test);
                
            
            $text = preg_replace('/\s/', ' ', $lastComment->comment);;
            
            $word = '';
            
            for ($i = 0; $i < strlen($text); $i++)
            {
                $char = substr($text, $i, 1);
                if ($char == ' ') {
                    $word = '';
                } else {
                    $word .= $char;  
                    
                    if ($word === "[/citace]") {
                        $lastComment->comment = trim(substr($text, $i+1));
                    } 
                }
            }
        
            
            $this->template->textareaText = $lastComment->comment;
            $this->template->textareaAuthor = $lastComment->ip;
        }
        
         // zobrazim IP
        $ip = $this->context->httpRequest->getRemoteAddress();
        if ($ip == '::1') { $ip = '93.99.187.208'; }
        $this->template->ip = $ip;
    }
    
    protected function createComponentComment()
    {   
        // kvuli novemu radku vykreslim textarea bez setDefaultValue, tady si nastavim aspon hodnoty
        
        $form = new Form();
        $form->addTextArea('text', 'text', 80, 12);
        $form->addSubmit('add', 'Vložit');
        $form->onSuccess[] = $this->commentSubmitted;
        return $form;
    }
    
    public function commentSubmitted(Form $form)
    {
        $ip = $this->context->httpRequest->getRemoteAddress();
        if ($ip === '::1') { $ip = '93.99.187.208'; }

		
        $getData = $form->getValues();
        $data = (array) $getData;
        $data['ip'] = $ip;
        $data['thread_id'] = $this->threadId;
        
        $this->comment->insert($data);
        $this->flashMessage('Komentář byl vložen.');
        
        //TODO: nette redirect
        //$this->redirect('Thread:default');
        header('Location: http://localhost/web/forum/sandbox/www/thread/default/' . $this->threadId);
    }
    
       
}
