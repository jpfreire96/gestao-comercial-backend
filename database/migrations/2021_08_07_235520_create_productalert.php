<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductalert extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('productalert')) {
            Schema::create('productalert', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('product');
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('productalert')) {
            Schema::dropIfExists('productalert');
        }
    }
}
