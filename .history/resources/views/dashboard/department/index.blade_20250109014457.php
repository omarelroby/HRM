@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Ticket')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Branch') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Departments') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Branch')}}</th>
                                    <th>{{__('Branch Manager')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->employees ? $branch->employees->name : '' }}</td>
                                        <td class="text-right action-btns">
                                            @can('Edit Branch')
                                             <!-- Reply Button -->
                                             <a href="{{ route('branch.edit',$branch->id) }}"
                                             class="btn btn-sm btn-success mr-2"
                                             data-toggle="tooltip"
                                             title="{{ __('Edit') }}"
                                             aria-label="{{ __('Edit') }}">
                                                 <i class="fa fa-edit"></i>
                                             </a>
                                             @endcan

                                              @can('Delete Branch')
                                              <form method="POST" action="{{ route('branch.destroy', $branch->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                      <i class="fas fa-trash"></i>
                                                  </button>
                                              </form>
                                              @endcan
                                                 </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Add Ticket Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Branch') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'branch','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('employee_id',__('Employee'))}}
                            {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','id'=>'employee_id','placeholder'=>__('Select Employee')))}}
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Branch Name')))}}
                            @error('name')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Branch Name arabic')))}}
                            @error('name_ar')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="timezone">{{__('company_map_location')}}</label>
                            {{Form::hidden('lat','24.7305650',array('class'=>'form-control' , 'id' => 'lat'))}}
                            {{Form::hidden('lon','46.6555170',array('class'=>'form-control' , 'id' => 'lon'))}}
                            <div style="width: 100%;height: 300px;" id="map"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>

                </div>
                {{Form::close()}}

                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_foD6VvulHSpxKYjtgehkQ_UoVGHH64Y&callback=initMap&libraries=places,geometry"></script>
                <script>
                    function initMap() {
                            var latlng = new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("lon").value);
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: latlng,
                                zoom: 10,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map,
                                title: 'Set lat/lon values for this property',
                                draggable: true
                            });

                            // Try HTML5 geolocation.
                            if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                    var pos = {
                                        lat: position.coords.latitude,
                                        lng: position.coords.longitude
                                    };
                                    map.setCenter(pos);
                                    marker.setPosition(pos);
                                    document.getElementById("lat").value = pos.lat;
                                    document.getElementById("lon").value = pos.lng;
                                    }, function() {
                                    handleLocationError(true, map.getCenter());
                                    });
                            } else {
                                // Browser doesn't support Geolocation
                                handleLocationError(false, map.getCenter());
                            }

                            google.maps.event.addListener(marker, 'dragend', function(a) {
                            document.getElementById("lat").value = a.latLng.lat().toFixed(6);
                            document.getElementById("lon").value = a.latLng.lng().toFixed(6);
                            });
                    };
                </script>

            </div>
        </div>
    </div>
</div>

<!-- Script to display selected file name -->
<script>
    document.getElementById('attachment').addEventListener('change', function (e) {
        const fileName = e.target.files[0]?.name || '{{ __('No file chosen') }}';
        document.getElementById('attachmentFileName').textContent = fileName;
    });
</script>

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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
