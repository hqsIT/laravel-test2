<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
		\App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        
        // MySql支持的utf8编码最大字符长度为3字节，如果遇到4字节的宽字符就会出现插入异常,　需要调整字符串长度解决
        Schema::defaultStringLength(191);
        // Carbon 是 PHP DateTime 的一个简单扩展, 调整汉语
        Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }

        // 模型绑定失败报错404
        \API::error(function (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404, '数据资源不存在');
        });

        // 操作无权限报错403
        \API::error(function (\Illuminate\Auth\Access\AuthorizationException $exception) {
            abort(403, $exception->getMessage());
        });

        // 未登录时用user时报错
        \API::error(function (\Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException $exception) {
            abort(401, '用户未登录');
        });

    }
}
