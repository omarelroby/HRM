@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update Task') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('tasks.update',$task->id)}}" method="post" class="needs-validation" novalidate>
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{ __('Field') }}</th>
                                <th>{{ __('Input') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Employee ID -->
                            <tr>
                                <td>{{ __('Employee ID') }}</td>
                                <td>
                                    <select  name="employee_id" class="form-control select2" required>
                                        <option  value=""   >{{ __('Select Employee') }}</option>
                                        @foreach($employees as $id => $name)
                                            <option @if($id==$task->employee_id) selected @endif value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ __('Please select an employee.') }}</div>
                                </td>
                            </tr>

                            <!-- Name Label -->
                            <tr>
                                <td>{{ __('Name Label') }}</td>
                                <td>
                                    <input type="text" value="{{$task->name ??''}}" name="name" class="form-control" placeholder="{{ __('Enter Task Name') }}" required>
                                    <div class="invalid-feedback">{{ __('Please enter a name of task.') }}</div>
                                </td>
                            </tr>

                            <!-- Start Date -->
                            <tr>
                                <td>{{ __('Start Date') }}</td>
                                <td>
                                    <input type="text" name="start_date" value="{{$task->start_date ??''}}" class="form-control datepicker" placeholder="{{ __('Select Start Date') }}" required>
                                    <div class="invalid-feedback">{{ __('Please select a start date.') }}</div>
                                </td>
                            </tr>

                            <!-- Due Date -->
                            <tr>
                                <td>{{ __('Due Date') }}</td>
                                <td>
                                    <input type="text" name="due_date" value="{{$task->due_date ??''}}" class="form-control datepicker" placeholder="{{ __('Select Due Date') }}" required>
                                    <div class="invalid-feedback">{{ __('Please select a due date.') }}</div>
                                </td>
                            </tr>

                            <!-- Status -->
                            <tr>
                                <td>{{ __('Status') }}</td>
                                <td>
                                    <select name="status" class="form-control select2" required>
                                        <option @if($task->status=='1') selected @endif value="1">{{ __('Active') }}</option>
                                        <option @if($task->status=='0') selected @endif selected value="0">{{ __('Pending') }}</option>
                                        <option @if($task->status=='2') selected @endif value="2">{{ __('Canceled') }}</option>
                                        <option @if($task->status=='3') selected @endif value="3">{{ __('Finished') }}</option>
                                    </select>
                                    <div class="invalid-feedback">{{ __('Please select a status.') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Priority') }}</td>
                                <td>
                                    <select name="priority" class="form-control select2" required>
                                        <option @if($task->status=='0') selected @endif value="0">{{ __('Low') }}</option>
                                        <option @if($task->status=='1') selected @endif value="1">{{ __('Medium') }}</option>
                                        <option @if($task->status=='2') selected @endif value="2">{{ __('High') }}</option>
                                        <option @if($task->status=='3') selected @endif value="3">{{ __('Critical') }}</option>
                                    </select>
                                    <div class="invalid-feedback">{{ __('Please select a priority.') }}</div>
                                </td>
                            </tr>
                            <!-- Note -->
                            <tr>
                                <td>{{ __('Note') }}</td>
                                <td>
                                    <textarea name="note" class="form-control" placeholder="{{ __('Enter Note') }}" rows="3">{{$task->note ??''}}</textarea>
                                </td>
                            </tr>

                            <!-- Priority -->


                            <!-- Created By -->
                            <tr>
                                <td>{{ __('Created By') }}</td>
                                <td>
                                    <input type="text"   value="{{ auth()->user()->name }}" class="form-control" disabled>
                                    <input type="text" hidden="" name="created_by" value="{{ $task->created_by }}" class="form-control" disabled>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Buttons -->
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Datepicker Script -->
    <script>
        $(function () {
            $(".datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection
