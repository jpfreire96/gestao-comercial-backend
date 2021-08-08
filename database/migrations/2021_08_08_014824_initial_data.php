<?php

use Illuminate\Database\Migrations\Migration;

class InitialData extends Migration
{
    public function up()
    {
        DB::table('permission')->insert([
            'name' => 'Adminstrador',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permission')->insert([
            'name' => 'Vendedor',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('user')->insert([
            'name' => 'Admin',
            'email' => 'admin@gestaocomercial.com.br',
            'password' => '$2y$10$ujwuP8MAsVpBRRdTQZi8reQ8xomf4VYqIJ.t.JaqZFlhTrsEzcds.',
            'phone' => '32999999999',
            'cpf' => '11111111111',
            'permission_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
