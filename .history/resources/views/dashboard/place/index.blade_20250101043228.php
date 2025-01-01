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
                    <h5>{{ __('Location') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
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
                                        <td class="Action text-right">
                                            <span>
                                                @can('Edit Branch')
                                                    <a href="#" class="edit-icon btn btn-success" data-url="{{ URL::to('place/'.$place->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Location')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Branch')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$place->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['place.destroy', $place->id],'id'=>'delete-form-'.$place->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </span>
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
                    <h5 class="modal-title" id="createEmployeeShiftModalLabel">{{ __('Create Location') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('url'=>'place','method'=>'post'))}}
                    <div class="row">
                        <!-- Name Field -->
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

                        <!-- Name (Arabic) Field -->
                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Name in Arabic')))}}
                                @error('name_ar')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Map Location -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="timezone">{{__('Company Map Location')}}</label>
                                {{Form::hidden('lat','24.7305650',array('class'=>'form-control' , 'id' => 'lat'))}}
                                {{Form::hidden('lon','46.6555170',array('class'=>'form-control' , 'id' => 'lon'))}}
                                <div class="mb-3" style="width: 100%; height: 300px;" id="map"></div>
                            </div>
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary btn-lg">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-light btn-lg" data-dismiss="modal">
                        </div>
                    </div>
                    {{Form::close()}}

                    <!-- Google Maps Script -->
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=places,geometry"></script>
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
                                title: 'Set lat/lon values for this location',
                                draggable: true
                            });

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
                                });
                            }

                            google.maps.event.addListener(marker, 'dragend', function(a) {
                                document.getElementById("lat").value = a.latLng.lat().toFixed(6);
                                document.getElementById("lon").value = a.latLng.lng().toFixed(6);
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
