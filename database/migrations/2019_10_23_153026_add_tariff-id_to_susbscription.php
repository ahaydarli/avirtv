<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTariffIdToSusbscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription', function (Blueprint $table) {
            $table->integer('tariff_id');
            $table->integer('package_id')->nullable()->change();
            $table->integer('m_tariff_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription', function (Blueprint $table) {
            //
        });
    }
}
