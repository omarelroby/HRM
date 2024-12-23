<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultipleColumnsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->tinyInteger('religion')->nullable();
            $table->tinyInteger('out_of_saudia')->nullable();
            $table->text('employer_phone')->nullable();
            $table->text('place_of_issuance_of_ID_residence')->nullable();
            $table->text('iqama_issuance_date_Hijri')->nullable();
            $table->text('iqama_issuance_date_gregorian')->nullable();
            $table->text('iqama_issuance_expirydate_Hijri')->nullable();
            $table->text('iqama_issuance_expirydate_gregorian')->nullable();
            $table->text('iqama_attachment')->nullable();
            $table->text('place_of_issuance_of_passport')->nullable();
            $table->text('passport_issuance_date_gregorian')->nullable();
            $table->text('passport_issuance_expirydate_gregorian')->nullable();
            $table->text('passport_attachment')->nullable();
            $table->text('building_number')->nullable();
            $table->text('street_name')->nullable();
            $table->text('region')->nullable();
            $table->text('country')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('mother_city')->nullable();
            $table->text('mother_country')->nullable();
            $table->text('emergency_contact_name')->nullable();
            $table->text('emergency_contact_relationship')->nullable();
            $table->text('emergency_contact_address')->nullable();
            $table->text('emergency_contact_phone')->nullable();
            $table->text('custom_field_corona')->nullable();
            $table->text('custom_field_notes')->nullable();
            $table->text('Join_date_gregorian')->nullable();
            $table->text('Join_date_hijri')->nullable();
            $table->text('labor_hire_company')->nullable();
            $table->text('work_unit')->nullable();
            $table->text('class')->nullable();
            $table->text('direct_manager')->nullable();
            $table->text('permission')->nullable();
            $table->text('uploading_record_permission')->nullable();
            $table->text('contract_type')->nullable();
            $table->text('contract_duration')->nullable();
            $table->text('employee_on_probation')->nullable();
            $table->text('probation_periods_duration')->nullable();
            $table->text('payment_type')->nullable();
            $table->text('employee_account_type')->nullable();
            $table->text('salary_card_number')->nullable();
            $table->Integer('bank_id')->nullable();
            $table->text('IBAN_number')->nullable();
            $table->text('account_holder_name_ar')->nullable();
            $table->text('branch_location_ar')->nullable();
            $table->text('swift_code')->nullable();
            $table->text('sort_code')->nullable();
            $table->text('bank_country')->nullable();
            $table->text('policy_number')->nullable();
            $table->text('insurance_startdate')->nullable();
            $table->text('category')->nullable();
            $table->text('cost')->nullable();
            $table->text('availability_health_insurance_council')->nullable();
            $table->text('health_insurance_council_startdate')->nullable();
            $table->text('insurance_document')->nullable();
            $table->text('annual_leave_entitlement')->nullable();
            $table->text('shift')->nullable();
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

        });
    }
}
