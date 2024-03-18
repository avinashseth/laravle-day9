<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function updateArticle(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
