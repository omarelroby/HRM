<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSalarySettingTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_settings', function (Blueprint $table) {
            $table->float('sick_absence_discount')->after('week_vacations')->nullable();
            $table->float('absence_with_permission_discount')->after('sick_absence_discount')->nullable();
            $table->float('absence_without_permission_discount')->after('absence_with_permission_discount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salary_settings', function (Blueprint $table) {
            
        });
    }
}
