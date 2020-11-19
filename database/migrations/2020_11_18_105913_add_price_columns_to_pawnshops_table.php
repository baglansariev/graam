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
            $table->double('price_585')->nullable();
            $table->double('price_999')->nullable();
            $table->double('price_925')->nullable();
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
            $table->dropColumn('price_585');
            $table->dropColumn('price_999');
            $table->dropColumn('price_925');
            $table->dropColumn('loan_percent');
        });
    }
}
