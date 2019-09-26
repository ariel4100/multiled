<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->json('text')->nullable();
            $table->json('file')->nullable();
            $table->json('slider')->nullable();
            $table->json('video')->nullable();
            $table->double('price')->nullable();
            $table->boolean('featured')->nullable();
            $table->string('order')->nullable();
            $table->string('section')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
