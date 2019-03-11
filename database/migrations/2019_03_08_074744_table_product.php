<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('images')->nullable();
            $table->string('images_thumb')->nullable();
            $table->string('code')->nullable();
            $table->integer('quantity')->unsigned()->default(1);
            $table->string('description_vi')->nullable();
            $table->string('description_en')->nullable();
            $table->string('content_vi')->nullable();
            $table->string('content_en')->nullable();
            $table->integer('status')->default(1);
            $table->integer('favorite')->default(0);
            $table->integer('hot')->default(0);
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->double('price')->unsigned()->default(0);
            $table->integer('views')->unsigned()->default(0);
            $table->integer('viewed')->unsigned()->default(0);
            $table->integer('id_list')->unsigned()->default(0);
            $table->integer('id_cat')->unsigned()->default(0);
            $table->integer('id_item')->unsigned()->default(0);
            $table->integer('id_sub')->unsigned()->default(0);
            
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
        //
    }
}
