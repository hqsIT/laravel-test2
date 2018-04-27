<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        dump(config('app.name'));
        dump(config('app.name', 'klinson'));
        dump(config(['app.name' => 'klinson']));

        dump(config('app.name'));


        dump(env('APP_NAME'));

    }
}
