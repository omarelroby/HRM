<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_type')->nullable();
            $table->string('model')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('insurance_date')->nullable();
            $table->date('check_date')->nullable();
            $table->string('custody')->nullable();
            $table->date('insurance_expiry_date')->nullable();
            $table->date('check_expiry_date')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
