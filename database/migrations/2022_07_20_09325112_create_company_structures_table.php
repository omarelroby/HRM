<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_structures', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_ar');
            $table->unsignedBigInteger('parent')->nullable();
            $table->foreign('parent')->references('id')->on('company_structures')->onDelete('cascade');
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
        Schema::dropIfExists('company_structures');
    }
}
