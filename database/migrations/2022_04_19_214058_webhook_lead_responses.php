<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up()
  {
    Schema::create('webhook_lead_responses', static function (Blueprint $table) {
      $table->id();
      $table->string('type');
      $table->bigInteger('page_id');
      $table->bigInteger('adgroup_id');
      $table->bigInteger('ad_id');
      $table->bigInteger('form_id');
      $table->bigInteger('leadgen_id');
      $table->datetime('received_at');
      $table->text('payload')->nullable();
      $table->boolean('processed')->default(false);
      $table->datetime('processed_at')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('webhook_lead_responses');
  }
};
