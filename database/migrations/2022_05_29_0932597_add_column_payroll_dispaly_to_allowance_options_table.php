<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPayrollDispalyToAllowanceOptionsTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allowance_options', function (Blueprint $table) {
            $table->Integer('payroll_dispaly')->after('insurance_active')->nullable();
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
            $table->dropColumn('payroll_dispaly');
        });
    }
}
