<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilling extends Migration
{
    public function up()
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->date('reading_date');
            $table->date('due_date');
            $table->float('reading');
            $table->float('rate');
            $table->float('total');
            $table->tinyInteger('status');
            $table->dateTime('date_created')->nullable();
            $table->timestamp('date_updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('billing');
    }
}
