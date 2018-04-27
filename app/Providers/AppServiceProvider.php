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
        //
    }
}
