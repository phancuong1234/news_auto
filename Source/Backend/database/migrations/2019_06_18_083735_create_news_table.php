<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_category')->nullable();
            $table->integer('id_user')->nullable();
            $table->text('title')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->text('image')->nullable();
            $table->text('url_news')->nullable();
            $table->text('name_page_crawled')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->integer('number_view')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('news');
    }
}
