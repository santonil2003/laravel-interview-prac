<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
            $table->foreign('product_id', 'fk_product_id')->references('id')->on('products')->onDelete('cascade');

            $table->foreignId('tag_id')->constrained();
            $table->foreign('tag_id', 'fk_tag_id')->references('id')->on('tags')->onDelete('cascade');

            // create composite primary key, to make sure only unique tag can be assigned to the product from db level
            $table->primary(['product_id', 'tag_id']);

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
        Schema::dropIfExists('product_tag');
    }
}
