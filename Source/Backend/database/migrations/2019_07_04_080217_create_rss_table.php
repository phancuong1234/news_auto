<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_rss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_page')->nullable();
            $table->string('link_page')->nullable();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('news_rss');
    }
}
