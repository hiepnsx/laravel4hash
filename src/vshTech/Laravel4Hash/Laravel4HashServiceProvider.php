<?php
namespace vshTech\Laravel4Hash;

use Illuminate\Support\ServiceProvider;

class Laravel4HashServiceProvider extends ServiceProvider {

    protected $defer = false;

    public function boot() {
        $this->package('vshTech/Laravel4Hash');
    }

    public function register() {
        $this->registerHashMake();
        $this->registerHashCheck();
    }

    protected function registerHashMake()
    {
        $this->app['laravel4hash.make'] = $this->app->share(function($app) {
            return new HashMakeCommand;
        });

        $this->commands('laravel4hash.make');
    }

    protected function registerHashCheck()
    {
        $this->app['laravel4hash.check'] = $this->app->share(function($app) {
            return new HashCheckCommand;
        });

        $this->commands('laravel4hash.check');
    }

    public function provides()
    {
        return array();
    }

}