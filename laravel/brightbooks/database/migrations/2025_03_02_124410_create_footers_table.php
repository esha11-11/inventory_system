<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();

            $table->string('address', 100);
            $table->string('phone_no', 100);
            $table->string('e-mail', 100);
            $table->string('facebook_id',100);
            $table->string('twitter_id',100);
            $table->string('youtube_id',100);
            $table->string('pintrust_id',100);
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
        Schema::dropIfExists('footers');
    }
};
