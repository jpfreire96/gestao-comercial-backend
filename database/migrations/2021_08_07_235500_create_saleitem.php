<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleitem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('saleitem')) {
            Schema::create('saleitem', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('sale_id');
                $table->foreign('sale_id')->references('id')->on('sale');
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
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
            Schema::dropIfExists('saleitem');
        }
    }
}
