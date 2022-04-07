<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_leads', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('last_name', 100)->nullable();
            $table->text('email')->nullable();
            $table->text('contact')->nullable();
            $table->text('remark')->nullable();
            $table->text('Ml_num')->nullable();
            $table->text('tags')->nullable();
            $table->text('source')->nullable();
            $table->enum('is_closed', ['1', '0'])->default('0');
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
        Schema::dropIfExists('guest_leads');
    }
}
