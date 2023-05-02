<?php

namespace App\Providers;

use App\Repository\ArticleInterface;
use App\Repository\ArticleRepository;
use App\Repository\CategoriesInterface;
use App\Repository\CategoriesRepository;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
