<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_service', function (Blueprint $table) {
            $table->foreignId('apartment_id')->constrained('apartments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_services');
    }
}
