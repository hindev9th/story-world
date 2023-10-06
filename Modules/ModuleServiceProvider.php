<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Khai báo configs
//        $configFile = [
//            'demo' => __DIR__.'/Demo/configs/demo.php',
//        ];
//        foreach ($configFile as $alias => $path) {
//            $this->mergeConfigFrom($path, $alias);
//        }

        // Khai báo middleare
        $middleare = [
            // 'key' => 'namespace của middleare'
            'admin' => '\Modules\Home\src\Http\Middlewares\AdminMiddleware',
            'admin.guest' => '\Modules\Auth\src\Http\Middlewares\CheckAdminLoginedMiddleware',
        ];
        foreach ($middleare as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }

        // Khai báo commands
//        $this->commands([
//            // namespace của commands đặt tại đây
//            '\modules\Demo\src\Http\Commands\DemoCommand'
//        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $this->registerModule($moduleName);
        }
    }

    /**
     * Register components of Module
     *
     * @param $moduleName
     */
    private function registerModule($moduleName) {
        $modulePath = __DIR__ . "/$moduleName/";

        // Khai báo route web
        if (File::exists($modulePath . "routes/web.php")) {
            $this->loadRoutesFrom($modulePath . "routes/web.php");
        }

        // Khai báo route api
        if (File::exists($modulePath . "routes/api.php")) {
            $this->loadRoutesFrom($modulePath . "routes/api.php");
        }

        // Khai báo migration
        // Toàn bộ file migration của modules sẽ tự động được load
        if (File::exists($modulePath . "migrations")) {
            $this->loadMigrationsFrom($modulePath . "migrations");
        }

        // Khai báo languages
        if (File::exists($modulePath . "resources/lang")) {
            // Đa ngôn ngữ theo file php
            // Dùng đa ngôn ngữ tại file php resources/lang/en/general.php : @lang('Demo::general.hello')
            $this->loadTranslationsFrom($modulePath . "resources/lang", $moduleName);
            // Đa ngôn ngữ theo file json
            $this->loadJSONTranslationsFrom($modulePath . 'resources/lang');
        }

        // Khai báo views
        // Gọi view thì ta sử dụng: view('Demo::index'), @extends('Demo::index'), @include('Demo::index')
        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        // Khai báo helpers
        if (File::exists($modulePath . "helpers")) {
            // Tất cả files có tại thư mục helpers
            $helper_dir = File::allFiles($modulePath . "helpers");
            // khai báo helpers
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
}
