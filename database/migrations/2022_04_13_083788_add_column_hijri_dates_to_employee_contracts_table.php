<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnHijriDatesToEmployeeContractsTable extends Migration
{    
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_contracts', function (Blueprint $table) {
            $table->date('contract_startdate_hijri')->after('contract_startdate')->nullable();
            $table->date('contract_enddate_hijri')->after('contract_enddate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_contracts', function (Blueprint $table) {
            $table->dropColumn('contract_startdate_hijri');
            $table->dropColumn('contract_enddate_hijri');
        });
    }
}
