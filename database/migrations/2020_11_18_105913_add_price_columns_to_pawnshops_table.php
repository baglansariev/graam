<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceColumnsToPawnshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pawnshops', function (Blueprint $table) {
            $table->double('price_gold_585')->nullable();
            $table->double('price_gold_999')->nullable();
            $table->double('price_silver_585')->nullable();
            $table->double('price_silver_999')->nullable();
            $table->double('price_silver_925')->nullable();
            $table->integer('loan_percent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pawnshops', function (Blueprint $table) {
            $table->dropColumn('price_gold_585');
            $table->dropColumn('price_gold_999');
            $table->dropColumn('price_silver_585');
            $table->dropColumn('price_silver_999');
            $table->dropColumn('price_silver_925');
            $table->dropColumn('loan_percent');
        });
    }
}
