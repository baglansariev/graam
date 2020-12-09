<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whapps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chat_id')->unique();
            $table->string('sender_name')->nullable();
            $table->string('deal_type')->nullable();                      
            $table->string('metall_type')->nullable();                      
            $table->string('weight')->nullable();                      
            $table->string('price')->nullable();                      
            $table->string('payment_type')->nullable();                      
            $table->string('delivery_date')->nullable();                      
            $table->string('pay_date')->nullable();                      
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
        Schema::dropIfExists('whapps');
    }
}
