<?php
namespace App\Providers;

use App\Repositories\Frontend\Posts\PostDatabaseRepository;
use App\Repositories\Frontend\Posts\PostElasticRepository;
use App\Repositories\Frontend\Posts\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(PostRepositoryInterface::class, function () {
            switch (config('repositories.posts')) {
                case 'database':
                    return new PostDatabaseRepository();
                    break;
                case 'elastic':
                    return new PostElasticRepository();
                         break;
                default:
                   return new PostDatabaseRepository();
                    break;
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}