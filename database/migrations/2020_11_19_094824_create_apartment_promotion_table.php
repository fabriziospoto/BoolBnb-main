<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentPromotionTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('apartment_promotion', function (Blueprint $table) {
            /* $table->id(); */
            $table->foreignId('apartment_id')->constrained('apartments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('promotion_id')->constrained('promotions')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('apartment_promotion');
    }
}
