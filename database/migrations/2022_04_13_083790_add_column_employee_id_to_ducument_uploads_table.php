<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEmployeeIdToDucumentUploadsTable extends Migration
{       
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ducument_uploads', function (Blueprint $table) {
            $table->integer('employee_id')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ducument_uploads', function (Blueprint $table) {
            $table->dropColumn('employee_id');
        });
    }
}
