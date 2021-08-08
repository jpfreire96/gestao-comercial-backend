<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermission extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('permission')) {
            Schema::create('permission', function (Blueprint $table) {
                $table->id();
                $table->string('name', 45);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('user')) {
            Schema::table('user', function (Blueprint $table) {
                $table->unsignedBigInteger('permission_id');
                $table->foreign('permission_id')->references('id')->on('permission');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('user')) {
            Schema::table('user', function (Blueprint $table) {
                $table->dropForeign(['permission_id']);
            });
        }

        if (Schema::hasTable('permission')) {
            Schema::dropIfExists('permission');
        }
    }
}
