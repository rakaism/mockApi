<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->date('event_date')->nullable();
            $table->string('event_location')->nullable();
            $table->text('event_description')->nullable();
            $table->integer('event_attendees')->nullable();
            $table->string('event_category')->nullable();
            $table->string('event_organizer')->nullable();
            $table->string('event_website')->nullable();
            $table->string('event_hashtag')->nullable();
            $table->string('event_sponsor')->nullable();
            $table->timestamps();
            // indexes
            $table->index('event_date');
            $table->index('event_category');
            $table->index('event_location');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
