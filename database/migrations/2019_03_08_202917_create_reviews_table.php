<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id'); // Product ID
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade'); // Product ID Foreign Key Ref
            $table->unsignedBigInteger('user_id'); // Customer ID
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade'); // Customer ID Foreign Key Ref
            $table->mediumText('review'); // Review
            $table->unsignedSmallInteger('star_rating'); // Star Rating
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
        Schema::dropIfExists('reviews');
    }
}
