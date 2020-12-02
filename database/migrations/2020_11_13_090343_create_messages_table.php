<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained('apartments')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('message_obj');
            $table->longText('message_body');
            $table->boolean('read')->default(false);
            $table->date('message_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('messages');
    }
}
