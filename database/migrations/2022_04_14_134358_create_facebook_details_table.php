<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_details', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('fb_id');
            $table->string('fb_name');
            $table->string('fb_email');
            $table->boolean('is_connected')->default(false);
            $table->text('user_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facebook_details');
    }
}
