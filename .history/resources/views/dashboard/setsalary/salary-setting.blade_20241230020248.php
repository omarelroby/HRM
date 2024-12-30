@extends('dashboard.layouts.master')
@extends('dashboard.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                {{ Form::model($setting,array('route' => array('salary_setting.store'), 'method' => 'POST')) }}
                @csrf

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <h6> {{__('social_insurance')}} </h6>
                            </div>

                            <div class="form-group">
                                <h6 class="form-control-label"> {{__('saudi')}} </h6>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('saudi_company_insurance_percentage', __('saudi_company_insurance_percentage'),['class'=>'form-control-label']) !!}
                                {!! Form::number('saudi_company_insurance_percentage', old('saudi_company_insurance_percentage'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('saudi_employee_insurance_percentage', __('saudi_employee_insurance_percentage'),['class'=>'form-control-label']) !!}
                                {!! Form::number('saudi_employee_insurance_percentage', old('saudi_employee_insurance_percentage'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <h6> {{__('social_insurance')}} </h6>
                            </div>

                            <div class="form-group">
                                <h6 class="form-control-label"> {{__('non_saudi')}} </h6>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('saudi_company_insurance_percentage', __('saudi_company_insurance_percentage'),['class'=>'form-control-label']) !!}
                                {!! Form::number('Nonsaudi_company_insurance_percentage', old('Nonsaudi_company_insurance_percentage'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('saudi_employee_insurance_percentage', __('saudi_employee_insurance_percentage'),['class'=>'form-control-label']) !!}
                                {!! Form::number('Nonsaudi_employee_insurance_percentage', old('Nonsaudi_employee_insurance_percentage'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <h6> {{__('Medical_insurance')}} </h6>
                            </div>

                            <div class="form-group">
                                <h6 class="form-control-label"> {{__('saudi')}} </h6>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('saudi_company_medical_insurance', __('saudi_company_medical_insurance'),['class'=>'form-control-label']) !!}
                                {!! Form::number('saudi_company_medical_insurance', old('saudi_company_medical_insurance'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('saudi_employee_medical_insurance', __('saudi_employee_medical_insurance'),['class'=>'form-control-label']) !!}
                                {!! Form::number('saudi_employee_medical_insurance', old('saudi_employee_medical_insurance'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <h6> {{__('Medical_insurance')}} </h6>
                            </div>

                            <div class="form-group">
                                <h6 class="form-control-label"> {{__('non_saudi')}} </h6>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('Nonsaudi_company_medical_insurance', __('saudi_company_medical_insurance'),['class'=>'form-control-label']) !!}
                                {!! Form::number('Nonsaudi_company_medical_insurance', old('Nonsaudi_company_medical_insurance'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div  class="form-group">
                                {!! Form::label('Nonsaudi_employee_medical_insurance', __('saudi_employee_medical_insurance'),['class'=>'form-control-label']) !!}
                                {!! Form::number('Nonsaudi_employee_medical_insurance', old('Nonsaudi_employee_medical_insurance'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <div  class="form-group">
                                {!! Form::label('sick_absence_discount', __('Discount rate Sick Absence'),['class'=>'form-control-label']) !!}
                                {!! Form::number('sick_absence_discount', old('sick_absence_discount'), ['class' => 'form-control',"step" => 0.01]) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="form-group">
                                {!! Form::label('absence_with_permission_discount', __('Discount rate Absence with permission'),['class'=>'form-control-label']) !!}
                                {!! Form::number('absence_with_permission_discount', old('absence_with_permission_discount'), ['class' => 'form-control',"step" => 0.01]) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="form-group">
                                {!! Form::label('absence_without_permission_discount', __('Discount rate Absence without permission'),['class'=>'form-control-label']) !!}
                                {!! Form::number('absence_without_permission_discount', old('absence_without_permission_discount'), ['class' => 'form-control',"step" => 0.01]) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="form-group">
                                {!! Form::label('overtime_rate', __('overtime rate'),['class'=>'form-control-label']) !!}
                                {!! Form::number('overtime_rate', old('overtime_rate'), ['class' => 'form-control',"step" => 0.01]) !!}
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div  class="form-group">
                                {!! Form::label('work_hours', __('work_hours'),['class'=>'form-control-label']) !!}
                                {!! Form::text('work_hours', old('work_hours'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div  class="form-group">
                                {!! Form::label('annual_vacations', __('annual_vacations'),['class'=>'form-control-label']) !!}
                                {!! Form::text('annual_vacations', old('annual_vacations'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div  class="form-group">
                                {!! Form::label('week_vacations', __('week_vacations'),['class'=>'form-control-label']) !!}
                                <select required="required" class="form-control select2" multiple name="week_vacations[]">
                                    @foreach($days as $key => $day)
                                        <option value="{{$key}}" {{ $setting ? (in_array($key,explode(',',$setting->week_vacations)) ? 'selected' : '') : '' }}>{{ $day }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    @can('Create Set Salary')
                        <div class="row">
                            <div class="col-12 text-right mt-1">
                                <input type="submit" value="{{__('Save Change')}}" class="btn btn-primary">
                            </div>
                        </div>
                    @endcan

                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
