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
            $table->string('name'); // Product Name
            $table->unsignedBigInteger('category_id')->nullable()->default(null); // Product ID
            $table->foreign('category_id')
                  ->references('id')->on('categories'); // Product ID Foreign Key Ref
            $table->text('detail'); // detail
            $table->unsignedInteger('price'); // price
            $table->unsignedMediumInteger('stock'); // stock
            $table->unsignedSmallInteger('discount'); // discount
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
