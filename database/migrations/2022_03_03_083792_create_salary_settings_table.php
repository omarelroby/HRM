<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('saudi_company_insurance_percentage')->nullable();
            $table->double('saudi_employee_insurance_percentage')->nullable();
            $table->double('Nonsaudi_company_insurance_percentage')->nullable();
            $table->double('Nonsaudi_employee_insurance_percentage')->nullable();
            $table->string('work_days')->nullable();
            $table->string('annual_vacations')->nullable();
            $table->string('week_vacations')->nullable();
            $table->timestamps();
        });

        DB::table('salary_settings')->insert(
            array(
                'saudi_company_insurance_percentage'  => '12',
                'saudi_employee_insurance_percentage' => '10',
                'Nonsaudi_company_insurance_percentage' => '2',
                'Nonsaudi_employee_insurance_percentage' => '0',
                'work_days' => '30',
                'annual_vacations' => '21',
                'week_vacations' => '01,07',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_settings');
    }
}
