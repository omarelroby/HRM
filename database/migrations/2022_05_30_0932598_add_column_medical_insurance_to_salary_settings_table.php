<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMedicalInsuranceToSalarySettingsTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_settings', function (Blueprint $table) {
            $table->double('saudi_employee_medical_insurance')->after('Nonsaudi_employee_insurance_percentage')->nullable();
            $table->double('Nonsaudi_employee_medical_insurance')->after('saudi_employee_medical_insurance')->nullable();
            $table->double('saudi_company_medical_insurance')->after('Nonsaudi_employee_medical_insurance')->nullable();
            $table->double('Nonsaudi_company_medical_insurance')->after('saudi_company_medical_insurance')->nullable();
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
