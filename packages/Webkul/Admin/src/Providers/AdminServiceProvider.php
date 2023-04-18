<?php 

namespace Webkul\Admin\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Boot method
     */
    public function boot(Router $router): void
    {
        /**
         * Load Routes 
         */
        Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');

        /**
         * Load migrations
         */
        $this->loadMigrationsFrom(__DIR__. '/../Database/Migrations');

        /**
         * Load View files
         */
        $this->loadViewsFrom(__DIR__. '/../Resources/Views', 'admin');

        /**
         * Registering the event service provider
         */
        $this->app->register(ModuleServiceProvider::class);
    }

    /**
     * Register method
     */
    public function register(): void
    {        
        $this->app['router']->aliasMiddleware('custom', CustomMiddleware::class);
    }
}

?>