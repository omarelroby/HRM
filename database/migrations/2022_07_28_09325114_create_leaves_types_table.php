<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_types', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('type')->default('0');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('weekend_exception')->default('0');
            $table->tinyInteger('holiday_exception')->default('0');
            $table->tinyInteger('leave_plan')->default('0');
            $table->string('leave_plan_percentage')->nullable();
            $table->string('monthly_waiting_period')->nullable();
            $table->string('min_allowed_days')->nullable();
            $table->string('max_allowed_days')->nullable();
            $table->string('vacation_balance')->nullable();
            $table->integer('created_by')->default(0);
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
        Schema::dropIfExists('leaves_types');
    }
}
