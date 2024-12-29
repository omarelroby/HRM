@extends('layouts.admin')
@section('page-title')
    {{__('Create Employee')}}
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				<div class="ibox-title">
					<h5></h5>
				</div>
				<div class="ibox-content">
					{{Form::open(array('route'=>array('employee.store'), 'id' => 'form','class' => 'wizard-big','method'=>'post','enctype'=>'multipart/form-data'))}}
						<h1>1</h1>
						<fieldset>
							<h2>{{__('general_information')}}</h2>
							<div class="col-md-12">
								<div class="row">
									<div class="form-group col-md-4">
										{!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}
										{!! Form::text('name', old('name'), ['class' => 'form-control required']) !!}
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('name_ar', __('Name_ar'),['class'=>'form-control-label']) !!}
										{!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control required' ]) !!}
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('sync_attendance_employee_id', __('sync_attendance_employee_id'),['class'=>'form-control-label']) !!}
										<select class="form-control" name="sync_attendance_employee_id">
											@for($i = 0 ; $i < count($attandance_employees) ; $i++)
												<option value="{{ $attandance_employees[$i]['id'] }}">{{ $attandance_employees[$i]['name'] }}</option>
											@endfor
										</select>
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('employee_id', __('Employee ID'),['class'=>'form-control-label']) !!}
										{!! Form::text('employee_id', $employeesId, ['class' => 'form-control '  ,'disabled'=>'disabled']) !!}
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										{{ Form::label('nationality_type', __('nationality_type'),['class'=>'form-control-label']) }}
										{{ Form::select('nationality_type', [ "0" => __('non_saudi') , "1" => __('saudi') ],null, array('class' => 'form-control required' ,'id' => 'nationality_type')) }}
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										<div id="nationality" >
											{{ Form::label('nationality_id', __('nationality'),['class'=>'form-control-label']) }}
											{{ Form::select('nationality_id', $nationalities,null, array('class' => 'form-control required' )) }}
										</div>
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('email', __('Email'),['class'=>'form-control-label']) !!}
										{!! Form::email('email',old('email'), ['class' => 'form-control required']) !!}
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('phone', __('Phone'),['class'=>'form-control-label']) !!}
										{!! Form::text('phone',old('phone'), ['class' => 'form-control required']) !!}
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('password', __('Password'),['class'=>'form-control-label']) !!}
										{!! Form::password('password', ['class' => 'form-control required']) !!}
										<div class="wizard-form-error"></div>
									</div>

									<div class="form-group col-md-6">
										<fieldset>
											<legend>
												{{__('Do you want to register in the list of users')}}
											</legend>

											<div class="form-check abc-radio abc-radio-info form-check-inline">
												<input class="form-check-input" type="radio" id="inlineRadio1" value="1" name="user_register" checked="">
												<label class="form-check-label" for="inlineRadio1"> {{__('yes')}} </label>
											</div>

											<div class="form-check abc-radio form-check-inline">
												<input class="form-check-input" type="radio" id="inlineRadio2" value="0" name="user_register">
												<label class="form-check-label" for="inlineRadio2"> {{__('no')}} </label>
											</div>

										</fieldset>
									</div>
								</div>

								<div class="optional-toggle">
									<div class="flex_xiMMzi itemsCenter_3nXjZC optional-toggle-content">
										<p class="caption12_2TCN8H weight_bold" style="color: var(--onboarding-slategrey-700);text-align: center;">{{__('optional_information')}}</p>
										<svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" class="" style="transform: rotate(-90deg);">
											<path
												fill="#7889a0"
												fill-rule="evenodd"
												d="M5.42879461,8.138845 C5.53304571,8.35942538 5.75437086,8.5 5.99740852, 8.5 C6.24044619,8.5 6.46177133,8.35942538 6.56602243,8.138845 L10.3492379, 3.37399091 C10.658484,2.89389728 10.4789218,2.5 9.93025921, 2.5 L2.06455783,2.5 C1.52587097,2.5 1.336333,2.89389728 1.65555484,3.37399091 L5.42879461, 8.138845 Z"
												transform="rotate(-90 4 6.5)"
											></path>
										</svg>
									</div>
								</div>

								<div class="row">
								    <h6 class="col-md-12">{{__('employee_identification')}}</h6>

									<div class="form-group col-md-3">
										{{ Form::label('gender', __('Gender'),['class'=>'form-control-label']) }}
										{{ Form::select('gender', [ "Male" => __('Male') , "Female" => __('Female') ],null, array('class' => 'form-control')) }}
									</div>

									<div class="form-group col-md-3">
										{{ Form::label('social_status', __('social_status'),['class'=>'form-control-label']) }}
										{{ Form::select('social_status', [ "1" => __('married') , "0" => __('single') , "2" => __('divorced') ],null, array('class' => 'form-control')) }}
									</div>

									<div class="form-group col-md-3">
										{{ Form::label('religion', __('Religion'),['class'=>'form-control-label']) }}
										{{ Form::select('religion', [ "1" => __('muslim') , "0" => __('non_muslim') ],null, array('class' => 'form-control')) }}
									</div>



									<div class="form-group col-md-6">
										{{ Form::label('department_id', __('Department'),['class'=>'form-control-label']) }}
										{{ Form::select('department_id', $departments,null, array('class' => 'form-control ' )) }}
									</div>

									<div class="form-group col-md-6">
										{{ Form::label('designation_id', __('Designation'),['class'=>'form-control-label']) }}
										{{ Form::select('designation_id', $designations,null, array('class' => 'form-control ' )) }}
									</div>

									<div class="form-group col-md-4">
										{{ Form::label('out_of_saudia', __('out_of_saudia'),['class'=>'form-control-label']) }}
										{{ Form::select('out_of_saudia', [ "1" => __('yes') , "0" => __('no') ],null, array('class' => 'form-control')) }}
									</div>

									<div class="form-group col-md-4">
									    {!! Form::label('employer_phone', __('employer_phone'),['class'=>'form-control-label']) !!}
										{!! Form::text('employer_phone',old('employer_phone'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-4">
										{{ Form::label('jobtitle_id', __('jobtitle'),['class'=>'form-control-label']) }}
										{{ Form::select('jobtitle_id', $jobtitles,null, array('class' => 'form-control ')) }}
									</div>

								</div>

								<div class="row">
								    <h6 class="col-md-12">{{__('ID_qama_details')}}</h6>
									<div class="form-group col-md-3">
										{!! Form::label('residence_number', __('residence_number'),['class'=>'form-control-label']) !!}
										{!! Form::text('residence_number', old('residence_number'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('place_of_issuance_of_ID_residence', __('place_of_issuance_of_ID_residence'),['class'=>'form-control-label']) !!}
										{!! Form::text('place_of_issuance_of_ID_residence', old('place_of_issuance_of_ID_residence'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('iqama_issuance_date_Hijri', __('iqama_issuance_date_Hijri'),['class'=>'form-control-label']) !!}
										{!! Form::text('iqama_issuance_date_Hijri', old('iqama_issuance_date_Hijri') ?? now(), ['id' => 'hijri_4' , 'class' => 'form-control hijri-date-input']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('iqama_issuance_date_gregorian', __('iqama_issuance_date_gregorian'),['class'=>'form-control-label']) !!}
										{!! Form::text('iqama_issuance_date_gregorian', old('iqama_issuance_date_gregorian') ?? now(), ['id' => 'gregorian_4' ,'class' => 'form-control gregorian-date']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('iqama_issuance_expirydate_Hijri', __('iqama_issuance_expirydate_Hijri'),['class'=>'form-control-label']) !!}
										{!! Form::text('iqama_issuance_expirydate_Hijri', old('iqama_issuance_expirydate_Hijri') ?? now(), ['id' => 'hijri_5' ,'class' => 'form-control hijri-date-input']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('iqama_issuance_expirydate_gregorian', __('iqama_issuance_expirydate_gregorian'),['class'=>'form-control-label']) !!}
										{!! Form::text('iqama_issuance_expirydate_gregorian', old('iqama_issuance_expirydate_gregorian') ?? now(), ['id' => 'gregorian_5','class' => 'form-control gregorian-date']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('iqama_attachment', __('add_attachment'),['class'=>'form-control-label']) !!}
										{!! Form::file('iqama_attachment', old('iqama_attachment'), ['class' => 'form-control']) !!}
									</div>
	                            </div>

								<div class="row">
								    <h6 class="col-md-12">{{__('Passport_details')}}</h6>

									<div class="form-group col-md-3">
										{!! Form::label('passport_number', __('passport_number'),['class'=>'form-control-label']) !!}
										{!! Form::text('passport_number', old('passport_number'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('place_of_issuance_of_passport', __('place_of_issuance_of_passport'),['class'=>'form-control-label']) !!}
										{!! Form::text('place_of_issuance_of_passport', old('place_of_issuance_of_passport'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('passport_issuance_date_gregorian', __('passport_issuance_date_gregorian'),['class'=>'form-control-label']) !!}
										{!! Form::text('passport_issuance_date_gregorian', old('passport_issuance_date_gregorian') ?? now(), ['class' => 'form-control gregorian-date']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('passport_issuance_expirydate_gregorian', __('passport_issuance_expirydate_gregorian'),['class'=>'form-control-label']) !!}
										{!! Form::text('passport_issuance_expirydate_gregorian', old('passport_issuance_expirydate_gregorian') ?? now(), ['class' => 'form-control gregorian-date']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('passport_attachment', __('add_attachment'),['class'=>'form-control-label']) !!}
										{!! Form::file('passport_attachment', old('passport_attachment'), ['class' => 'form-control']) !!}
									</div>

	                            </div>

								<div class="row">
								    <h6 class="col-md-12">{{__('Address_in_saudia')}}</h6>
									<div class="form-group col-md-3">
										{!! Form::label('building_number', __('building_number'),['class'=>'form-control-label']) !!}
										{!! Form::text('building_number', old('building_number'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('street_name', __('Street_name'),['class'=>'form-control-label']) !!}
										{!! Form::text('street_name', old('street_name'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('region', __('region'),['class'=>'form-control-label']) !!}
										{!! Form::text('region', old('region'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('city', __('city'),['class'=>'form-control-label']) !!}
										{!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('country', __('Country'),['class'=>'form-control-label']) !!}
										{!! Form::text('country', old('country'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('postal_code', __('postal_code'),['class'=>'form-control-label']) !!}
										{!! Form::text('postal_code', old('postal_code'), ['class' => 'form-control']) !!}
									</div>

	                            </div>

								<div class="row">
								    <h6 class="col-md-12">{{__('Address_in_mother_country')}}</h6>
                                    <div class="form-group col-md-6">
										{!! Form::label('Address', __('Address'),['class'=>'form-control-label']) !!}
										{!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('mother_city', __('city'),['class'=>'form-control-label']) !!}
										{!! Form::text('mother_city', old('mother_city'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('mother_country', __('Country'),['class'=>'form-control-label']) !!}
										{!! Form::text('mother_country', old('mother_country'), ['class' => 'form-control']) !!}
									</div>
	                            </div>

								<div class="row">
								    <h6 class="col-md-12">{{__('Emergency_contact')}}</h6>
									<div class="form-group col-md-3">
										{!! Form::label('emergency_contact_name', __('Name'),['class'=>'form-control-label']) !!}
										{!! Form::text('emergency_contact_name', old('emergency_contact_name'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('emergency_contact_relationship', __('relationship'),['class'=>'form-control-label']) !!}
										{!! Form::text('emergency_contact_relationship', old('emergency_contact_relationship'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('emergency_contact_address', __('Address'),['class'=>'form-control-label']) !!}
										{!! Form::text('emergency_contact_address', old('emergency_contact_address'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-3">
										{!! Form::label('emergency_contact_phone', __('Phone'),['class'=>'form-control-label']) !!}
										{!! Form::text('emergency_contact_phone', old('emergency_contact_phone'), ['class' => 'form-control']) !!}
									</div>
	                            </div>

								<div class="row">
								    <h6 class="col-md-12">{{__('custom_fields')}}</h6>
									<div class="form-group col-md-6">
										{!! Form::label('custom_field_corona', __('corona_vaccine_doses'),['class'=>'form-control-label']) !!}
										{!! Form::textarea('custom_field_corona', old('custom_field_corona'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-6">
										{!! Form::label('custom_field_notes', __('Notes'),['class'=>'form-control-label']) !!}
										{!! Form::textarea('custom_field_notes', old('custom_field_notes'), ['class' => 'form-control']) !!}
									</div>
	                            </div>
		                    </div>

						</fieldset>

						<h1>2</h1>
						<fieldset>
							<h2>{{__('job_information')}}</h2>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('Join_date_gregorian', __('Join_date_gregorian'),['class'=>'form-control-label']) !!}
										{!! Form::text('Join_date_gregorian', old('Join_date_gregorian') ?? now(), ['id' => 'gregorian_1' ,'class' => 'form-control gregorian-date']) !!}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										{!! Form::label('Join_date_hijri', __('Join_date_hijri'),['class'=>'form-control-label']) !!}
										{!! Form::text('Join_date_hijri', old('Join_date_hijri') ?? now(), ['id' => 'hijri_1' ,'class' => 'form-control hijri-date-input']) !!}
									</div>
								</div>

								<div class="form-group col-md-4">
									{{ Form::label('jobtitle_id', __('jobtitle'),['class'=>'form-control-label']) }}
									{{ Form::select('jobtitle_id', $jobtitles,null, array('class' => 'form-control ')) }}
								</div>

								<div class="col-md-4">
									<div class="form-group">
										{{ Form::label('work_time', __('job_type'),['class'=>'form-control-label']) }}
										{{ Form::select('work_time', $job_types,null, array('class' => 'form-control ')) }}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										{{ Form::label('labor_hire_company', __('labor_hire_company'),['class'=>'form-control-label']) }}
										{{ Form::select('labor_hire_company', $laborCompanies,null, array('class' => 'form-control')) }}
									</div>
								</div>

								<div class="form-group col-md-4">
									{{ Form::label('branch_id', __('Branch'),['class'=>'form-control-label']) }}
									{{ Form::select('branch_id', $branches,null, array('class' => 'form-control')) }}
								</div>

								<div class="col-md-4">
									<div class="form-group">
										{{ Form::label('work_unit', __('work_unit'),['class'=>'form-control-label']) }}
										{{ Form::select('work_unit', $work_units,null, array('class' => 'form-control ')) }}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										{{ Form::label('class', __('class'),['class'=>'form-control-label']) }}
										{{ Form::select('class', $jobclasses,null, array('class' => 'form-control ')) }}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										{{ Form::label('direct_manager', __('direct_manager'),['class'=>'form-control-label']) }}
										{{ Form::select('direct_manager', $employees,null, array('class' => 'form-control ')) }}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										{{ Form::label('permission', __('Permission'),['class'=>'form-control-label']) }}
										{{ Form::select('permission', $roles,null, array('class' => 'form-control ')) }}
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<input checked="checked" name="uploading_record_permission" type="checkbox" style="height: auto;margin-top: 45px;">
										{{ Form::label('uploading_record_permission', __('The_possibility_of_uploading_the_record_without_regard_to_the_geographical_location'),['class'=>'form-control-label']) }}
									</div>
								</div>

								<h5 class="col-md-12">{{__('contract_details')}}</h5>

								<div class="col-md-9">
									<div class="row">

										<div style="display:flex;" class="form-group col-md-12">
											{{ Form::label('contract_type', __('contract_type'),['class'=>'form-control-label']) }}
											<div class="d-flex radio-check">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="contract_type" checked value="1" name="contract_type" class="custom-control-input">
													<label class="custom-control-label" for="contract_type">{{__('limited_time')}}</label>
												</div>
											</div>
										</div>

										<div style="display:flex;" class="form-group col-md-12">
											{{ Form::label('contract_duration', __('contract_duration'),['class'=>'form-control-label']) }}
											<div class="d-flex radio-check">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="1year" value="1" checked name="contract_duration" class="custom-control-input">
													<label class="custom-control-label" for="1year">{{__('1year')}}</label>
												</div>
											</div>

											<div class="d-flex radio-check">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="2year" value="2" name="contract_duration" class="custom-control-input">
													<label class="custom-control-label" for="2year">{{__('2year')}}</label>
												</div>
											</div>

											<div class="d-flex radio-check">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="customduration"  value="0" name="contract_duration" class="custom-control-input">
													<label class="custom-control-label" for="customduration">{{__('customduration')}}</label>
												</div>
											</div>
										</div>

										<div class="form-group col-md-12">
											{{ Form::label('Is_the_employee_on_probation', __('Is_the_employee_on_probation'),['class'=>'form-control-label']) }}
											<div class="d-flex radio-check">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="yes" value="1" name="employee_on_probation" class="custom-control-input">
													<label class="custom-control-label" for="yes">{{__('yes')}}</label>
												</div>
											</div>

											<div class="d-flex radio-check">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="no" value="0" checked name="employee_on_probation" class="custom-control-input">
													<label class="custom-control-label" for="no">{{__('no')}}</label>
												</div>
											</div>
										</div>

										<div class="col-md-12" style="display:none;"  id= "ContractDuration">
											<div class="row">
												<div class="form-group col-md-6">
													<div id="contract_startdate" class="form-group">
														{!! Form::label('contract_startdate', __('contract_startdate_gregorian'),['class'=>'form-control-label']) !!}
														{!! Form::text('contract_startdate', old('contract_startdate') ?? now(), ['id' => 'gregorian_2' ,'class' => 'form-control gregorian-date']) !!}
													</div>
												</div>

												<div class="form-group col-md-6">
													<div id="contract_startdate" class="form-group">
														{!! Form::label('contract_startdate_Hijri', __('contract_startdate_Hijri'),['class'=>'form-control-label']) !!}
														{!! Form::text('contract_startdate_Hijri', old('contract_startdate_Hijri') ?? now(), ['id' => 'hijri_2' , 'class' => 'form-control hijri-date-input']) !!}
													</div>
												</div>

												<div class="form-group col-md-6">
													<div id="contract_enddate" class="form-group">
														{!! Form::label('contract_enddate', __('contract_enddate_gregorian'),['class'=>'form-control-label']) !!}
														{!! Form::text('contract_enddate', old('contract_enddate') ?? now(), ['id' => 'gregorian_3' ,'class' => 'form-control gregorian-date']) !!}
													</div>
												</div>

												<div class="form-group col-md-6">
													<div id="contract_startdate" class="form-group">
														{!! Form::label('contract_enddate_Hijri', __('contract_enddate_Hijri'),['class'=>'form-control-label']) !!}
														{!! Form::text('contract_enddate_Hijri', old('contract_enddate_Hijri') ?? now(), ['id' => 'hijri_3' ,'class' => 'form-control hijri-date-input']) !!}
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-6" style="display:none;" id="probation_input_duration">
											<div class="form-group">
												{{ Form::label('probation_periods_duration', __('probation_periods_duration'),['class'=>'form-control-label']) }}
												{{ Form::text('probation_periods_duration', old('probation_periods_duration'), array('class' => 'form-control' , 'value' => '90')) }}
											</div>
											<div class="wizard-form-error"></div>
										</div>

									</div>
								</div>

							</div>
						</fieldset>

						<h1>3</h1>
						<fieldset>
							<h2>{{__('salary_and_allowances')}}</h2>

							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										{!! Form::label('salary', __('basic_salary'),['class'=>'form-control-label']) !!}
										{!! Form::text('salary', old('salary'), ['class' => 'form-control required']) !!}
									</div>
									<div class="wizard-form-error"></div>
								</div>

								<div class="col-md-12 paymentDetails">
								    {{ Form::label('Payment_details', __('Payment_details'),['class'=>'form-control-label']) }}
									<div class="d-flex radio-check">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="cash" value="cash" checked name="payment_type" class="custom-control-input">
											<label class="custom-control-label" for="cash">{{__('cash')}}</label>
										</div>
									</div>

									<div class="d-flex radio-check">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="bank" value="bank" name="payment_type" class="custom-control-input">
											<label class="custom-control-label" for="bank">{{__('bank')}}</label>
										</div>
									</div>

									<div class="d-flex radio-check">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="cheque" value="cheque" name="payment_type" class="custom-control-input">
											<label class="custom-control-label" for="cheque">{{__('cheque')}}</label>
										</div>
									</div>

									<div class="d-flex radio-check">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="international_transfer" value="international_transfer" name="payment_type" class="custom-control-input">
											<label class="custom-control-label" for="international_transfer">{{__('international_transfer')}}</label>
										</div>
									</div>
								</div>

								<div style="display:none;" id="paymentContent" class="col-md-12">
									<div style="display:none;" id="bankDetails" class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div style="margin-top: 15%;" class="form-group">
													{{ Form::label('employee_account_type', __('employee_account_type'),['class'=>'form-control-label']) }}
													{{ Form::select('employee_account_type', [ "0" => __('salary_card') , "1" => __('bank_account') ],null, array('class' => 'form-control ' ,'id' => 'employee_account_type')) }}
												</div>
											</div>

											<div class="col-md-6">
												<div style="display:none;" id="IBAN_number_info" class="form-group">
													{!! Form::label('IBAN_number', __('IBAN_number'),['class'=>'form-control-label']) !!}
													{!! Form::text('IBAN_number', old('IBAN_number'), ['class' => 'form-control']) !!}
												</div>

												<div id="salary_card_number_info" class="form-group">
													{!! Form::label('salary_card_number', __('salary_card_number'),['class'=>'form-control-label']) !!}
													{!! Form::text('salary_card_number', old('salary_card_number'), ['class' => 'form-control']) !!}
												</div>

												<div class="form-group">
													{{ Form::label('bank_id', __('bank_name'),['class'=>'form-control-label']) }}
													{{ Form::select('bank_id', $banks,null, array('class' => 'form-control ')) }}
												</div>
											</div>

										</div>
									</div>

								 
								</div>

								<div class="optional-toggle">
									<div class="flex_xiMMzi itemsCenter_3nXjZC optional-toggle-content">

										<svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" class="" style="transform: rotate(-90deg);">
											<path
												fill="#7889a0"
												fill-rule="evenodd"
												d="M5.42879461,8.138845 C5.53304571,8.35942538 5.75437086,8.5 5.99740852, 8.5 C6.24044619,8.5 6.46177133,8.35942538 6.56602243,8.138845 L10.3492379, 3.37399091 C10.658484,2.89389728 10.4789218,2.5 9.93025921, 2.5 L2.06455783,2.5 C1.52587097,2.5 1.336333,2.89389728 1.65555484,3.37399091 L5.42879461, 8.138845 Z"
												transform="rotate(-90 4 6.5)"
											></path>
										</svg>
									</div>
								</div>

								<div class="row">
									<h6 class="col-md-12">{{__('insurance')}}</h6>

									<div class="form-group col-md-4">
										{!! Form::label('insurance_number', __('insurance_number'),['class'=>'form-control-label']) !!}
										{!! Form::text('insurance_number', old('insurance_number'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('policy_number', __('Policy_number'),['class'=>'form-control-label']) !!}
										{!! Form::text('policy_number', old('policy_number'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('insurance_startdate', __('insurance_startdate'),['class'=>'form-control-label']) !!}
										{!! Form::text('insurance_startdate', old('insurance_startdate') ?? now(), ['class' => 'form-control gregorian-date']) !!}
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('category', __('Category'),['class'=>'form-control-label']) !!}
										{!! Form::text('category', old('category'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('cost', __('Cost'),['class'=>'form-control-label']) !!}
										{!! Form::text('cost', old('cost'), ['class' => 'form-control']) !!}
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('availability_health_insurance_council', __('availability_health_insurance_council'),['class'=>'form-control-label']) !!}
										{!! Form::text('availability_health_insurance_council', old('availability_health_insurance_council') ?? now(), ['class' => 'form-control gregorian-date']) !!}
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('health_insurance_council_startdate', __('health_insurance_council_startdate'),['class'=>'form-control-label']) !!}
										{!! Form::text('health_insurance_council_startdate', old('health_insurance_council_startdate') ?? now(), ['class' => 'form-control gregorian-date']) !!}
									</div>

									<div class="form-group col-md-4">
										{!! Form::label('insurance_document', __('add_attachment'),['class'=>'form-control-label']) !!}
										{!! Form::file('insurance_document', ['class' => 'form-control']) !!}
									</div>

								</div>
                            </div>
						</fieldset>

						<h1>4</h1>
						<fieldset>
							<h2>{{__('annual_leave_entitlement')}}</h2>
							<div class="col-md-12 ">
								<div class="form-group col-md-12">
									{!! Form::text('annual_leave_entitlement', old('annual_leave_entitlement'), ['class' => 'form-control']) !!}
								</div>
							</div>
						</fieldset>

						<h1>5</h1>
						<fieldset>
							<div class="col-md-6">
								<h2>{{__('shifts')}}</h2>
								@foreach($employee_shifts as $shift)
									<div class="radio-check">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="shift_{{$shift->id}}" value="{{$shift->id}}" name="shift" class="custom-control-input">
											<label class="custom-control-label" for="shift_{{$shift->id}}">{{$lang == '_ar' ? $shift->name_ar : $shift->name}}</label>
										</div>
									</div>
								@endforeach
							</div>

							<div class="col-md-6">
								<h2>{{__('Location')}}</h2>
								@foreach($employee_location as $location)
									<div class="radio-check">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="shift_{{$location->id}}" value="{{$location->id}}" name="location" class="custom-control-input">
											<label class="custom-control-label" for="shift_{{$location->id}}">{{$lang == '_ar' ? $location->name_ar : $location->name}}</label>
										</div>
									</div>
								@endforeach
							</div>
						</fieldset>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script-page')
<script>

	$(document).ready(function () {
		var d_id = $('#department_id').val();
		//getDesignation(d_id);
	});

	$(document).ready(function () {
		for(let i = 1; i <= 18; i++){
			$('#hijri_1'+i).on('dp.change', function (arg) {

				if (!arg.date) {
				return;
				};

				let date = arg.date;
				$('#gregorian_'+i).val(date.format("YYYY-M-D"));
			});
			$('#gregorian_'+i).on('dp.change', function (arg) {

				if (!arg.date) {
				return;
				};

				let date = arg.date;
				$('#hijri_'+i).val(date.format("iYYYY-iM-iD"));
			});
			}
	});

	$(document).on('change', 'select[name=department_id]', function () {
		var department_id = $(this).val();
		//getDesignation(department_id);
	});

	$(document).on('change', '#nationality_type', function () {
		var nationality_type = $(this).val();
		if(nationality_type == 1)
		{
			$('#nationality').css('display','none');
		}else{
			$('#nationality').css('display','block');
		}
	});

	$(document).on('change', '#driving_license', function () {
		var driving_license = $(this).val();
		if(driving_license == 0)
		{
			$('.driving_license_info').css('display','none');
		}else{
			$('.driving_license_info').css('display','block');
		}
	});

	$(document).on('change', 'input[name=contract_duration]', function () {
		if($(this).val() == 0)
		{
			$('#ContractDuration').css('display','block');
		}else{
			$('#ContractDuration').css('display','none');
		}
	});

	$(document).on('change', 'input[name=employee_on_probation]', function () {
		if($(this).val() == 1)
		{
			$('#probation_input_duration').css('display','block');
			$('#probation_periods_duration').addClass('required');
		}else{
			$('#probation_input_duration').css('display','none');
			$('#probation_periods_duration').removeClass('required');
		}
	});

	$(document).on('change', '#medical_insurance', function () {
		var medical_insurance = $(this).val();
		if(medical_insurance == 0)
		{
			$('#insurance_startdate').css('display','none');
			$('#insurance_enddate').css('display','none');
		}else{
			$('#insurance_startdate').css('display','block');
			$('#insurance_enddate').css('display','block');
		}
	});

	$(document).on('change', '#worker', function () {
		var worker = $(this).val();
		if(worker == 0)
		{
			$('#worker_startdate').css('display','none');
			$('#worker_enddate').css('display','none');
		}else{
			$('#worker_startdate').css('display','block');
			$('#worker_enddate').css('display','block');
		}
	});

	// function getDesignation(did) {
	// 	$.ajax({
	// 		url: '{{route('employee.json')}}',
	// 		type: 'POST',
	// 		data: {
	// 			"department_id": did, "_token": "{{ csrf_token() }}",
	// 		},
	// 		success: function (data) {
	// 			$('#designation_id').empty();
	// 			$('#designation_id').append('<option value="">{{__('Select any Designation')}}</option>');
	// 			$.each(data, function (key, value) {
	// 				$('#designation_id').append('<option value="' + key + '">' + value + '</option>');
	// 			});
	// 		}
	// 	});
	// }

	$(document).on('change' ,'#employee_account_type', function() {
		if($(this).val() == 0)
		{
			$('#salary_card_number_info').css('display','block');
			$('#IBAN_number_info').css('display','none');
		}else{
			$('#salary_card_number_info').css('display','none');
			$('#IBAN_number_info').css('display','block');
		}
	});

	$(document).on('change', 'input[name=payment_type]', function () {
		if($(this).val() == 'cash' || $(this).val() == 'cheque')
		{
			$('#paymentContent').css('display','none');
		}else if($(this).val() == 'bank'){
			$('#paymentContent').css('display','block');
			$('#bankDetails').css('display','block');
			$('#internationalTransferDetails').css('display','none');
		}else if($(this).val() == 'international_transfer'){
			$('#paymentContent').css('display','block');
			$('#bankDetails').css('display','none');
			$('#internationalTransferDetails').css('display','block');
		}
	});


	$("#wizard").steps();
	$("#form").steps({
		bodyTag: "fieldset",
		onStepChanging: function (event, currentIndex, newIndex)
		{
			// Always allow going backward even if the current step contains invalid fields!
			if (currentIndex > newIndex)
			{
				return true;
			}

			// Forbid suppressing "Warning" step if the user is to young
			if (newIndex === 3 && Number($("#age").val()) < 18)
			{
				return false;
			}

			var form = $(this);

			// Clean up if user went backward before
			if (currentIndex < newIndex)
			{
				// To remove error styles
				$(".body:eq(" + newIndex + ") label.error", form).remove();
				$(".body:eq(" + newIndex + ") .error", form).removeClass("error");
			}

			// Disable validation on fields that are disabled or hidden.
			form.validate().settings.ignore = ":disabled,:hidden";

			// Start validation; Prevent going forward if false
			return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
			// Suppress (skip) "Warning" step if the user is old enough.
			if (currentIndex === 2 && Number($("#age").val()) >= 18)
			{
				$(this).steps("next");
			}

			// Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
			if (currentIndex === 2 && priorIndex === 3)
			{
				$(this).steps("previous");
			}
		},
		onFinishing: function (event, currentIndex)
		{
			var form = $(this);

			// Disable validation on fields that are disabled.
			// At this point it's recommended to do an overall check (mean ignoring only disabled fields)
			form.validate().settings.ignore = ":disabled";

			// Start validation; Prevent form submission if false
			return form.valid();
		},
		onFinished: function (event, currentIndex)
		{
			var form = $(this);

			// Submit form input
			form.submit();
		}
	}).validate({
		errorPlacement: function (error, element)
		{
			element.before(error);
		},
		rules: {
			confirm: {
				equalTo: "#password"
			}
		}
	});

	$('#name').on('keyup change' , function(){
		$('#account_holder_name').val($(this).val());
	});

	$('#name_ar').on('change' , function(){
		$('#account_holder_name_ar').val($(this).val());
	});
</script>
@endpush


