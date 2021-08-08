<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertitem extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('alertitem')) {
            Schema::create('alertitem', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('productalert_id');
                $table->foreign('productalert_id')->references('id')->on('productalert');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('user');
                $table->boolean('opened');
                $table->timestamp('opened_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('alertitem')) {
            Schema::dropIfExists('alertitem');
        }
    }
}
