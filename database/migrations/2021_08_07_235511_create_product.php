<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product')) {
            Schema::create('product', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->mediumText('description')->nullable();
                $table->integer('quantity');
                $table->double('price');
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('saleitem')) {
            Schema::table('saleitem', function (Blueprint $table) {
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('product');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('saleitem')) {
            Schema::table('saleitem', function (Blueprint $table) {
                $table->dropForeign(['product_id']);
            });
        }
        if (Schema::hasTable('product')) {
            Schema::dropIfExists('product');
        }
    }
}
