<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEmployeesTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->TinyInteger('nationality_type')->after('salary')->nullable();
            $table->string('work_time')->after('salary')->nullable();
            $table->string('city')->after('salary')->nullable();
            $table->string('passport_number')->after('salary')->nullable();
            $table->string('residence_number')->after('salary')->nullable();
            $table->TinyInteger('social_status')->after('salary')->nullable();
            $table->date('commencement_date')->after('salary')->nullable();
            $table->string('contract_number')->after('salary')->nullable();
            $table->string('insurance_number')->after('salary')->nullable();
            $table->TinyInteger('driving_license')->after('salary')->nullable();
            $table->string('driving_license_number')->after('salary')->nullable();
            $table->string('expiry_date')->after('salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('job_number');
            $table->dropColumn('nationality_type');
            $table->dropColumn('work_time');
            $table->dropColumn('city');
            $table->dropColumn('passport_number');
            $table->dropColumn('residence_number');
            $table->dropColumn('social_status');
            $table->dropColumn('commencement_date');
            $table->dropColumn('contract_number');
            $table->dropColumn('insurance_number');
            $table->dropColumn('driving_license');
            $table->dropColumn('driving_license_number');
            $table->dropColumn('expiry_date');
        });
    }
}
