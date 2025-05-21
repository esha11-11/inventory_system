<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('author_id');
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->string('availability', 100);
            $table->string('price');
            $table->string('rating');
            $table->string('publisher');
            $table->string('country_of_publisher');
            $table->string('isbn', 100);
            $table->string('isbn-10', 100);
            $table->string('audience', 100);
            $table->string('format', 100);
            $table->string('language', 100);
            $table->text('description');
            $table->string('book_upload', 200);
            $table->string('book_img', 200);
            $table->string('total_pages', 100);
            $table->string('downloaded', 100);
            $table->string('edition_number', 100);
            $table->string('recommended', 100);
            $table->string('status', 10);
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('book');
    }
}
