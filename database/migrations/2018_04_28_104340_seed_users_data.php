<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SeedUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = [
            [
                'name'        => 'klinson1',
                'email' => 'klinson1@163.com',
                'password' => bcrypt('123456')
            ],
            [
                'name'        => 'hqs1',
                'email' => '3372176851@qq.com',
                'password' => bcrypt('123456')
            ],
        ];

        DB::table('users')->insert($users);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //清空数据
        DB::table('users')->truncate();
    }
}
