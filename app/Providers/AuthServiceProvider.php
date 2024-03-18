<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Article;
use App\Models\User;
use App\Policies\ArticlePolicy;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        
        Article::class => ArticlePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-article', function (User $user, Article $article) {

            // if user has made payment
            // if user is admin
            // if user is the owner of the article

            return $user->id === $article->user_id;
        });

        Gate::define('delete-article', function (User $user, Article $article) {
            return $user->id === $article->user_id;
        });

    }
}
