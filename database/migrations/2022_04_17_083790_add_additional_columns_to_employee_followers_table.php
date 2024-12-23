<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToEmployeeFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_followers', function (Blueprint $table) {
            $table->string('name_ar')->after('name')->nullable();
            $table->string('gender')->after('name_ar')->nullable();
            $table->string('relationship')->after('gender')->nullable();
            $table->tinyInteger('nationality_type')->after('relationship')->nullable();
            $table->integer('nationality_id')->after('nationality_type')->nullable();
            $table->integer('social_status')->after('nationality_id')->nullable();
            $table->date('dob')->after('social_status')->nullable();
            $table->string('medical_insurance_number')->after('dob')->nullable();
            $table->date('medical_insurance_expiry_date')->after('medical_insurance_number')->nullable();
            $table->date('passport_expiry_date')->after('passport_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_followers', function (Blueprint $table) {
        });
    }
}
