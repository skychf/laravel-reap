<?php

namespace Skychf\Reap;

use Illuminate\Support\ServiceProvider;

class ReapServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * 注册服务提供者
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('reap', function () {
            return new Reap();
        });

        $this->app->singleton('command.reap', function () {
            return new ReapCommand();
        });

        $this->commands('command.reap');
    }

    /**
     * 获取由提供者提供的服务.
     *
     * @return array
     */
    public function provides()
    {
        return ['reap'];
    }
}