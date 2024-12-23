<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();
            $table->text('shift_days')->nullable();
            $table->time('shift_starttime')->nullable();
            $table->time('shift_endtime')->nullable();
            $table->time('buffer_time')->nullable();
            $table->date('shift_startdate')->nullable();
            $table->string('shift_type')->nullable();
            $table->tinyInteger('allowed_delay')->nullable();
            $table->Integer('allowed_delay_minutes')->nullable();
            $table->time('split_time')->nullable();
            $table->time('second_shift_start_time')->nullable();
            $table->time('second_shift_exit_time')->nullable();
            $table->text('work_times')->nullable();
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
        Schema::dropIfExists('employee_shifts');
    }
}
