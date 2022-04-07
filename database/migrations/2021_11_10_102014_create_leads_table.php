<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->text('name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('email')->nullable();
            $table->text('contact')->nullable();
            $table->text('remark')->nullable();
            $table->enum('is_closed', ['1', '0'])->default('0');

            // 24 Jan  added - Tags, Source, Stage and Ml_num
            $table->text('Ml_num')->nullable();
            $table->text('tags')->nullable();
            $table->text('source')->default('casamania website');
            $table->text('stage')->default('New Lead');

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
        Schema::dropIfExists('leads');
    }
}
