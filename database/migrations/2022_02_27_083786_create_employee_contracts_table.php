<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id');
            $table->Tinyinteger('contract_type');
            $table->date('contract_startdate')->nullable();
            $table->date('contract_enddate')->nullable();
            $table->string('contract_document')->nullable();
            $table->Tinyinteger('medical_insurance');
            $table->date('insurance_startdate')->nullable();
            $table->date('insurance_enddate')->nullable();
            $table->string('insurance_document')->nullable();
            $table->Tinyinteger('worker');
            $table->date('worker_startdate')->nullable();
            $table->date('worker_enddate')->nullable();
            $table->string('worker_document')->nullable();
            $table->string('residence_number')->nullable();
            $table->date('residence_expiredate')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_expiredate')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_contracts');
    }
}
