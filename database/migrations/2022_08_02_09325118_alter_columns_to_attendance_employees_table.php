<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsToAttendanceEmployeesTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_employees', function (Blueprint $table) {
            $table->time('clock_in')->nullable()->change();
            $table->time('clock_out')->nullable()->change();
            $table->time('late')->nullable()->change();
            $table->time('early_leaving')->nullable()->change();
            $table->time('overtime')->nullable()->change();
            $table->time('total_rest')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendance_employees', function (Blueprint $table) {
            
        });
    }
}
