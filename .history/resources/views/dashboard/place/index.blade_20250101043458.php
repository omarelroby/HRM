@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <!-- Button to trigger Create Modal -->
        <div class="all-button-box row d-flex justify-content-end mb-4">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#"
                       class="btn btn-primary btn-icon-only width-auto"
                       data-toggle="modal"
                       data-target="#createEmployeeShiftModal">
                        <i class="fa fa-plus"></i> {{ __('Create New Location') }}
                    </a>
                </div>
            @endcan
        </div>
        <!-- Employee Shifts List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('location') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>{{__('Location')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($places as $place)
                                    <tr>
                                        <td>{{ $place->name }}</td>
                                        <td class="text-right">
                                            <div class="btn-group" role="group">
                                                @can('Edit Branch')
                                                    <a href="{{ URL::to('nationality/'.$place->id.'/edit') }}"
                                                       class="btn btn-success btn-icon-only"
                                                       data-url="{{ URL::to('nationality/'.$place->id.'/edit') }}"
                                                       data-size="lg"
                                                       data-ajax-popup="true"
                                                       data-title="{{__('Edit')}}"
                                                       data-toggle="tooltip"
                                                       data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                @endcan

                                                @can('Delete Branch')
                                                    <a href="#"
                                                       class="btn btn-danger btn-icon-only"
                                                       data-toggle="tooltip"
                                                       data-original-title="{{__('Delete')}}"
                                                       onclick="if(confirm('{{ __('Are you sure? This action cannot be undone.') }}')) {
                                                                   document.getElementById('delete-form-{{$nationality->id}}').submit();
                                                               }">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>

                                                    <!-- Delete Form -->
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['nationality.destroy', $nationality->id], 'id' => 'delete-form-' . $nationality->id, 'style' => 'display:none;']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </div>
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

    <!-- Modal for Create Employee Shift -->
    <div class="modal fade" id="createEmployeeShiftModal" tabindex="-1" role="dialog" aria-labelledby="createEmployeeShiftModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEmployeeShiftModalLabel">{{ __('Create Employee Shift') }}</h5>
                </div>
                <div class="modal-body">
                    {{Form::open(array('url'=>'place','method'=>'post'))}}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))}}
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
                                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Name arabic')))}}
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

                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
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
@endsection
