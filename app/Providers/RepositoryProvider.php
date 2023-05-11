<?php

namespace App\Providers;

use App\Repository\ArticleInterface;
use App\Repository\ArticleRepository;
use App\Repository\CategoriesInterface;
use App\Repository\CategoriesRepository;
use App\Repository\CommentInterface;
use App\Repository\CommentRepository;
use App\Repository\DashboardInterface;
use App\Repository\DashboardRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ArticleInterface::class,
            ArticleRepository::class,
        );
        $this->app->bind(
            CategoriesInterface::class,
            CategoriesRepository::class,
        );
        $this->app->bind(
            DashboardInterface::class,
            DashboardRepository::class,
        );
        $this->app->bind(
            CommentInterface::class,
            CommentRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
