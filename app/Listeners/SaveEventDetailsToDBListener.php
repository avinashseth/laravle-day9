<?php

namespace App\Listeners;

use App\Events\UserCommentedOnYouPhotoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\UserComment;

class SaveEventDetailsToDBListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCommentedOnYouPhotoEvent $event): void
    {
    
        $message = $event->request->username . ' commented on your photo';
        
        $userComment = new UserComment;
        
        $userComment->user_id = rand(1000,9999);
        
        $userComment->comment_text = $message;
        
        $userComment->save();
    
    }
}
