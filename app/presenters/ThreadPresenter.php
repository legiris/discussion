<?php

class ThreadPresenter extends BasePresenter
{
    
    public function renderDefault($id)
    {
        $this->template->thread = $this->thread->fetch($id);
        
        $comments = $this->comment->fetchAllByThreadId($id);
        
        foreach ($comments as $comment)
        {
            if (preg_match("/\[citace\]/", $comment->text)) {
                $comment->text = preg_replace('/\[citace\]/', '<div class="citation">', $comment->text);
                $comment->text = preg_replace('/\[\/citace\]/', '</p></div><p>', $comment->text);
                $comment->text = preg_replace('/píše:/', '', $comment->text);
                $comment->text = preg_replace('/\*\*(.*)\*\*/', '<p><span class="bf">@${1}</span> píše:<br />', $comment->text);
                $comment->text = $comment->text . '</p>';
            } else {
                $comment->text = '<p>' . $comment->text . '</p>';
            }
        
        }
        
        $this->template->comments = $comments;
    }
    
}