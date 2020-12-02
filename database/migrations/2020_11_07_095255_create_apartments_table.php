<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->string('title');
            $table->longText('description');
            $table->string('address');
            $table->float('latitude', 8, 6);
            $table->float('longitude', 8, 6);
            $table->integer('size');
            $table->integer('room_number');
            $table->integer('bed_number');
            $table->integer('bath_number');

            $table->boolean('visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('apartments');
    }
}
