<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAttendanceEmployeesTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_employees', function (Blueprint $table) {
            $table->tinyInteger('in_company_range')->after('clock_out')->nullable()->comment('1:Yes, 0:No, null: Company does not check the location');
            $table->decimal('lat', 10, 7)->after('in_company_range')->nullable();
            $table->decimal('lon', 10, 7)->after('lat')->nullable();
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
            $table->dropColumn('type');
        });
    }
}
