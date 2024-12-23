<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDateToMultipleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allowances', function (Blueprint $table) {
            $table->date('date')->after('title')->nullable();
        });

        Schema::table('commissions', function (Blueprint $table) {
            $table->date('date')->after('title')->nullable();
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->date('date')->after('title')->nullable();
        });

        Schema::table('saturation_deductions', function (Blueprint $table) {
            $table->date('date')->after('title')->nullable();
        });

        Schema::table('other_payments', function (Blueprint $table) {
            $table->date('date')->after('title')->nullable();
        });

        Schema::table('overtimes', function (Blueprint $table) {
            $table->date('date')->after('title')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
