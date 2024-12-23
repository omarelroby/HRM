<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInsuranceActiveToAllowanceOptionsTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allowance_options', function (Blueprint $table) {
            $table->tinyInteger('insurance_active')->after('name_ar')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('allowance_options', function (Blueprint $table) {
            $table->dropColumn('insurance_active');
        });
    }
}
