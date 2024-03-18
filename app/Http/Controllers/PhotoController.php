<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\UserCommentedOnYouPhotoEvent;

class PhotoController extends Controller
{
    function getNotifyUserForNewComment(Request $request)
    {
        echo 'You commented photo of ' .$request->username;
        
        event(new UserCommentedOnYouPhotoEvent($request));
    }
}
