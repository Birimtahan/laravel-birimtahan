<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\FileLoader;
use WebScribble\Foundation\Application;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * @var Application
     */
    protected $app;

    public function register(): void
    {
        $this->app->afterResolving('translation.loader', function (FileLoader $loader) {
            $this->addApiNamespace($loader);
            $this->addFrontNamespace($loader);
        });
    }

    private function addApiNamespace(FileLoader $loader): void
    {
        $dir = 'resources/lang/api';

        $path = $this->path($dir);

        $loader->addNamespace('api', $path);
    }

    private function addFrontNamespace(FileLoader $loader): void
    {
        $dir = 'resources/lang/front';

        $path = $this->path($dir);

        $loader->addNamespace('front', $path);
    }

    /**
     * @param string $dir
     *
     * @return string
     */
    private function path(string $dir): string
    {
        return $this->app->basePath($dir);
    }
}
