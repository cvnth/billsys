<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('contact');
            $table->string('address');
            $table->string('meter_code');
            $table->tinyInteger('status');
            $table->dateTime('date_created')->nullable();
            $table->timestamp('date_updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('clients');
    }
}
